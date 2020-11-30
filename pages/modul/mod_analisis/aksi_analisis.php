<?php
session_start();
error_reporting(0);
include "../../../config/koneksi.php";


$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='analisis' AND $act=='hapus'){
  mysql_query("DELETE FROM analisis WHERE id_analisis='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input analisis
elseif ($module=='analisis' AND $act=='input'){
$jarak=$_POST[jarak];
$id_tempat=$_POST[id_tempat];
$jml=count($_POST[jarak]);	
for ($i=0; $i < $jml; $i++){
  mysql_query("INSERT INTO sementara( id_tempat, jarak)
										  										  
						VALUES	('$id_tempat[$i]','$jarak[$i]')");
}												
 header('location:../../media.php?module=analisis&act=lihatterdekat');
}

// Update analisis
elseif ($module=='analisis' AND $act=='update'){
  mysql_query("UPDATE analisis SET nama_analisis = '$_POST[nama_analisis]', alamat = '$_POST[alamat]', kordinat = '$_POST[kordinat]'
  									WHERE id_analisis = '$_POST[id]'");
  header('location:../../media.php?module=analisis&act=lihatterdekat');
}
?>
