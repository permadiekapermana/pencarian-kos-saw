<?php
session_start();
//error_reporting(0);
include "../../../config/koneksi.php";


$module=$_GET[module];
$act=$_GET[act];

// Hapus data-kota
if ($module=='data-kota' AND $act=='hapus'){
  mysql_query("DELETE FROM kota WHERE id_kota='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input data-kota
elseif ($module=='data-kota' AND $act=='input'){
    $kotanama = $_POST[nama];
    $text   = trim($kotanama);
    $textAr = preg_split('/\r\n|[\r\n]/', $text);
    //$textAr = array_filter($textAr, 'trim');// remove any extra \r chars
    
    foreach ($textAr as $linekota) {
        // Your sql Query here with $line as the string.
      $NO = '';
      $q = "SELECT MAX(id_kota) AS kode FROM kota";
        $sql = mysql_query($q);
        $data = mysql_fetch_array($sql);
        $cek =mysql_fetch_row($sql);
        $char = "KT";
        $NO= $data["kode"];
        $noUrut = (int) substr($NO, 3, 3);
        $noUrut++;
      if($cek > 0){
        return "sudah ada";
      }else{
        @$KO = $char . sprintf("%04s", $noUrut);
        
      }
      
      $qp_addkot= mysql_query("INSERT INTO kota(`id_kota`, `kota`, `id_kprovinsi`)VALUES	('$KO','$linekota','$_POST[provinsi]')")or die(mysql_error());

		    if(!$qp_addkot){
          echo "<script>alert('Terjadi Kesalahan saat menambah data kota...');</script>";
          echo "<script>window.location = '../../media.php?module=$module';</script>";
        }
    }header('location:../../media.php?module='.$module);

   
}

// Update data-kota
elseif ($module=='data-kota' AND $act=='update'){
  mysql_query("UPDATE kota SET kota = '$_POST[nama]', id_kprovinsi='$_POST[provinsi]'
  							  WHERE id_kota = '$_POST[kode]'")or die(mysql_error());
  header('location:../../media.php?module='.$module);
}
?>
