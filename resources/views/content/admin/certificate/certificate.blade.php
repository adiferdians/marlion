@extends('layout.master')
@section('content')
@section('certificate', 'active')
@section('title', 'Certificate')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Certificate</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4" id="sapi">
        <div class="card-header py-3" style="display: flex; justify-content: space-between;">
            <div>
            </div>
            <div>
                <button class="btn btn-success" id="add" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-square" title="Tambah Data"></i> Data Sertifikat</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="overflow: hidden;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-active">
                            <th style="text-align: center; vertical-align: middle;">Action</th>
                            <th style="text-align: center; vertical-align: middle;">Nama</th>
                            <th style="text-align: center; vertical-align: middle;">Tipe Trining</th>
                            <th style="text-align: center; vertical-align: middle;">Title</th>
                            <th style="text-align: center; vertical-align: middle;">Nomor Sertifikat</th>
                            <th style="text-align: center; vertical-align: middle;">Alamat</th>
                            <th style="text-align: center; vertical-align: middle;">Scope</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="table-active">
                            <th style="text-align: center; vertical-align: middle;">Action</th>
                            <th style="text-align: center; vertical-align: middle;">Nama</th>
                            <th style="text-align: center; vertical-align: middle;">Tipe Trining</th>
                            <th style="text-align: center; vertical-align: middle;">Title</th>
                            <th style="text-align: center; vertical-align: middle;">Nomor Sertifikat</th>
                            <th style="text-align: center; vertical-align: middle;">Alamat</th>
                            <th style="text-align: center; vertical-align: middle;">Scope</th>
                        </tr>
                    </tfoot>
                    @foreach($certificate as $cert)
                    <tbody>
                        <tr>
                            <td style="vertical-align: middle;">
                                <button class="btn btn-primary actBtn" title="Edit" id="update" onclick="updCertificate({{$cert->id}})">
                                    <i class="fas fa-pencil-ruler"></i>
                                </button><br>
                                <button class="btn btn-info  actBtn" title="Detil" id="detil" onclick="showQrCode('{{$cert->number}}', '{{$cert->name}}', '{{$cert->id}}')">
                                    <i class="fas fa-eye"></i>
                                </button><br>
                                <button class="btn btn-danger actBtn" title="Hapus" onclick="delCertificate({{$cert->id}})">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                            <td style="vertical-align: middle;">{{$cert->name}}</td>
                            <td style="vertical-align: middle;">{{$cert->type}}</td>
                            <td style="vertical-align: middle;">{{$cert->title}}</td>
                            <td style="vertical-align: middle;">{{$cert->number}}</td>
                            <td style="vertical-align: middle;">{{$cert->address}}</td>
                            <td style="vertical-align: middle;">{{$cert->scope}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-md-12">
                        {{ $certificate->appends(Request::all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#add').click(function() {
            axios.get('/certificate/create')
                .then(function(response) {
                    $('.modal-title').html("Tambah Certificate");
                    $('.modal-body').html(response.data);
                    $('#myModal').modal('show');
                })
                .catch(function(error) {
                    console.log(error);
                });
        })
    });

    function showQrCode(number, name, id) {
        let newNumber = number.replace(new RegExp("/", "g"), "");
        let url = '/certificate/printPDF/' + id + '/' + newNumber;

        window.open(url, '_blank');
    }

    function delCertificate(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak akan bisa kembali.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/certificate/delete/' + id)
                    .then(() => {
                        Swal.fire({
                            title: 'Sukses',
                            position: 'top-end',
                            icon: 'success',
                            text: 'Data berhasil dihapus.',
                            showConfirmButton: false,
                            width: '400px',
                            timer: 1500
                        });
                        location.reload();
                    })
                    .catch((err) => {
                        Swal.fire({
                            title: 'Error',
                            position: 'top-end',
                            icon: 'error',
                            text: err,
                            showConfirmButton: false,
                            width: '400px',
                            timer: 1500
                        });
                    });
            }
        });
    }


    function updCertificate(id) {
        axios.get('/certificate/update/' + id)
            .then(function(response) {
                $('.modal-title').html("Update Certificate");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function detCertificate(id) {
        window.location.href = "/certificate/detil/" + id;
    }
</script>

@endsection