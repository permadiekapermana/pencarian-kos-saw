<?php
$pel="SD.";
$y=substr($pel,0,2);
$query=mysql_query("select * from kategori where substr(id_kategori,1,2)='$y' order by id_kategori desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_kategori'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);
$aksi="modul/mod_kategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
  echo "					<div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
                            <div class='card'>
                                <h5 class='card-header'><a href='?module=kategori&act=tambahkategori'>Tambah Kategori</a></h5>
                                <div class='card-body'>
                                    <div class='table-responsive '>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
													<th scope='col'>Kode Kategori</th>
                                                    <th scope='col'>Nama Kategori</th>
													<th scope='col'>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
											$tampil=mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
                                                echo"<tr>
                                                    <th scope='row'>$no</th>
													<td>$r[id_kategori]</td>
                                                    <td>$r[nama_kategori]</td>
													<td> <a class='btn btn-info' href='?module=kategori&act=editkategori&id=$r[id_kategori]'>
										<i class='icon-edit icon-white'></i>  
										Edit                                            
									</a>";?>
									<a class='btn btn-danger' href="javascript:confirmHold('<?=$aksi?>?module=kategori&act=hapus&id=<?=$r[id_kategori]?>')">
										<i class='icon-trash icon-white'></i> 
										Delete
                                        <script type='text/javascript'>
                                            function confirmHold(holdUrl) {
                                              if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                                                document.location = holdUrl;
                                              }
                                            }
                                       </script>
                                    <?php echo"
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
	
case "tambahkategori":
  echo "
  <div class='row'>
                            <!-- basic form start -->
                            <div class='col-12 mt-5'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='header-title'>Form input kategori  </h4>
                                        <form action='$aksi?module=kategori&act=input' method='post'>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Kode kategori</label>
                                                <input type='text' class='form-control' name='id_kategori' value='$nopel' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Nama kategori</label>
                                                <input type='text' class='form-control' name='nama_kategori' >
                                                
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
		
case "editkategori":
    $edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $r=mysql_fetch_array($edit);

     echo "
  <div class='row'>
                            <!-- basic form start -->
                            <div class='col-12 mt-5'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='header-title'>Form input kategori / Variabel </h4>
                                        <form action='$aksi?module=kategori&act=update' method='post'>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Nama kategori</label>
                                                <input type='text' class='form-control' name='nama_kategori' value='$r[nama_kategori]' >
                                                
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
<?php
echo"";?>