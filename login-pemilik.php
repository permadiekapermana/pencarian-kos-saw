<?php
session_start();
if($_SESSION[emails] =="" && $_SESSION[nomor]== ""){

?>

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
                <h2 class='text-uppercase text-strong margin-bottom-30'>SELAMAT DATANG</h2>
                <div class='float-left'>
                  <i class='icon-placepin background-primary icon-circle-small text-size-20'></i>
                </div>
                <div class='margin-left-80 margin-bottom'>
                  <h4 class='text-strong margin-bottom-0'>Login Pemilik</h4>
                  <p>Agenda dapat melihat data kosan<br>
                     dapat melakukan edit data<br>
                     
                  </p>               
                </div>
                
                
              </div>
              
              <!-- Contact Form -->
              <div class='s-12 m-12 l-6'>
                <h2 class='text-uppercase text-strong margin-bottom-30'>LOGIN PEMILIK KOST</h2>
                <form class='customform' action='' method='POST'>
				
                  <div class='line'>
                    <div class='margin'>
					
                    
					         <div class='s-12 m-12 l-12'>
					           <input name='email' class='required email border-radius' placeholder='Your e-mail' title='Your e-mail' type='text' required/>
                    </div>
                      <div class='s-12 m-12 l-12'>
					             <input name='no' class='required email border-radius' placeholder='No HP Agen' title='No HP Agen' type='text' required/>
                    </div>
                      
                   
                  </div>

				  
                  <div class='s-12 m-12 l-4'><input class='submit-form button background-primary border-radius text-white' type='submit' value="MASUK"></div> 
                </form>
				
              </div> 
			<a href='daftar-agen.html'>*/ Buat Akun?</a>			  
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
 echo "<script>window.location=('panel-pemilik.html')</script>";
}

?>


<?php
  
  if(isset($_POST[email]) && isset($_POST[no])){
      $username = mysql_real_escape_string($_POST[email]);
      $no       = mysql_real_escape_string($_POST[no]);

      $qry = mysql_query("SELECT username, password FROM users WHERE username='$username' AND password='".md5($no)."' ")or die(mysql_error());

    if($qry){  
      if(mysql_num_rows($qry) > 0){
          

          $_SESSION[emails] = $_POST[email]; $_SESSION[nomor] = md5($_POST[no]);

           echo "<script>window.location=('panel-pemilik.html')</script>";

      }else{
        echo "<script>window.alert('Username anda tidak ditemukan...!')</script>";
      }

    }else{
       echo "<script>window.alert('Username anda tidak ditemukan...!')</script>";
    }

  }

?>