<?php  
  session_start(); 
  
?>
<main role='main'>
      <!-- Content -->
      <article>
        <header class='section background-primary text-center'>
            <h1 class='text-white margin-bottom-0 text-size-50 text-thin text-line-height-1'>TAMBAH KOSAN</h1>
        </header>
        <div class='section background-white'> 
          <div class='line'>
            <div class='margin'>
              <h2 class='text-uppercase text-strong margin-bottom-30'>TAMBAH BIODATA KOSAN</h2>
              <!-- Company Information -->
              <form class='customform' action='' method='post' enctype='multipart/form-data'>
              <div class='s-12 m-12 l-6'>
                <!-- <h2 class='text-uppercase text-strong margin-bottom-30'>LANGKAH TAMBAH KOSAN</h2>
                <div class='float-left'>
                  <i class='icon-placepin background-primary icon-circle-small text-size-20'></i>
                </div>
                <div class='margin-left-80 margin-bottom'>
                  <h4 class='text-strong margin-bottom-0'>TAMBAH DATA KOSAN </h4>
                  <p>Data pendukungan Kosan<br>
                     No Pemilik<br>
                     Fasilitas kamar
                  </p>               
                </div> -->
                
                
                  <input type='hidden' name='id_detail' value=''>
                  <div class='line'>
                    <div class='margin'>
                   <div class='s-11'> 
                    <label>Nama Kost</label>
                    <input name='nama_kosan' value='<?php echo $foto;?>' class='subject border-radius' placeholder='Nama kosan' title='Nama kosan' type='text' required/>
                  </div>
          
                      
                    </div>
                  </div>
                  
                  
                  <div class='s-11'>
                    <label>Alamat Lengkap Kost</label>
                    <textarea name='alamat_lengkap' class='required message border-radius' placeholder='Alamat lengkap' rows='3' required></textarea>
                  </div>
                  <div class='s-11'>
                  <label>Kategori</label>

                    <select name='id_kategori' class='form-control' required><?php
                     
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
                      ?></select>


                  </div>



                      <div class='s-11'>
                        <label>Luas Kamar</label>
                        <input name='luas_kamar' value='' required class='name border-radius' placeholder='Luas kamar (tanpa KM) 3 x 3 M' title='Luas kamar (tanpa KM)' type='text' />
                      </div>
                      <div class='s-11'>
                        <label>Jumlah Kamar</label>
                        <input name='jml_kamar' value='' required class='required email border-radius' placeholder='Jumlah kamar' title='Jumlah kamar' type='text' />
                      </div>
                      <div class='s-11'>
                        <label>Kamar Kosong</label>
                        <input name='jml_kosong' value='' required class='name border-radius' placeholder='Jumlah Kamar Kosong' title='Jumlah Kamar Kosong' type='text' />
                      </div>
                      <div class='s-11'>
                        <label>Tarif Kost</label>
                         <select name='tarif' required>
                         <option value=0 selected>- Pilih Tarif -</option>
                         <option value=Bulanan>Bulanan</option>
                         <option value=Harian>Harian</option>
                         <option value=Mingguan>Mingguan</option>
                         </select>
                      </div>
                
              </div>
              
              <!-- Contact Form -->
              <div class='s-12 m-12 l-6'>
                  <div class='s-12 m-12 l-12'>
                    <label>Kota</label>
                    <select style="width:100%; padding:8px;" name="kota" id="kota">
                           <option value="">---- Pilih Kota -----</option>
                           <?php

                              $qk = mysql_query("SELECT * FROM kota ORDER BY kota ASC");
                              while ($dk =mysql_fetch_array($qk)) {?>

                                <option value="<?=$dk[id_kota]?>" nama="<?=$dk[kota]?>" <?php if($dk[id_kota]==$r[id_kota]){echo "selected";}?> ><?=$dk[kota]?></option>

                              <?php }?>
                     </select>
                  </div>
                  <div class='s-12 m-12 l-6'>
                    <label>Harga Tarif</label>
                        <input name='harga_tarif' required value='' class='name border-radius' placeholder='Sesuai tarif per' title='Sesuai tarif per' type='text' />
                  </div>
                  

                  <div class='s-12'>
                    <label>Lokasi (Longitude, Latitude)</label>
                    <textarea name='petalokasi' required value='' class='required message border-radius' placeholder='Kordinat Peta Lokasi' rows='2'></textarea>
                  </div>
					       

                  <div class='s-12' >
                    <label>Fasilitas</label>
                      <select name='fasilitasdrp' id='dropdown' required>
                              <option selected>- Pilih Fasilitas -</option>
                              <option value='Isi'>Isi</option>
                              <option value='Kosong'>Kosong</option>
                     </select>
                  </div>            
                   
                  <div class='s-12'>
                    <label>Keterangan Fasilitas</label>
                    <textarea name='fasilitas' required class='required message border-radius' id='ketfas' placeholder='Fasilitas' rows='3'></textarea>
                  </div>

					        <div class='s-12'>
                    <label>Keterangan Lainnya</label>
                    <textarea name='lainnya' value='' class='required message border-radius' placeholder='Keterangan lainnya' rows='3'></textarea>
                  </div>
                  
                 <div class='s-12'>
                    <div class='s-12'>
                    <textarea name='frame' required class='required message border-radius' placeholder='URL Frame ' rows='3'></textarea>
                    </div>
                 </div>        
                  <div class='s-12'>
                      <label> Foto pendukung</label><br>
                     <input type='file' required name='fupload' id='exampleInputFile' class='form-control'>
                  </div>

                  <div class='s-12  m-12 l-12'>
                    <input class='submit-form button background-primary border-radius text-white' type='submit' value='Tambahkan' name="tambahkan">
                  </div> 
               
              </div>
           </form>
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
$pel="KS.";
$y=substr($pel,0,2);
$query=mysql_query("select * from tempat where substr(id_tempat,1,2)='$y' order by id_tempat desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_tempat'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);

  if(isset($_POST[tambahkan])){
    include"config/upload_foto.php";
      $nama_kost      = $_POST[nama_kosan];
      $alamat_lengkap = $_POST[alamat_lengkap];
      $kategori       = $_POST[id_kategori];
      $luas_kamar     = $_POST[luas_kamar];
      $Jumlah_kamar   = $_POST[jml_kamar];
      $kamar_kosong   = $_POST[jml_kosong];
      $tarif          = $_POST[tarif];
      $harga_tarif    = $_POST[harga_tarif];
      $petalokasi     = $_POST[petalokasi];
      $fasilitasdrp   = $_POST[fasilitasdrp];
      $fasilitas      = $_POST[fasilitas];
      $lainnya        = $_POST[lainnya];
      $frame          = $_POST[frame];
      $kota           = $_POST[kota];
      $foto           = $_FILES['fupload']['name'];
      $idpemilik      = $_SESSION[emails];
      UploadFasilitas($foto);

      $qry = mysql_query("INSERT INTO tempat(`id_tempat`, `id_kategori`, `nama_tempat`, `keterangan`, `alamat`, `luas_kamar`, `jml_kamar`, 
                          `jml_kosong`, `tarif`, `harga_tarif`, `fasilitas`, `detail_fasilitas`, `kordinat`, `gambar`, `frame`, `id_user`,`id_kota`) 
                          
                          VALUES('$nopel','$kategori','$nama_kost','$lainnya',
                                  '$alamat_lengkap','$luas_kamar','$Jumlah_kamar','$kamar_kosong',
                                  '$tarif','$harga_tarif','$fasilitasdrp ','$fasilitas','$petalokasi',
                                  '$nama_file_unik','$frame','$idpemilik','$kota')
                        ")or die(mysql_error());
      if($qry){
         echo "<script>window.alert('Berhasil menambahkan data...')</script>";

      }else{
       echo "<script>window.alert('Data gagal ditambahkan..!')</script>";

      }

  }

?>


<!-- disable input type when selected -->
<script type="text/javascript">
  var sel = document.getElementById("dropdown"), text = document.getElementById("ketfas");
  sel.onchange = function(e) {
    text.disabled = (sel.value == "Kosong");
  };
</script>