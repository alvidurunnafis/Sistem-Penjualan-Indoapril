<?php 
include '../koneksi.php';
// echo "<pre>";
// print_r($_GET);
// echo "</pre>"; 

require_once('../dompdf/dompdf_config.inc.php');

$tgl_mulai = $_GET['tglm'];
$tgl_selesai = $_GET['tgls'];
$status = $_GET['status'];

$folder = "laporan/";
$filename = "Laporan Pembelian".date("d F Y", strtotime($tgl_mulai))." hingga ".date("d F Y", strtotime($tgl_selesai));
$file_extension = strtolower(substr(strrchr($filename, "."), 1));

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan where status_pembelian='$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
 	while ($pecah = $ambil->fetch_assoc()) {

 		$semuadata[]=$pecah;
 	}

$isi = "<h3>Laporan Pembelian ".$status."</h3>";
$isi.= "<h5>Mulai ".date("d F Y", strtotime($tgl_mulai))." hingga ".date("d F Y", strtotime($tgl_selesai))."</h5>";
$isi.= "<table class='table table-bordered' border='1'>"; 
	$isi.= "<thead>";
		$isi.= "<tr>
				<th>No</th>
				<th>Pelanggan</th>
				<th>Tanggal</th>
				<th>Jumlah</th>
				<th>Status</th>
			</tr>";
	$isi.= "</thead>";
	$isi.= "<tbody>";
		$total=0; 
		foreach ($semuadata as $key => $value) { 
			$total+=$value['total_pembelian'];
			$no = $key+1;
			$isi.= "<tr>";
				$isi.= "<td>".$no."</td>";
				$isi.= "<td>".$value['nama_lengkap']."</td>";
				$isi.= "<td>".date("d F Y", strtotime($value['tanggal_pembelian']))."</td>";
				$isi.= "<td>Rp ".number_format($value['total_pembelian'])."</td>";
				$isi.= "<td>".$value['status_pembelian']."</td>";
			$isi.= "</tr>";
		 } 
	$isi.= "</tbody>";
	$isi.= "<tfoot>";
		$isi.= "<tr>";
			$isi.= "<th colspan='3'>Total</th>";
			$isi.= "<th>Rp ".number_format($total)."</th>";
			$isi.= "<th></th>";
		$isi.= "</tr>";
	$isi.= "</tfoot>";
$isi.= "</table>";


// if (!file_exists($folder.$filename)) {
// 	echo "<script>alert('Gagal mengunduh, file yang Anda pilih tidak ditemukan')</script>";
// 	echo "<script>location='index.php?halaman=laporan_pembelian'</script>";
// 	exit();
// } else {
// 	header("Content-Disposition: attachment; filename=".basename($filename));
// 	header("Content-Type: application/octet-stream;");
// 	readfile("laporan/".$filename);
// }

$dompdf = new dompdf();
$dompdf->load_html($isi);
$dompdf->render();
$dompdf->stream('Laporan_Pembelian_'.$status.'_'.$tgl_mulai.'_'.$tgl_selesai.'.pdf');
?>