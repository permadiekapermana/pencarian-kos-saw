<?php 
$login=mysql_query("SELECT * FROM users, tempat WHERE users.username=tempat.id_user AND tempat.id_tempat ='$_GET[id]'")or die(mysql_error());
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