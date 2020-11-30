<?php
function id_pengguna(){
	$pel="KS.";
	$y=substr($pel,0,2);
	$query=mysql_query("select * from pengguna where substr(id_pengguna,1,2)='$y' order by id_pengguna desc limit 0,1");
	$row=mysql_num_rows($query);
	$data=mysql_fetch_array($query);

	if ($row>0){
		$no=substr($data['id_pengguna'],-3)+1;}
	else{
		$no=1;
	}
	$nourut=1000+$no;
	$nopeng=$pel.substr($nourut,-3);

	return $nopeng;
}

function id_pesanan(){
	  $pel="PS.";
      $y=substr($pel,0,2);
      $query=mysql_query("select * from pesanan where substr(id_pesanan,1,2)='$y' order by id_pesanan desc limit 0,1");
      $row=mysql_num_rows($query);
      $data=mysql_fetch_array($query);

      if ($row>0){
      $no=substr($data['id_pesanan'],-3)+1;}
      else{
      $no=1;
      }
      $nourut=1000+$no;
      $nopel=$pel.substr($nourut,-3);
      return $nopel;
}

?>