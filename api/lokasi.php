<?php
include"../config/koneksi.php";
	
	$lat   = $_POST[lat];
	$long  = $_POST[long];
	$qry   = mysql_query("SELECT * FROM tempat,users where tempat.id_user=users.username ORDER BY tempat.nama_tempat DESC");
	$hasil = array();

	if($qry){
		$response ='berhasil';
		while ($data=mysql_fetch_array($qry)) {
			$kd     = explode(",",$data[kordinat]);
			$jarak2 = sqrt( (($kd[0]- $lat) *  ($kd[0]- $lat)) + ( ($kd[1]- $long) * ($kd[1]- $long) ) )  ;
			$jarak  = round($jarak2,2);
			$km     = $jarak*111.319;
			$dodol  = explode(",", $data[kordinat]);
			if($km<=$radius){
				array_push($hasil, array(
					'id'        =>$data[id_tempat],
					'nama'		=>$data[nama_tempat],
					'lat'       =>$dodol[0],
					'long'      =>$dodol[1],
					'alamat'    =>$data[alamat],
					'cluster'	=>$jarak
				
					));

			}
			
			//echo $kd[0]." - ".$kd[1]."<br>";
		}
	}else {
		$response='gagal';
	}

	echo json_encode(array(
		'response'=>$response,
		'data'   =>$hasil));
?>