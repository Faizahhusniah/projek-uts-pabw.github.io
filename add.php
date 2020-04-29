<?php include("inc/header.php");?>
<?php include("config/db.php");?>
<?php
if(isset($_POST['submit'])){
   $provinsi = $_POST['provinsi'];
   $jumlahkasus = $_POST['jumlahkasus'];
   $meninggal = $_POST['meninggal'];
   $published  = $_POST['published_on'];
   $published_on = strtotime($published);
   $published_date    = date("Y/m/d",$published_on);
   if($provinsi != "" && $jumlahkasus != "" && $meninggal !="" && $published != ""){
     $sql = "INSERT INTO post(provinsi, jumlahkasus, meninggal, published_on) VALUES('$provinsi','$jumlahkasus','$meninggal','$published_date')";
    
      $stmt = $pdo->prepare($sql);
      if($stmt ->execute()){
            header("location:index.php");
      } else {
            echo "Maaf, gagal menambahkan data";
      }
   } else {
         $error  = "Mohon isi semua data!";
   }

}
?>
<div class="container">
<h3>Data Pesebaran covid di Indonesia</h3>
   <h1>Add post</h1>
   <div class="row">
   <a href="index.php" class="btn btn-primary">Back</a>
   </div>
   <hr>
   <div class="row">
      <form class="form-horizontal" action="add.php" method="POST">
         <fieldset>
            <div class="form-group">
               <label class="col-sm-2">provinsi</label>
               <div class="col-sm-20">
                  <input type="text" name="provinsi" class="form-control">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-4">jumlah&nbspkasus</label>
               <div class="col-sm-20">
                  <input type="text" name="jumlahkasus" class="form-control">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-4"> jumlah&nbspyang&nbspmeninggal</label>
               <div class="col-sm-20">
                  <input type="text" name="meninggal" class="form-control">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-4"> Jumlah&nbspKasus&nbspSampai&nbspTanggal </label>
               <div class="col-sm-20">
                  <input type="date" id="published_on" name="published_on" class="form-control">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-4"></label>
               <div class="col-sm-20">
               <?php if(isset($_POST['submit'])): ?>
                  <div class="alert alert-dissmissible alert-warning">
                     <p><?php echo $error;?></p>
                  </div>
               <?php endif;?>
               </div>
            </div>
            <div class="form-group">
         
               <div class="col-sm-20">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
               </div>
            </div>
         </fieldset>
      </form>

   </div>
</div>
<?php include("inc/footer.php");?>
