<!DOCTYPE html>
<html>
<head>
	<?php include 'koneksi.php' ?>
	<?php include 'session.php' ?>
	<?php include 'level.php' ?>
  <?php include 'header.php' ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <?php include 'nav.php' ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include 'sidebar.php' ?>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Dosen</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah</button>		
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
					<th>NIP</th>
					<th>Nama</th>
					<th>Tempat</th>
					<th>Tanggal Lahir</th>
					<th>Alamat</th>
					<th>Kelas</th>
					<th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
				<?php 
				include 'koneksi.php';
				$sql = mysql_query("SELECT * FROM dosen NATURAL JOIN kelas ORDER BY nama") or die(mysql_error());
				$no=0;
				while($data = mysql_fetch_array($sql))
				{
				$no++;
				$id=$data['id'];
				
					?>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nip']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['tempat']; ?></td>
					<td><?php echo $data['tgl_lahir']; ?></td>
					<td><?php echo $data['alamat']; ?></td>
					<td><?php echo $data['kelas']; ?></td>
					<td>
						<a href="#" type="button" class="btn btn-warning"  title="Edit Data" data-toggle="modal" data-target="#myModalEdit<?php echo $id; ?>">Edit</a> 
						<a href="#" type="button" class="btn btn-danger"  title="Hapus Data" data-toggle="modal" data-target="#myModal4<?php echo $id; ?>">Hapus</a>
						<a href="#" type="button" class="btn btn-info"  title="Non Aktif Data" data-toggle="modal" data-target="#myModalNA<?php echo $id; ?>">Non Aktif</a>
					</td>
				</tr>
				<div class="modal fade" id="myModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
					  <?php 
						include('koneksi.php');
						$ide = $id;
						$kueri = mysql_query("SELECT * FROM dosen  WHERE id='$ide'") or die(mysql_error());
						$data = mysql_fetch_array($kueri);
						$kelas = $data['id_kelas'];
					  ?>
						<form action="" method="POST">
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">NIP</label>
							<input type="hidden" name="id" class="form-control" value="<?php echo $data['id']; ?>" >
							<input type="text" name="nip" class="form-control" value="<?php echo $data['nip']; ?>" >
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Tempat</label>
							<input type="text" name="tempat" class="form-control" value="<?php echo $data['tempat']; ?>">
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Tanggal Lahir</label>
							<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $data['tgl_lahir']; ?>">
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Alamat</label>
							<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>">
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Kelas</label>
							<select name="kelas" class="form-control" >
							<?php 
							include 'koneksi.php';
							$querye = mysql_query("SELECT * FROM kelas WHERE id_kelas='$kelas'");
							$datae = mysql_fetch_array($querye);
							?>
								<option value="<?php echo $datae['id_kelas'] ?>"><?php echo $datae['kelas'] ?></option>
							<?php 
							include 'koneksi.php';
							$query = mysql_query("SELECT * FROM kelas ORDER BY kelas");
							while($data = mysql_fetch_array($query)) {
							?>
								<option value="<?php echo $data['id_kelas'] ?>"><?php echo $data['kelas'] ?></option>
							<?php } ?>
							</select>
						  </div>
					  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="update">Submit</button>
						  </div>
						</form>
					</div>
				  </div>
				</div>
				<?php 
				if (isset($_POST['update'])) {
					include('koneksi.php');
					
					$id 		= $_POST['id'];
					$nip 		= $_POST['nip'];
					$nama 		= $_POST['nama'];
					$tempat 	= $_POST['tempat'];
					$tgl_lahir 	= $_POST['tgl_lahir'];
					$alamat 	= $_POST['alamat'];
					$kelas 		= $_POST['kelas'];
					
					$simpan = mysql_query("UPDATE dosen SET nip='$nip',tempat='$tempat',nama='$nama',tgl_lahir='$tgl_lahir',
					alamat='$alamat',kelas='$kelas' WHERE id='$id'") or die(mysql_error());

					if($simpan)
						{
							echo "<script>alert('Data Berhasil disimpan ')</script>";
							echo '<script type="text/javascript">window.location="dosen.php"</script>';    
						}
					else
						{
						echo "<script>alert('Gagal Menyimpan Data ')</script>";
						echo '<script type="text/javascript">window.location="dosen.php"</script>'; 
						}
					
				}
				
				?>
								<div class="modal fade" id="myModal4<?php echo $id; ?>" role="dialog">
									  <div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Konfirmasi</h4>
										  </div>
										  <div class="modal-body">
											<?php
												include('koneksi.php');
												$ide = $id;
												$kueri = mysql_query("SELECT * FROM dosen  WHERE id='$ide'") or die(mysql_error());
												$data = mysql_fetch_array($kueri);
											?>
											<form role="form" action="" method="POST">
												<div class="form-group">
													<div class="form-line">
														<input type="hidden" class="form-control" name="id"  value="<?php echo $data['id']; ?>" />
														<label> Yakin ingin menghapus Dosen <?php echo $data['nama']; ?> ? </label>
													</div>
												</div>										
												<div class="modal-footer">  
												  <button type="submit" class="btn btn-success" name="has">Ya</button>
												  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>     
											  </form>
											  <?php 
													if (isset($_POST['has'])) {
														include('koneksi.php');
														
														$id 		= $_POST['id'];
														$nip 		= $_POST['nip'];
														$nama 		= $_POST['nama'];
														$tempat 	= $_POST['tempat'];
														$tgl_lahir 	= $_POST['tgl_lahir'];
														$alamat 	= $_POST['alamat'];
														$kelas 		= $_POST['kelas'];
														
														$simpan = mysql_query("DELETE FROM dosen WHERE id='$id'") or die(mysql_error());

														if($simpan)
															{
																echo "<script>alert('Data Berhasil dihapus ')</script>";
																echo '<script type="text/javascript">window.location="dosen.php"</script>';    
															}
														else
															{
															echo "<script>alert('Gagal Menghapus Data ')</script>";
															echo '<script type="text/javascript">window.location="dosen.php"</script>'; 
															}
														
													}
													
													?>
										  </div>
										</div>
									  </div>
								</div>
								
								<div class="modal fade" id="myModalNA<?php echo $id; ?>" role="dialog">
									  <div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Konfirmasi Non Aktif</h4>
										  </div>
										  <div class="modal-body">
											<?php
												include('koneksi.php');
												$ide = $id;
												$kueri = mysql_query("SELECT * FROM dosen  WHERE id='$ide'") or die(mysql_error());
												$data = mysql_fetch_array($kueri);
											?>
											<form role="form" action="" method="POST">
												<div class="form-group">
													<div class="form-line">
														<input type="hidden" class="form-control" name="id"  value="<?php echo $data['id']; ?>" />
														<label> Yakin ingin Non Aktifkan Dosen <?php echo $data['nama']; ?> ? </label>
													</div>
												</div>										
												<div class="modal-footer">  
												  <button type="submit" class="btn btn-success" name="yakin">Ya</button>
												  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>     
											  </form>
											  <?php 
													if (isset($_POST['yakin'])) {
														include('koneksi.php');
														
														$id 		= $_POST['id'];
														
														$simpan = mysql_query("UPDATE dosen SET id_login='Non Aktif' WHERE id='$id'") or die(mysql_error());

														if($simpan)
															{
																echo "<script>alert('Data Berhasil Dinonaktifkan ')</script>";
																echo '<script type="text/javascript">window.location="dosen.php"</script>';    
															}
														else
															{
															echo "<script>alert('Gagal Nonaktifkan Data ')</script>";
															echo '<script type="text/javascript">window.location="dosen.php"</script>'; 
															}
														
													}
													
													?>
										  </div>
										</div>
									  </div>
								</div>
			<?php } ?>
                </table>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<form action="" method="POST">
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">NIP</label>
							<input type="text" name="nip" class="form-control" >
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Nama</label>
							<input type="text" name="nama" class="form-control" >
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Tempat</label>
							<input type="text" name="tempat" class="form-control" >
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Tanggal Lahir</label>
							<input type="date" name="tgl_lahir" class="form-control" >
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Alamat</label>
							<input type="text" name="alamat" class="form-control" >
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Provinsi</label>
							<select name="propinsi" id="propinsi" class="form-control" >
								<option value="">-pilih provinsi-</option>
								<?php
								//mengambil nama-nama propinsi yang ada di database
								$propinsi = mysql_query("SELECT * FROM prov ORDER BY nama_prov");
								while($p=mysql_fetch_array($propinsi)){
								echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
								}
								?>
							</select>
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Kabupaten / Kota</label>
							<select name="kota" id="kota" class="form-control" >
								<option value="">-pilih kabupaten/kota-</option>

							</select>
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Kecamatan</label>
							<select name="kec" id="kec" class="form-control" >
								<option value="">-pilih kecamatan-</option>

							</select>
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Desa</label>
							<select name="desa" id="desa" class="form-control" >
								<option value="">-pilih desa-</option>

							</select>
						  </div>
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Kelas</label>
							<select name="kelas" class="form-control" >
								<option value="">-pilih kelas-</option>
							<?php 
							include 'koneksi.php';
							$query = mysql_query("SELECT * FROM kelas ORDER BY kelas");
							while($data = mysql_fetch_array($query)) {
							?>
								<option value="<?php echo $data['id_kelas'] ?>"><?php echo $data['kelas'] ?></option>
							<?php } ?>
							</select>
						  </div>
					  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="proses">Submit</button>
						  </div>
						</form>
					</div>
				  </div>
				</div>
				<?php 
				if (isset($_POST['proses'])) {
					include('koneksi.php');
					
					$nip 		= $_POST['nip'];
					$nama 		= $_POST['nama'];
					$tempat 	= $_POST['tempat'];
					$tgl_lahir 	= $_POST['tgl_lahir'];
					$alamat 	= $_POST['alamat'];
					$kelas 		= $_POST['kelas'];
					
					$simpan = mysql_query("INSERT INTO dosen VALUES(NULL,'$nip','$nama','$tempat','$tgl_lahir',
					'$alamat','$kelas','')") or die(mysql_error());

					if($simpan)
						{
							echo "<script>alert('Data Berhasil disimpan ')</script>";
							echo '<script type="text/javascript">window.location="dosen.php"</script>';    
						}
					else
						{
						echo "<script>alert('Gagal Menyimpan Data ')</script>";
						echo '<script type="text/javascript">window.location="dosen.php"</script>'; 
						}
					
				}
				
				?>
				
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
	<?php include 'footer.php' ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
    <script src="jquery.js"></script>
	<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
//apabila terjadi event onchange terhadap object <select id=propinsi>
$("#propinsi").change(function(){
var propinsi = $("#propinsi").val();
$.ajax({
url: "ambilkota.php",
data: "propinsi="+propinsi,
cache: false,
success: function(msg){
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
$("#kota").html(msg);
}
});
});

$("#kota").change(function(){
var kota = $("#kota").val();
$.ajax({
url: "ambilkecamatan.php",
data: "kota="+kota,
cache: false,
success: function(msg){
$("#kec").html(msg);
}
});
});

$("#kec").change(function(){
var kec = $("#kec").val();
$.ajax({
url: "ambildesa.php",
data: "kec="+kec,
cache: false,
success: function(msg){
$("#desa").html(msg);
}
});
});

});
 
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
   			<script type="text/javascript" language="JavaScript">
             function konfirmasi()
             {
             tanya = confirm("Anda Yakin Akan Logout ?");
             if (tanya == true) return true;
             else return false;
             }
        </script>
</body>
</html>
