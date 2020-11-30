<?php
include"../config/koneksi.php";
//if(isset($_POST[id])){
	$id    = $_POST[id];
	$kota  = $_POST[kota];
	$qry   = mysql_query("SELECT * FROM tempat,kategori,users WHERE tempat.id_kategori ='$id' AND tempat.id_kota='$kota' AND tempat.id_kategori=kategori.id_kategori AND tempat.id_user=users.username
		     ORDER BY tempat.nama_tempat ASC");
	$hasil = array();
	if($qry){
		if(mysql_num_rows($qry)>0){
		$response = 'berhasil';
			while ($data = mysql_fetch_array($qry)) {
			array_push($hasil, array(
					  'id_tempat' 		=>$data[id_tempat],
					  'nama_kategori' 	=>$data[nama_kategori],
					  'nama_tempat' 	=>$data[nama_tempat],
					  'nama_pemilik'    =>$data[nama_lengkap],
					  'alamat' 			=>$data[alamat],
					  'tarif'			=>$data[tarif],
					  'harga_tarif' 	=>$data[harga_tarif],
					  'kordinat' 		=>$data[kordinat],
					  'gambar' 			=>$data[gambar],
					  'telp'   			=>$data[no_telp],
					  'jml_kamar'       =>$data[jml_kamar],
					  'kamar_kosong'	=>$data[jml_kosong],
					  'luas'		    =>$data[luas_kamar],
					  'fasilitas'		=>$data[detail_fasilitas],
					));
			}
		}else{
			$response='kosong';
		}

	}else{
		$response = 'gagal';
	}

	echo json_encode(array(
        'response' => $response,
        'hasil'    =>$hasil
		));
//}
?>