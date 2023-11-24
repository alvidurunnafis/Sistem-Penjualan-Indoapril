<?php session_start(); ?>
<?php include 'koneksi.php' ?>
<?php 
//mendapatkan id_produk dari url
$id_produk = $_GET['id'];

//query ambil data
$ambil = $koneksi->query("SELECT * FROM produk where id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>"; 

?>

<!DOCTYPE html>
<html>
<head>
	<title>detail produk</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

	<?php include 'menu.php'; ?>


	<section class="kontent">
		<div class="container">
			<h1>Detail Produk</h1><br>
			<div class="row">
				<div class="col-md-6">
					<img src="foto_produk/<?php echo $detail['foto_produk']; ?>" class="img-responsive" width="500">
				</div>
				<div class="col-md-6">
					<h2><?php echo $detail['nama_produk']; ?></h2>
					<h4>Rp <?php echo number_format($detail['harga_produk']); ?></h4>
					<h5>Stok : <?php echo $detail['stok']; ?></h5>
					<br>
					<form method="POST">
						<div class="form-group">
							<div class="input-group">
								<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok']; ?>">
								<div class="input-group-btn">
									<button class="btn btn-primary" name="beli">Beli</button>
								</div>
							</div>
						</div>
					</form>
					<br>
					<p>
					 	Varian : <?php echo $detail['varian']; ?><br>
					 	Netto : <?php echo $detail['netto_produk']; ?><br>
					 	Expired : <?php echo $detail['expired']; ?><br>
					 	Deskripsi : <?php echo $detail['deskripsi_produk']; ?>
					</p>

					<?php

					// jika ada tombol beli
					if (isset($_POST['beli'])) {
					 	
					 	// mendapatkan jumlah yang diinputkan
					 	$jumlah = $_POST['jumlah'];

					 	//masukkan ke keranjang belanja
					 	$_SESSION['keranjang'][$id_produk] = $jumlah;

					 	echo "<script>alert('produk telah masuk ke keranjang belanja')</script>";
					 	echo "<script>location='keranjang.php'</script>";
					 } 
					 ?>

					 
				</div>
			</div>
		</div>
	</section>

</body>
</html>