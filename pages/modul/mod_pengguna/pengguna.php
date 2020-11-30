<?php
$pel="SD.";
$y=substr($pel,0,2);
$query=mysql_query("select * from pengguna where substr(id_pengguna,1,2)='$y' order by id_pengguna desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_pengguna'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);
$aksi="modul/mod_pengguna/aksi_pengguna.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
  echo "					<div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
                            <div class='card'>
                                <h5 class='card-header'>
                                <div class='card-body'>
                                    <div class='table-responsive '>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
													<th scope='col'>Kode Kategori</th>
                                                    <th scope='col'>Nama pengguna</th>
													<th scope='col'>Email</th>
													<th scope='col'>Kordinat</th>
													<th scope='col'>Tgl penggunaan</th>
													<th scope='col'>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
											$tampil=mysql_query("SELECT * FROM pengguna ORDER BY id_pengguna DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
                                                echo"<tr>
                                                    <th scope='row'>$no</th>
													<td>$r[id_pengguna]</td>
                                                    <td>$r[nama_pengguna]</td>
													<td>$r[email]</td>
													<td>$r[kordinat_pel]</td>
													<td>$r[tgl_pengguna]</td>
													<td> 
									<a class='btn btn-danger' href=javascript:confirmHold('$aksi?module=pengguna&act=hapus&id=$r[id_pengguna]')>
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
	
case "tambahpengguna":
  echo "
  <div class='row'>
                            <!-- basic form start -->
                            <div class='col-12 mt-5'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='header-title'>Form input pengguna  </h4>
                                        <form action='$aksi?module=pengguna&act=input' method='post'>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Kode pengguna</label>
                                                <input type='text' class='form-control' name='id_pengguna' value='$nopel' >
                                                
                                            </div>
											<div class='form-group'>
                                                <label for='exampleInputEmail1'>Nama pengguna</label>
                                                <input type='text' class='form-control' name='nama_pengguna' >
                                                
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
		
case "editpengguna":
    $edit=mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$_GET[id]'");
    $r=mysql_fetch_array($edit);

     echo "
  <div class='row'>
                            <!-- basic form start -->
                            <div class='col-12 mt-5'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='header-title'>Form input pengguna / Variabel </h4>
                                        <form action='$aksi?module=pengguna&act=update' method='post'>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'>Nama pengguna</label>
                                                <input type='text' class='form-control' name='nama_pengguna' value='$r[nama_pengguna]' >
                                                
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