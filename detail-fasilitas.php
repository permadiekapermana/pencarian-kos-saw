<?php 
session_start();
$id_pengguna =  $_SESSION[id_pengguna];

$login=mysql_query("SELECT * FROM tempat,users WHERE tempat.id_user=users.username and tempat.id_tempat='$_GET[id]'");
$r=mysql_fetch_array($login);
echo"<main role='main'>
      <!-- Content -->
      <article>
        <header class='section background-primary text-center'>
            <h1 class='text-white margin-bottom-0 text-size-50 text-thin text-line-height-1'>DETAIL KOSAN</h1>
        </header>
        <div class='section background-white'> 
          <div class='line'>
            <div class='margin'>
              
              <!-- Company Information -->
              <div class='s-12 m-12 l-6'>
                <h2 class='text-uppercase text-strong margin-bottom-30'>DETAIL FOTO</h2>
                <div class='float-left'>
                  <i class='icon-placepin background-primary icon-circle-small text-size-20'></i>
                </div>
                <div class='margin-left-80 margin-bottom'>
                  <img src='foto_fasilitas/$r[gambar] ' >               
                </div>
                
                
              </div>
              
              <!-- Contact Form -->
              <div class='s-12 m-12 l-6'>
                <div class='margin-left-80 margin-bottom'>
                  <h4 class='text-strong margin-bottom-0'>DATA DETAIL KOSAN</h4>                  
                  <table>
                    <tr>
                      <td>Nama Kosan</td>
                      <td>: $r[nama_tempat]</td>
                    </tr>
                    <tr>
                      <td>Nama Pemilik</td>
                      <td>: $r[nama_lengkap]</td>
                    </tr>

                    <tr>
                      <td>Nomor Pemilik</td>
                      <td>: $r[no_telp]</td>
                    </tr>

                    <tr>
                      <td>Jumlah Kamar</td>
                      <td>: $r[jml_kamar] Kamar</td>
                    </tr>

                    <tr>
                      <td>Jumlah Kosong</td>
                      <td>: <b>$r[jml_kosong] Kamar</b></td>
                    </tr>

                    <tr>
                      <td>Penyewaan</td>
                      <td>: $r[tarif]</td>
                    </tr>
                    <tr>
                      <td>Harga Tarif</td>
                      <td>: Rp. $r[harga_tarif]</td>
                    </tr>
                    <tr>
                      <td>Alamat Kosan</td>
                      <td>: $r[alamat]</td>
                    </tr>
                    <tr>
                      <td>Fasilitas</td>
                      <td>: $r[detail_fasilitas]</td>
                    </tr>
                  </table>                  
                <h2>PESAN KAMAR</h2>     
                <form action='pesan-kamar.php' method='post'>
                
                <input type='hidden' name='id_tempat' value='$r[id_tempat]' class='required message border-radius'>
                <div class='form-group'>
                  <label>Nama Lengkap</label>
                  <input type='text' name='nama' placeholder='Nama Lengkap' class='form-control' >
                </div>
                <div class='form-group'>
                  <label>Email / No.Telp</label>
                  <input type='text' name='email'  placeholder='Email / Nomor Hp' class='form-control' >
                </div>

                <div class='form-group'>
                  <label>Jumlah Pesan Kamar</label>
                  <input type='number' name='jumlah_psn' value= '1' min='1' max='$r[jml_kosong]'  class='form-control' >
                  <input type='hidden' name ='id_pengguna' value='$id_pengguna' />
                  <input type='hidden' name ='kategori' value='$r[id_kategori]' />
                </div>
                <button class='submit-form button background-primary border-radius text-white' type='submit'>Minat Kamar</button>
                
                </form>
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
      $r[frame]
      </div>
    </main>";

?> 