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
    <h1 class="text-center">EDIT DATA DIRI</h1>
    <?php
// include database connection file
include_once("conn.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    
    $nim = $_POST['Nim'];
    $nama = $_POST['Nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tpt_lahir = $_POST['tpt_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
        
    // update user data
    $result = mysqli_query($conn, "UPDATE data_diri SET Nim='$nim',Nama='$nama',jenis_kelamin='$jenis_kelamin',tpt_lahir='$tpt_lahir',alamat='$alamat' WHERE id=$id");

    // Check if query was successful or not
    if($result){
        // Redirect to homepage to display updated user in list
        header("Location: index.php");
    } else {
        // Display error message
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM data_diri WHERE id=$id");
 
while($row = mysqli_fetch_array($result))
{
    $nim = $row['Nim'];
        $nama = $row['Nama'];
        $jenis_kelamin = $row['jenis_kelamin'];
        $tpt_lahir = $row['tpt_lahir'];
        $tgl_lahir = $row['tgl_lahir'];
        $alamat = $row['alamat'];
}
?>
        
    
    <form class="row needs-validation" action="edit.php" method="post" novalidate>
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">NIM</label>
            <input type="text" class="form-control" id="validationCustom01" name="Nim" value="<?php echo $nim;?>" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom02" class="form-label">NAMA</label>
            <input type="text" class="form-control" id="validationCustom02" name="Nama" value="<?php echo $nama;?>" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom03" class="form-label">JENIS KELAMIN</label>
            <input type="text" class="form-control" id="validationCustom03" name="jenis_kelamin" value="<?php echo $jenis_kelamin;?>" required>
            <div class="valid-feedback">
            Looks good!
            </div>
            <div class="invalid-feedback">
            Please select a valid gender.
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom04" class="form-label">TEMPAT LAHIR</label>
            <input type="text" class="form-control" id="validationCustom04" name="tpt_lahir" value="<?php echo $tpt_lahir;?>" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom05" class="form-label">TANGGAL LAHIR</label>
            <input type="text" class="form-control" id="validationCustom05" name="tgl_lahir" value="<?php echo $tgl_lahir;?>" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom06" class="form-label">ALAMAT</label>
            <textarea class="form-control" id="validationCustom06" name="alamat" required><?php echo $alamat;?></textarea>
        </div>
        <div>
        <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary btn-large" type="submit" name="update" value="Update">Tambah</button>
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