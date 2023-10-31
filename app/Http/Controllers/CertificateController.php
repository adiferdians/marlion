<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\certificate;
use Carbon\Carbon;
use Validator;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{
    public function index()
    {
        $countCertificate = certificate::count();
        $active = certificate::where('status', 'active')->count();
        $withdraw = certificate::where('status', 'withdraw')->count();
        $draft = certificate::where('status', 'draft')->count();
        $certificate = certificate::orderByDesc('id')->paginate(10);
        return view('content.admin.certificate.certificate', [
            'certificate' => $certificate,
            'amount' => $countCertificate,
            'active' => $active,
            'withdraw' => $withdraw,
            'draft' => $draft
        ]);
    }

    function create()
    {
        return view("content.admin.certificate.certificateInput");
    }

    function send(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'   => 'required',
            'title'   => 'required',
            'subTitle'   => 'required',
            'address'   => 'required',
            'scope'   => 'required',
            'expired'   => 'required',
            'date'   => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validate->messages()
            ], 422);
        }

        $countCertivicate = certificate::count();

        $increment = $countCertivicate;
        $alphabet = range('A', 'Z');
        $base = count($alphabet);
        $number = '';
        while ($increment > 0) {
            $remainder = $increment % $base;
            $number = $alphabet[$remainder] . $number;
            $increment = ($increment - $remainder) / $base;
        }
        $code = str_pad($number, 4, 'A', STR_PAD_LEFT);

        $bulan = date('m', strtotime($request->date));
        $tahun = date('Y', strtotime($request->date));
        $bulan = str_replace('0', '', $bulan);

        $bulan_romawi = '';
        if ($bulan >= 1 && $bulan <= 12) {
            $angka_romawi = [
                1 => 'I',
                2 => 'II',
                3 => 'III',
                4 => 'IV',
                5 => 'V',
                6 => 'VI',
                7 => 'VII',
                8 => 'VIII',
                9 => 'IX',
                10 => 'X',
                11 => 'XI',
                12 => 'XII'
            ];
            $bulan_romawi = $angka_romawi[$bulan];
        }

        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'title' => $request->title,
                'sub_title' => $request->subTitle,
                'address' => $request->address,
                'scope' => $request->scope,
                'number' => "M-CB/".$code . "/" . $bulan_romawi . "/" . $tahun,
                'number_convert' => "M-CB". $code . $bulan_romawi . $tahun,
                'expired' => $request->expired,
                'date' => $request->date,
                'status' => "draft",
                'iso' => 9,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            $request->id ? certificate::where('id', $request->id)->update($data) : certificate::insert($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function getUpdate($id)
    {
        $certificate = certificate::where('id', $id)->get();
        return view('content.admin.certificate.certificateUpdate', [
            'certificate' => $certificate
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name'   => 'required',
            'title'   => 'required',
            'subTitle'   => 'required',
            'address'   => 'required',
            'scope'   => 'required',
            'number' => 'required',
            'expired'   => 'required',
            'date'   => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validate->messages()
            ], 422);
        }
        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'title' => $request->title,
                'sub_title' => $request->subTitle,
                'address' => $request->address,
                'scope' => $request->scope,
                'number' => $request->number,
                'number_convert' => $request->number_convert,
                'expired' => $request->expired,
                'date' => $request->date,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            certificate::where('id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function detil($id)
    {
        $certificate = certificate::where('id', $id)->get();
        return view('content.admin.certificate.certificateView', [
            'certificate' => $certificate
        ]);
    }

    public function delete($id)
    {
        $data = new certificate();
        $data->where('id', $id)->delete();
    }

    public function printPDF($id, $number)
    {
        $certificate = certificate::where('id', $id)->get();
        $qrCode = QrCode::format('svg')
            ->size(1000)
            ->errorCorrection('H')
            ->generate(url("/" . $number));

        $data = [
            'title' => $certificate[0]['title'],
            'sub_title' => $certificate[0]['sub_title'],
            'name' => $certificate[0]['name'],
            'number' => $certificate[0]['number'],
            'address' => $certificate[0]['address'],
            'scope' => $certificate[0]['scope'],
            'date' => $certificate[0]['date'],
            'expired' => $certificate[0]['expired'],
            'status' => $certificate[0]['status'],
            'iso' => $certificate[0]['iso'],
            'qrCode' => base64_encode($qrCode),
        ];

        $pdf = PDF::loadView('pdf.tamplate', $data);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function changeStatus(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'status'   => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validate->messages()
            ], 422);
        }
        DB::beginTransaction();
        try {
            $data = [
                'status' => $request->status,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            certificate::where('id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Status berhasil diubah', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function changeISO(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'iso'   => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validate->messages()
            ], 422);
        }
        DB::beginTransaction();
        try {
            $data = [
                'iso' => $request->iso,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            certificate::where('id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'ISO berhasil diubah', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }
}
