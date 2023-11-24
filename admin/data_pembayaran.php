<h2>Data Pembayaran</h2>

<?php 

//mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

//mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran where id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();


 ?>

<br>
 <div class="row">
 	<div class="col-md-6">
 		<table class="table">
 			<tr>
 				<th>Nama</th>
 				<td><?php echo $detail['nama']; ?></td>
 			</tr>
 			<tr>
 				<th>Via</th>
 				<td><?php echo $detail['via']; ?></td>
 			</tr>
 			<tr>
 				<th>Jumlah</th>
 				<td>Rp <?php echo number_format($detail['jumlah']); ?></td>
 			</tr>
 			<tr>
 				<th>Tanggal</th>
 				<td><?php echo $detail['tanggal']; ?></td>
 			</tr>
 		</table>
 	</div>
 	<div class="col-md-6">
 		<img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" class="img-responsive" width="400">
 	</div>
 </div>

<br><br>
 <form method="POST">
 	<div class="form-group">
 		<label>No. Resi Pengiriman</label>
 		<input type="text" class="form-control" name="resi">
 	</div>
 	<div class="form-group">
 		<label>Status</label>
 		<select class="form-control" name="status">
 			<option value="">Pilih Status</option>
 			<option value="lunas">Lunas</option>
 			<option value="barang dikirim">Barang Dikirim</option>
 			<option value="batal">Batal</option>
 		</select>
 	</div>
 	<br>
 	<button class="btn btn-primary" name="proses">Proses</button>
 </form>

 <?php 
 if (isset($_POST['proses'])) {
  	
  	$resi = $_POST['resi'];
  	$status = $_POST['status'];

  	$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' where id_pembelian='$id_pembelian'");

  	echo "<script>alert('data pembelian terupdate')</script>";
  	echo "<script>location='index.php?halaman=data_pembelian'</script>";
  } ?>