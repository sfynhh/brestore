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
            <h1>Data Mahasiswa</h1>
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
               		
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form method="POST" action="">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th></th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Tugas</th>
					<th>UTS</th>
					<th>UAS</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
				<?php 
				include 'koneksi.php';
				$id_login = $user_row["id_login"];
				
				$cari = mysql_query("SELECT * FROM dosen WHERE id_login='$id_login'");
				$dapat = mysql_fetch_assoc($cari);
				$kelas = $dapat['kelas'];
				
				$sql = mysql_query("SELECT * FROM mahasiswa WHERE kelas='$kelas' ORDER BY nama") or die(mysql_error());
				$no=0;
				while($data = mysql_fetch_array($sql))
				{
				$no++;
				$id=$data['id'];
				
					?>
					<td><?php echo $no; ?></td>
					<td><input type="hidden" name="nim[]" style="width:50px" value="<?php echo $data['nim']; ?>"> </td>
					<td><?php echo $data['nim']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><input type="number" name="tugas[]" style="width:50px"></td>
					<td><input type="number" name="uts[]" style="width:50px"></td>
					<td><input type="number" name="uas[]" style="width:50px"></td>
				</tr>
				
			<?php } ?>
                </table>
				<?php 
					$sql2 = "SELECT  COUNT(nama) FROM mahasiswa WHERE kelas='$kelas'";
					$query2 = mysql_query($sql2); 
					while($data2=mysql_fetch_array($query2))
					{
					$jumlah= $data2['COUNT(nama)']; 
								
					}
				?>
				<input type="hidden" name="count" value="<?php echo $jumlah; ?>" >
				<button type="submit" name="simpan" class="btn btn-danger">Simpan</button>
				</form>
				<?php
					if(isset($_POST['simpan'])) {
					//ini_set("display_errors",0);
					include('koneksi.php');
					
					
					$nim=$_POST['nim'];
					$tugas=$_POST['tugas'];
					$uts=$_POST['uts'];
					$uas=$_POST['uas'];
					
					$member_id=$_POST['count'];



					for($i=0; $i < $_POST['count']; $i++)
					{
						$result = mysql_query("INSERT INTO nilai VALUES (NULL, '$nim[$i]', '$tugas[$i]','$uts[$i]','$uas[$i]')") 
						or die(mysql_error());
						
					}
					echo "<script>alert('Berhasil Disimpan!');history.go(-1) </script>";
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
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>
   			<script type="text/javascript" language="JavaScript">
             function konfirmasi()
             {
             tanya = confirm("Anda Yakin Akan Logout ?");
             if (tanya == true) return true;
             else return false;
             }
        </script>
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

</body>
</html>
