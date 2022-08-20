<?php include ('koneksi.php');
 session_start(); 
if (!isset($_SESSION['id_login']) || (trim($_SESSION['id_login']) == '')) { ?>
<script>
window.location = "../";
</script>
<?php 
}
$session_id=$_SESSION['id_login'];

$user_query = mysql_query("select * from user where id_login = '$session_id'")or die(mysql_error());
$user_row = mysql_fetch_array($user_query);


?>