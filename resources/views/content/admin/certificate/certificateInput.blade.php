<table border="0" class="table table-light" id="tableCertificate">
    <tr>
        <td>Organization</td>
        <td><input type="text" style="width: 100%" class="form-control" placeholder="Organization" type="text" id="name"></td>
    </tr>
    <tr>
        <td>Title</td>
        <td><input type="text" style="width: 100%" class="form-control" placeholder="Title" type="text" id="title">
        </td>
    </tr>
    <tr>
        <td>Sub Title</td>
        <td><input type="text" style="width: 100%" class="form-control" placeholder="Sub Title" type="text" id="sub_title">
        </td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><textarea type="text" style="width: 100%; height: 100px;" class="form-control" placeholder="Alamat" type="text" id="address"></textarea>
        </td>
    </tr>
    <tr>
        <td>Scope</td>
        <td><textarea type="text" style="width: 100%; height: 100px;" class="form-control" placeholder="Scope" type="text" id="scope"></textarea>
        </td>
    </tr>
    <tr>
        <td>Tanggal Sertifikat</td>
        <td><input type="date" style="width: 100%;" class="form-control" type="text" id="date">
        </td>
    </tr>
    <tr>
        <td>Tanggal Expired</td>
        <td>
            <input type="date" class="form-control" type="text" id="expired">
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <button type="submit" style="width: 100%;" class="btn btn-success" id="send"><i class="fa fa-floppy-o"></i> Simpan</button>
        </td>
    </tr>
</table>

<script>
    $('#send').click(function() {
        const name = $('#name').val();
        const type = $('#type').val();
        const title = $('#title').val();
        const subTitle = $('#sub_title').val();
        const address = $('#address').val();
        const scope = $('#scope').val();
        const expired = $('#expired').val();
        const date = $('#date').val();

        axios.post('/certificate/send', {
            name,
            type,
            title,
            subTitle,
            address,
            scope,
            expired,
            date
        }).then((response) => {
            Swal.fire({
                title: 'Success...',
                position: 'top-end',
                icon: 'success',
                text: 'Sukses Menambahkan Data!',
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