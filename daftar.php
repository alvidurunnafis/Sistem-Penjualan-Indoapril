<?php include 'koneksi.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<title>daftar</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>


	<?php include 'menu.php'; ?>


	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Pelanggan</h3>
					</div>
					<div class="panel-body">
						<form method="POST" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Nama Lengkap</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Username</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="user" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="password" class="form-control" name="password" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="email" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Kontak</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="kontak" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-7">
									<textarea class="form-control" name="alamat" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<button class="btn btn-primary" name="daftar">Daftar</button>
									<input type="reset" class="btn btn-primary" name="reset" value="Reset">
								</div>
							</div>
						</form>

						<?php 

						//jika klik tombol daftar
						if (isset($_POST['daftar'])) {
						 	
						 	//mengambil data dari form
						 	$nama = $_POST['nama'];
						 	$user = $_POST['user'];
						 	$password = $_POST['password'];
						 	$email = $_POST['email'];
						 	$kontak = $_POST['kontak'];
						 	$alamat = $_POST['alamat'];

						 	// validasi email apakah sudah digunakan atau belum
						 	$ambil = $koneksi->query("SELECT * FROM pelanggan where email='$email'");
						 	$yangcocok = $ambil->num_rows;

						 	if ($yangcocok > 0) {
						 		echo "<script>alert('pendaftaran gagal, email sudah digunakan');</script>";
						 		echo "<script>location='daftar.php';</script>";
						 	}
						 	else {

						 		//query insert ke tabel pelanggan
						 		$koneksi->query("INSERT INTO pelanggan (username, password, nama_lengkap, email, kontak, alamat_pelanggan) VALUES ('$user', '$password', '$nama', '$email', '$kontak', '$alamat')");

						 		echo "<script>alert('pendaftaran sukses, silahkan login')</script>";
						 		echo "<script>location='login.php'</script>";
						 	}

						 } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>