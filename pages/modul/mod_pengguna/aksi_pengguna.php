<?php
session_start();
error_reporting(0);
include "../../../config/koneksi.php";


$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='pengguna' AND $act=='hapus'){
  mysql_query("DELETE FROM pengguna WHERE id_pengguna='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input pengguna
elseif ($module=='pengguna' AND $act=='input'){

	
  mysql_query("INSERT INTO pengguna( id_pengguna, nama_pengguna)
										  										  
						VALUES	('$_POST[id_pengguna]','$_POST[nama_pengguna]')");
												
  header('location:../../media.php?module='.$module);
}

// Update pengguna
elseif ($module=='pengguna' AND $act=='update'){
  mysql_query("UPDATE pengguna SET nama_pengguna = '$_POST[nama_pengguna]'
  									WHERE id_pengguna = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
