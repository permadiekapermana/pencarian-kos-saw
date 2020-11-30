<?php 
session_start();
if($_SESSION[emails] !="" && $_SESSION[nomor] !=""){

$email =$_SESSION[emails];
$no_hp =$_SESSION[nomor];
$login=mysql_query("SELECT * FROM users WHERE username='$_GET[id]'")or die(mysql_error());
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
?>
	
<main role='main'>
      <!-- Content -->
      <article>
        <header class='section background-primary text-center'>
            <h1 class='text-white margin-bottom-0 text-size-50 text-thin text-line-height-1'>UBAH PROFIL</h1>
        </header>
        <div class='section background-white'> 
          <div class='line'>
            <div class='margin'>
              
              <!-- Company Information -->
              <div class='s-12 m-12 l-12'>
                <h2 class='text-uppercase text-strong margin-bottom-30'>INFORMASI</h2>
                <div class='float-left'>
                  <i class='icon-placepin background-primary icon-circle-small text-size-20'></i>
                </div>
                <div class='margin-left-80 margin-bottom'>
                  <h4 class='text-strong margin-bottom-0'>BIODATA PEMILIK</h4>
                  <br>
                  <form class='customform' action='' method='POST'>
                    <div class='s-12 m-12 l-6'>
                        <input type='hidden' name='id_detail' value=''>
                        <div class='line'>
                          <div class='margin'>
                            <div class='s-11'> 
                                <label>Username</label>
                                <input name='username' value='<?php echo $r[username];?>' class='subject border-radius' type='text' readonly/>
                            </div>      
                          </div>
                        </div>
                        <div class='line'>
                          <div class='margin'>
                            <div class='s-11'> 
                                <label>Nama Lengkap</label>
                                <input name='nama' value='<?php echo $r[nama_lengkap];?>' class='subject border-radius' title='Nama kosan' type='text' required/>
                            </div>      
                          </div>
                        </div>

                        <div class='line'>
                          <div class='margin'>
                            <div class='s-11'> 
                                <label>Email</label>
                                <input name='email' value='<?php echo $r[email];?>' class='subject border-radius'  type='email' required/>
                            </div>      
                          </div>
                        </div>

                        <div class='line'>
                          <div class='margin'>
                            <div class='s-11'> 
                                <label>Nomor Hp</label>
                                <input name='hp' value='<?php echo $r[no_telp];?>' class='subject border-radius'  type='text' required/>
                            </div>      
                          </div>
                        </div>

                        <div class='line'>
                          <div class='margin'>
                            <div class='s-11'> 
                                <label>Level</label>
                                <input name='lvl' value='<?php echo $r[level];?>' class='subject border-radius'  type='text' readonly/>
                            </div>      
                          </div>
                        </div>
                   
                      <br>
                        <div class='s-11'> 
                           <p>Perubahan akan disimpan sesuai field yang terisi</p>
                           <input type="submit" value="Simpan Perubahan" class="button background-primary" name="simpan"> 
                        </div>
                     </div>
                   </form>    
                  
                  <div class='s-12 m-12 l-6'>
                    
                    <div class='card'>
                      <div class='card-body'>
                        <h3>GANTI PASSWORD</h3><hr>
                        <div class='row'>
                          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
                            <form method='POST' action=''>
                              <label>Tulis Password Lama</label>
                              <input type=text name='pass_lama' class='form-control' required>
                              <br>
                              <label>Tulis Password Baru</label>
                              <input type=text name='pass_baru' class='form-control' required>
                              <br>
                              <label>Tulis Lagi Password Baru</label>
                              <input type=text name='pass_ulangi' class='form-control' required>
                              <br>
                              <input type='submit' value='Ubah Password' class='btn btn-primary btn-sm' name="ubahpw">
                              <input type='button' value='Kembali' class='btn btn-danger btn-sm' onclick=self.history.back()>
                            
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
                  </div>
                      <?php 
                              if(isset($_POST[ubahpw])){
                                  $r=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='$_GET[id]'"));

                                  $pass_lama=md5($_POST[pass_lama]);
                                  $pass_baru=md5($_POST[pass_baru]);

                                  if (empty($_POST[pass_baru]) OR empty($_POST[pass_lama]) OR empty($_POST[pass_ulangi])){
                                    echo "<p align=center>Anda harus mengisikan semua data pada form Ganti Password.<br />"; 
                                    echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";
                                  }else{ 
                                  // Apabila password lama cocok dengan password admin di database
                                      if ($pass_lama==$r[password]){
                                        // Pastikan bahwa password baru yang dimasukkan sebanyak dua kali sudah cocok
                                        if ($_POST[pass_baru]==$_POST[pass_ulangi]){
                                          mysql_query("UPDATE users SET password = '$pass_baru' WHERE username='$_GET[id]'");
                                          echo "<p align=center>Password berhasil diubah, silahkan login ulang.<br />";
                                        }
                                        else{
                                          echo "<p align=center>Password baru yang Anda masukkan sebanyak dua kali belum cocok.<br />"; 
                                          echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";  
                                        }
                                      }else{
                                        echo "<p align=center>Anda salah memasukkan Password Lama Anda.<br />"; 
                                        echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";
                                      }
                                  }
                              }
                          ?>
                 </div>
               </div>
              
                  </div>
              </div> 
            </div>  
        </div> 
      </article>
	  
      <div class='background-primary padding text-center'>
        <a href='/'><i class='icon-facebook_circle icon2x text-white'></i></a> 
        <a href='/'><i class='icon-twitter_circle icon2x text-white'></i></a>
        <a href='/'><i class='icon-google_plus_circle icon2x text-white'></i></a>
        <a href='/'><i class='icon-instagram_circle icon2x text-white'></i></a>                                                                        
      </div>
      <!-- MAP -->
      <div class='s-12 grayscale center'>  	  
        <iframe src='https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1459734.5702753505!2d16.91089086619977!3d48.577103681657675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssk!2ssk!4v1457640551761' width='100%' height='450' frameborder='0' style='border:0'></iframe>
      </div>
</main>

<?php

}else{

      echo "<script>window.alert('Anda belum login bro...');
            window.location=('login-pemilik.html')</script>";

}
?> 

<?php
  if(isset($_POST[simpan])){
    $nama  =$_POST[nama];
    $email =$_POST[email];
    $hp    =$_POST[hp];
    
    
      $Q=mysql_query("UPDATE users SET 
        nama_lengkap='$nama',
        email='$email',
        no_telp='$hp'
        WHERE username='$_GET[id]'");
      if($Q){
        echo "<script>alert('Data berhasil disimpan....');</script>";
        echo "<script>document.location = 'panel-pemilik.html';</script>";
      }

   

  }



  


?>