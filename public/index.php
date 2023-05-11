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
<div class="col-lg-11 col-xxl-4 my-5 mx-auto">
   <h1>Daftar Data Diri Mahasiswa</h1>
    <div class="col align-self-end">
        <a class="btn btn-small btn-success" href="./tambah.php"><i class="bi bi-clipboard-plus"></i> Tambah</a>
    </div>
    <div id="main" class="d-grid">
        
        <?php 
            // menyematkan modul koneksi database.
            require_once "./conn.php"; 

            $sql = "SELECT * FROM `data_diri`";
        ?>
        
        <table class="table table-striped">
            <thead>
            <tr>
                <td>NO.</td>
                <td>NIM</td>
                <td>NAMA</td>
                <td>JENIS KELAMIN</td>
                <td>TEMPAT LAHIR</td>
                <td>TANGGAL LAHIR</td>
                <td>ALAMAT</td>
                <td>AKSI</td>
            </tr>
            </thead>
            <tbody>
                
        <?php

            $no = 1;

            if($result = mysqli_query($conn, $sql)) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $no; $no++ ?></td>
                <td><?php echo $row['Nim'] ?></td>
                <td><?php echo $row['Nama'] ?></td>
                <td><?php echo $row['jenis_kelamin'] ?></td>
                <td><?php echo $row['tpt_lahir'] ?></td>
                <td><?php echo $row['tgl_lahir'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><a class="btn btn-small btn-warning" href="./edit.php?id=<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i> Ubah</a> | 
                    <a class="btn btn-small btn-danger"  href="./hapus.php?id=<?php echo $row['id'] ?>"><i class="bi bi-trash"></i> Hapus</a></td>
            </tr>
        <?php
                }
            }
        ?>
                
            </tbody>
        </table>
    </div>
</div>
    <script src="./js/bootsrap.min.js"></script>
    <script src="./js/bootsrap.bundle.min.js"></script>
</body>
</html>