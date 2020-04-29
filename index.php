<?php include("inc/header.php");?>
<?php include("config/db.php");?>
<?php 
if(isset($_SESSION["username"]))
{
   echo '<h3>Login success, Welcome - '.$_SESSION["username"].'</h3>';
}
?>
<?php 
/*jika berhasil login*/
session_start();
if(isset($_SESSION["username"])) {
   echo '<h3>login berhasil, selamat datang -'.$_SESSION["username"].'</h3>';
   echo '<br /></br /> <a href"logout.php">logout</a>';
   
} 

if(isset($_POST['logout'])){
   header("location:login.php");
 }
?>
<div class="container">
<h3>Data Pesebaran covid di Indonesia</h3>
<div class="row">
   <a href="add.php" class="btn btn-primary">Create Post</a>
</div>
<br>
   <table class="table table-hover">
   <thead>
      <tr>
         <th scope="col">No </th>
         <th scope="col">Provinsi</th>
         <th scope="col">Jumlah Kasus</th>
         <th scope="col">meninggal</th>
         <th scope="col">Date</th>
         <th scope="col">Action</th>

      
      </tr>
   </thead>
   <tbody>
      
      <?php
      $stmt = $pdo->query('select * from post');
      if($stmt->rowCount() > 0){
          while($row = $stmt->fetch(PDO::FETCH_OBJ)){
            ?>
            <tr class="table-active">
            <td><?php echo $row->no;?></td>
            <td><?php echo $row->provinsi;?></td>
            <td><?php echo $row->jumlahkasus;?></td>
            <td><?php echo $row->meninggal;?></td>
            <td><?php echo $row->published_on;?></td>
            <td>
               <a href=view.php?id=<?php echo $row->no;?> class="label label-success" >View</a>
               <a href=edit.php?id=<?php echo $row->no;?> class="label label-success">Edit</a>
               <a href=delete.php?id=<?php echo $row->no;?> class="label label-danger">Delete</a>
            </td>
          </tr>
            <?php
          }

         } else {
            ?> 
            <tr>No record Found!</tr>
            <?php 

         }
         ?>

      
      </tr>
   </tbody>
   </table>
   <form action="" method="post">
   <button type="submit" class="btn btn-success" name="logout">logout</button>
   </form>
</div>
<?php include("inc/footer.php");?>

   
  