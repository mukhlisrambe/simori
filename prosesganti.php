<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;



if (isset($_POST['gantipass'])) {
	$username= $_SESSION['user'];
	$passlama= sha1($_POST['passlama']);
	$passbaru= sha1($_POST['passbaru']);
	$confpass= sha1($_POST['confpass']);

	$result=mysqli_query($con, "SELECT * FROM tb_user WHERE username='$username'");
	$cek= mysqli_fetch_array($result);
		if($passlama==''||$passbaru==''||$confpass==''){
			echo "<script>alert('Form tidak boleh ada yang kosong');window.location='ubah_pass.php' </script>";
		}else {
			if($passlama<>$cek['password']){
			echo "<script>alert('Password lama tidak sama');window.location='ubah_pass.php' </script>";
			}else {
				if ($passbaru <>$confpass){
					echo "<script>alert('Password baru dan komfirmasi tidak cocok');window.location='ubah_pass.php' </script>";
				}else {
					$sql= mysqli_query($con, "UPDATE tb_user SET password='$passbaru' WHERE username='$username'");
					if($sql){
						echo "<script>alert('Password baru berhasil disimpan');window.location='dashboard/index.php' </script>";
					}else{
						echo "<script>alert('Password gagal disimpan');window.location='ubah_pass.php' </script>";
					}
				}
			}
		}
	}
	

?>