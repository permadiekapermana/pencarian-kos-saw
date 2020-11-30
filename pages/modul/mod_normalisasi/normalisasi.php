<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
  $rank    = file_get_contents("../json_nilais.json");

  $jsd     = json_decode($rank,true);
  $jso     = json_decode($rank,true);
  $jsi     = json_encode($jso);
?>
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
          <h3>NILAI AWAL</h3><hr>
            <table class="table">
              <thead>
                <th>#</th>
                <th>Nama Kos</th>
                <th>C1(Harga)</th>
                <th>C2(Fasilitas)</th>
                <th>C3(Kategori)</th>
                
              </thead>
              <tbody>
              <?php
              $jms = count($jsd);
              foreach ($jsd as $key ) {
                    $ses = $key[ses];
              }
                 if($jms!=0){
                 $QR=mysql_query("SELECT * FROM perhitungan,tempat WHERE perhitungan.id_tempat=tempat.id_tempat AND perhitungan.session = '$ses'")or die(mysql_error());
                    while ($smt = mysql_fetch_array($QR)){ @$no++;
              ?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$smt[nama_tempat]?></td>
                  <td><?=$smt[C1_Harga]?></td>
                  <td><?=$smt[C2_Fasilitas]?></td>
                  <td><?=$smt[C3_Kategori]?></td>
                </tr>
              <?php
                   }
                }else{
                   echo "<tr><td align='center' colspan='5'>Belum ada data untuk ditampilkan...</td></tr>";
                }
              ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>

    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
          <h3>NILAI NORMALISASI</h3><hr>
            <table class="table">
              <thead>
                <th>#</th>
                <th>Nama Kos</th>
                <th>C1(Harga)</th>
                <th>C2(Fasilitas)</th>
                <th>C3(Kategori)</th>
                <th>Hasil</th>
                <th>Rat</th>
                
              </thead>
              <tbody>
              <?php
              $jm = count($jsd);

                 if($jm!=0){
                    foreach ($jsd as $key => $val) { @$nos++;
                      $QR=mysql_query("SELECT * FROM tempat WHERE tempat.id_tempat = '".$val[id]."'");
                      $h =mysql_fetch_array($QR);
              ?>
                <tr>
                  <td><?=$nos?></td>
                  <td><?=$h[nama_tempat]?></td>
                  <td><?=number_format($val[har],2)?></td>
                  <td><?=number_format($val[fas],2)?></td>
                  <td><?=number_format($val[kat],2)?></td>
                  <td><?=number_format($val[nil],2)?></td>
                  <td>
                      <?php
                        if( ($val[nil] >=0)&&($val[nil] <=5.99) ){
                          echo "Mahal";
                        }elseif(($val[nil] >=6.00)&&($val[nil] <=10.99)){
                          echo "Sedang";
                        }elseif(($val[nil] >=11.00)&&($val[nil] <=15.99)){
                          echo "Murah";    
                        }elseif(($val[nil] >=16.00)&&($val[nil] <=20.00)){
                          echo "Sangat Murah";
                        }else{echo "string";}
                      ?>
                  </td>
                </tr>
              <?php
                   }
                }else{
                   echo "<tr><td align='center' colspan='6'>Belum ada data untuk ditampilkan...</td></tr>";
                }
              ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>

<?php
  }
?>
