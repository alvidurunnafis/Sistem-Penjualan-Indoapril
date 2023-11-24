<?php include 'koneksi.php'; ?>
<?php 
$keyword = $_GET['keyword'];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk where nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) {
 	
 	$semuadata[]=$pecah;
 } 

 // echo "<pre>";
 // print_r($semuadata);
 // echo "</pre>";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>pencarian</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

	<?php include 'menu.php'; ?>


	<div class="container">
		<h3>Hasil Pencarian : <?php echo $keyword; ?></h3>
		<br>

		<?php if (empty($semuadata)): ?>
			<div class="alert alert-danger">Produk <strong><?php echo $keyword; ?></strong> tidak ditemukan</div>
		<?php endif ?>

		<div class="row">

			<?php foreach ($semuadata as $key => $value) { ?>
				
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $value['foto_produk'] ?>" class="img-responsive">
					<div class="caption">
						<h3><?php echo $value['nama_produk']; ?></h3>
						<h5>Rp <?php echo number_format($value['harga_produk']); ?></h5>
						<a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
						<a href="detail_produk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-default">Detail</a>
					</div>
				</div>
			</div>
			<?php } ?>


		</div>
	</div>
</body>
</html>