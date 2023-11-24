<?php 
session_start();
include 'koneksi.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>nota</title>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>

 	<?php include 'menu.php'; ?>

	<section class="konten">
		<div class="container">
			

<!-- nota disini copas dari nota yang ada di admin -->
	<h2>Detail Pembelian</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan where pembelian.id_pembelian='$_GET[id]' "); 
$detail = $ambil->fetch_assoc();
?>

<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pengiriman ON pembelian.id_pengiriman = pengiriman.id_pengiriman where pembelian.id_pembelian='$_GET[id]'");
$kirim = $ambil->fetch_assoc();
 ?>

<!--  <h1>data orang yg beli</h1>
 <pre><?php print_r($detail) ?></pre>

 <h1>data orang yg login di session</h1>
 <pre><?php print_r($_SESSION) ?></pre> -->

 <!-- jika pelanggan yg beli tidak sama dengann pelanggan yg login, maka dilarikan ke riwayat.php karena dia tidak berhak melihat nota orang lain -->
 <!-- pelanggan yg beli harus pelanggan yg login -->
 <?php 
 //mendapatkan id_pelanggan yg beli
 $idpelangganygbeli = $detail['id_pelanggan'];

 //mendapatkan id_pelanggan yg login
 $idpelangganyglogin = $_SESSION['pelanggan']['id_pelanggan'];

 if ($idpelangganygbeli!==$idpelangganyglogin) {
  	 echo "<script>alert('oops, error')</script>";
  	 echo "<script>location='riwayat.php'</script>";
  	 exit();
  } ?>

 <div class="row">
 	<div class="col-md-4">
 		<h3>Pembelian</h3>
 		<strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
 		Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
		Total : Rp <?php echo number_format($detail['total_pembelian']); ?>
 	</div>
 	<div class="col-md-4">
 		<h3>Pelanggan</h3>
 		<strong><?php echo $detail['nama_lengkap']; ?></strong><br>
 		<p>
			<?php echo $detail['kontak']; ?> <br>
			<?php echo $detail['alamat_pelanggan']; ?> <br>
			<?php echo $detail['email']; ?>
		</p>
 	</div>
 	<div class="col-md-4">
 		<h3>Pengiriman</h3>
 		<strong><?php echo $detail['nama_kota']; ?></strong><br>
 		Ongkos kirim : Rp <?php echo number_format($detail['tarif']); ?><br>
 		Metode Pengiriman : <?php echo $kirim['metode_pengiriman']; ?><br>
 		Alamat : <?php echo $detail['alamat']; ?> 
 	</div>
 </div>

<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Netto (ml/L/gr/kg)</th>
			<th>Varian</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subberat</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$ambil = $koneksi->query("SELECT * FROM pembelian_produk where id_pembelian='$_GET[id]'");
		$no = 1; 
		?>
		<?php 
		while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['netto_produk']; ?></td>
			<td><?php echo $pecah['varian']; ?></td>
			<td>Rp <?php echo number_format($pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat']; ?></td>
			<td>Rp <?php echo number_format($pecah['subharga']); ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>


			<br>
			<div class="row">
				<div class="col-md-5">
					<div class="alert alert-info">
						<p>
							Silahkan melakukan pembayaran Rp <?php echo number_format($detail['total_pembelian']); ?> ke<br>
							<strong>BANK BRI 123-456789-9101 AN. Alvi Durunnafis</strong>
						</p>
					</div>
				</div>
			</div>	

		</div>
	</section>

	<!-- <?php //echo "<pre>";
	//print_r($_GET);
	//print_r($_SESSION)
	//echo "</pre>"; ?> -->
 
 </body>
 </html>