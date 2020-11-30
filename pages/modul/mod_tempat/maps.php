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
$aksi="modul/mod_tempat/aksi_tempat.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
  echo "<iframe src='https://www.google.com/maps/d/u/4/embed?mid=1QfkMvXtARanmG4mDPxrMN6rqrvL7pclQ' width='640' height='480'></iframe>";
						
    break;
	
case "tambahtempat":
  echo "
  <div class='row'>
                            <!-- basic form start -->
                            <div class='col-12 mt-5'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='header-title'>Form input tempat  </h4>
                                        <form action='$aksi?module=tempat&act=input' method='post'>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Kode tempat</label>
                                                <input type='text' class='form-control' name='id_tempat' value='$nopel' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Nama tempat</label>
                                                <input type='text' class='form-control' name='nama_tempat' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Alamat tempat</label>
												<textarea name='alamat' class='form-control'> </textarea>
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Kordinat</label>
                                                <input type='text' class='form-control' name='kordinat' >
                                                
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
		
case "edittempat":
    $edit=mysql_query("SELECT * FROM tempat WHERE id_tempat='$_GET[id]'");
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