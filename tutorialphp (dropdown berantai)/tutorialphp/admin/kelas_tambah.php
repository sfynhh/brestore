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
            <h1>Tambah Data Kelas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            
            <div class="card">
              <div class="card-header">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Inputkan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="kelas_tambah_proses.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
				<?php
				$jumlah=$_POST['jumlah'];
				for($i=0; $i<$jumlah; $i++){
					
				?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kelas</label>
                    <input type="text" name="kelas<?php echo $i ?>" class="form-control" placeholder="Enter Nama Kelas">
					
                    <input type="hidden" name="qty" class="form-control" value="<?php echo $jumlah ?>">
                  </div>
				<?php } ?> 
				 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="multi">Submit</button>
                </div>
              </form>
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
