<?php include("inc/header.php");?>
<?php include("config/db.php");?>
<?php 
   $no = $_GET['id'];
   $sql = "DELETE FROM post WHERE no = $no";
   $stmt = $pdo->prepare($sql);
   if($stmt->execute()){
 header("location:index.php");
   }
?>
