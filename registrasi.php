<?php 
  require 'library/function.php';

  // cek jika tombol daftar telah ditekjan
  if ( isset($_POST["daftar"])) {

    if ( daftar($_POST) > 0) {
      echo "
      <script>
        alert('User baru berhasil terdaftar');
        document.location.href = 'login.php';
      </script>
    ";
    } else {
      echo mysqli_error ($conn);
  
    }




  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Sign Up SIMPRAM SMP Negeri 7 Kota Jambi</title>
 
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="" method="post">
      <img class="mb-4" src="img/3.jpg" alt="" width="72" height="72">
     
       
      <h1 class="h3 mb-3 font-weight-normal">Ayo Registrasi (^-^)/</h1>
      <label for="name" class="sr-only">Username</label>
      <input type="text" id="name" class="form-control" name="name" autofocus required autocomplete="off" placeholder="name">
      
      <label for="username" class="sr-only">Username</label>
      <input type="text" id="username" class="form-control" name="username" autofocus required autocomplete="off" placeholder="Username">
      
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      
      <label for="konpassword" class="sr-only">Konfirmasi Password</label>
      <input type="password" id="konpassword" name="konpassword" class="form-control" placeholder="Konfirmasi Password" required>
     
      <label for="level" class="sr-only">level</label>
      <input type="text" id="level" class="form-control" name="level" autofocus required autocomplete="off" placeholder="author/editor">
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="daftar">Daftar</button>
      <p class="mt-5 mb-3 text-muted">&copy; Web @2020</p>
    </form>
  </body>
</html>
