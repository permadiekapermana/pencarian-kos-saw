<?php 
session_start();
date_default_timezone_set("Asia/Jakarta");
include"../config/koneksi.php"; 
  $lokasi  = explode(",",$_POST[kordinat]);
  $Wjenis  = $_POST[kategori];
  $Wharga  = $_POST[harga];
  $fasil   = $_POST[fasil];
  $ip     = $_POST[ip];
  $jumFAS = count($fasil);
  $jumFAL = $jumFAS/8; //8 = fasilitas tersedia
  if(empty($_SESSION['cari'])){
    $_SESSION['cari'] = SHA1(date('YmdHis'));
    $ss     = $_SESSION['cari'];
    //echo "kkos";
  }else{
    $ss = $_SESSION['cari'];
    //echo "ada";
    
  }
  $radius = $_POST[radius];
  //
  $QH = mysql_query("SELECT * FROM harga WHERE harga_nilai = '$Wharga'");
  $hdata = mysql_fetch_array($QH);
  $hm      = $hdata[harga_m];
  $hs      = $hdata[harga_s];
  //
  

  $qry   = mysql_query("SELECT * FROM tempat,users,kategori where tempat.harga_tarif BETWEEN '$hm' AND '$hs' AND tempat.id_user=users.username AND tempat.id_kategori = kategori.id_kategori AND kategori.ket_nilai= '$Wjenis' ORDER BY tempat.nama_tempat DESC");
  $row   = mysql_num_rows($qry);

  $qry2  = mysql_fetch_array(mysql_query("SELECT * FROM fasilitas WHERE $jumFAL BETWEEN fas_m AND fas_s"));
  $Wfasil = $qry2[fas_nilai];
  

  if(mysql_num_rows($qry)>0){
    $jumdata =  mysql_num_rows($qry); 
    while($data=mysql_fetch_array($qry)){
          $kd     = explode(",",$data[kordinat]);
          $kf     = explode(",",$data[detail_fasilitas]);
          $fs     = count($kf);
          $kfs[]  = $fs/8;

          
          $jarak2 = sqrt( ( ($kd[0]- $lokasi[0])*($kd[0]-$lokasi[0]) )+(($kd[1]-$lokasi[1])*($kd[1]- $lokasi[1])))  ;
          //$jarak2 = sqrt($jarak2);
          $jarak   = round($jarak2,2);
          $km[]   = $jarak*111.319;
         //echo $jarak."<br>";

          //
          $tarif[]  = $data[harga_tarif];
          $dtempat[]= $data[id_tempat];
    }      

    for ($a=0; $a <$jumdata ; $a++) {
          if($km[$a] <=$radius){
                
                 $Qa  = mysql_query("SELECT * FROM harga WHERE '".$tarif[$a]."' BETWEEN harga_m AND harga_s");
                 while ($QDD = mysql_fetch_array($Qa)){
                     $hrg[] = $QDD[harga_nilai];
                 }


                 $Qb  = mysql_query("SELECT * FROM fasilitas WHERE '".$kfs[$a]."' BETWEEN fas_m AND fas_s");
                 $QFF = mysql_fetch_array($Qb);
                 $fnl = $QFF[fas_nilai];
                     

                 //echo $QDD[harga_nilai];

                 //echo $data['nama_tempat']." -   ".$Wjenis." - ".$Wharga." - ".$jumFAL;
                 //echo $data['nama_tempat']." - ".$QFF['fas_nilai']." -> ".$QDD['harga_nilai']." <- ".$Wjenis."<br>";

                 $Qidt  = mysql_query("SELECT * FROM perhitungan WHERE ip='$ip' AND id_tempat = '".$dtempat[$a]."' AND session = '$ss'");
                 $row   = mysql_fetch_array($Qidt);
                 
                 if(mysql_num_rows($Qidt) > 0){
                      $status= "update";
                      mysql_query("UPDATE perhitungan SET
                            C1_Harga = '".$hrg[$a]."', 
                            C2_Fasilitas = '".$fnl."',
                            C3_Kategori = '$Wjenis',
                            jarak= '".$km[$a]."'
                            WHERE id_tempat = '".$dtempat[$a]."' AND session = '$ss'")or die(mysql_error());
                 }else{
                      $status= "insert";
                      $INS = mysql_query("INSERT INTO perhitungan 
                            VALUES('','$dtempat[$a]', '".$hrg[$a]."','".$fnl."','$Wjenis','".$km[$a]."','0','$ip','$ss')"); 
                 }

          }else{
            
               $response="kosong";
          }//km
         //echo $km[$a]."<br>";
          
      }  
      if($ip!=""){
        if($INS){
         mysql_query("INSERT INTO histori VALUES('','$ip','".date('Y-m-d H:i:s')."','$ss')");
        }
      }
      
      if($status=="insert"){
      //Cari nilai Max
      $Qm    = mysql_query("SELECT MIN(C1_Harga) AS MH, MAX(C2_Fasilitas) AS MF, MAX(C3_Kategori) AS MC FROM perhitungan  WHERE session = '$ss'");
      //echo $Dmm[MH]." - ".$Dmm[MF]." - ".$Dmm[MC]."<br>";     
      $Qmm    = mysql_query("SELECT * FROM perhitungan  WHERE session = '$ss'");
      $hasils = array();
      while ( $Dmm   = mysql_fetch_array($Qm) ) {

        while ($Dcc   = mysql_fetch_array($Qmm)) {
          $CHarga = $Dmm[MH]/$Dcc[C1_Harga];
          $CFasil = $Dcc[C2_Fasilitas] / $Dmm[MF];
          $CKate  = $Dcc[C3_Kategori] / $Dmm[MC];
          $tempatk = $Dcc[id_tempat];
          $RHFD = (($Wharga*$CHarga) + ($Wfasil*$CFasil) +  ($Wjenis*$CKate));

          array_push($hasils, array(
                'har' => $CHarga,
                'fas' => $CFasil,
                'kat' => $CKate,
                'nil' => $RHFD,
                'ses' => $ss,
                'id'  => $tempatk
            ));

          // echo $CHarga.", ";
          // echo $CFasil.", ";
          // echo $CKate."<br>";
        }
        
      }
       //echo json_encode(array($hasils));

       for($s=0; $s<count($hasils); $s++){
          $RHF = ($Wharga*$hasils[$s][har]) + ($Wfasil*$hasils[$s][fas]) +  ($Wjenis*$hasils[$s][kat]);

          mysql_query("UPDATE perhitungan SET Hasil_akhir = '$RHF' WHERE id_tempat = '".$hasils[$s][id]."' AND session = '$ss'")or die(mysql_error());
       }
      }//else{echo $status;}  

  }//else{echo "row nul";}

      if($status=="insert" || $status=="update"){
              $spk = array();
              $Qtampil = mysql_query("SELECT * FROM perhitungan, tempat, kategori WHERE perhitungan.id_tempat=tempat.id_tempat AND tempat.id_kategori=kategori.id_kategori AND perhitungan.session='$ss' ORDER BY perhitungan.Hasil_akhir DESC");
              

              if(mysql_num_rows($Qtampil)>0){ 
                $response ="berhasil";
                while ($kost = mysql_fetch_array($Qtampil)) {
                    array_push($spk, array(
                        'gambar' =>$kost[gambar],
                        'nama'   =>$kost[nama_tempat],
                        'alamat' =>$kost[alamat],
                        'tag'    =>$kost[nama_kategori],
                        'fas'    =>$kost[detail_fasilitas],
                        'harga'  =>number_format($kost[harga_tarif]),
                        'jarak'  =>$kost[jarak],
                        'id'     =>$kost[id_tempat]
                      ));
                
                 }unset($_SESSION['cari']);
               }else{
                  $response = "kosong";
               }
        
               echo json_encode(array(
                 'response' =>$response,
                 'hasil'    =>$spk
                ));
        }else{
             echo json_encode(array(
                 'response' =>$response,
                 'hasil'    =>$spk
                ));
        }
?>  