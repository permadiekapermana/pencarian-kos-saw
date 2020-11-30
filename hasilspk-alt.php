<?php
  date_default_timezone_set("Asia/Jakarta");
  $lokasi = explode(",",$_POST[kordinat]);
  $lat    = str_replace(' ', '',$lokasi[0]);
  $long   = str_replace(' ', '',$lokasi[1]);
  $Wjenis = $_POST[kd_kategori];
  $Wharga = $_POST[harga];
  $fasil  = $_POST[fasil];
  $hm     = $_POST['hrgm'.$_POST[harga]];
  $hs     = $_POST['hrgs'.$_POST[harga]];
  $ip     = $_POST[ip];
  $jumFAS = count($fasil);
  $jumFAL = $jumFAS/8;
  $arfas  = array();
  $arharga= array();
  $_SESSION['cari'] = SHA1(date('YmdHis'));
  $ss     = $_SESSION['cari'];
  $radius = $_POST[radius];

  //ambil semua jenis kosan berdasarkan kode jenis
  $qry   = mysql_query("SELECT * FROM tempat,users,kategori where tempat.id_user=users.username AND tempat.id_kategori = kategori.id_kategori AND kategori.ket_nilai= '$Wjenis' ORDER BY tempat.nama_tempat DESC");
  while($data=mysql_fetch_array($qry)){
    $kordinat_kos      = explode(",",$data[kordinat]);
    $fasilitas_kos     = explode(",",$data[detail_fasilitas]);
    $jum_fasilitas     = count($fasilitas_kos);
    $nilai_bagifas[]   = $jum_fasilitas/8;

    //lainlian
    $harga_kos[]  = $data[harga_tarif];
    $id_tempat[]  = $data[id_tempat];

    //Hitung jarak Harvesine
    $hitung       = sqrt( (($kordinat_kos[0]- $lat) *  ($kordinat_kos[0]- $lat)) + ( ($kordinat_kos[1]- $long) * ($kordinat_kos[1]- $long) ) ) ;
    $jarak[]      = $hitung * 111.319;

  }//end while qry





  $qry2  = mysql_fetch_array(mysql_query("SELECT * FROM fasilitas WHERE $jumFAL BETWEEN fas_m AND fas_s"));
  $Wfasil = $qry2[fas_nilai];
  

  if(mysql_num_rows($qry)>0){
    $jumdata =  mysql_num_rows($qry); 
    while($data=mysql_fetch_array($qry)){
          $kd     = explode(",",$data[kordinat]);
          $kf     = explode(",",$data[detail_fasilitas]);
          $fs     = count($kf);
          $kfs[]  = $fs/8;

          
          $jarak2 = sqrt( (($kd[0]- $lat) *  ($kd[0]- $lat)) + ( ($kd[1]- $long) * ($kd[1]- $long) ) )  ;
          //$jarak2 = sqrt($jarak2);
          $jarak    = round($jarak2,2);
          $km[]     = $jarak*111.319;
         //echo $jarak."<br>";

          //
          $tarif[]  = $data[harga_tarif];
          $dtempat[]= $data[id_tempat];
          //echo "FS : ".$fs."<br>";
    }      

    for ($a=0; $a <$jumdata ; $a++) {
          if($km[$a] <=$radius){
                
                 $Qa  = mysql_query("SELECT * FROM harga WHERE '".$tarif[$a]."' BETWEEN harga_m AND harga_s");
                 $QDD = mysql_fetch_array($Qa);
                     $hrg = $QDD[harga_nilai];
                 //}


                 $Qb  = mysql_query("SELECT * FROM fasilitas WHERE '".$kfs[$a]."' BETWEEN fas_m AND fas_s");
                 $QFF = mysql_fetch_array($Qb);
                 $fnl = $QFF[fas_nilai];
                     

                 //echo $QDD[harga_nilai];

                 //echo $data['nama_tempat']." -   ".$Wjenis." - ".$Wharga." - ".$jumFAL;
                 //echo $data['nama_tempat']." - ".$QFF['fas_nilai']." -> ".$QDD['harga_nilai']." <- ".$Wjenis."<br>";

                 $Qidt  = mysql_query("SELECT * FROM perhitungan WHERE ip='$ip' AND id_tempat = '".$dtempat[$a]."' AND session = '$ss'"); //INI
                 $row   = mysql_fetch_array($Qidt);
                 
                 if(mysql_num_rows($Qidt) > 0){   //STAK DISINI 
                     $status= "update";
                      mysql_query("UPDATE perhitungan SET
                            C1_Harga = '".$hrg."', 
                            C2_Fasilitas = '".$fnl."',
                            C3_Kategori = '$Wjenis',
                            jarak= '".$km[$a]."'
                            WHERE id_tempat = '".$dtempat[$a]."' ")or die(mysql_error());
                 }else{
                     $status= "insert";
                      $INS = mysql_query("INSERT INTO perhitungan 
                            VALUES('','$dtempat[$a]', '".$hrg."','".$fnl."','$Wjenis','".$km[$a]."','0','$ip','$ss')"); 
                 }


          }else{
           // echo "sss";
               $status="null";
          }//km
         echo $tarif[$a]." nilai harga : ".$hrg."<br>";
      }  
      if($ip!=""){
        if($INS){
         mysql_query("INSERT INTO histori VALUES('','$ip','".date('Y-m-d H:i:s')."','$ss')");
        }
      }
    
      if($status=="insert"){
      //Cari nilai Max
      $Qm    = mysql_query("SELECT MIN(C1_Harga) AS MH, MAX(C2_Fasilitas) AS MF, MAX(C3_Kategori) AS MC FROM perhitungan");
      //echo $Dmm[MH]." - ".$Dmm[MF]." - ".$Dmm[MC]."<br>";     
      $Qmm    = mysql_query("SELECT * FROM perhitungan WHERE session = '$_SESSION[cari]'");
      $hasils = array();
      while ( $Dmm   = mysql_fetch_array($Qm) ) {

        while ($Dcc   = mysql_fetch_array($Qmm)) {
          $CHarga = $Dmm[MH]/$Dcc[C1_Harga];
          $CFasil = $Dcc[C2_Fasilitas] / $Dmm[MF];
          $CKate  = $Dcc[C3_Kategori] / $Dmm[MC];
          $tempatk = $Dcc[id_tempat];

          array_push($hasils, array(
                'har' => $CHarga,
                'fas' => $CFasil,
                'kat' => $CKate,
                'id'  => $tempatk
            ));

          // echo $CHarga.", ";
          // echo $CFasil.", ";
          // echo $CKate."<br>";

        }
        
      } 
       //echo json_encode(array($hasils));

       for($s=0; $s<count($hasils); $s++){
          $RHF = (($Wharga*$hasils[$s][har]) + ($Wfasil*$hasils[$s][fas]) +  ($Wjenis*$hasils[$s][kat]));
         
          mysql_query("UPDATE perhitungan SET Hasil_akhir = '$RHF' WHERE id_tempat = '".$hasils[$s][id]."' AND session = '$ss'")or die(mysql_error());
       }

       file_put_contents('json_nilai.json', $hasils);
      } 

  }
 
?>

<main role='main'>
      <!-- Content -->
      <article>
        <header class='section background-primary text-center'>
            <h1 class='text-white margin-bottom-0 text-size-50 text-thin text-line-height-1'>HASIL PENCARIAN</h1>
        </header>
        <div class='section background-white'> 
          <div class='line'>
          <h2 class="card-title">Terdekat dari lokasi anda</h2>
          <?=$jumdata?>
          
            <div class='margin'>
              <!-- Contact Form -->

           <?php 
            if($status=="insert" || $status=="update"){
              //$Qtampil = mysql_query("SELECT * FROM perhitungan, tempat, kategori WHERE tempat.harga_tarif BETWEEN '$hm' AND '$hs' AND perhitungan.id_tempat=tempat.id_tempat AND tempat.id_kategori=kategori.id_kategori AND kategori.ket_nilai ='$Wjenis' AND perhitungan.jarak < '$radius' ORDER BY perhitungan.Hasil_akhir DESC");
              $Qtampil = mysql_query("SELECT * FROM perhitungan, tempat, kategori WHERE  perhitungan.id_tempat=tempat.id_tempat AND tempat.id_kategori=kategori.id_kategori AND perhitungan.session='$ss' ORDER BY perhitungan.Hasil_akhir DESC");
              if(mysql_num_rows($Qtampil)>0){
              while ($kost = mysql_fetch_array($Qtampil)) {
                
              
           ?>   
              <!-- here -->
              <div class='s-12 m-12 l-12'>
                  <div class="card w-100">
                    <div class="card-body">
                      <div class='s-2' style="margin-right: 19px;">
                        <img width = "50" src="foto_fasilitas/<?=$kost[gambar]?>">
                      </div>
                      <div class='s-7'>
                        <h5 class="card-title"><?=$kost[nama_tempat]?></h5>
                        <p class="card-text">
                           <?=$kost[alamat]?><br>
                           <?=$kost[nama_kategori]?><br>
                           <?=$kost[detail_fasilitas]?><br>
                          
                        </p>

                        
                      </div>
                      <div class='s-2'>
                        <div style="font-size:30px;">
                           <?= "Rp. ".number_format($kost[harga_tarif])?><br>
                           <?=$kost[jarak]." KM"?><br>
                           <a href="detailfasilitas<?=$kost[id_tempat].".html"?>" style="color:#5cb85c; font-size:14px;" class="">Lihat Detail</a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div> 
				     <!-- here -->
             <?php
                }unset($_SESSION['cari']);
               }else{
                  echo " &nbsp;&nbsp;&nbsp;Belum ada data ditemukan...".$ss;
                }
               }else{
                  echo " &nbsp;&nbsp;&nbsp;Belum ada kosan ditemukan disekitar anda...";
               } 
             ?>  

            </div>  
          </div> 
        </div> 
      </article>
      <div class='background-primary padding text-center'>
        <a href='/'><i class='icon-facebook_circle icon2x text-white'></i></a> 
        <a href='/'><i class='icon-twitter_circle icon2x text-white'></i></a>
        <a href='/'><i class='icon-google_plus_circle icon2x text-white'></i></a>
        <a href='/'><i class='icon-instagram_circle icon2x text-white'></i></a>                                                                        
      </div>
      <!-- MAP -->
      <div class='s-12 grayscale center'>  	  
        <iframe src='https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1459734.5702753505!2d16.91089086619977!3d48.577103681657675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssk!2ssk!4v1457640551761' width='100%' height='450' frameborder='0' style='border:0'></iframe>
      </div>
    </main>
<?php 
// }else{
//  echo "<script>window.location=('panel-pemilik.html')</script>";
// }

?>
