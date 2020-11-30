<?php
session_start();
//error_reporting(0);
include "../../../config/koneksi.php";


$module=$_GET[module];
$act=$_GET[act];

// Hapus data-fasilitas
if ($module=='data-harga' AND $act=='hapus'){
  mysql_query("DELETE FROM harga WHERE id_harga='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input data-harga
elseif ($module=='data-harga' AND $act=='input'){

	
  mysql_query("INSERT INTO harga(`id_harga`, `harga_m`, `harga_s`, `harga_nilai`)
										  										  
						VALUES	('$_POST[kode]','$_POST[ra]','$_POST[rh]','$_POST[nilai]')");
												
  header('location:../../media.php?module='.$module);
}

// Update data-harga
elseif ($module=='data-harga' AND $act=='update'){
  mysql_query("UPDATE harga SET harga_m = '$_POST[ra]', 
  									harga_s = '$_POST[rh]',
  									harga_nilai='$_POST[nilai]'
  							  WHERE id_harga = '$_POST[kode]'")or die(mysql_error());
  header('location:../../media.php?module='.$module);
}
?>
