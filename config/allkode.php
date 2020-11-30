<?php
function id_nfasilitas(){
	$pel="F.";
	$y=substr($pel,0,2);
	$query=mysql_query("select * from fasilitas where substr(id_fas,1,2)='$y' order by id_fas desc limit 0,1");
	$row=mysql_num_rows($query);
	$data=mysql_fetch_array($query);

	if ($row>0){
		$no=substr($data['id_fas'],-3)+1;}
	else{
		$no=1;
	}
	$nourut=1000+$no;
	$nopeng=$pel.substr($nourut,-3);

	return $nopeng;
}

function id_nharga(){
	  $pel="H.";
      $y=substr($pel,0,2);
      $query=mysql_query("select * from harga where substr(id_harga,1,2)='$y' order by id_harga desc limit 0,1");
      $row=mysql_num_rows($query);
      $data=mysql_fetch_array($query);

      if ($row>0){
      $no=substr($data['id_harga'],-3)+1;}
      else{
      $no=1;
      }
      $nourut=1000+$no;
      $nopel=$pel.substr($nourut,-3);
      return $nopel;
}

function id_nkategori(){
	  $pel="SD.";
      $y=substr($pel,0,2);
      $query=mysql_query("select * from kategori where substr(id_kategori,1,2)='$y' order by id_kategori desc limit 0,1");
      $row=mysql_num_rows($query);
      $data=mysql_fetch_array($query);

      if ($row>0){
      $no=substr($data['id_kategori'],-3)+1;}
      else{
      $no=1;
      }
      $nourut=1000+$no;
      $nopel=$pel.substr($nourut,-3);
      return $nopel;
}


function id_provinsi(){
        $pel="PV";
      $y=substr($pel,0,2);
      $query=mysql_query("select * from provinsi where substr(id_provinsi,1,2)='$y' order by id_provinsi desc limit 0,1");
      $row=mysql_num_rows($query);
      $data=mysql_fetch_array($query);

      if ($row>0){
      $no=substr($data['id_provinsi'],-4)+1;
      }
      else{
      $no=1;
      }
      $nourut=10000+$no;
      $nopel=$pel.substr($nourut,-4);
      return $nopel;
}

function id_kota(){
        $pel="KT";
      $y=substr($pel,0,2);
      $query=mysql_query("select * from kota where substr(id_kota,1,2)='$y' order by id_kota desc limit 0,1");
      $row=mysql_num_rows($query);
      $data=mysql_fetch_array($query);

      if ($row>0){
      $no=substr($data['id_kota'],-4)+1;
      }
      else{
      $no=1;
      }
      $nourut=10000+$no;
      $nopel=$pel.substr($nourut,-4);
      return $nopel;
}
?>