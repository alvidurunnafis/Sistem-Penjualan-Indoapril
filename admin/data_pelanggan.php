<h2>Data Pelanggan</h2>
<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Kontak</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$ambil = $koneksi->query("SELECT * FROM pelanggan");
		$no = 1;
		?>
		<?php 
		while ($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $pecah['nama_lengkap']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['kontak']; ?></td>
			<td>
				<a href="" class="btn btn-danger">hapus</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>