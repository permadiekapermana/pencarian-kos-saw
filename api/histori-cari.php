<?php
date_default_timezone_set("Asia/Jakarta");
include"../config/koneksi.php";
$localIP = $_POST[ip];

	$qry   = mysql_query("SELECT * FROM histori WHERE ip='$localIP'");
	$hasil = array();

	if(mysql_num_rows($qry)>0){
		if($qry){
			$response ='berhasil';
			while ($data = mysql_fetch_array($qry)) {
				$J = mysql_query("SELECT COUNT(session) AS jm FROM perhitungan WHERE session='$data[sesicari]'");
	            $jm = mysql_fetch_array($J);
	            
				array_push($hasil, array(
					'ip'   	=> $data[ip],
					'tgl' 	=> date('d, M Y - H:i',strtotime($data[tanggal]))." WIB",
					'jml'   => $jm[jm],
					'sesi'  => $data[sesicari]
 				
					));
			}
		}else{
			$response = 'gagal';
		}
	}else{
		$response = 'kosong';
	}
	echo json_encode(array(
        'response' => $response,
        'hasil'    =>$hasil
		));
?>