<?php
$aksi="modul/mod_pemilik/aksi_pemilik.php";

switch($_GET[act]){
  // Tampil Kategori
  default:
  echo "		<div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
                            <div class='card'>
                                <div class='card-body'>
                                <h3>DATA PEMILIK KOSAN</h3>
                                    <div class='table-responsive '>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
													<th scope='col'>Nama Pemilik</th>
                                                    <th scope='col'>Email</th>
                                                    <th scope='col'>No.Telp</th>
                                                    <th scope='col'>Status</th>
													<th scope='col'>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
											$tampil=mysql_query("SELECT * FROM users WHERE level = 'user' ORDER BY username DESC");
                                            $no=1;
                                            while ($r=mysql_fetch_array($tampil)){
                                                echo"<tr>
                                                    <th scope='row'>$no</th>
													<td>$r[nama_lengkap]</td>
                                                    <td>$r[email]</td>
                                                    <td>$r[no_telp]</td>";
                                            ?>


                                                    <td>
                                                    <?php if($r[blokir]=='N'){echo "Aktif";}else{echo "Terblokir";}?>
                                                        
                                                    </td>
                                                    
                                                    
											

                                            <?php echo"
                                            		<td> <a class='btn btn-info' href='?module=pemilik&act=editpemilik&id=$r[username]'>
										<i class='icon-edit icon-white'></i>  
										Edit                                            
									</a>
									<a class='btn btn-danger' href=javascript:confirmHold('$aksi?module=pemilik&act=hapus&id=$r[username]')>
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
		
case "editpemilik":
    $edit=mysql_query("SELECT * FROM users WHERE username='$_GET[id]' and level='user'");
    $r=mysql_fetch_array($edit);

  echo "<div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
                            <div class='card'>
                                <div class='card-body'>
                                <h3>UBAH DATA PEMILIK KOSAN</h3><hr>
                                <div class='row'>
                                    <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                                      <form action='$aksi?module=pemilik&act=editdata' method='post'>
                                        <div class='form-group row'>
                                           <label for='inputid' class='col-3 col-lg-2 col-form-label text-left'>Id/User</label>
                                           <div class='col-9 col-lg-10'>
                                              <input id='inputid' type='text' required value='$r[username]' disabled class='form-control'>
                                           </div>
                                        </div>

                                        <div class='form-group row'>
                                           <label for='nama' class='col-3 col-lg-2 col-form-label text-left'>Nama</label>
                                           <div class='col-9 col-lg-10'>
                                              <input id='nama' type='text' name='nama' required value='$r[nama_lengkap]' placeholder='Nama Lengkap' class='form-control'>
                                           </div>
                                        </div>

                                        <div class='form-group row'>
                                           <label for='inputEmail2' class='col-3 col-lg-2 col-form-label text-left'>Email</label>
                                           <div class='col-9 col-lg-10'>
                                              <input id='inputEmail2' type='email' name='email' required value='$r[email]' data-parsley-type='email' placeholder='Email' class='form-control'>
                                           </div>
                                        </div>

                                        <div class='form-group row'>
                                           <label for='hp' class='col-3 col-lg-2 col-form-label text-left'>Telp</label>
                                           <div class='col-9 col-lg-10'>
                                              <input id='hp' type='number' name='hp' required value='$r[no_telp]' placeholder='082----------' class='form-control'>
                                           </div>
                                        </div>

                                        <div class='form-group row'>
                                           <label for='lvl' class='col-3 col-lg-2 col-form-label text-left'>Level</label>
                                           <div class='col-9 col-lg-10'>
                                              <input id='lvl' type='text' name='lvl' required value='$r[level]' class='form-control' disabled>

                                           </div>
                                        </div>

                                        <div class='form-group row'>
                                           <label for='blok' class='col-3 col-lg-2 col-form-label text-left'>Status</label>
                                           <div class='col-9 col-lg-10'>
                                              <select id='blok' name='blok' required class='form-control'>
                                                    <option>----- Pilih Status -----</option>";?>
                                                    <option value='N' <?php if($r[blokir]=='N'){echo 'selected';}?> >Aktif</option>
                                                    <option value='Y' <?php if($r[blokir]=='Y'){echo 'selected';}?> >Blokir</option>
                                                   
                                   <?php echo"</select>
                                           </div>
                                        </div>
                                            <br>
                                            <input type='hidden' value='$_GET[id]' name='id'>
                                            <button type='submit' value='' class='btn btn-brand'>Ubah Data</button>
                                        </form>
                                    </div> 

                                    <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                                        <form action='$aksi?module=pemilik&act=password' method='post'>
                                           <label for='pass'><b>Ingin merubah password?</b> (Isi field password berikut)</label>
                                           <input id='pass' type='password' name='pass' placeholder='Tulis password baru' class='form-control'>
                                           <br>
                                           <input type='hidden' value='$_GET[id]' name='id'>
                                           <button type='submit' value='' class='btn btn-primary'>Ganti Password</button>
                                       </form>

                                    <br><br><br><br><br><br>
                                    <p>      
                                        <i class='fas fa-bullhorn'></i> Perhatian<br>
                                        Jika Password ingin diubah, silahkan isi Field Password.<br>
                                        Jika tidak ada perubahan pada Password, kosongkan saja. <br><br>

                                        Perubahan data akan disimpan sesuai data yang terisi tiap Field.</p>
                                    </div>

                                 </div>   <!--row--> 
                                </div>
                            </div>
                        </div>";
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

