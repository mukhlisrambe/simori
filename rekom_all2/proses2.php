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
	$status= trim(mysqli_real_escape_string($con, $_POST['status']));
	
	mysqli_query($con, "INSERT INTO tb_rekom (id_rekom, id_user, rekomendasi, deadline, id_status) VALUES('$uuid', '$user', '$rekomendasi','$deadline', '$status') ") or die (mysqli_error($con));

	$unit_pen=$_POST['unit_pen'];
	foreach ($unit_pen as $unit) {
		mysqli_query($con, "INSERT INTO tb_rekom_unit_pen (id_rekom, id_unit_pen) VALUES('$uuid','$unit')") or die (mysqli_error($con));
	}
	echo "<script>window.location='data.php';</script>";

}elseif (isset($_POST['edit'])) {
	$id=$_POST['id'];
	$user= trim(mysqli_real_escape_string($con, $_POST['user']));
	$rekomendasi= trim(mysqli_real_escape_string($con, $_POST['rekomendasi']));
	$deadline= trim(mysqli_real_escape_string($con, $_POST['deadline']));
	mysqli_query($con, "UPDATE tb_rekom SET id_user='$user', rekomendasi='$rekomendasi', deadline='$deadline' WHERE id_rekom='$id'") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>";
}
?>