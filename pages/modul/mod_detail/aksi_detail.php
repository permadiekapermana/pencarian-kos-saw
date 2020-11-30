<?php
session_start();
error_reporting(0);
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='detail' AND $act=='hapus'){
  mysql_query("DELETE FROM detail WHERE id_detail='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input detail
elseif ($module=='detail' AND $act=='input'){
$lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
	
 if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=paket)</script>";
    }
    else{
    UploadDetail($nama_file_unik);

    mysql_query("INSERT INTO detail(id_tempat,
                                    nama,
                                    foto) 
                            VALUES('$_POST[id_tempat]',
                                   '$_POST[nama]',
                                   '$nama_file_unik')");
  header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysql_query("INSERT INTO detail(id_tempat,
                                    nama) 
                            VALUES('$_POST[id_tempat]',
                                   '$_POST[nama]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update detail
elseif ($module=='detail' AND $act=='update'){
   $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 


  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE detail SET id_tempat = '$_POST[id_tempat]',
                                   nama = '$_POST[nama]'
                             WHERE id_detail   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=paket)</script>";
    }
    else{
    UploadDetail($nama_file_unik);
    mysql_query("UPDATE paket SET id_tempat = '$_POST[id_tempat]',
                                   nama = '$_POST[nama]',
								   foto 	= '$nama_file_unik'
                             WHERE id_detail   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
    }
  }
}
?>
