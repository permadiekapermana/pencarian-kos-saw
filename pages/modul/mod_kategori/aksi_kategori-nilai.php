<?php
session_start();
//error_reporting(0);
include "../../../config/koneksi.php";


$module=$_GET[module];
$act=$_GET[act];

// Hapus data-kategori
if ($module=='data-kategori' AND $act=='hapus'){
  mysql_query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input data-kategori
elseif ($module=='data-kategori' AND $act=='input'){

	
  mysql_query("INSERT INTO kategori(`id_kategori`, `nama_kategori`, `ket_nilai`)
										  										  
						VALUES	('$_POST[kode]','$_POST[kategori]','$_POST[nilai]')");
												
  header('location:../../media.php?module='.$module);
}

// Update data-kategori
elseif ($module=='data-kategori' AND $act=='update'){
  mysql_query("UPDATE kategori SET  nama_kategori = '$_POST[kategori]', 
                  									ket_nilai='$_POST[nilai]'
                  							  WHERE id_kategori = '$_POST[kode]'")or die(mysql_error());
  header('location:../../media.php?module='.$module);
}
?>
