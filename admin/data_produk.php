<h2>Data Produk</h2>
<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Netto</th>
			<th>Varian</th>
			<th>Expired</th>
			<th>Stok</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori USING (id_kategori) order by id_produk");
		$no = 1; 
		?>
		<?php 
		while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $pecah['nama_kategori']; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['netto_produk']; ?></td>
			<td><?php echo $pecah['varian']; ?></td>
			<td><?php echo $pecah['expired']; ?></td>
			<td><?php echo $pecah['stok']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
			</td>
			<td>
				<a href="index.php?halaman=hapus_produk&id=<?php echo $pecah['id_produk'] ?>" class="btn-danger btn" onclick="return confirm('Yakin ingin hapus ?')">hapus</a>
				<a href="index.php?halaman=ubah_produk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">ubah</a>
				<a href="index.php?halaman=tambah_stok&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-primary">tambah</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<a href="index.php?halaman=tambah_produk" class="btn btn-primary">Tambah Data</a>