<!DOCTYPE html>
<html lang="en">

<head>
</head>
<body>
<p> Selamat Datang di Web Perdana ku </p>
<?php 
	include 'koneksi.php';
	$id = $_GET['id'];
	$sql = mysql_query("SELECT * FROM mahasiswa WHERE id='$id'") or die(mysql_error());
	$data = mysql_fetch_array($sql);
?>

	<form action="mahasiswa_edit_proses.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $data['id'] ?>" required>
		
		<label>NIM</label>		
		<input type="text" name="nim" value="<?php echo $data['nim'] ?>" required><br> 		
		<label>NAMA</label>
		<input type="text" name="nama" value="<?php echo $data['nama'] ?>" required> <br> 
		<label>TEMPAT</label>
		<input type="text" name="tempat" value="<?php echo $data['tempat'] ?>" required> <br> 
		<label>TANGGAL LAHIR</label>
		<input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir'] ?>"><br> 
		<label>ALAMAT</label>
		<input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" required> <br>
		<input type="submit" value="Simpan">
	</form>
<a href="mahasiswa.php">Kembali</a>
</body>
</html>