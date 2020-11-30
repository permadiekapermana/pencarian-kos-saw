<?php 
$edit=mysql_query("SELECT * FROM tempat WHERE id_tempat='$_GET[id]'");
    $r=mysql_fetch_array($edit);
echo"<main role='main'>
      <!-- Content -->
      <article>
        <header class='section background-primary text-center'>
            <h1 class='text-white margin-bottom-0 text-size-50 text-thin text-line-height-1'>EDIT DAFTAR MITRA</h1>
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
                  <h4 class='text-strong margin-bottom-0'>EDIT DATA KOSAN AGEN</h4>
                  <p>Data pendukungan Kosan<br>
                     No Pemilik<br>
                     Fasilitas kamar
                  </p>               
                </div>
                
                
              </div>
              
              <!-- Contact Form -->
              <div class='s-12 m-12 l-6'>
                <h2 class='text-uppercase text-strong margin-bottom-30'>EDIT BIODATA KOSAN</h2>
                <form class='customform' action='update-agen.html' method='post'>
				<input type='hidden' name='id_detail' value='$r[id_detail]'>
                  <div class='line'>
                    <div class='margin'>
					<div class='s-12'> 
                    <input name='nama_kosan' value='$r[nama_kosan]' class='subject border-radius' placeholder='Nama kosan' title='Nama kosan' type='text' />
                  </div>
					<div class='s-12 m-12 l-6'>
                        <input name='nama_pemilik' value='$r[nama_pemilik]' class='name border-radius' placeholder='Nama pemilik Kos' title='Nama pemilik Kos' type='text' />
                      </div>
                      <div class='s-12 m-12 l-6'>
                        <input name='nohp_pemilik' value='$r[nohp_pemilik]' class='required email border-radius' placeholder='No HP pemilik Kos' title='No HP pemilik Kos' type='text' />
                      </div>
					  <div class='s-12 m-12 l-6'>
                        <input name='nama_pengelola' value='$r[nama_pengelola]' class='name border-radius' placeholder='Nama pengelola kosan' title='Nama pengelola kosan' type='text' />
                      </div>
                      <div class='s-12 m-12 l-6'>
                        <input name='nohp_pengelola' value='$r[nohp_pengelola]' class='required email border-radius' placeholder='No HP pengelola kosan' title='No HP pengelola kosan' type='text' />
                      </div>
                      
                    </div>
                  </div>
                  
                  
				  <div class='s-12'>
                    <textarea name='alamat_lengkap' class='required message border-radius' placeholder='Alamat lengkap' rows='3'>$r[alamat_lengkap]</textarea>
                  </div>
				  <div class='s-12'>


<select name='id_kategori' class='form-control'>";
 
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }
    echo "</select>


                  </div>
				  <div class='s-12 m-12 l-6'>
                        <input name='luas_kamar' value='$r[luas_kamar]' class='name border-radius' placeholder='Luas kamar (tanpa KM) 3 x 3 M' title='Luas kamar (tanpa KM)' type='text' />
                      </div>
                      <div class='s-12 m-12 l-6'>
                        <input name='jml_kamar' value='$r[jml_kamar]' class='required email border-radius' placeholder='Jumlah kamar' title='Jumlah kamar' type='text' />
                      </div>
				  <div class='s-12 m-12 l-6'>
                        <input name='jml_kosong' value='$r[jml_kosong]' class='name border-radius' placeholder='Jumlah Kamar Kosong' title='Jumlah Kamar Kosong' type='text' />
                      </div>
                      <div class='s-12 m-12 l-6'>
                         <select name='tarif'>
						 <option value=0 selected>- Pilih Tarif -</option>
						 <option value=Bulanan>Bulanan</option>
						 <option value=Harian>Harian</option>
						 <option value=Mingguan>Mingguan</option>
						 </select>
                      </div>
                      <div class='s-12'>
                    <textarea name='petalokasi'  value='$r[petalokasi] class='required message border-radius' placeholder='Kordinat Peta Lokasi' rows='2'></textarea>
                  </div>
					  <div class='s-12 m-12 l-6'>
                        <input name='harga_tarif'  value='$r[harga_tarif]' class='name border-radius' placeholder='Sesuai tarif per' title='Sesuai tarif per' type='text' />
                      </div>
                  

                      <div class='s-12 m-12 l-6'>
                        <input name='tambahan_harga' value='$r[tambahan_harga]' class='required email border-radius' placeholder='Biaya lain' title='Biaya lain' type='text' />
                      </div>


                      <div class='s-12' >
                      <select name='fasilitas'>
                              <option value=0 selected>- Pilih Fasilitas -</option>
                              <option value=Isi>Isi</option>
                              <option value=Kosong>Kosong</option>
                     </select>
                    </div>            
                   
                  <div class='s-12'>
                    <textarea name='detail_fasilitas' class='required message border-radius' placeholder='Fasilitas ' rows='3'></textarea>
                  </div>




					  <div class='s-12'>
                    <textarea name='keterangan' value='$r[keterangan]' class='required message border-radius' placeholder='Keterangan lainnya' rows='3'></textarea>
                  </div>
                  
          <div class='s-12'>
                  <div class='s-12'>
                    <textarea name='frame' class='required message border-radius' placeholder='URL Frame ' rows='3'></textarea>
                  </div>
                  
          <div class='s-12'>
          <label> Foto pendukung</label><br>
                     <input type='file' name='fupload' id='exampleInputFile' class='form-control'>
                  </div>

                  <div class='s-12  m-12 l-6'><button class='submit-form button background-primary border-radius text-white' type='submit'>Submit Button</button></div> 
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
    </main>";

?> 