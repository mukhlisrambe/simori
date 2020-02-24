<?php 
require_once "_config/config.php";

require "_assets/libs/vendor/autoload.php";


if(!$_SESSION['user']){
  echo "<script>window.location= '".base_url('auth/login.php')."';</script>"; 
} ?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMORI</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('/_assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('/_assets/css/simple-sidebar.css');?>" rel="stylesheet">
    <link href="<?=base_url('/_assets/libs/DataTables/datatables.min.css');?>" rel="stylesheet">
    <link rel="icon" href="<?=base_url('/_assets/yukcoding.png');?>">
</head>
<body >
        <div class="col-lg-12">
	<script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js')?>"></script>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#"><span class="text-primary" style="font-size: 30pt; color: green ;"><b>SIMORI </b></span> </a>
                </li>
                <hr>
                <li>
                    <a href="<?= base_url('dashboard')?>"><h4>Dashboard</h4></a>
                </li>
                  
                <?php  
                if(@$_SESSION['user'] == 'admin') { ?>
                <li>
                    <?php 
                        $query = "SELECT * FROM tb_rekom 
                                    INNER JOIN tb_user ON tb_rekom.id_user= tb_user.id_user ";
                                    

                        $sql_rekom = mysqli_query($con,$query) or die (mysqli_error($con));
                     ?>
                    <a href="<?= base_url('rekom_all2/data.php')?>"><h4>Rekomendasi All (<?=mysqli_num_rows($sql_rekom)?>) </h4></a>
                </li>
                <li>
                    <?php 
                        $query = "SELECT * FROM tb_rekom 
                                    INNER JOIN tb_user ON tb_rekom.id_user= tb_user.id_user AND status= 'Belum ditindaklanjuti' ";
                                    

                        $sql_rekom = mysqli_query($con,$query) or die (mysqli_error($con));
                     ?>
                <a href="<?= base_url('rekom_all2/belumtl.php')?>"> <h5>- Pending  (<?=mysqli_num_rows($sql_rekom)?>) </h5></a>
                </li>
                <li>
                    <?php 
                        $query = "SELECT * FROM tb_rekom 
                                    INNER JOIN tb_user ON tb_rekom.id_user= tb_user.id_user AND status= 'Sudah ditindaklanjuti namun belum selesai'  ";
                                    

                       $sql_rekom = mysqli_query($con,$query) or die (mysqli_error($con));
                     ?>
                <a href="<?= base_url('rekom_all2/onproses.php')?>"> <h5>- On Process  (<?=mysqli_num_rows($sql_rekom)?>) </h5></a>
                </li>
                <li>
                    <?php 
                        $query = "SELECT * FROM tb_rekom 
                                    INNER JOIN tb_user ON tb_rekom.id_user= tb_user.id_user AND status= 'Selesai ditindaklanjuti'  ";
                                    

                        $sql_rekom = mysqli_query($con,$query) or die (mysqli_error($con));
                     ?>
                <a href="<?= base_url('rekom_all2/done.php')?>"><h5>- Done  (<?=mysqli_num_rows($sql_rekom)?>) </h5></a>
                </li>
                <?php 
                } ?>
                <?php  
                if(@$_SESSION['user'] !== 'admin') { ?>
                <li>
                    <?php 
                        $user= $_SESSION['user'];
                         $query = "SELECT * FROM tb_rekom 
                                    INNER JOIN tb_user ON tb_rekom.id_user= tb_user.id_user WHERE tb_user.username= '$user' ";

                $sql_rekom = mysqli_query($con,$query) or die (mysqli_error($con));
                     ?>
                <a href="<?= base_url('rekom/data.php')?>"><h4>Rekomendasi-All (<?=mysqli_num_rows($sql_rekom)?>) <h4></a>
                </li>
                <li>
                    <?php 
                        $user= $_SESSION['user'];
                        $query = "SELECT * FROM tb_rekom 
                                    INNER JOIN tb_user ON tb_rekom.id_user= tb_user.id_user WHERE tb_user.username= '$user' AND status= 'Belum ditindaklanjuti' ";

                $sql_rekom = mysqli_query($con,$query) or die (mysqli_error($con));
                     ?>
                <a href="<?= base_url('rekom/belumtl.php')?>"> <h5>- Pending (<?=mysqli_num_rows($sql_rekom)?>) </h5></a>
                </li>
                <li>
                    <?php 
                        $user= $_SESSION['user'];
                       $query = "SELECT * FROM tb_rekom 
                                    INNER JOIN tb_user ON tb_rekom.id_user= tb_user.id_user WHERE tb_user.username= '$user' AND status= 'Sudah ditindaklanjuti namun belum selesai' ";

                        $sql_rekom = mysqli_query($con,$query) or die (mysqli_error($con));
                     ?>
                <a href="<?= base_url('rekom/onproses.php')?>"> <h5>- On Process (<?=mysqli_num_rows($sql_rekom)?>) </h5></a>
                </li>
                <li>
                    <?php 
                        $query = "SELECT * FROM tb_rekom 
                                    INNER JOIN tb_user ON tb_rekom.id_user= tb_user.id_user WHERE tb_user.username= '$user' AND status= 'Selesai ditindaklanjuti' ";

                        $sql_rekom = mysqli_query($con,$query) or die (mysqli_error($con));
                     ?>
                <a href="<?= base_url('rekom/done.php')?>"><h5>- Done (<?=mysqli_num_rows($sql_rekom)?>) </h5></a>
                </li>
                <?php 
                } ?>
                <li>
                    <a href="<?= base_url('auth/logout.php')?>"><span class="text-danger">Logout</span></a>
                </li>

            </ul>
        <div style="
                width: 100%;
                left: 25px;
                bottom: 10px; 
                position: absolute;">
                    <a href="<?= base_url('ubah_pass.php')?>"><span class="text-danger" style="color:gray;">Ganti Password</span></a>
                
        </div>
        </div>
        
        <div id="page-content-wrapper">
            <div class="container-fluid">
