<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_kategori/aksi_kategori-nilai.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM kategori ORDER BY id_kategori");
    
    }
    
    echo "
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
        <div class='row'>
          <div class='col-sm-6'>
              <h3>DATA NILAI KATEGORI</h3>
          </div> 
          <div class='col-sm-6 text-right'>
              <input type=button value='Tambah Nilai' class='btn btn-primary btn-xs' onclick=\"window.location.href='?module=data-kategori&act=tambahkategori';\">
          </div>   
        </div>  
            
            <div class='table-responsive '>
              <table class='table table-striped'><thead>
                    <tr>
                    <td class='left'>No</td>
                    <td class='left'>Kode</td>
                    <td class='left'>Kategori</td>
                    
                    <td class='left'>Nilai</td>
                    <td class='center'>Aksi</td>
                    </tr></thead> "; 
                    $no=1;
                    while ($r=mysql_fetch_array($tampil)){
                       echo "<tr><td class='left' width='25'>$no</td>
                             <td class='left'>$r[id_kategori]</td>
                             <td class='left'>$r[nama_kategori]</td>
                             <td class='left'>$r[ket_nilai]</td>
                		        
                		         <td class='left'>
                                <a href=?module=data-kategori&act=editkategori&id=$r[id_kategori]>
                                    <img src='../img/edit.png' border='0' title='edit' />
                                </a>
                                &nbsp;&nbsp;
                                <a href=javascript:confirmHold('$aksi?module=data-kategori&act=hapus&id=$r[id_kategori]')>
                                    <img src='../img/del.png' border='0' title='hapus' />
                                </a>
                             </td>
                             </tr>";
                      $no++;
                    }
        echo "</table>
         </div>
        </div>
      </div>
    </div>";
break;
  
case "tambahkategori":
include"../config/allkode.php";
    if ($_SESSION[leveluser]=='admin'){
    echo "
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
          <h3>TAMBAH NILAI KATEGORI</h3>
          <div class='row'>
          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
            <form method=POST action='$aksi?module=data-kategori&act=input'>
              <label for='kode'>Kode</label>
              <input type=text name='kode' id='kode' value='".id_nkategori()."' class='form-control' readonly required>
              <br>
              <label for='kategori'>Kategori</label>
              <input type=text name='kategori' class='form-control' min='0' required>
              <br>
              
              <label for='Nilai'>Nilai</label>  
              <input type=number name='nilai' size='30' class='form-control' required>
              <br>
              
              <br>

              <input type='submit' value='Simpan' class='btn btn-success btn-sm'>
              <input type='button' value='Batal' class='btn btn-warning btn-sm' onclick=self.history.back()>
            </form>
          </div>

          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
            <p>      
            <i class='fas fa-bullhorn'></i> Perhatian<br>
            Semua Field wajib untuk di isi.<br>
            

            Perubahan data akan disimpan sesuai data yang terisi tiap Field.</p>
          </div>

          </div><!--row-->  
        </div>    
      </div>      
    </div>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editkategori":
    $edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin'){
    echo "
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
          <h3>UBAH NILAI FASILITAS</h3>
          <div class='row'>
          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
            <form method=POST action='$aksi?module=data-kategori&act=update'>
              <label for='kode'>Kode</label>
              <input type=text name='kode' id='kode' value='".$r[id_kategori]."' class='form-control' readonly required>
              <br>
              <label for='kategori'>Kategori</label>
              <input type=text name='kategori' class='form-control' min='0' value='".$r[nama_kategori]."' required>
              <br>
              
              <label for='Nilai'>Nilai</label>  
              <input type=number name='nilai' size='30' class='form-control' value='".$r[ket_nilai]."' required>
              <br>
              
              <br>

              <input type='submit' value='Simpan' class='btn btn-success btn-sm'>
              <input type='button' value='Batal' class='btn btn-warning btn-sm' onclick=self.history.back()>
            </form>
          </div>

          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
            <p>      
            <i class='fas fa-bullhorn'></i> Perhatian<br>
            Semua Field wajib untuk di isi.<br>
            

            Perubahan data akan disimpan sesuai data yang terisi tiap Field.</p>
          </div>

          </div><!--row-->  
        </div>    
      </div>      
    </div>";    
    }
    
    break;  
}
}
?>
<script type='text/javascript'>
    function confirmHold(holdUrl) {
      if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            document.location = holdUrl;
      }
    }
</script>