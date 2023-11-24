<?php 
session_start();
include 'koneksi.php';

//jika tidak ada session pelanggan atau belum login
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
	
	echo "<script>alert('silahkan login')</script>";
	echo "<script>location='login.php'</script>";
	exit();
}


//mendapatkan id_pembelian dari url
$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian where id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

//mendapatkan id_pelanggan yg beli
$id_pelanggan_beli = $detpem['id_pelanggan'];

//mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if ($id_pelanggan_login !== $id_pelanggan_beli) {
	
	echo "<script>alert('oops, error')</script>";
	echo "<script>location='riwayat.php'</script>";
	exit();
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>pembayaran</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>


	<?php include 'menu.php'; ?>


	<div class="container">
		<h2>Konfirmasi Pembayaran</h2>
		<p>kirim bukti pembayaran Anda di sini</p>
		<div class="alert alert-info">total tagihan Anda <strong>Rp <?php echo number_format($detpem['total_pembelian']) ; ?></strong></div>


		<form method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Pembayar</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Via</label>
				<input type="text" class="form-control" name="via">
			</div>
			<div class="form-group">
				<label>Jumlah Pembayaran</label>
				<input type="number" class="form-control" name="jumlah" min="1">
			</div>
			<div class="form-group">
				<label>Bukti Pembayaran</label>
				<input type="file" class="form-control" name="bukti">
				<p class="text-danger">foto bukti harus JPG maksimal 2MB</p>
			</div>
			<br>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
	</div>

	<?php 
	//jika klik tombol kirim
	if (isset($_POST['kirim'])) {
	 	
	 	//upload file foto bukti
	 	$namabukti = $_FILES['bukti']['name'];
	 	$lokasibukti = $_FILES['bukti']['tmp_name'];
	 	$namafiks = date("YmdHis").$namabukti;
	 	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

	 	$nama = $_POST['nama'];
	 	$via = $_POST['via'];
	 	$jumlah = $_POST['jumlah'];
	 	$tanggal = date("Y-m-d");


	 	$koneksi->query("INSERT INTO pembayaran (id_pembelian, nama, via,  jumlah, tanggal, bukti) VALUES ('$idpem', '$nama', '$via', '$jumlah', '$tanggal', '$namafiks')");

	 	//update data pembelian dari 'pending' menjadi 'sudah kirim pembayaran'
	 	$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' where id_pembelian='$idpem'");

	 	echo "<script>alert('terima kasih sudah mengirimkan bukti pembayaran')</script>";
		echo "<script>location='riwayat.php'</script>";

	 } ?>
</body>
</html>