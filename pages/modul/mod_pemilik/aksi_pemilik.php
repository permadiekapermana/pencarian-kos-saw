<?php
session_start();
//error_reporting(0);
include "../../../config/koneksi.php";


$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='pemilik' AND $act=='hapus'){
  mysql_query("DELETE FROM users WHERE username='$_GET[id]'");
  header('location:../../media.php?module='.$module);

}elseif ($module=='pemilik' AND $act=='password'){
	$password = md5($_POST[pass]);
	$id       = $_POST[id];

	$qry      = mysql_query("UPDATE users SET password='$password' WHERE username='$id'")or die(mysql_error());
	if($qry){
		echo "<script>window.alert('Password berhasil diperbaharui');
              window.location=('../../media.php?module=$module')</script>";
	}else{
		echo "<script>window.alert('Gagal Memperbaharui password!');
              window.location=('../../media.php?module=$module')</script>";
	}

}elseif ($module=='pemilik' AND $act=='editdata'){
	$id   = $_POST[id];
	$nama = $_POST[nama];
	$email= $_POST[email];
	$hp   = $_POST[hp];
	$blok = $_POST[blok];

	$qry  = mysql_query("UPDATE users SET 
						 nama_lengkap ='$nama',
						 email        ='$email',
						 no_telp      ='$hp',
						 blokir       ='$blok'
						WHERE username='$id'")or die(mysql_error());
	if($qry){
		echo "<script>window.alert('Data berhasil diperbaharui');
              window.location=('../../media.php?module=$module')</script>";
	}else{
		echo "<script>window.alert('Gagal Memperbaharui data pemilik!');
              window.location=('../../media.php?module=$module')</script>";
	}

}




?>