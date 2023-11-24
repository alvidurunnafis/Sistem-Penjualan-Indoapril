
<?php 
include '../koneksi.php';

$nama = $_SESSION['admin']['nama_lengkap'];
 ?>
<h2><?php echo "Selamat Datang ".$nama; ?></h2>
<!-- <pre><?php //print_r($_SESSION); ?></pre> -->