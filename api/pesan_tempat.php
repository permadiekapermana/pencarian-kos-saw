<?php
include"../config/koneksi.php";
include"kodes.php";
//if(isset($_POST[id])){
	date_default_timezone_set('Asia/Jakarta');
	$id_tempat= $_POST[id_tempat];
	$kategori = $_POST[kategori];
	$nama     = $_POST[nama];
	$email	  = $_POST[email];
	$latlg    = $_POST[latlg];
	$jml      = $_POST[jml];
	$tgl      = date('Y-m-d');
	$kd 	  = id_pengguna();
	$idp 	  = id_pesanan();

	$qry      = mysql_query("INSERT INTO pengguna (id_pengguna,id_kategori,nama_pengguna,email,kordinat_pel,tgl_pengguna) 
							 VALUES('$kd','$kategori','$nama','$email','$latlg','$tgl')");

	if($qry){
		$response ='berhasil';
		mysql_query("INSERT INTO pesanan(id_pesanan, id_pengguna, jumlah, tgl_pesan, id_tempat) 
					 VALUES('$idp','$kd','$jml','$tgl','$id_tempat')");
	}else{
		$response ='gagal';
	}


	echo json_encode(array(
		'response'=>$response));

?>