<?php 
session_start();
if($_SESSION[emails] !="" && $_SESSION[nomor] !=""){

$email =$_SESSION[emails];
$no_hp =$_SESSION[nomor];
$login=mysql_query("SELECT * FROM users, tempat WHERE username='$email' AND password='$no_hp'")or die(mysql_error());
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

	
echo"<main role='main'>
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
                <h2 class='text-uppercase text-strong margin-bottom-30'>INFORMASI</h2>
                <div class='float-left'>
                  <i class='icon-placepin background-primary icon-circle-small text-size-20'></i>
                </div>
                <div class='margin-left-80 margin-bottom'>
                  <h4 class='text-strong margin-bottom-0'>BIODATA PEMILIK</h4>
                  <p>Nama :<a href='' title='Edit Biodata'>$r[nama_lengkap] </a><br>
                     Email :$r[email]<br>
          					 No HP :$r[no_telp]<br><br>
          					 <a href='profil-pemilik$r[username].html' style='padding:5px;' class='background-primary border-radius text-white' type='submit'>Ubah</a>
                     <br><br>
                     <a href ='logout-pemilik.html' style='background:red;' class='submit-form button border-radius text-white' >KELUAR</a>
                     <a href='tambah-kost.html' class='submit-form button background-primary border-radius text-white' type='submit'>TAMBAH KOST-AN</a>
                  </p>               
                </div>
                
                
              </div>
              
              <!-- Contact Form -->
              <div class='s-12 m-12 l-6'>
            
              <div class='s-12 m-12 l-4'>
                  </div> 
              </div>
              <div class='s-12 m-12 l-6'>
              
                
				
              <div class='line'>
              <div class='margin'>
					    <span style='color:#000; font-size:22px' class='text-uppercase text-strong'>DATA PEMESAN KOSAN</span>
              <table>
                <tr style='font-weight:bold;'>
                  <td>No</td>
                  <td>Nama pemesan</td>
                  <td>Email</td>
                  <td>Nama Kosan</td>
                  <td>Jumlah pesanan</td>
                </tr>";
					     $edit88=mysql_query("SELECT * FROM tempat WHERE id_user='$r[username]'");
               $r8=mysql_fetch_array($edit88);
	
					    $tampil=mysql_query("SELECT * FROM pesanan, pengguna,tempat where pesanan.id_pengguna=pengguna.id_pengguna and pesanan.id_tempat=tempat.id_tempat and pesanan.id_tempat  ='$r8[id_tempat]'");
              $no=1;
              while ($r2=mysql_fetch_array($tampil)){
					
    					echo"<tr>
                      <td>$no</td>
                      <td>$r2[nama_pengguna]</td>
                      <td>$r2[email]</td>
                      <td>$r2[nama_tempat]</td>
                      <td>$r2[jumlah]</td>";
    					$no++;
					
	             }
					
					echo"</table> 
                      
                   
                  </div>
              </div> 

          <div class='line'>
             <div class='margin'>
           <br>
           <span style='color:#000; font-size:22px' class='text-uppercase text-strong'>DATA KOST-AN</span>
           <table><tr  style='font-weight:bold;'><td>No</td><td>Nama Kosan</td><td>Pemilik</td><td>No Hp</td><td>kosong</td><td>Aksi</td></tr>";
           $edit88=mysql_query("SELECT * FROM tempat, users WHERE id_user='$r[username]' AND tempat.id_user=users.username");

           while ($r3=mysql_fetch_array($edit88)){
                    
                    echo"<tr>
                    <td>$no</td>
                    <td>$r3[nama_tempat]</td>
                    <td>$r3[nama_lengkap]</td>
                    <td>$r3[no_telp]</td>
                    <td>$r3[jml_kosong]</td>
                    <td><a href='editkosan$r3[id_tempat].html'>Edit</a></td>";
                    $no++;
                    
            }
          
          echo"</table> 
                      
                   
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
    </main>";

}else{

      echo "<script>window.alert('Anda belum login bro...');
            window.location=('login-pemilik.html')</script>";

}
?> 