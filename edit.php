<?php include("inc/header.php") ?>
<?php include("config/db.php") ?>
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
   <h1>Edit Post</h1>
   <div class="row">
   <a href="index.php" class="btn btn-primary">Back</a>
   </div>
   <hr>
   <div class="row">
      <form class="form-horizontal" action="update.php" method="POST">
         <fieldset>
            <input type="hidden" name="no" value=<?php echo $no;?>>
            <div class="form-group">
               <label class="col-sm-2">Provinsi</label>
               <div class="col-sm-20">
                  <input type="text" name="provinsi" class="form-control" value=<?php echo $provinsi;?>>
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-4">jumlah&nbspkasus</label>
               <div class="col-sm-20">
                  <input type="text" name="jumlahkasus" class="form-control" value=<?php echo $jumlahkasus ?>>
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-4"> jumlah&nbspyang&nbspmeninggal</label>
               <div class="col-sm-20">
                  <input type="text" name="meninggal" class="form-control" value=<?php echo $meninggal ?>>
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-4"> Jumlah&nbspKasus&nbspSampai&nbspTanggal </label>
               <div class="col-sm-20">
                  <input type="date" id="published_on" value=<?php echo $published_on ?>name="published_on" class="form-control">
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