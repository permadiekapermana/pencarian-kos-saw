<?php
include"config/koneksi.php";
include"api/kodes.php";
date_default_timezone_set('Asia/Jakarta');
    $id_tempat= $_POST[id_tempat];
	$kategori = $_POST[kategori];
	$nama     = $_POST[nama];
	$email	  = $_POST[email];
	$latlg    = '-';
	$jml      = $_POST[jumlah_psn];
	$tgl      = date('Y-m-d');
	$kd 	  = id_pengguna();
	$idp 	  = id_pesanan();

if( ($idp!="") || ($id_tempat!="") || ($jml!="") || ($kd!="") ){
	$qry      = mysql_query("INSERT INTO pengguna (id_pengguna,id_kategori,nama_pengguna,email,kordinat_pel,tgl_pengguna) 
							 VALUES('$kd','$kategori','$nama','$email','$latlg','$tgl')");

	if($qry){
		
		$Q=mysql_query("INSERT INTO pesanan(id_pesanan, id_pengguna, jumlah, tgl_pesan, id_tempat) 
					 VALUES('$idp','$kd','$jml','$tgl','$id_tempat')");
		if($Q){
			echo "<script>alert('Berhasil memesan, silahkan hubungi pemilik..');</script>";
			echo "<script>window.location = 'index.php?module=detailfasilitas&id=$id_tempat';</script>";
		}else{
			echo "<script>alert('Gagal memesan tempat...');</script>";
			echo "<script>window.location = 'index.php?module=detailfasilitas&id=$id_tempat';</script>";

		}

	}else{
		$response ='gagal';
	}
}
?>