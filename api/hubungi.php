<?php
include"../config/koneksi.php";
	
	$qry   = mysql_query("SELECT DISTINCT `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir` FROM users, tempat WHERE level ='user' AND users.username=tempat.id_user ORDER BY nama_lengkap ASC");
	$hasil = array();

	if($qry){
		$response ='berhasil';
		while ($data = mysql_fetch_array($qry)) {
			if($data[blokir]=='N'){$status='Aktif';}else{$status='Non Aktif';}
			array_push($hasil, array(
				'id_user'   	=> $data[username],
				'nama_pemilik' 	=> $data[nama_lengkap],
				'no_telp'       => $data[no_telp],
				'blok'			=> $status,
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