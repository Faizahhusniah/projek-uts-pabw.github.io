<?php include("config/db.php");?>
<?php
$msg="";

if(isset($_POST['submit'])){
  
   $username= $_POST['username'];
   $email = $_POST['email'];
   $password = password_hash($password, PASSWORD_DEFAULT);
   $cpassword = $_POST['cpassword'];

   if($username != "" && $email != "" && $password !="" && $cpassword != ""){
      $sql = "INSERT INTO login(username, email, password) VALUES('$username','$email','$password')";
     
       $stmt = $pdo->prepare($sql);
       if($stmt ->execute()){
             header("location:login.php");
       } else {
             echo "Maaf, gagal menambahkan data";
       }
    } else {
          $error  = "Mohon isi semua data!";
    }
 
 }

   
       
 

 if(isset($_POST['sudah'])){
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
         <?php if  ($msg != "") echo $msg. "<br><br><br>";
            
            ?>
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