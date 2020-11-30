<?php
include"../config/koneksi.php";
	
	$qry   = mysql_query("SELECT * FROM harga ORDER BY harga_m ASC");
	$hasil = array();

	if($qry){
		$response ='berhasil';
		while ($data = mysql_fetch_array($qry)) {
			array_push($hasil, array(
				'id_hrg'   => $data[id_harga],
				'harga_m' => $data[harga_m],
				'harga_s'  => $data[harga_s],
				'nilai'    => $data[harga_nilai],
				));
		}
	}else{
		$response = 'gagal';
	}
	echo json_encode(array(
        'hasil'    =>$hasil
		));
?>