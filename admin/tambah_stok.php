<h2>Tambah Stok Produk</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM produk where id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
 ?>
<br>
 <form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="kategori">
			<option value="">Pilih</option>
			<?php 
				$kategori = mysqli_query($koneksi, "SELECT * FROM kategori order by id_kategori desc");
				while ($r = mysqli_fetch_array($kategori)) { ?>
					<option value="<?php echo $r['id_kategori'] ?>" <?php echo ($r['id_kategori'] == $pecah['id_kategori'])? 'selected':''; ?>><?php echo $r['nama_kategori'] ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Netto (ml/gr/kg)</label>
		<input type="number" class="form-control" name="netto" value="<?php echo $pecah['netto_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Varian</label>
		<input type="text" class="form-control" name="varian" value="<?php echo $pecah['varian']; ?>">
	</div>
	<div class="form-group">
		<label>Tambah Stok</label>
		<input type="number" class="form-control" name="stok">
	</div>
	<button class="btn btn-primary" name="tambah">Tambah</button>
</form>

<?php 
if (isset($_POST['tambah'])) {

 	$koneksi->query("INSERT INTO tambah_produk (jumlah, id_produk) 
 		VALUES ('$_POST[stok]', '$_GET[id]' ) ");

 	echo "<script>alert('tambah stok produk berhasil');</script>";
 	echo "<script>location='index.php?halaman=data_produk';</script>";
 } 
 ?>