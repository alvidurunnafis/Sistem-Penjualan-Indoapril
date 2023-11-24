<h2>Data Kategori</h2>
<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$ambil = $koneksi->query("SELECT * FROM kategori");
		$no = 1; 
		?>
		<?php 
		while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $pecah['nama_kategori']; ?></td>
			<td>
				<a href="index.php?halaman=hapus_kategori&id=<?php echo $pecah['id_kategori'] ?>" class="btn-danger btn" onclick="return confirm('Yakin ingin hapus ?')">hapus</a>
				<a href="index.php?halaman=ubah_kategori&id=<?php echo $pecah['id_kategori']; ?>" class="btn btn-warning">ubah</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<a href="index.php?halaman=tambah_kategori" class="btn btn-primary">Tambah Data</a>