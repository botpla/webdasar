<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama CRUD</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="./font/bootstrap-icons.css">
</head>
<body>
<div class="col-lg-4 col-xxl-4 my-5 mx-auto">
    <h1 class="text-center">TAMBAH DATA DIRI</h1>
    <?php

    if(isset($_POST['tambah'])) {

        require_once "./conn.php";

        $nim = $_POST['Nim'];
        $nama = $_POST['Nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tpt_lahir = $_POST['tpt_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];


        $sql = "INSERT INTO `data_diri`
                (`Nim`,`Nama`,`jenis_kelamin`,`tpt_lahir`,`tgl_lahir`,`alamat`)
                VALUES
                ('$nim','$nama','$jenis_kelamin','$tpt_lahir','$tgl_lahir','$alamat')";

        if (mysqli_query($conn, $sql)) {
    ?>
        <div class="alert alert-success" role="alert">
            <i class="bi bi-info-circle"></i> Data Berhasil Ditambah. <a class="btn btn-link" href="./">Halaman Utama</a>
        </div>
    <?php
        }

    }

    ?>
    <form class="row needs-validation" action="tambah.php" method="post" novalidate>
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">NIM</label>
            <input type="text" class="form-control" id="validationCustom01" name="Nim" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom02" class="form-label">NAMA</label>
            <input type="text" class="form-control" id="validationCustom02" name="Nama" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom03" class="form-label">JENIS KELAMIN</label>
            <select class="form-select" id="validationCustom03" name="jenis_kelamin" required>
                <option selected disabled value="">Choose...</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <div class="invalid-feedback">
            Please select a valid gender.
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom04" class="form-label">TEMPAT LAHIR</label>
            <input type="text" class="form-control" id="validationCustom04" name="tpt_lahir" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom05" class="form-label">TANGGAL LAHIR format:tahun-bulan-hari(XXXX-XX-XX)</label>
            <input type="text" class="form-control" id="validationCustom05" name="tgl_lahir" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom06" class="form-label">ALAMAT</label>
            <textarea class="form-control" id="validationCustom06" name="alamat" required>
            </textarea>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary btn-large" type="submit" name="tambah" value="Tambah">Tambah</button>
        </div>
    </form>
</div>
    <script src="./js/bootsrap.min.js"></script>
    <script src="./js/bootsrap.bundle.min.js"></script>
    <script type="text/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
</body>
</html>