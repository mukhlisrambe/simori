<?php include_once('../_header.php'); ?>

	<div class="row"  >
            <h1 style="color: white">Dashboard</h1>
            <p style="color: white">Selamat datang <mark><?=$_SESSION['user']; ?></mark> di aplikasi SIMORI (Sistem Rekomendasi Internal)</p>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        </div>
    </div> 
    <body style="background-image:url(<?=base_url('abstract-background-69.png');?>);
        height: 100%;
        background-repeat: no-repeat;
        background-size: cover">
    	
    </body>

<?php include_once('../_footer.php'); ?>