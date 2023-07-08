<?php
  require "database.php";

  session_start();
  //ambil dari input form
  if(isset($_POST["submit"])){
    $name     = $_POST["name"];
    $username = $_POST["username"];
    $pass     = $_POST["pass"];

    $sql = "SELECT * FROM login where username = '$username'";

    $result = mysqli_query($conn, $sql);

    $cek = mysqli_num_rows($result);
    if($cek > 0){
      $_SESSION["error"] = "Username telah di gunakan!";
    }
    else{
      $pass = password_hash($pass, PASSWORD_DEFAULT);
      $sql = "INSERT INTO login (name, username, password) value('$name', '$username', '$pass')";
      mysqli_query($conn, $sql);
      $_SESSION["success"] = "Register anda berrhasil!";
    }
  }
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tugas | Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="resaurces/plugins/fontawesome-free/css/all.min.css"/>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="resaurces/plugins/icheck-bootstrap/icheck-bootstrap.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="resaurces/dist/css/adminlte.min.css" />
    <!-- Toastr -->
    <link rel="stylesheet" href="resaurces/plugins/toastr/toastr.min.css">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="resaurces/dist/img/logo.png" alt="">
      </div>
      <div class="login-logo">
        <a href="/"><b>HyForzLF</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Register</p>

          <form action="" method="post">
            <div class="input-group mb-3">
              <input name="name" type="text" class="form-control" placeholder="Name"autocomplete="off" required/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user-tag"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input name="username" type="text" class="form-control" placeholder="Username" autocomplete="off" required/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input
                name="pass"
                type="password"
                class="form-control"
                placeholder="Password"
                autocomplete="off"
                required
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
              <!-- /.col -->
              <div class="row justify-content-center">
                <div class="col-6">
                  <button name="submit" type="submit" class="btn btn-primary btn-block">
                    Register
                  </button>
                </div>
              </div>
              <!-- /.col -->
              <!-- /.col -->
              <br>
              <div class="row">
                <div class="col-10">
                  <span>just <a href="index.php">Login</a> if you have an account</span>
                </div>
              </div>
              <!-- /.col -->
            </div>
          </form>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="resaurces/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="resaurces/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="resaurces/dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="resaurces/plugins/toastr/toastr.min.js"></script>

    <!-- tampilan error -->
    <?php if(isset($_SESSION["error"]) && !empty($_SESSION["error"])): ?>
    <script>toastr.error('<?= $_SESSION["error"] ?>')</script>
    <?php 
    unset($_SESSION["error"]);
    endif; ?>

    <!-- tampilan berhasil -->
    <?php if(isset($_SESSION["success"]) && !empty($_SESSION["success"])): ?>
    <script>toastr.success('<?= $_SESSION["success"] ?>')</script>
    <?php 
    unset($_SESSION["success"]);
    endif; ?>
  </body>
</html>
