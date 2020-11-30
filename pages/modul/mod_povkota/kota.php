<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_povkota/aksi_kota.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM kota,provinsi WHERE kota.id_kprovinsi=provinsi.id_Provinsi ORDER BY provinsi ASC");
    
    }
    
    echo "
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
        <div class='row'>
          <div class='col-sm-6'>
              <h3>DATA KOTA</h3>
          </div> 
          <div class='col-sm-6 text-right'>
              <input type=button value='Tambah Kota' class='btn btn-primary btn-xs' onclick=\"window.location.href='?module=data-kota&act=tambahkota';\">
          </div>   
        </div>  
            
            <div class='table-responsive '>
              <table class='table table-striped'><thead>
                    <tr>
                    <td class='left'>No</td>
                    <td class='left'>Kode</td>
                    <td class='left'>kota</td>
                    <td class='left'>Provinsi</td>
                    <td class='center'>Aksi</td>
                    </tr></thead> "; 
                    $no=1;
                    while ($r=mysql_fetch_array($tampil)){
                       echo "<tr><td class='left' width='25'>$no</td>
                             <td class='left'>$r[id_kota]</td>
                             <td class='left'>$r[kota]</td>
                             <td class='left'>$r[provinsi]</td>
                		         <td class='left'>
                                <a href=?module=data-kota&act=editkota&id=$r[id_kota]>
                                    <img src='../img/edit.png' border='0' title='edit' />
                                </a>
                                &nbsp;&nbsp;
                                <a href=javascript:confirmHold('$aksi?module=data-kota&act=hapus&id=$r[id_kota]')>
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
  
case "tambahkota":
include"../config/allkode.php";
    if ($_SESSION[leveluser]=='admin'){
    ?>
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
          <h3>TAMBAH kota</h3>
          <div class='row'>
          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
            <form method='POST' action='<?=$aksi."?module=data-kota&act=input"?>'>
              <label for='provinsi'>Provinsi</label>
              <select name='provinsi' class='custom-select' required>
                <option value="">---Pilih Provinsi---</option>
                <?php
                  $qp = mysql_query("SELECT * FROM provinsi ORDER BY provinsi ASC");
                  while ($pr=mysql_fetch_array($qp)) {
                     echo "<option value='$pr[id_provinsi]'>$pr[provinsi]</option>";
                  }
                ?>
              </select>
              <br><br>
              <label for='ra'>Nama kota</label>
              <textarea name='nama' class='form-control' rows='6' required></textarea>
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
            Data akan disimpan sesuai data yang terisi tiap Field.<br><br>

            Untum menginputkan data masal, Gunakan ENTER (Tanpa tanda lain atau spasi) <br>
            CONTOH : <br>
            Jakarta<br>
            Bandung<br>
            Semarang<br></p>
          </div>

          </div><!--row-->  
        </div>    
      </div>      
    </div>
 <?php   }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editkota":
    $edit=mysql_query("SELECT * FROM kota WHERE id_kota='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin'){
    ?>
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
          <h3>UBAH DATA kota</h3>
          <div class='row'>
          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
            <form method=POST action='<?=$aksi."?module=data-kota&act=update"?>'>
              <label for='kode'>Kode</label>
              <input type=text name='kode' id='kode' value='<?=$r[id_kota]?>' class='form-control' readonly required>
              <br>
              <label for='provinsi'>Provinsi</label>
              <select name='provinsi' class='custom-select' required>
                
                <?php
                  $qp = mysql_query("SELECT * FROM provinsi ORDER BY provinsi ASC");
                  while ($pr=mysql_fetch_array($qp)) { ?>
                    <option value='<?=$pr[id_provinsi]?>' <?php if($pr['id_provinsi']==$r['id_kprovinsi']){echo "selected";} ?> ><?=$pr[provinsi]?></option>
                <?php  }
                ?>
              </select>
              <br><br>
              <label for='ra'>Nama kota</label>
              <input type=text name='nama' class='form-control' min='0' value='<?=$r[kota]?>' required>
              
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
<?php    }
    
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