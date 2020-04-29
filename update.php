<?php include("config/db.php")?>
<?php include("inc/header.php") ?>

<?php 
if(isset($_POST['submit'])){
      $no = $_POST['no'];
      $provinsi = $_POST['provinsi'];
      $jumlahkasus = $_POST['jumlahkasus'];
      $meninggal = $_POST['meninggal'];
     
  
      
      
      /*$data = array(
         'no' => $no, 
         'provinsi' => $provinsi,
         'jumlahkasus' => $jumlahkasus,
         'meninggal' => $meninggal,
         'published_on'=> $published_date
         
      );

      echo '<pre>';
            print_r($data);
      echo '</pre>';
      exit();*/

      if($provinsi != "" && $jumlahkasus != "" && $meninggal !=""){
        $sql = "UPDATE post SET provinsi= '$provinsi', jumlahkasus='$jumlahkasus', meninggal='$meninggal' WHERE no =$no";
     
       
         $stmt = $pdo->prepare($sql);
         if($stmt ->execute()){
               header("location:index.php");
         } else {
               echo "Maaf, gagal mengupdate data";
         }
      } else {
            $error  = "Mohon isi semua data!";
      }
   
   }
   ?>
