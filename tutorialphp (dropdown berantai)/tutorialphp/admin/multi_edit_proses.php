<?php 
			  if(isset($_POST['multi'])) {
				  
				  include 'koneksi.php';
				  
				  $ide = $_POST['id_kelas'];
				  $jumlah = count($ide);
				  
				  for($i=0; $i<$jumlah; $i++) {
					$id = $ide[$i];
					$kelas = $_POST['kelas'][$i];
					$simpan = mysql_query("UPDATE kelas SET kelas='$kelas' WHERE id_kelas='$id'") or die(mysql_error());
				  }
					if($simpan)
						{
							echo "<script>alert('Data Berhasil disimpan ')</script>";
							echo '<script type="text/javascript">window.location="kelas.php"</script>';    
						}
					else
						{
						echo "<script>alert('Gagal Menyimpan Data ')</script>";
						echo '<script type="text/javascript">window.location="kelas.php"</script>'; 
						}
			  }
			  ?>