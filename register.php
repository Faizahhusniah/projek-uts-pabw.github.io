<?php include("config/db.php");

if(isset($_POST['submit'])) {

$nama = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$error = null;

//cek ketersediaan email
$query = "SELECT email FROM login WHERE email = '$email'";
$data = $pdo->prepare($query);
$data->execute();

while ($username = $data->fetch()) {
  if ($username['email'] == $email) { ?>
    <div class="alert alert-danger text-center" role="alert">
      Username sudah ada
    </div>
  <?php $error = true;
  }
}

//cek password sudah terisi
if ($password == "") { ?>
  <div class="alert alert-danger text-center" role="alert">
    password harus diisi
  </div>
<?php $error = true;
}


//cek konfirmasi
if ($password != $cpassword) : ?>
  <div class="alert alert-danger text-center" role="alert">
    Password tidak sama
  </div>
<?php $error = true;
endif;

//enkripsi password
$password = md5($password);

if (!$error) {
  //masukkan ke database
  $query = "INSERT INTO login VALUES ('','$nama','$email','$password')";
  $data = $pdo->prepare($query);
  $data->execute();

  
?>
  <div class="alert alert-success text-center" role="alert">
    Data berhasil ditambahkan
  </div>
<?php }
}

if(isset($_POST['sudah'])) {
   header("location:login.php");
}
?>
<html>
   <head>
      <title>PHP Password hashing-ragister</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   </head>

   <body class="bg bg-primary">
       
      <div class="container" style="margin-top: 100px;">
      <div class="row justify-content-center">
         <div class="col-md-6 col-md-offset-3" align="center">
           
         <img src="assets/header1.jpg"> <br><br>
         
            <form method="post" action="register.php">
               <input class="form-control" name="username" placeholder="Username..."><br>
               <input  class="form-control" name="email" type="email" placeholder="Email..."><br>
               <input  class="form-control" minilength="5" name="password" type="password" placeholder="Password..."><br>
               <input class="form-control" minilength="5" name="cpassword" type="password" placeholder="Confirm Password..."><br>
               <input class="btn btn-danger" name="submit" type="submit" value="Register..."><br><br>
               <input class="btn btn-danger" name="sudah" type="submit" value="sudah punya akun..."><br>

               </form>

         </div>
      </div>
   </div>

      
   </body>
</html>