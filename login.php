<?php 
session_start();
include 'koneksi.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>login</title>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>

 	<?php include 'menu.php'; ?>


 	<div class="container">
 		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
 				<div class="panel panel-default">
 					<div class="panel-heading">
 						<h3 class="panel-title">Login</h3>
 					</div>
 					<div class="panel-body">
 						<form method="POST">
 							<div class="form-group">
 								<label>Username</label>
 								<input type="text" class="form-control" name="user">
 							</div>
 							<div class="form-group">
 								<label>Password</label>
 								<input type="password" class="form-control" name="password">
 							</div>
 							<button class="btn btn-primary" name="login">Login</button>
 						</form>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 	<?php 
 	//jika klik tombol login
 	if (isset($_POST['login'])) {
 	 	
 	 	$user = $_POST['user'];
 	 	$password = $_POST['password'];

 	 	//lakukan query ngecek akun di tabel database
 	 	$ambil = $koneksi->query("SELECT * FROM pelanggan where username='$user' and password='$password'");

 	 	//ngitung akun yang terambil
 	 	$cocok = $ambil->num_rows;

 	 	if ($cocok==1) {
 	 		$akun = $ambil->fetch_assoc();

 	 		//simpan di session pelanggan
 	 		$_SESSION['pelanggan'] = $akun;

 	 		echo "<script>alert('Anda sukses login')</script>";

 	 		//jika sudah belanja
 	 		if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
 	 			
 	 			echo "<script>location='checkout.php'</script>";
 	 		}
 	 		else {
 	 			echo "<script>location='riwayat.php'</script>";
 	 		}
 	 		
 	 	}
 	 	else {
 	 		//gagal login
 	 		echo "<script>alert('Anda gagal login, periksa akun Anda')</script>";
 	 		echo "<script>location='login.php'</script>";
 	 	}
 	 } ?>
 
 </body>
 </html>