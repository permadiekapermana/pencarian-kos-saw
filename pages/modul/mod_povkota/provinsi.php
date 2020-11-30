<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_povkota/aksi_provinsi.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM provinsi ORDER BY provinsi ASC");
    
    }
    
    echo "
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
        <div class='row'>
          <div class='col-sm-6'>
              <h3>DATA PROVINSI</h3>
          </div> 
          <div class='col-sm-6 text-right'>
              <input type=button value='Tambah Provinsi' class='btn btn-primary btn-xs' onclick=\"window.location.href='?module=data-provinsi&act=tambahprovinsi';\">
          </div>   
        </div>  
            
            <div class='table-responsive '>
              <table class='table table-striped'><thead>
                    <tr>
                    <td class='left'>No</td>
                    <td class='left'>Kode</td>
                    <td class='left'>Provinsi</td>
                    <td class='center'>Aksi</td>
                    </tr></thead> "; 
                    $no=1;
                    while ($r=mysql_fetch_array($tampil)){
                       echo "<tr><td class='left' width='25'>$no</td>
                             <td class='left'>$r[id_provinsi]</td>
                             <td class='left'>$r[provinsi]</td>
                		         <td class='left'>
                                <a href=?module=data-provinsi&act=editprovinsi&id=$r[id_provinsi]>
                                    <img src='../img/edit.png' border='0' title='edit' />
                                </a>
                                &nbsp;&nbsp;
                                <a href=javascript:confirmHold('$aksi?module=data-provinsi&act=hapus&id=$r[id_provinsi]')>
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
  
case "tambahprovinsi":
include"../config/allkode.php";
    if ($_SESSION[leveluser]=='admin'){
    echo "
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
          <h3>TAMBAH Provinsi</h3>
          <div class='row'>
          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
            <form method=POST action='$aksi?module=data-provinsi&act=input'>
              <label for='kode'>Kode</label>
              <input type=text name='kode' id='kode' value='".id_provinsi()."' class='form-control' readonly required>
              <br>
              <label for='ra'>Nama Provinsi</label>
              <input type=text name='nama' class='form-control' min='0' required>
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
            Data akan disimpan sesuai data yang terisi tiap Field.</p>
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
    
  case "editprovinsi":
    $edit=mysql_query("SELECT * FROM provinsi WHERE id_provinsi='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin'){
    echo "
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
          <h3>UBAH DATA PROVINSI</h3>
          <div class='row'>
          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
            <form method=POST action='$aksi?module=data-provinsi&act=update'>
              <label for='kode'>Kode</label>
              <input type=text name='kode' id='kode' value='".$r[id_provinsi]."' class='form-control' readonly required>
              <br>
              <label for='ra'>Nama Provinsi</label>
              <input type=text name='nama' class='form-control' min='0' value='".$r[provinsi]."' required>
              
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