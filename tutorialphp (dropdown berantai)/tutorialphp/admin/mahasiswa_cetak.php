<?php
//index.php
//include autoloader

require_once 'dompdf/autoload.inc.php';
include "koneksi.php";

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();

$sql=mysql_query("SELECT * FROM mahasiswa") or die(mysql_error());//order by
$no=0;
$output = "

<p align='center'><img src='logo.png' style='width:50px;height:50px;'/></p>
<p align='center'><strong>LAPORAN MAHASISWA</strong></p>
<table table border='1' width='100%'>
	<tr>
		<th>No</th>
		<th>NIM</th>
		<th>NAMA</th>
		<th>TEMPAT</th>
		<th>TANGGAL LAHIR</th>
		<th>ALAMAT</th>
	</tr>
";
while($row = mysql_fetch_array($sql))
{
	$no++;
	$output .= '
		<tr>
			<td>'.$no.'</td>
			<td>'.$row["nim"].'</td>
			<td>'.$row["nama"].'</td>
			<td>'.$row["tempat"].'</td>
			<td>'.$row["tgl_lahir"].'</td>
			<td>'.$row["alamat"].'</td>
		</tr>
	';
}
$output .= '</table>';



//echo $output;

$document->loadHtml($output);

//set page size and orientation

$document->setPaper('Legal', 'landscape');

//Render the HTML as PDF

$document->render();


//Get output of generated pdf in Browser

$document->stream("Lap_Mahasiswa", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>