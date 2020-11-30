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
  echo "					<div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
                            <div class='card'>
                                <h5 class='card-header'><a href='?module=tempat&act=tambahtempat'>Tambah Tempat Kos</a></h5>
                                <div class='card-body'>
                                    <div class='table-responsive '>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
													<th scope='col' width=10%>Foto</th>
													<th scope='col'>Kode</th>
                                                    <th scope='col'>Nama </th>
                                                    <th scope='col'>Keterangan </th>
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
													<td><img src='../foto_fasilitas/$r[gambar]' class='rounded' width='50%'> </td>
													<td>$r[id_tempat]</td>
                                                    <td>$r[nama_tempat]</td>
                                                    <td>$r[keterangan]</td>
													<td>$r[alamat]</td>
													<td>$r[kordinat]</td>
													<td> <a class='btn btn-info' href='?module=tempat&act=edittempat&id=$r[id_tempat]'>
										<i class='icon-edit icon-white'></i>  
										Edit                                            
									</a>
									<a class='btn btn-danger' href=javascript:confirmHold('$aksi?module=tempat&act=hapus&id=$r[id_tempat]')>
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
	
case "tambahtempat":
  echo "
  <div class='row'>
                            <!-- basic form start -->
                            <div class='col-12 mt-5'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='header-title'>Form input tempat  </h4>
                                        <form action='$aksi?module=tempat&act=input' method='post'  enctype='multipart/form-data'>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Kode tempat</label>
                                                <input type='text' class='form-control' name='id_tempat' value='$nopel' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Kategori tempat</label>
                                                <select name='id_kategori' class='form-control'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select>
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Nama tempat</label>
                                                <input type='text' class='form-control' name='nama_tempat' >
                                           
 </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Keterangan</label>
												<textarea name='keterangan' class='form-control'> </textarea>
                                          

                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Alamat tempat</label>
												<textarea name='alamat' class='form-control'> </textarea>
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Kordinat</label>
                                                <input type='text' class='form-control' name='kordinat' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Frame maps</label>
                                                <input type='text' class='form-control' name='frame' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Foto Tempat</label>
                                                <input type='file' name='fupload' id='exampleInputFile' class='form-control'>
                                                
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
                                        <h4 class='header-title'>Form ubah tempat / Variabel </h4>
                                        <form action='$aksi?module=tempat&act=update' method='post'  enctype='multipart/form-data'>
										<input type='hidden' class='form-control' name='id' value='$r[id_tempat]' >
                                            
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Kategori tempat</label>
                                               <select name='id_kategori' class='form-control'>";
 
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }
    echo "</select>
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Nama tempat</label>
                                                <input type='text' class='form-control' name='nama_tempat' value='$r[nama_tempat]' >
                                                
                                            </div>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Keterangan</label>
												<textarea name='keterangan' class='form-control'> $r[keterangan] </textarea>
                                                
                                            </div>   
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Alamat tempat</label>
												<textarea name='alamat' class='form-control'> $r[alamat] </textarea>
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Kordinat</label>
                                                <input type='text' class='form-control' name='kordinat' value='$r[kordinat]' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Frame maps</label>
                                                <input type='text' class='form-control' name='frame' value='$r[frame]' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Preview</label><br>
                                                <img src='../foto_fasilitas/$r[gambar]' width=20%>
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Foto Tempat</label>
                                                <input type='file' name='fupload' id='exampleInputFile' class='form-control'>
                                                
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
<script type='text/javascript'>
    function confirmHold(holdUrl) {
      if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            document.location = holdUrl;
      }
    }
</script>