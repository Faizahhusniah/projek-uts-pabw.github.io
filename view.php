<?php include("inc/header.php");?>
<?php include("config/db.php");?>
<?php 
$no = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM post WHERE no = $no");
if($stmt->rowCount() > 0){
   while($row = $stmt->fetch(PDO::FETCH_OBJ)){
      $no = $row->no;
      $provinsi = $row->provinsi;
      $jumlahkasus = $row->jumlahkasus;
      $meninggal = $row->meninggal;
      $published_on= $row->published_on;
   }
}
?>
<div class="container">
<h3>Data Pesebaran covid di Indonesia</h3>
   <h1>lihat data</h1>
   <div class="row">
      <a href="index.php" class="btn btn-primary">Back</a>
   
      <div class="col-lg-12">
         <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">post </a>
            <p class="list-group-item list-group-item-action">provinsi: <?php echo $provinsi; ?></p>
            <p class="list-group-item list-group-item-action">jumlah kasus: <?php echo $jumlahkasus; ?></p>
            <p class="list-group-item list-group-item-action"> jumlah yang meninggal: <?php echo $meninggal; ?></p>
            <p class="list-group-item list-group-item-action">Jumlah Kasus Sampai Tanggal: <?php echo $published_on; ?></p>

         </div>
      </div>
   </div>
</div>
<?php include("inc/footer.php");?>

   
  