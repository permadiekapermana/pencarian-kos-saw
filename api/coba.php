<?php
$kategori  = $_POST[kat];
$fasilitas = $_POST[fas];
$jumfas    = count($fasilitas);


echo json_encode(array(
	'response' => 'berhasil',
	'terpilih' => $fasilitas, $kategori
	));
?>