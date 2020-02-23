<?php 
// set timezone dan 
date_default_timezone_set('Asia/Jakarta');
session_start();

include_once "conn.php";

//set koneksi
$con = mysqli_connect($conn['host'], $conn['user'], $conn['pass'], $conn['db'] );
if (mysqli_connect_errno()){
	echo mysqli_connect_error();
  } 
//set function base_url
  function base_url($url= null) {
  	$base_url = "http://simoribelawan.online";
  	if ($url != null){
  		return $base_url."/".$url;
  	} else {
  	return $base_url;
  }
} 
function tgl_indo($tgl){
	$tanggal =substr($tgl,8,2);
	$bulan = substr($tgl,5,2);
	$tahun = substr($tgl,0,4);
	return $tanggal."/".$bulan."/".$tahun;
}
?>