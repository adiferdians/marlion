<table border="0" class="table table-light" id="tableCertificate">
    <tr>
        <td>Nama</td>
        <td><input type="text" style="width: 100%" class="input-group-text" placeholder="Nama" type="text" id="name"></td>
    </tr>
    <tr>
        <td>Tipe Training</td>
        <td>
            <select class="form-control" id="type" style="width: 100%" >
                <option>Public Training</option>
                <option>Inhouse Training</option>
                <option>Custom Training</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Title</td>
        <td><input type="text" style="width: 100%" class="input-group-text" placeholder="Title" type="text" id="title">
        </td>
    </tr>
    <tr>
        <td>Sub Title</td>
        <td><input type="text" style="width: 100%" class="input-group-text" placeholder="Sub Title" type="text" id="sub_title">
        </td>
    </tr>
    <tr>
    <td>Trining Mulai Dan Training Selesai</td>
        <td>
            <div style="display: flex;">
                <input type="date" style="width: 50%;" class="input-group-text" type="text" id="effective">
                <input type="date" style="width: 50%;" class="input-group-text" type="text" id="expired">
            </div>
        </td>
    </tr>
    <tr>
        <td>Tanggal Sertifikat</td>
        <td><input type="date" style="width: 100%;" class="input-group-text" type="text" id="date">
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <button class="btn btn-secondary" type="reset" id="close"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-success" id="send"><i class="fa fa-floppy-o"></i> Simpan</button>
        </td>
    </tr>
</table>

<script>
    $('#send').click(function() {
        const name = $('#name').val();
        const type = $('#type').val();
        const title = $('#title').val();
        const subTitle = $('#sub_title').val();
        const effective = $('#effective').val();
        const expired = $('#expired').val();
        const date = $('#date').val();

        axios.post('/certificate/send', {
            name,
            type,
            title,
            subTitle,
            effective,
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