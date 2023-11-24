<?php 

 $koneksi->query("DELETE FROM kategori where id_kategori='$_GET[id]'");

 echo "<script>alert('kategori terhapus');</script>";
 echo "<script>location='index.php?halaman=data_kategori';</script>";
 ?>