<h2>Detail Pembelian</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan where pembelian.id_pembelian='$_GET[id]' "); 
$detail = $ambil->fetch_assoc();
?>

<!-- <pre><?php //print_r($detail) ?></pre> -->


<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
			Total : Rp <?php echo number_format($detail['total_pembelian']); ?><br>
			Status : <?php echo $detail['status_pembelian']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<p>
			<strong><?php echo $detail['nama_lengkap']; ?></strong><br>
			<?php echo $detail['kontak']; ?> <br>
			<?php echo $detail['alamat_pelanggan']; ?> <br>
			<?php echo $detail['email']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<p>
			<strong><?php echo $detail['nama_kota']; ?></strong><br>
			Tarif : Rp <?php echo number_format($detail['tarif']); ?><br>
			Alamat : <?php echo $detail['alamat']; ?>
		</p>
</div>

<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Netto (gr/ml)</th>
			<th>Varian</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN  produk ON pembelian_produk.id_produk = produk.id_produk where pembelian_produk.id_pembelian='$_GET[id]'");
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
			<td>
				Rp <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>