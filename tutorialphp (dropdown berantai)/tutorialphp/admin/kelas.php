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
            <h1>Data Kelas</h1>
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
             <form method="POST" action="">
			  <button class="btn btn-success" name="edit">Edit</button>	
			  <button class="btn btn-danger" name="hapus" onclick="return confirm('Yakin ingin menghapus data')">Hapus</button>	
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Pilih</th>
                    <th>No</th>
					<th>Nama Kelas</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
				<?php 
				include 'koneksi.php';
				$sql = mysql_query("SELECT * FROM kelas ORDER BY kelas") or die(mysql_error());
				$no=0;
				while($data = mysql_fetch_array($sql))
				{
				$no++;
				$id=$data['id_kelas'];
				
					?>
					<td><input type="checkbox" name="id[]" value="<?php echo $id ?>"></td>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['kelas']; ?></td>
				</tr>
			<?php } ?>
                </table>
			</form>
			  <?php 
			  if(isset($_POST['hapus'])) {
				  ini_set("display_errors",0);
				  include 'koneksi.php';
				  
				  $ide = $_POST['id'];
				  $jumlah = count($ide);
				  
				  if($jumlah==0) {
					echo "<script>alert('Tidak ada data yang dipilih ')</script>";
					echo '<script type="text/javascript">window.location="kelas.php"</script>'; 
				  } else {
				  
				  for($i=0; $i<$jumlah; $i++) {
					$id = $ide[$i];
					
					$simpan = mysql_query("DELETE FROM kelas WHERE id_kelas='$id'") or die(mysql_error());
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
			  }}
			  ?>
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
						<form action="kelas_tambah.php" method="POST">
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Inputkan Jumlah Kelas yang Diinginkan</label>
							<input type="number" name="jumlah" class="form-control" >
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
				
				
              </div>
              <!-- /.card-body -->
            </div>
			<?php 
			if(isset($_POST['edit'])){
			
			?>
			<div class="card">
              <div class="card-header">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Inputkan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="multi_edit_proses.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
				<?php
				ini_set("display_errors",0);
				$ide=$_POST['id'];
				$jumlah=count($ide);
				
				if($jumlah==0)
				{
					echo "<script>alert('Tidak ada data yang dipilih')</script>";
					echo '<script type="text/javascript">window.location="kelas.php"</script>';    
				}
				else 
				{
				for($i=0; $i<$jumlah; $i++){
				$id = $ide[$i];
				
				$query = mysql_query("SELECT * FROM kelas WHERE id_kelas='$id'");
				$data = mysql_fetch_array($query);
				
				?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kelas</label>
                    <input type="text" name="kelas[]" class="form-control" value="<?php echo $data['kelas'] ?>">
					
                    <input type="hidden" name="id_kelas[]" class="form-control" value="<?php echo $id ?>">
                  </div>
				<?php } ?> 
				 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="multi">Submit</button>
                </div>
              </form>

            </div>
						

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
			<?php } }?>
			<div class="card">
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
