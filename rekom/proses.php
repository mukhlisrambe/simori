<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])){
	$uuid = Uuid::uuid4()->toString();
	$user= trim(mysqli_real_escape_string($con, $_POST['user']));
	$rekomendasi= trim(mysqli_real_escape_string($con, $_POST['rekomendasi']));
	$deadline= trim(mysqli_real_escape_string($con, $_POST['deadline']));
	$status=	trim(mysqli_real_escape_string($con, $_POST['status']));
	// Baca lokasi file sementar dan nama file dari form (fupload)
	$lokasi_file = realpath($_FILES ['fupload']['tmp_name']);
	$nama_file   = $_FILES['fupload']['name'];
// Tentukan folder untuk menyimpan file
	$folder = "../_file/$nama_file";
	
	if (move_uploaded_file($lokasi_file,"$folder")){
  	echo "Nama File : <b>$nama_file</b> sukses di upload";

	mysqli_query($con, "INSERT INTO tb_rekom (id_rekom, id_user, rekomendasi, deadline, status) VALUES('$uuid', '$user', '$rekomendasi','$deadline','$status') ") or die (mysqli_error($con));

	$unit_pen=$_POST['unit_pen'];
	foreach ($unit_pen as $unit) {
		mysqli_query($con, "INSERT INTO tb_rekom_unit_pen (id_rekom, id_unit_pen) VALUES('$uuid','$unit')") or die (mysqli_error($con));
	}
	echo "<script>window.location='data.php';</script>";
	}
	
}elseif (isset($_POST['edit'])) {
	$id=$_POST['id'];
	$rekomendasi= trim(mysqli_real_escape_string($con, $_POST['rekomendasi']));
	$deadline= trim(mysqli_real_escape_string($con, $_POST['deadline']));
	$komentar_ki= trim(mysqli_real_escape_string($con, $_POST['komentar_ki']));
	$tanggapan = trim(mysqli_real_escape_string($con, $_POST['tanggapan']));
	$status= trim(mysqli_real_escape_string($con, $_POST['status']));
	$filelama= trim(mysqli_real_escape_string($con, $_POST['filelama']));
	if($_FILES['fupload']['error']) {
	$nama_file=$filelama;
	$folder = "../_file/$nama_file";
	mysqli_query($con, "UPDATE tb_rekom SET rekomendasi='$rekomendasi', deadline='$deadline', komentar_ki='$komentar_ki' , tanggapan='$tanggapan', status='$status', file='$nama_file' WHERE id_rekom='$id'") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>"; 

	}else{
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_file   = $_FILES['fupload']['name'];
	$folder = "../_file/$nama_file";
	if (move_uploaded_file($lokasi_file,"$folder")){
  	echo "Nama File : <b>$nama_file</b> sukses di upload";

	mysqli_query($con, "UPDATE tb_rekom SET rekomendasi='$rekomendasi', deadline='$deadline', komentar_ki='$komentar_ki' , tanggapan='$tanggapan', status='$status', file='$nama_file' WHERE id_rekom='$id'") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>";
	}else {
	echo "File gagal di upload";
	}
}
}
?>