<?php
session_start();
error_reporting(0);
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='tempat' AND $act=='hapus'){
  mysql_query("DELETE FROM tempat WHERE id_tempat='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input tempat
elseif ($module=='tempat' AND $act=='input'){
$lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
	
 if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/jpg" AND $tipe_file != "image/png"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=paket)</script>";
    }
    else{
    UploadTempat($nama_file_unik);

    mysql_query("INSERT INTO tempat(id_tempat,
                                    nama_tempat,
                                    keterangan,
									id_kategori,
                                    alamat,
									kordinat,
									frame,
									gambar) 
                            VALUES('$_POST[id_tempat]',
                                   '$_POST[nama_tempat]',
                                   '$_POST[keterangan]',
								   '$_POST[id_kategori]',
								   '$_POST[alamat]',
								   '$_POST[kordinat]',
								   '$_POST[frame]',
                                   '$nama_file_unik')");
  header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysql_query("INSERT INTO tempat(id_tempat,
                                    nama_tempat,
                                    keterangan,
									id_kategori,
                                    alamat,
									kordinat,
									frame) 
                            VALUES('$_POST[id_tempat]',
                                   '$_POST[nama_tempat]',
                                   '$_POST[keterangan]',
								   '$_POST[id_kategori]',
								   '$_POST[alamat]',
								   '$_POST[kordinat]',
								   '$_POST[frame]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update tempat
elseif ($module=='tempat' AND $act=='update'){
   $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 


  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE tempat SET nama_tempat = '$_POST[nama_tempat]',
                  keterangan = '$_POST[keterangan]',
									alamat = '$_POST[alamat]',
									id_kategori = '$_POST[id_kategori]',
									kordinat = '$_POST[kordinat]',
									frame = '$_POST[frame]'
                             WHERE id_tempat   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=paket)</script>";
    }
    else{
    UploadTempat($nama_file_unik);
    mysql_query("UPDATE tempat SET nama_tempat = '$_POST[nama_tempat]',
                  keterangan = '$_POST[keterangan]',
									alamat = '$_POST[alamat]',
									id_kategori = '$_POST[id_kategori]',
									kordinat = '$_POST[kordinat]',
									frame = '$_POST[frame]'
									gambar = '$nama_file_unik'
                             WHERE id_tempat   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
    }
  }
}
?>
