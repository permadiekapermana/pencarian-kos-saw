<main role='main'>
      <!-- Content -->
      <article>
        <header class='section background-primary text-center'>
            <h1 class='text-white margin-bottom-0 text-size-50 text-thin text-line-height-1'>DAFTAR MITRA</h1>
        </header>
        <div class='section background-white'> 
          <div class='line'>
            <div class='margin'>
              
              <!-- Company Information -->
              <div class='s-12 m-12 l-6'>
                <h2 class='text-uppercase text-strong margin-bottom-30'>LANGKAH MENJADI MITRA</h2>
                <div class='float-left'>
                  <i class='icon-placepin background-primary icon-circle-small text-size-20'></i>
                </div>
                <div class='margin-left-80 margin-bottom'>
                  <h4 class='text-strong margin-bottom-0'>1. Langkah 1</h4>
                  <p>Input Biodata diri anda<br>
                     Email<br>
                     dan Lokasi Kosan Anda
                  </p>               
                </div>
                
                
              </div>
              
              <!-- Contact Form -->
              <div class='s-12 m-12 l-6'>
                <h2 class='text-uppercase text-strong margin-bottom-30'>Data Mitra</h2>
                <form class='customform' action='' method='post'>
                  <div class='line'>
                    <div class='margin'>
					          <div class='s-12 m-12 l-6'>
                        <input name='nama' class='name border-radius' placeholder='Nama Lengkap' title='Nama Lengkap' type='text' required/>
                      </div>
                      <div class='s-12 m-12 l-6'>
                        <input name='email' class='required email border-radius' placeholder='Your e-mail' title='Your e-mail' type='text' required/>
                      </div>
                      
                    </div>
                  </div>
                  <div class='s-12'> 
                    <input name='no' class='subject border-radius' placeholder='No telp' title='No Telp (no HP)' type='text' required/>
                  </div>
                  
				          <div class='s-12'>
                    <textarea name='alamat' class='required message border-radius' placeholder='Alamat lengkap' rows='3' required></textarea>
                  </div>
                  <div class='s-12 m-12 l-4'><input class='submit-form button background-primary border-radius text-white' name='tbdaftar' type='submit' value="DAFTAR">
                  </div> 
                </form>
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
 
  $nama   = mysql_real_escape_string($_POST[nama]);
  $no     = mysql_real_escape_string($_POST[no]);
  $email  = mysql_real_escape_string($_POST[email]);
  $alamat = mysql_real_escape_string($_POST[alamat]);
  $level  = mysql_real_escape_string("user");

if(isset($_POST[tbdaftar])){
  $qry = mysql_query("INSERT INTO users (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`)
               VALUES ('$email','".md5($no)."','$nama','$email','$no','$level','N','')");
  if($qry){
      echo "<script>window.alert('Pendaftaran berhasil...');
            window.location=('login-pemilik.html')</script>";
  }else{
      echo "<script>window.alert('Gagal melakukan pendaftaran!')</script>";
       
  }
  
}
?>