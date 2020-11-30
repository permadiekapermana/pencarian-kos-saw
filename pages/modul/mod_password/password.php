<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
    echo "
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
          <h3>GANTI PASSWORD</h3><hr>
          <div class='row'>
            <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
              <form method=POST action=modul/mod_password/aksi_password.php>
                <label>Tulis Password Lama</label>
                <input type=text name='pass_lama' class='form-control' required>
                <br>
                <label>Tulis Password Baru</label>
                <input type=text name='pass_baru' class='form-control' required>
                <br>
                <label>Tulis Lagi Password Baru</label>
                <input type=text name='pass_ulangi' class='form-control' required>
                <br>
                <input type=submit value='Proses' class='btn btn-primary btn-sm' >
                <input type=button value='Batal' class='btn btn-danger btn-sm' onclick=self.history.back()>
              
              </form>
            </div>

            <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
              <p>      
              <i class='fas fa-bullhorn'></i> Perhatian<br>
              Semua Field wajib untuk di isi.<br>
              <br>

              Perubahan data akan disimpan sesuai data yang terisi tiap Field.</p>
            </div>

          </div>
        </div>
      </div>
    </div>";
}
?>
