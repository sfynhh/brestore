<?php
include 'koneksi.php';

$id 		= $_POST['id'];
$nim 		= $_POST['nim'];
$nama 		= $_POST['nama'];
$tempat 	= $_POST['tempat'];
$tgl_lahir 	= $_POST['tgl_lahir'];
$alamat 	= $_POST['alamat'];
$kelas 		= $_POST['kelas'];

$nama_file    = $_FILES['file']['name'];
$lokasi_file  = $_FILES['file']['tmp_name'];
$tipe_file    = $_FILES['file']['type'];

 if($lokasi_file==""){
	$simpan = mysql_query("UPDATE mahasiswa SET nim='$nim',nama='$nama',tempat='$tempat',
	tgl_lahir='$tgl_lahir',alamat='$alamat',kelas='$kelas' WHERE id='$id'") or die(mysql_error());
 }
 else {
	  $data=mysql_fetch_array(mysql_query("SELECT * FROM mahasiswa WHERE id='$_POST[id]'"));
      if($data['file'] != "") unlink("poto/$data[file]");
	  
	  move_uploaded_file($lokasi_file,"poto/$nama_file");
     $simpan =  mysql_query("UPDATE mahasiswa SET nim='$nim',nama='$nama',tempat='$tempat',
	  tgl_lahir='$tgl_lahir',alamat='$alamat',kelas='$kelas', file= '$nama_file' WHERE id='$_POST[id]'") 
	  or die(mysql_error());
 }
 

if($simpan)
	{
		echo "<script>alert('Data Berhasil disimpan ')</script>";
		echo '<script type="text/javascript">window.location="mahasiswa_tampil.php"</script>';    
	}
else
	{
	echo "<script>alert('Gagal Menyimpan Data ')</script>";
	echo '<script type="text/javascript">window.location="mahasiswa_tampil.php"</script>'; 
	}

?>