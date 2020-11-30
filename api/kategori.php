<?php
include"../config/koneksi.php";
	
	$qry   = mysql_query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
	$hasil = array();

	if($qry){
		$response ='berhasil';
		while ($data = mysql_fetch_array($qry)) {
			array_push($hasil, array(
				'id_ktg'   => $data[id_kategori],
				'nama_ktg' => $data[nama_kategori],
				'nilai'    => $data[ket_nilai]
				));
		}
	}else{
		$response = 'gagal';
	}
	echo json_encode(array(
        'response' => $response,
        'hasil'    =>$hasil
		));
?>