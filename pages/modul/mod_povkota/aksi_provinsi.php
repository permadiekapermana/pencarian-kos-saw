<?php
session_start();
//error_reporting(0);
include "../../../config/koneksi.php";


$module=$_GET[module];
$act=$_GET[act];

// Hapus data-provinsi
if ($module=='data-provinsi' AND $act=='hapus'){
  mysql_query("DELETE FROM provinsi WHERE id_provinsi='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input data-provinsi
elseif ($module=='data-provinsi' AND $act=='input'){

	
  mysql_query("INSERT INTO provinsi(`id_provinsi`, `provinsi`)
										  										  
						VALUES	('$_POST[kode]','$_POST[nama]')");
												
  header('location:../../media.php?module='.$module);
}

// Update data-provinsi
elseif ($module=='data-provinsi' AND $act=='update'){
  mysql_query("UPDATE provinsi SET provinsi = '$_POST[nama]'
  							  WHERE id_provinsi = '$_POST[kode]'")or die(mysql_error());
  header('location:../../media.php?module='.$module);
}
?>
