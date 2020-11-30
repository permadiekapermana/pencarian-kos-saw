<?php
include"../config/koneksi.php";
//if(isset($_POST[id])){
	$id    = $_POST[id];
	$qry   = mysql_query("SELECT * FROM tempat WHERE id_tempat = '$id'");
	$hasil = array();
	if($qry){
		if(mysql_num_rows($qry)>0){
		$response = 'berhasil';
			while ($data = mysql_fetch_array($qry)) {
				$QRY2 = mysql_query("SELECT DISTINCT nama_lengkap, username, no_telp FROM users WHERE username = '$data[id_user]'");
				
				while ($data2 = mysql_fetch_array($QRY2)) {
					array_push($hasil, array(
						  'nama_tempat' =>$data[nama_tempat],
						  'alamat'		=>$data[alamat],
						  'id_tempat'	=>$data[id_tempat],
						  'gambar'		=>$data[gambar],
						  'harga'		=>$data[harga_tarif],
						  'tarif'		=>$data[tarif],
						  'jml_kamar'	=>$data[jml_kamar],
						  'kosong'		=>$data[jml_kosong],
						  'fasilitas'	=>$data[detail_fasilitas],
						  'username' 	=>$data2[username],
						  'nama_lengkap'=>$data2[nama_lengkap],
						  'no_telp' 	=>$data2[no_telp],
						  'kordinat' 	=>$data[kordinat],
						  'kategori'	=>$data[id_kategori]
						));
				}
			}

			
		

		}else{
			$response='kosong';
		}

	}else{
		$response = 'gagal';
	}

	echo json_encode(array(
        'response' => $response,
        'hasil'    => $hasil
		));
//}
?>