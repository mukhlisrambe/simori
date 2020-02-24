

<?php 
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
/*if(isset($_SESSION['user'])){
  echo "<script>window.location= '".base_url()."';</script>"; 
}else { */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ubah_Password</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('/_assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="icon" href="<?=base_url('/_assets/yukcoding2.png');?>">
</head>
<body>
    <div id="wrapper">
       <div class="container">
       		
       			
			
           <div align="center" style="margin-top: 200px">
           		<?php 
            	$sql_pass= mysqli_query($con, "SELECT * FROM tb_user        
            	WHERE username='$_SESSION[user]'") or die (mysqli_error($con));
            	$data=mysqli_fetch_array($sql_pass);
            	?>


               <form action="prosesganti.php" method="post" class="navbar-form"> <h3> Ganti Password </h3>
    
               		<div>
                   	<input type="hidden" name="username" value="<?=$data['username']?>"><br><br>
                   </div>
                   <div class="input-group">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span>
      
                       <input type="text" name="passlama" class="form-control" placeholder="Password lama"   autofocus="">
                   </div>
                   <br><br><br>
                   <div class="input-group">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span>
                       <input type="text" name="passbaru" class="form-control" placeholder="Password baru"   autofocus="">
                   </div>
                   <br><br>
                   <div class="input-group">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span>
                       <input type="text" name="confpass" class="form-control" placeholder="Konfirmasi password"  autofocus="">
                   </div>
                   <br><br>
                   <div class="input-group">
                       <input type="submit" name="gantipass" class="btn btn-primary" value="Ubah Password">
                   </div>
                   <br><br><br>
                   <div class="input-group">
                        <a href="<?= base_url('dashboard/index.php')?>"><span class="text-danger">Kembali ke menu utama</span></a>
                   </div>
               </form>
           </div>
       </div>
    </div>
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
</body>
</html>




