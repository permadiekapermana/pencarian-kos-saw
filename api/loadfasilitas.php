<?php
include"../config/koneksi.php";
	
	$qry   = mysql_query("SELECT * FROM fasilitas ORDER BY fas_m ASC");
	$hasil = array();

	if($qry){
		$response ='berhasil';
		while ($data = mysql_fetch_array($qry)) {
			array_push($hasil, array(
				'id_fas'   => $data[id_fas],
				'fas_m '   => $data[fas_m],
				'fas_s'    => $data[fas_s],
				'nilai'    => $data[fas_nilai],
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