<?php
include"config/koneksi.php";

if(isset($_POST[kode])){
	$kota = $_POST[p];
	$kode = $_POST[kode]; 
	$nama = $_POST[nama];
	$q    = mysql_query("SELECT * FROM tempat, kategori,users WHERE tempat.id_kategori=kategori.id_kategori AND tempat.id_user=users.username AND tempat.id_kategori='$kode' AND tempat.id_kota='$kota'");
	
	if(mysql_num_rows($q)>0){
		echo "
		
		<h2>HASIL PENCARIAN KATEGORI : <td>$nama</h2>
		<span>Klik nama kos untuk lihat detail</span> <a href='pdf.php?kode=$kode&kota=$kota&tag=$nama' class='btn background-primary' id='exportButton' >Save</a>
		<div id='content'>
		<table class='' width='100%' id='exportTable'>
				<th>NO</th>
				<th>NAMA KOS</th>
				<th>KAMAR</th>
				<th>KOSONG</th>
				<th>TELP</th>
				<th>ALAMAT</th>
				<th>TARIF</th>";
		$no=1;
		while ($data = mysql_fetch_array($q)) { 
			echo "
				<tr>
					<td>$no</td>
					<td><a href='detailfasilitas$data[id_tempat].html'>$data[nama_tempat]</a></td>
					<td>$data[jml_kamar]</td>
					<td>$data[jml_kosong]</td>
					<td>$data[no_telp]</td>
					<td>$data[alamat]</td>
					<td>$data[harga_tarif] / $data[tarif]</td>
				</tr>
			";
			$no++;
		}
		echo "</table></div>";
	}else{
		echo"<h3> Uppss... Maaf belum ada data kosan terkait </h3>";
	}

}


?>
