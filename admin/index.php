<?php 
session_start();
include '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda harus login')</script>";
    echo "<script>location='login.php'</script>";
    header('location:login.php');
    exit();
}
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>index</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Indoapril</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : <?php $tanggal = date("d F Y"); echo $tanggal;  ?> &nbsp; </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="index.php?halaman=data_kategori"><i class="fa fa-cube"></i> Kategori</a></li>
                    <li><a href="index.php?halaman=data_produk"><i class="fa fa-cube"></i> Produk</a></li>
                    <li><a href="index.php?halaman=data_pelanggan"><i class="fa fa-user"></i> Pelanggan</a></li>
                    <li><a href="index.php?halaman=data_pembelian"><i class="fa fa-shopping-cart"></i> Pembelian</a></li>
                    <li><a href="index.php?halaman=laporan_pembelian"><i class="fa fa-file"></i> Laporan</a></li>
                    <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>

               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php 
                if (isset($_GET['halaman'])) {
                     if ($_GET['halaman']=="data_kategori") {
                         include 'data_kategori.php';
                     }
                     elseif ($_GET['halaman']=="data_produk") {
                         include 'data_produk.php';
                     }
                     elseif ($_GET['halaman']=="data_pelanggan") {
                         include 'data_pelanggan.php';
                     }
                     elseif ($_GET['halaman']=="data_pembelian") {
                         include 'data_pembelian.php';
                     }
                     elseif ($_GET['halaman']=="detail_pembelian") {
                         include 'detail_pembelian.php';
                     }
                     elseif ($_GET['halaman']=="tambah_produk") {
                         include 'tambah_produk.php';
                     }
                     elseif ($_GET['halaman']=="tambah_kategori") {
                         include 'tambah_kategori.php';
                     }
                     elseif ($_GET['halaman']=="hapus_kategori") {
                         include 'hapus_kategori.php';
                     }
                     elseif ($_GET['halaman']=="ubah_kategori") {
                         include 'ubah_kategori.php';
                     }
                     elseif ($_GET['halaman']=="hapus_produk") {
                         include 'hapus_produk.php';
                     }
                     elseif ($_GET['halaman']=="ubah_produk") {
                         include 'ubah_produk.php';
                     }
                     elseif ($_GET['halaman']=="tambah_stok") {
                         include 'tambah_stok.php';
                     }
                     elseif ($_GET['halaman']=="logout") {
                         include 'logout.php';
                     }
                     elseif ($_GET['halaman']=="data_pembayaran") {
                         include 'data_pembayaran.php';
                     }
                     elseif ($_GET['halaman']=="laporan_pembelian") {
                         include 'laporan_pembelian.php';
                     }
                 } else {
                    include 'home.php';
                 }
                 ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
