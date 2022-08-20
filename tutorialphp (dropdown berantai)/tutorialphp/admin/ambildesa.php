<?php
include 'koneksi.php';
 
$kec = $_GET['kec'];
$desa  = mysql_query("SELECT id_desa, nama_desa FROM desa WHERE id_kec='$kec' order by nama_desa");
 
echo "<option>-- Pilih Kecamatan --</option>";
while($k = mysql_fetch_array($desa)){
echo "<option value=\"".$k['id_desa']."\">".$k['nama_desa']."</option>\n";
}
?>