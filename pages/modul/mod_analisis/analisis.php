<?php
$pel="KS.";
$y=substr($pel,0,2);
$query=mysql_query("select * from tempat where substr(id_tempat,1,2)='$y' order by id_tempat desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_tempat'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);
$aksi="modul/mod_analisis/aksi_analisis.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
    mysql_query("DELETE FROM sementara ");
  echo "
  <div class='row'>
                            <!-- basic form start -->
                            <div class='col-12 mt-5'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='header-title'>Form Penggunaan aplikasi</h4>
                                        <form action='?module=analisis&act=hitungkmean' method='post'>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>No pengguna</label>
                                                <input type='text' class='form-control' name='id_pengguna' value='$nopel' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Nama </label>
                                                <input type='text' class='form-control' name='nama_pengguna' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Kordinat Lokasi</label>
												<textarea name='kordinat_pel' class='form-control'> </textarea>
                                                
                                            </div>
											
                                            
                                            <button type='submit' class='btn btn-primary mt-4 pr-4 pl-4'>Cari kosan</button>
											<input type='button' class='btn btn-secondary mt-4 pr-4 pl-4' value=Batal onclick=self.history.back()>
                                        </form>
                                    </div>
                                </div>
                            </div>
						</div>
";
  
  break;
  case "hitungkmean":
    mysql_query("INSERT INTO pengguna( id_pengguna, nama_pengguna,  kordinat_pel)
										  										  
						VALUES	('$_POST[id_pengguna]','$_POST[nama_pengguna]','$_POST[kordinat_pel]')");
						$utama=explode(",",$_POST[kordinat_pel]);
						
  echo "					<div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
                            <div class='card'>
                                <h5 class='card-header'><a href='?module=tempat&act=tambahtempat'>Tambah Tempat Kos</a></h5>
                                <div class='card-body'>
                                    <div class='table-responsive '>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th scope='col'>Nama </th>
													<th scope='col'>Alamat </th>
													<th scope='col'>Latitude </th>
													<th scope='col'>Longtitude </th>
													<th scope='col'>Jarak ke Lokasi </th>
                                                </tr>
                                            </thead>
                                            <tbody>";
											$tampil=mysql_query("SELECT * FROM tempat ORDER BY id_tempat DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
		$data=explode(",",$r[kordinat]);
		
		$jarak2=sqrt((($data[0]- $utama[0]) *  ($data[0]- $utama[0]) ) + (($data[1]- $utama[1]) * ($data[1]- $utama[1])))  ;
		
		$jarak=round($jarak2,2);
                                                echo"
												<form action='$aksi?module=analisis&act=input' method='post'>
												<tr>
                                                    <th scope='row'>$no</th>
                                                    <td>$r[nama_tempat]<input type='text' class='form-control' name='id_tempat[]' value='$r[id_tempat]' ></td>
													<td>$r[alamat]</td>
													<td>$data[0]</td>
													<td>$data[1]</td>
													<td>$jarak <input type='hidden' class='form-control' name='jarak[]' value='$jarak' ></td>
                                                </tr>";
												$no++;
	} 
	echo"<tr>
                                                    <th scope='row' colspan=5>Lihat terdekat</th>
                                                    
													<td><button type='submit' class='btn btn-primary mt-4 pr-4 pl-4'>Simpan</button></td>
													</form>
                                                </tr>";
                                            echo"</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>";
						
    break;
	
case "lihatterdekat":

  echo "					<div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
                            <div class='card'>
                                <h5 class='card-header'>Lokasi kos terdekat berdasarkan hasil pencarian</h5>
                                <div class='card-body'>
                                    <div class='table-responsive '>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
													<th scope='col'>Nama tempat kos</th>
                                                    <th scope='col'>Jarak lokasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
											$tampil=mysql_query("SELECT * FROM sementara, tempat where sementara.id_tempat=tempat.id_tempat  ORDER BY sementara.jarak ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
                                                echo"<tr>
                                                    <th scope='row'>$no</th>
													<td><a href='?module=analisis&act=detailjarak&nama=$r[nama_tempat]'>$r[nama_tempat]</a></td>
                                                    <td>$r[jarak]</td>
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
		
case "detailjarak":
    $edit=mysql_query("SELECT * FROM tempat WHERE nama_tempat='$_GET[id]'");
    $r=mysql_fetch_array($edit);

     echo "
  <div class='row'>
                            <!-- basic form start -->
                            <div class='col-12 mt-5'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='header-title'>Form input tempat / Variabel </h4>
                                        <form action='$aksi?module=tempat&act=update' method='post'>
										<input type='hidden' class='form-control' name='id' value='$r[id_tempat]' >
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Nama tempat</label>
                                                <input type='text' class='form-control' name='nama_tempat' value='$r[nama_tempat]' >
                                                
                                            </div>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Alamat tempat</label>
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