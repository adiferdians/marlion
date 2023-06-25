<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\certificate;

class dashboardController extends Controller
{
    public function dashboard(){
        $countCertificate = certificate::count();
        return view('content.admin.index', [
            'amount' => $countCertificate
        ]);
    }
}
