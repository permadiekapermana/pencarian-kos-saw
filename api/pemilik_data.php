<?php
include"../config/koneksi.php";
//if(isset($_POST[id])){
	$id    = $_POST[id];
	$qry   = mysql_query("SELECT username, nama_lengkap, no_telp, blokir FROM users WHERE username ='$id'");
	$hasil = array();
	if($qry){
		if(mysql_num_rows($qry)>0){
		$response = 'berhasil';
			while ($data = mysql_fetch_array($qry)) {
				if($data[blokir]=='N'){$status='Aktif';}else{$status='Non Aktif';}


				$QRY2 = mysql_query("SELECT tempat.id_tempat,tempat.nama_tempat,tempat.alamat,tempat.gambar, kategori.nama_kategori FROM tempat, kategori WHERE id_user = '$data[username]' AND tempat.id_kategori=kategori.id_kategori");
				$jm =mysql_num_rows($QRY2);
				
				while ($data2 = mysql_fetch_array($QRY2)) {
					
					array_push($hasil, array(
						  'username' 	=>$data[username],
						  'nama_lengkap'=>$data[nama_lengkap],
						  'no_telp' 	=>$data[no_telp],
						  'blokir'      =>$status,
						  'nama_tempat' =>$data2[nama_tempat],
						  'alamat'		=>$data2[alamat],
						  'id_tempat'	=>$data2[id_tempat],
						  'gambar'		=>$data2[gambar],
						  'kategori'    =>$data2[nama_kategori],
						  'total' 	    =>$jm
						));

				}
			}

			$object1 = json_encode($hasil);
			$object  = json_decode($object1);
			$grouped = array();

			$new = array();	
			foreach ($object as $key => $value) {
				

					if(!array_key_exists($value->username, $grouped)){
						$newObject = new stdClass();
						$newObject->username    = $value->username;
						$newObject->nama_lengkap= $value->nama_lengkap;
						$newObject->no_telp	   	= $value->no_telp;
						$newObject->total	   	= $value->total;
						$newObject->blokir	   	= $value->blokir;
						$newObject->items      = array();

						$grouped[$value->username] = $newObject;
					}

						$taskObject         = new stdClass();
						$taskObject->id_tempat    = $value->id_tempat;
						$taskObject->nama_tempat  = $value->nama_tempat;
						$taskObject->alamat       = $value->alamat;
						$taskObject->gambar       = $value->gambar;
						$taskObject->kategori       = $value->kategori;

						$grouped[$value->username]->items[] = $taskObject;	


			}	
			   
	    	$grouped = array_values($grouped);
		

		}else{
			$response='kosong';
		}

	}else{
		$response = 'gagal';
	}

	echo json_encode(array(
        'response' => $response,
        'hasil'    => $grouped
		));
//}
?>