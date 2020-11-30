<?php
session_start();
//error_reporting(0);
include "../../../config/koneksi.php";


$module=$_GET[module];
$act=$_GET[act];

// Hapus data-fasilitas
if ($module=='data-fasilitas' AND $act=='hapus'){
  mysql_query("DELETE FROM fasilitas WHERE id_fas='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input data-fasilitas
elseif ($module=='data-fasilitas' AND $act=='input'){

	
  mysql_query("INSERT INTO fasilitas(`id_fas`, `fas_m`, `fas_s`, `fas_nilai`)
										  										  
						VALUES	('$_POST[kode]','$_POST[ra]','$_POST[rh]','$_POST[nilai]')");
												
  header('location:../../media.php?module='.$module);
}

// Update data-fasilitas
elseif ($module=='data-fasilitas' AND $act=='update'){
  mysql_query("UPDATE fasilitas SET fas_m = '$_POST[ra]', 
  									fas_s = '$_POST[rh]',
  									fas_nilai='$_POST[nilai]'
  							  WHERE id_fas = '$_POST[kode]'")or die(mysql_error());
  header('location:../../media.php?module='.$module);
}
?>
