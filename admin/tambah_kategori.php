<h2>Tambah Kategori</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<br>
		<label>Nama Kategori</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<button class="btn btn-primary" name="save">Tambah</button>
</form>

<?php 
if (isset($_POST['save'])) {

 	$koneksi->query("INSERT INTO kategori (nama_kategori) 
 		VALUES ('$_POST[nama]') ");

 	echo "<div class='alert alert-info'>Berhasil tambah kategori</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_kategori'>";
 } 
 ?>