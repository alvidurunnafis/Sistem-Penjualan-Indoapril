<h2>Ubah Produk</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM produk where id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
 ?>

<?php 
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
 	$datakategori[] = $tiap;
 } ?>

<br>
 <form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="kategori">
			<option value="">Pilih</option>
			<option value="">Pilih Kategori</option>
			<?php foreach ($datakategori as $key => $value) { ?>
				<option value="<?php echo $value['id_kategori'] ?>" <?php if($pecah['id_kategori']==$value['id_kategori']){ echo "selected";} ?>>
					<?php echo $value['nama_kategori']; ?>
					
				</option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?>">
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
		<label>Expired</label>
		<input type="date" class="form-control" name="expired" value="<?php echo $pecah['expired']; ?>">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok']; ?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"><?php echo $pecah['deskripsi_produk']; ?></textarea>
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) {
 	
 	$namafoto = $_FILES['foto']['name'];
 	$lokasifoto = $_FILES['foto']['tmp_name'];

 	//jika foto dirubah
 	if (!empty($lokasifoto)) {

 	 	move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

 	 	$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', netto_produk='$_POST[netto]', varian='$_POST[varian]', expired='$_POST[expired]', stok='$_POST[stok]', foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]', id_kategori='$_POST[kategori]' where id_produk='$_GET[id]'
 	 		");
 	 } 
 	 else {
 	 	$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', netto_produk='$_POST[netto]', varian='$_POST[varian]', expired='$_POST[expired]', stok='$_POST[stok]', deskripsi_produk='$_POST[deskripsi]', id_kategori='$_POST[kategori]' where id_produk='$_GET[id]'
 	 		");
 	 }

 	echo "<script>alert('data produk telah diubah');</script>";
 	echo "<script>location='index.php?halaman=data_produk';</script>";
 } 
 ?>