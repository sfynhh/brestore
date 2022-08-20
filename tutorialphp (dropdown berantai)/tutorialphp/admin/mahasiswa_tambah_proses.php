<?php
include 'koneksi.php';

$nim 		= $_POST['nim'];
$nama 		= $_POST['nama'];
$tempat 	= $_POST['tempat'];
$tgl_lahir 	= $_POST['tgl_lahir'];
$alamat 	= $_POST['alamat'];
$kelas 		= $_POST['kelas'];

$nama_file    = $_FILES['file']['name'];
$lokasi_file  = $_FILES['file']['tmp_name'];
$tipe_file    = $_FILES['file']['type'];

move_uploaded_file($lokasi_file,"poto/$nama_file");
$simpan = mysql_query("INSERT INTO mahasiswa VALUES(NULL,'$nim','$nama','$tempat','$tgl_lahir',
'$alamat','$kelas','$nama_file')") or die(mysql_error());

if($simpan)
	{
		echo "<script>alert('Data Berhasil disimpan ')</script>";
		echo '<script type="text/javascript">window.location="mahasiswa_tampil.php"</script>';    
	}
else
	{
	echo "<script>alert('Gagal Menyimpan Data ')</script>";
	echo '<script type="text/javascript">window.location="mahasiswa_tambah.php"</script>'; 
	}

?>