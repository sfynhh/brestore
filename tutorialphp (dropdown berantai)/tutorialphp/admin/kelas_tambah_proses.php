<?php 
			  if(isset($_POST['multi'])) {
				  include 'koneksi.php';
				  
				  $qty = $_POST['qty'];
				  
				  for($i=0; $i<$qty; $i++) {
					$kelas = $_POST['kelas'.$i];
					$simpan = mysql_query("INSERT INTO kelas VALUES(NULL,'$kelas')") or die(mysql_error());
				  }
					if($simpan)
						{
							echo "<script>alert('Data Berhasil disimpan ')</script>";
							echo '<script type="text/javascript">window.location="kelas.php"</script>';    
						}
					else
						{
						echo "<script>alert('Gagal Menyimpan Data ')</script>";
						echo '<script type="text/javascript">window.location="kelas_tambah.php"</script>'; 
						}
			  }
			  ?>