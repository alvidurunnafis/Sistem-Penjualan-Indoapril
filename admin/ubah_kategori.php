<h2>Ubah Kategori</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM kategori where id_kategori='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<br>
		<label>Nama Kategori</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_kategori']; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) {

 	$koneksi->query("UPDATE kategori SET nama_kategori='$_POST[nama]' where id_kategori='$_GET[id]'
 	 	");

 	echo "<div class='alert alert-info'>Ubah kategori berhasil</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_kategori'>";
 } 
 ?>