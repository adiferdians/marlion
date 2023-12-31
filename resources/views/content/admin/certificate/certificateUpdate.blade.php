<table border="0" class="table table-light" id="tableCertificate">
    @foreach($certificate as $cert)
    <tr>
        <td><input type="text" id="id" value="{{$cert->id}}" hidden></td>
    </tr>
    <tr>
        <td>Organization</td>
        <td><input type="text" style="width: 100%" class="form-control" placeholder="Organization" type="text" id="name" value="{{$cert->name}}"></td>
    </tr>
    <tr>
        <td>Nomor Sertifikat</td>
        <td><input type="text" style="width: 100%" class="form-control" placeholder="Nomor Sertifikat" type="text" id="number" value="{{$cert->number}}">
        </td>
    </tr>
    <tr>
        <td>Title</td>
        <td><input type="text" style="width: 100%" class="form-control" placeholder="Title" type="text" id="title" value="{{$cert->title}}">
        </td>
    </tr>
    <tr>
        <td>Sub Title</td>
        <td><input type="text" style="width: 100%" class="form-control" placeholder="Sub Title" type="text" id="sub_title" value="{{$cert->sub_title}}">
        </td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><textarea type="text" style="width: 100%; height: 100px;" class="form-control" placeholder="Alamat" type="text" id="address" >{{$cert->address}}</textarea>
        </td>
    </tr>
    <tr>
        <td>Scope</td>
        <td><textarea type="text" style="width: 100%; height: 100px;" class="form-control" placeholder="Scope" type="text" id="scope">{{$cert->scope}}</textarea>
        </td>
    </tr>
    <tr>
        <td>Expiary Date</td>
        <td>
            <input type="date" class="form-control" type="text" id="expired" value="{{$cert->expired}}">
        </td>
    </tr>
    <tr>
        <td>Tanggal Sertifikat</td>
        <td><input type="date" style="width: 100%;" class="form-control" type="text" id="date" value="{{$cert->date}}">
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <button type="submit" style="width: 100%;" class="btn btn-success" id="send"><i class="fa fa-floppy-o"></i> Simpan</button>
        </td>
    </tr>
    @endforeach
</table>

<script>
    $('#send').click(function() {
        const id = $('#id').val();
        const name = $('#name').val();
        const title = $('#title').val();
        const subTitle = $('#sub_title').val();
        const address = $('#address').val();
        const scope = $('#scope').val();
        const number = $('#number').val();
        const number_convert = number.replace(new RegExp("/", "g"), "");
        const expired = $('#expired').val();
        const date = $('#date').val();

        axios.post('/certificate/sendUpdate/' + id, {
            name,
            title,
            subTitle,
            address,
            scope,
            number,
            number_convert,
            expired,
            date
        }).then((response) => {
            Swal.fire({
                title: 'Success...',
                position: 'top-end',
                icon: 'success',
                text: 'Sukses Mengubah Data!',
                showConfirmButton: false,
                width: '400px',
                timer: 1500
            }).then((response) => {
                location.reload();
            })
        }).catch((err) => {
            Swal.fire({
                title: 'Error',
                position: 'top-end',
                icon: 'error',
                text: err,
                showConfirmButton: false,
                width: '400px',
                timer: 1500
            })
        })
    })
</script>