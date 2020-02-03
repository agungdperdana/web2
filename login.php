<?php 
 session_start();

  require 'library/function.php';

// Cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username dari database
    $result = mysqli_query($conn, "SELECT iduser FROM user_tb WHERE iduser = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
      $_SESSION['login'] = true;
    }

  }
  
  if ( isset($_SESSION["login"]) ) {
    header("location: dashboard.php");
    exit;

  }

  ?>
  <div id="tombolditekan">
  <?php 

        if ( isset($_POST["login"])) {
          $username = $_POST["username"];
          $password = $_POST["password"];
          
          // cek username ada atau enggak
          $result = mysqli_query($conn,"SELECT * FROM user_tb WHERE username = '$username'");
         
          if (mysqli_num_rows($result) === 1) {
             // cek password
            $row = mysqli_fetch_assoc($result);
            if  (password_verify($password, $row["password"]) ) {
              //  atur sesi
              $_SESSION["login"] = true;
              $_SESSION['level'] = $row["level"];
              // atur cookie
              if ( isset($_POST["ingataku"])) {
                // buat cookie
                setcookie("id", $row["iduser"], time()+3600);
                setcookie("key", hash('sha256', $rows["username"]), time()+3600);
                setcookie("level", $row["level"], time()+3600);
              }
             
              header("location: dashboard.php");
              exit;
            }
            $_SESSION["login"] = true;
            $_SESSION["level"] = "editor";
           
            // atur cookie
            if ( isset($_POST["ingataku"])) {
              // buat cookie
              setcookie("id", $row["iduser"], time()+3600);
              setcookie("key", hash('sha256', $rows["username"]), time()+3600);
            }
            header("location: dashboard.php");
          }
  
          $error = true;
        }
      ?>
    </div>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Login Page</title>
  </head>
  <body>

  <div class="limiter">
    <div class="container-login100" style="background-image: url('img/3.jpg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form" action="" method="post">
          <span class="login100-form-logo">
            <img  src="img/3.jpg" alt="" width="130" height="130">
          </span>

          <span class="login100-form-title p-b-34 p-t-27">
            Halaman Login
          </span>
 <?php 
        if ( isset($error) ) :    ?>
          <div class="alert alert-danger" role="alert">
          (-_-)/ <a href="#" class="alert-link">Username</a> atau <a href="#" class="alert-link">Password</a> salah. Coba lagi.
          </div>
        <?php endif ; ?>
          <div class="wrap-input100">
            <input class="input100" type="text" name="username" id="username" placeholder="Input Username Kamu" required autocomplete="off">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

          <div class="wrap-input100">
            <input class="input100" type="password" id="password" name="password" placeholder="Input Password .. ">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <div class="contact100-form-checkbox">
            <input class="input-checkbox100" name="ingataku" id="ingataku" type="checkbox">
            <label class="label-checkbox100" for="ingataku">
              Ingat aku untuk Login berikutnya
            </label>
          </div>

          <div class="container-login100-form-btn">
            <button class="btn btn-lg btn-primary btn-block"  id="tombolditekan" type="submit" name="login" >
              Login
            </button>
          </div>

          <div class="text-center p-t-90">
            <p class="mt-5 mb-3 text-white font-weight-bold">&copy; Web @2020 </p>
    </form>
          </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main2.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  </body>
</html>