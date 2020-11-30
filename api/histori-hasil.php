 <?php
date_default_timezone_set("Asia/Jakarta");
include"../config/koneksi.php";
$sesi = $_POST[sesi];

	$qry   = mysql_query("SELECT * FROM perhitungan,tempat,users,kategori WHERE perhitungan.id_tempat=tempat.id_tempat 
                          AND tempat.id_user =users.username AND tempat.id_kategori=kategori.id_kategori AND session='$sesi'");
	$hasil = array();

	if(mysql_num_rows($qry)>0){
		if($qry){
			$response ='berhasil';
			while ($data = mysql_fetch_array($qry)) {
				array_push($hasil, array(
					'id'   	=> $data[id_tempat],
					'nama' 	=> $data[nama_tempat],
					'alamat'=> $data[alamat],
					'gambar'=> $data[gambar],
					'katg'  => $data[nama_kategori]
				
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