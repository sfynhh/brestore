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
            <h1>Edit Data Mahasiswa</h1>
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
			  <?php 
					include 'koneksi.php';
					$id = $_GET['id'];
					$sql = mysql_query("SELECT * FROM mahasiswa WHERE id='$id'") or die(mysql_error());
					$data = mysql_fetch_array($sql);
				?>
              <form role="form" action="mahasiswa_edit_proses.php" method="POST" enctype="multipart/form-data">
			  <input type="hidden" name="id" value="<?php echo $data['id'] ?>" required>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?php echo $data['nim'] ?>" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Tempat</label>
                    <input type="text" name="tempat" class="form-control" value="<?php echo $data['tempat'] ?>" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $data['tgl_lahir'] ?>">
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat'] ?>" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Kelas</label>
                    <select name="kelas" class="form-control" required>
						<option value="">-pilih kelas-</option>
						<option value="1">1A</option>
						<option value="2">1B</option>
					</select>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">File</label>
                    <div class="col-md-8"><img src="poto/<?php echo $data['file']; ?>" width="100" >
					<span class="label-control"><?php echo $data['file']; ?></span>
					<input type="file" class="form-control" name="file"  value="<?php echo $data['file']; ?>" /></div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
