<?php include("config/db.php");

session_start();

$msg = "";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  if (empty($email) || empty($password)) {
    $msg = "<label>Masukkan tidak boleh kosong</label>";
  } else {
    $query = "SELECT * FROM login WHERE email = '$email'";
    $data = $pdo->prepare($query);
    $data->execute();

    $ketemu = $data->rowCount();

    if ($ketemu > 0) {
      $username = $data->fetch();

      $hash = md5($password);
      if ($hash == $username['password']) {
        $username = $username['username'];
        $_SESSION['login'] = $username['id'];
        header("Location:index.php");
        exit;
      } else {
        $msg = "<label>Username atau Password salah</label>";
      }
    } else {
      $msg = "<label>Username atau Password salah</label>";
    }
  }
}

if(isset($_POST['daftar'])){
   header("location:register.php");
 }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">

    <title>halaman login</title>
  </head>
  <body>
     <br />
     <?php

if ($msg != "") {
  echo '<label class="text-danger">' . $msg . '</label>';
}

if (isset($_GET['msg'])) {
  echo '<label class="text-success">' . $_GET['msg'] . '</label>';
}

?>
    <div class="container">
    <h4 class="text-center"> Form login</h4>
    <hr>
    <form action="" method="post">
    <div class="form grup">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="Masukkan username anda : ">
    </div>
    <div class="form grup">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Masukkan password anda : ">
    </div>
    <div class="form grup">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Masukkan email anda : ">
    </div>

    
    <button type="submit" class="btn btn-success" name="login">SUBMIT</button>
    <button type="reset" class="btn btn-danger" name="reset">reset</button> <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary" name="daftar">Belum punya akun?</button>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>