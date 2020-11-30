<?php
date_default_timezone_set('Asia/Jakarta');
$nama_dokumen='Katalog-kos-pdf'; //Beri nama file PDF hasil.
//define('_MPDF_PATH','MPDF60');
include"config/koneksi.php";
include("MPDF60/mpdf.php");
$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Create new mPDF Document
	
	  $kode  = $_GET['kode'];
    $kota  = $_GET['kota'];
    $tag  = $_GET['tag'];

  if( ($kode!="") && ($kota!="") ){
         //echo "string1";
      $QB   = mysql_query("SELECT * FROM tempat, kategori,users WHERE tempat.id_kategori=kategori.id_kategori AND tempat.id_user=users.username AND tempat.id_kategori='$kode' AND tempat.id_kota='$kota'");
 //  }else{
	//      //echo "string 2";
	//      $QB   = mysql_query("SELECT * FROM barang,jenis,admin WHERE barang.jns_kode=jenis.jns_kode AND barang.adm_kode=admin.adm_kode ORDER BY brg_nama ASC")or die(mysql_error()); 
	    
  }

ob_start(); 
?>
<style type="text/css">
table.customTable {
  width: 100%;
  background-color: #FFFFFF;
  border-collapse: collapse;
  border-width: 1px;
  border-color: #575757;
  border-style: solid;
  color: #000000;
}

table.customTable td, table.customTable th {
  border-width: 1px;
  border-color: #575757;
  border-style: solid;
  padding: 3px;
  text-align: center;
}

table.customTable thead {
  background-color: #F2F2F2;
}
.badge{padding: 3px; color: #FFF;}
.badge-danger{background: red;}
</style>
<center>
    <h3>KATALOG KOSAN</h3>
</center>
<span style="font-size:12px; color:#000">
	Berdasarkan kategori : <?php echo strtoupper($tag); ?><br>
	Dibuat : <?=date('d, M Y')?> 

</span><br><br>
	<table class="customTable">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA KOS</th>
                <th>KAMAR</th>
                <th>KOSONG</th>
                <th>TELP</th>
                <th>ALAMAT</th>
                <th>TARIF</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        
        if(mysql_num_rows($QB)>0){
            while ($data = mysql_fetch_array($QB)) {
            @$no++; ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$data[nama_tempat]?></td>
                <td><?=$data[jml_kamar]?></td>
                <td><?=$data[jml_kosong]?></td>
                <td><?=$data[no_telp]?></td>
                <td><?=$data[alamat]?></td>
                <td>Rp.<?=number_format($data[harga_tarif])." / ".$data[tarif]?></td>
                
            </tr>
        <?php }$no=1; }else{
              echo "<tr><td align='center' colspan='9'>Belum ada data untuk ditampilkan </td></tr>";
          }
        ?>
            
        </tbody>
    </table>
<?php 
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;

?>