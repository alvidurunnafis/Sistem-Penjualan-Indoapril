<?php 
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
 	$datakategori[] = $tiap;
 } ?>

<h2>Tambah Produk</h2>
<br>
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="kategori">
			<option value="">Pilih Kategori</option>
			<?php foreach ($datakategori as $key => $value) { ?>
				<option value="<?php echo $value['id_kategori'] ?>"><?php echo $value['nama_kategori']; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Netto (ml//L/gr/kg)</label>
		<input type="number" class="form-control" name="netto">
	</div>
	<div class="form-group">
		<label>Varian</label>
		<input type="text" class="form-control" name="varian">
	</div>
	<div class="form-group">
		<label>Expired</label>
		<input type="date" class="form-control" name="expired">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) {

 	$nama = $_FILES['foto']['name'];
 	$lokasi = $_FILES['foto']['tmp_name'];
 	move_uploaded_file($lokasi, "../foto_produk/".$nama);
 	$koneksi->query("INSERT INTO produk (nama_produk, harga_produk, netto_produk, varian, expired, stok, foto_produk, deskripsi_produk, id_kategori) 
 		VALUES ('$_POST[nama]', '$_POST[harga]','$_POST[netto]', '$_POST[varian]','$_POST[expired]', '$_POST[stok]', '$nama', '$_POST[deskripsi]', '$_POST[kategori]' ) ");

 	echo "<script>alert('data produk telah disimpan');</script>";
 	echo "<script>location='index.php?halaman=data_produk';</script>";
 } 
 ?>