<?php 
session_start();
error_reporting(0);
include 'koneksi.php';

//jika tidak ada session pelanggan atau belum login, maka dilarikan ke login.php
if (!isset($_SESSION['pelanggan'])) {

	echo "<script>alert('Silahkan login')</script>";
	echo "<script>location='admin/login.php'</script>";
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

	<?php include 'menu.php'; ?>

	<!-- konten -->
	<section class="konten">
		<div class="container">
			<h1>Checkout</h1>
			<br>
			<table class="table table=bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subharga</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php $totalbelanja = 0; ?>
					<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) { ?>
						
					<!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
					<?php 
					$ambil = $koneksi->query("SELECT * FROM produk where id_produk='$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$subharga = $pecah['harga_produk']*$jumlah;
					 ?>	

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $pecah['nama_produk']; ?></td>
						<td>Rp <?php echo number_format($pecah['harga_produk']); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td>Rp <?php echo number_format($subharga); ?></td>
					</tr>

					<?php $totalbelanja+=$subharga; ?>

				<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total Belanja</th>
						<th>Rp <?php echo number_format($totalbelanja); ?></th>
					</tr>
				</tfoot>
			</table>

			<form method="POST">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_lengkap'] ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['kontak'] ?>" class="form-control">
						</div>
					</div>
					
					<div class="col-md-3">
						<select class="form-control" name="id_ongkir">
							<option value="">Pilih Ongkos Kirim</option>
							<?php 
							$ambil = $koneksi->query("SELECT * FROM ongkir");
							while ($perongkir = $ambil->fetch_assoc()) { ?>
								<option value="<?php echo $perongkir['id_ongkir'] ?>">
									<?php echo $perongkir['nama_kota']; ?> -
									Rp <?php echo number_format($perongkir['tarif']); ?>
								</option>
							<?php } ?>	
						</select>
					</div>
					
					<div class="col-md-3">
						<select class="form-control" name="id_pengiriman">
							<option value="">Pilih Pengiriman</option>
							<?php 
							$ambil = $koneksi->query("SELECT * FROM pengiriman");
							while ($pengiriman = $ambil->fetch_assoc()) { ?>
								<option value="<?php echo $pengiriman['id_pengiriman'] ?>">
									<?php echo $pengiriman['metode_pengiriman']; ?> 
								</option>
							<?php } ?>	
						</select>
					</div>
				</div>
				<div class="form-group">
						<textarea class="form-control" name="alamat" rows="4" placeholder="Tuliskan alamat lengkap Anda"></textarea>
				</div>

				<button class="btn btn-primary" name="checkout">Checkout</button>
			</form>

			<?php 
			if (isset($_POST['checkout'])) {
			 	
			 	$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
			 	$id_ongkir = $_POST['id_ongkir'];
			 	// $id_pembayaran = $_POST['id_pembayaran'];
			 	$id_pengiriman = $_POST['id_pengiriman'];
			 	$alamat = $_POST['alamat'];
			 	$tanggal_pembelian = date("Y-m-d");

			 	$ambil = $koneksi->query("SELECT * FROM ongkir where id_ongkir='$id_ongkir'");
			 	$arrayongkir = $ambil->fetch_assoc();
			 	$nama_kota = $arrayongkir['nama_kota'];
			 	$tarif = $arrayongkir['tarif'];

			 	$total_pembelian = $totalbelanja + $tarif;

			 	//1. menyimpan data ke tabel pembelian
			 	$koneksi->query("INSERT INTO pembelian (id_pelanggan, alamat, tanggal_pembelian, total_pembelian, id_ongkir, id_pengiriman, nama_kota, tarif) VALUES ('$id_pelanggan', '$alamat', '$tanggal_pembelian', '$total_pembelian', '$id_ongkir', '$id_pengiriman', '$nama_kota', '$tarif') ");

			 	//2. mendapatkan id_pembelian yang barusan dilakukan
			 	$id_pembelian_barusan = $koneksi->insert_id;

			 	foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {

			 		// mendapatkan data produk berdasarkan id_produk
			 		$ambil = $koneksi->query("SELECT * FROM produk where id_produk='$id_produk'");
			 		$perproduk = $ambil->fetch_assoc();

			 		$nama = $perproduk['nama_produk'];
			 		$harga = $perproduk['harga_produk'];
			 		$netto = $perproduk['netto_produk'];
			 		$varian = $perproduk['varian'];
			 		$expired = $perproduk['expired'];

			 		$subberat = $perproduk['netto_produk']*$jumlah;
			 		$subharga = $perproduk['harga_produk']*$jumlah;

			 		$koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah, nama_produk, harga_produk, netto_produk, varian, expired, subberat, subharga) VALUES ('$id_pembelian_barusan', '$id_produk', '$jumlah', '$nama', '$harga', '$netto', '$varian', '$expired', '$subberat', '$subharga')");
			 	}

			 	// mengosongkan keranjang
			 	unset($_SESSION['keranjang']);

			 	// tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
			 	echo "<script>alert('pembelian sukses')</script>";
			 	echo "<script>location='nota.php?id=$id_pembelian_barusan'</script>";
			 } 
			 ?>
			
		</div>
	</section>
 
 <!-- <pre><?php// print_r($_SESSION['pelanggan']) ?></pre>
 <pre><?php //print_r($_SESSION['keranjang']) ?></pre> -->
</body>
</html>