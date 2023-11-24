<h2>Data Pembelian</h2>
<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Alamat</th>
			<th>Tanggal</th>
			<th>Status Pembelian</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");
		$no = 1;
		?>
		<?php 
		while ($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $pecah['nama_lengkap']; ?></td>
			<td><?php echo $pecah['alamat']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['status_pembelian']; ?></td>
			<td><?php echo $pecah['total_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detail_pembelian&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">detail</a>

				<?php if ($pecah['status_pembelian'] !== "pending"): ?>
					<a href="index.php?halaman=data_pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Pembayaran</a>
				<?php endif ?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>