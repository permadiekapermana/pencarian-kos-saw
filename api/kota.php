<?php
include"../config/koneksi.php";
	
	$qry   = mysql_query("SELECT * FROM kota ORDER BY kota ASC");
	$hasil = array();

	if($qry){
		$response ='berhasil';
		while ($data = mysql_fetch_array($qry)) {
			array_push($hasil, array(
				'id'   => $data[id_kota],
				'nama' => $data[kota],
				'id_kp'    => $data[id_kprovinsi]
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