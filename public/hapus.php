<?php
// include database connection file
include_once("conn.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];

// Check if id is set and not empty
if (isset($id) && !empty($id)) {

  // Check if user confirms deletion
  if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {

    // Delete user row from table based on given id
    $result = mysqli_query($conn, "DELETE FROM data_diri WHERE id=$id");
     
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:index.php");

  } else {
    // If user has not confirmed deletion, display confirmation message
    ?>
    <html>
      <head>
        <title>Konfirmasi Penghapusan</title>
        <!-- Load Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      </head>
      <body>
        <div class="container mt-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Konfirmasi Penghapusan</h5>
              <p class="card-text">Apakah Anda yakin ingin menghapus data ini?</p>
              <form method="post">
                <input type="hidden" name="confirm" value="yes">
                <button type="submit" class="btn btn-danger mr-2">Ya</button>
                <a href="index.php" class="btn btn-secondary">Tidak</a>
              </form>
            </div>
          </div>
        </div>
        
        <!-- Load Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      </body>
    </html>
    <?php
  }

} else {
  // If id is not set or empty, redirect to Home
  header("Location:index.php");
}
?>
