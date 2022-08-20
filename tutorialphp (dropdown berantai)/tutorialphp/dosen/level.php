<?php


if(!isset($_SESSION['id_login'])){
    echo "<script>alert('Anda Belum Login'); window.location = 'index.html'</script>";
}

//cek level user
if($_SESSION['level']!="Dosen"){
	echo "<script>alert('Silakan login ke level anda'); window.location = '../'</script>";
}

?>