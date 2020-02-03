<?php 
session_start();
  // cek sesi
  if ( !isset($_SESSION["login"])) {
    exit(header("location: login.php"));
  }

if ( isset($_POST ["submit"])) {
  // cek data berhasil ditambah atau tidak
  if ( tambahartikel($_POST) > 0) {

    echo "
      <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'dashboard.php';
      </script>
      
    ";
    } else {
      echo "
      <script>
        alert('Data gagal ditambahkan');
         
         document.location.href = 'tambahartikel.php';

      </script>
   
";
    }

}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Entry artikel</title>
  </head>
  <body>
    <?php 
    require 'library/navbar.php';
  
  
    ?>

    <center>
  		<h1>Entry artikel</h1>
		</center>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="container ">
        <div class="form-row align-items-center">
          <div class="form-group col-md-4">
            <label for="tgl_post">Tanggal post</label>
            <input type="date"  class="form-control" id="tgl_post" name="tgl_post" placeholder="Tanggal Post">
          </div>
          <div class="form-group col-md-4">
            <label for="photo">Upload Photo</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
          </div>
        </div>

        <div class="form-row align-items-center">
          <div class="form-group col-md-4">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" autocomplete="off" id="judul" name="judul" placeholder="Judul artikel">
          </div>
          
        </div>
        <div class="form-row align-items-center">
          <div class="form-group col-md-4">
            <label for="isi">Isi Artikel</label>
            <textarea id="isi" name="isi" rows="4" cols="50" maxlength="1000"></textarea>

          </div>
          </div>
          

      <div class="form-group col-md-4">
  
        <button name="submit" type="submit"  class="btn btn-primary" >Simpan Data</button>
      </div>
      </div>
      </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
    
  </body>
</html>