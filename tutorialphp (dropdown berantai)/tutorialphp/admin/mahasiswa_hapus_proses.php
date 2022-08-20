<?php
include 'koneksi.php';

$id = $_POST['id'];

$hapus = mysql_query("DELETE FROM mahasiswa WHERE id='$id'") or die(mysql_error());

if($hapus)
	{
		echo "<script>alert('Data Berhasil dihapus ')</script>";
		echo '<script type="text/javascript">window.location="mahasiswa_tampil.php"</script>';    
	}
else
	{
	echo "<script>alert('Gagal Menyimpan Data ')</script>";
	echo '<script type="text/javascript">window.location="mahasiswa_tampil.php"</script>'; 
	}

?>