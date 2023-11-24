<?php 
session_start();
include 'koneksi.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>indoapril</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>


	<?php include 'menu.php'; ?>

	<!-- konten -->
	<section class="konten">
		<div class="container">
			<h1>Selamat Datang Di Indoapril Market</h1>
			<br>
			<h3>Produk Terbaru</h3><br>

			<div class="row">


				<?php 
				$ambil = $koneksi->query("SELECT * FROM produk");
				while ($perproduk = $ambil->fetch_assoc()) { ?>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" width="100">
						<div class="caption">
							<h4><?php echo $perproduk['nama_produk']; ?></h4>
							<h5>Rp <?php echo number_format($perproduk['harga_produk']); ?></h5>
							<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
							<a href="detail_produk.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">detail</a>
						</div>
					</div>
				</div>
				<?php } ?>


			</div>
		</div>
	</section>

</body>
</html>