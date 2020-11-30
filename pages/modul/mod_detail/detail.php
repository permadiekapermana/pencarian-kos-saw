<?php
$pel="KS.";
$y=substr($pel,0,2);
$query=mysql_query("select * from detail where substr(id_detail,1,2)='$y' order by id_detail desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_detail'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);
$aksi="modul/mod_detail/aksi_detail.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
  echo "					<div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
                            <div class='card'>
                                <h5 class='card-header'><a href='?module=detail&act=tambahdetail'>Tambah Tempat Kos</a></h5>
                                <div class='card-body'>
                                    <div class='table-responsive '>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
													<th scope='col'>Kode Kos</th>
                                                    <th scope='col'>Nama </th>
													<th scope='col'>Alamat </th>
													<th scope='col'>Kordinat </th>
													<th scope='col'>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
											$tampil=mysql_query("SELECT * FROM tempat ORDER BY id_tempat DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
                                                echo"<tr>
                                                    <th scope='row'>$no</th>
													<td>$r[id_tempat]</td>
                                                    <td>$r[nama_tempat]</td>
													<td>$r[alamat]</td>
													<td>$r[kordinat]</td>
													<td> <a class='btn btn-info' href='?module=detail&act=tambahdetail&id=$r[id_tempat]'>
										<i class='icon-edit icon-white'></i>  
										Detail                                            
									</a>
                                    <a class='btn btn-danger' href='$aksi?module=detail&act=hapus&id=$r[id_tempat]'>
                                        <i class='icon-trash icon-white'></i> 
                                        Delete
                                    </a></td>
                                                </tr>";
												$no++;
	} 
                                            echo"</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>";
						
    break;
	
case "tambahdetail":
  session_start();


  $_SESSION[id_tempat]     = $_GET[id];
   echo "					<div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
                            <div class='card'>
                                
                                <div class='card-body'>
                                    <div class='table-responsive '>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
													<th scope='col'>Foto Keterangan</th>
                                                    <th scope='col'>Nama </th>
													<th scope='col'>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
											echo"
											<form action='$aksi?module=detail&act=input' method='post'  enctype='multipart/form-data'>
											<input type='hidden' class='form-control' name='id_tempat' value='$_SESSION[id_tempat]' >
											<tr>
                                                    <th scope='row' colspan=2><input type='file' name='fupload' id='exampleInputFile' class='form-control'></th>
													<td ><input type='text' class='form-control' name='nama' ></td>
													<td> <button type='submit' class='btn btn-primary mt-4 pr-4 pl-4'>Simpan</button></td>
                                                </tr </form>";
											$tampil=mysql_query("SELECT * FROM detail, tempat where detail.id_tempat=tempat.id_tempat and tempat.id_tempat='$_SESSION[id_tempat]' ORDER BY detail.id_detail DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
                                                echo"<tr>
                                                    <th scope='row'>$no</th>
													<td> <img src='../foto_fasilitas/$r[foto]' height='20%' width='20%'> </td>
                                                    <td>$r[nama_tempat]</td>
													<td>$r[nama]</td>
													<td> <a class='btn btn-info' href='?module=detail&act=tambahdetail&id=$r[id_tempat]'>
										<i class='icon-edit icon-white'></i>  
										Detail                     
                                                       <a class='btn btn-danger' href='$aksi?module=detail&act=hapus&id=$r[id_detail]'>
                                        <i class='icon-trash icon-white'></i> 
                                        Delete                                            
									</a></td>
                                                </tr>";
												$no++;
	} 
                                            echo"</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>";
break;
		
case "editdetail":
    $edit=mysql_query("SELECT * FROM detail WHERE id_detail='$_GET[id]'");
    $r=mysql_fetch_array($edit);

     echo "
  <div class='row'>
                            <!-- basic form start -->
                            <div class='col-12 mt-5'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='header-title'>Form input detail / Variabel </h4>
                                        <form action='$aksi?module=detail&act=update' method='post'>
										<input type='hidden' class='form-control' name='id' value='$r[id_detail]' >
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Nama detail</label>
                                                <input type='text' class='form-control' name='nama_detail' value='$r[nama_detail]' >
                                                
                                            </div>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Alamat detail</label>
												<textarea name='alamat' class='form-control'> $r[alamat] </textarea>
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Kordinat</label>
                                                <input type='text' class='form-control' name='kordinat' value='$r[kordinat]' >
                                                
                                            </div>
                                            <button type='submit' class='btn btn-primary mt-4 pr-4 pl-4'>Simpan</button>
											<input type='button' class='btn btn-secondary mt-4 pr-4 pl-4' value=Batal onclick=self.history.back()>
                                        </form>
                                    </div>
                                </div>
                            </div>
						</div>
";
break;
  }
		  
?>