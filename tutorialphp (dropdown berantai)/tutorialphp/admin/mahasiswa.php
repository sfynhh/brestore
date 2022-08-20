<!DOCTYPE html>
<html lang="en">

<head>
</head>
<body>
<p> Data Mahasiswa </p>
<a href="mahasiswa_tambah.php">Tambah Data</a><br>
<a href="mahasiswa_cetak.php">Cetak Data</a>
	<table border="1">
		<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Tempat</th>
			<th>Tanggal Lahir</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>
		<tr>
		<?php 
		include 'koneksi.php';
		$sql = mysql_query("SELECT * FROM mahasiswa ORDER BY nama") or die(mysql_error());
		$no=0;
		while($data = mysql_fetch_array($sql))
		{
		$no++;
		$id=$data['id'];
		
			?>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['nim']; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['tempat']; ?></td>
			<td><?php echo $data['tgl_lahir']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td>
				<a href ="mahasiswa_edit.php<?php echo '?id=' . $id; ?>">edit<a> || 
				<a href ="mahasiswa_hapus_proses.php<?php echo '?id=' . $id; ?>">hapus<a> 
			</td>
		</tr>
	<?php } ?>
	</table>
<a href="index.php">Kembali</a>
</body>
</html>