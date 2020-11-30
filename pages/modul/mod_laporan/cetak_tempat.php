<?php
error_reporting(0);
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

include "class.ezpdf.php";
include "../../../config/koneksi.php";
include "rupiah.php";
define('FPDF_FONTPATH','font/');
require('fpdf_protection.php');
	

$query= "SELECT *  FROM tempat, kategori WHERE tempat.id_kategori=kategori.id_kategori ORDER BY id_tempat DESC";
		
if (!empty($query))
	  {
	  
	  $baca= mysql_query($query);
	

	$pdf=new FPDF('L','cm','Legal');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(1,3,1);
	$pdf->SetAutoPageBreak(true,3);
	$pdf->SetFont('Arial','B',14);
	$pdf->Image("images/logo_sh.jpg",2,1.15,'L');
	$pdf->SetFont('Arial','B',16);
	$pdf->Ln();
	$pdf->Cell(0,.6,'LOKASI KOSAN KU  ',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(0,.6,'K MEAN KLUSTERING',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,.6,'Office : Jl. Tentara Pelajar',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(0,.6,'web : http://KMEAN.COM e_mail: KMEAN@yahoo.com',0,0,'C');	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(0,.2,'_______________________________________________________________________________________________________________________________________',0,0,'C');
	$pdf->Ln();
		$pdf->Cell(0,.2,'_______________________________________________________________________________________________________________________________________',0,0,'C');
	$x=$pdf->GetY();
	$pdf->SetY($x+1);
	$pdf->Cell(0,1,'Daftar Pengguna Aplikasi',0,0,'C');


		if (mysql_num_rows ($baca)>0){
	$x=$pdf->GetY();
	$pdf->SetY($x+1);

	$pdf->SetFont('Arial','B',14);
	//$pdf->Cell(2.2,1,'Kode buku',1,0,'C');
	$pdf->Cell(2,1,'NO',1,0,'C');
	$pdf->Cell(8,1,'NAMA',1,0,'C');
	$pdf->Cell(8,1,'KATEGORI',1,0,'C');
	$pdf->Cell(12,1,'KORDINAT',1,0,'C');



	$pdf->Ln();
	
	
while ($hasil=mysql_fetch_array($baca))
{
	$no++;
	
	 $pdf->SetFont('Arial','',12);
	//$pdf->Cell(2.2,1,$hasil[kode_buku],1,0,'C');
	$pdf->Cell(2,1,$no,1,0,'C');
	$pdf->Cell(8,1,$hasil['nama_tempat'],1,0,'C');
	$pdf->Cell(8,1,$hasil['nama_kategori'],1,0,'C');
	$pdf->Cell(12,1,$hasil['kordinat'],1,0,'C');
	

	
	$pdf->Ln();
	}
	$x=$pdf->GetY();
	$pdf->SetY($x+2);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Mengetahui,',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Manager ',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'KOSAN KU ',0,0,'C');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Hartono, MM',0,0,'C');
	$pdf->Ln();
	$pdf->Cell(15,0.5,'');
	$pdf->Cell(0,0.5,'Nip.2013.98765.034',0,0,'C');
	$pdf->Ln();
	
	}
	$pdf->Output();
	}}
?>
