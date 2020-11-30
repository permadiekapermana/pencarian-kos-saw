<!DOCTYPE html>
<?php 
session_start();
include "config/koneksi.php";
include "config/library.php";
$localIP = getHostByName(getHostName());
if($_GET['module']!='hasilspk'){
    unset($_SESSION['cari']);
}
?> 
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="refresh">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pencarian Kosanku</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="css/template-style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
    <script type="text/javascript" src="js/validation.js"></script> 
    <script type="text/javascript" src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>  
    <style type="text/css">
       a:hover{text-decoration: none;}
    </style>
  </head>  
  
  <body class="size-1140">
  	<!-- PREMIUM FEATURES BUTTON -->
  	<a target="_blank" class="hide-s" href="../template/prospera-premium-responsive-business-template/" style="position:fixed;top:120px;right:-14px;z-index:10;"><img src="img/premium-features.png" alt=""></a>
    <!-- HEADER -->
    <header role="banner">    
      <!-- Top Bar -->
      <div class="top-bar hide-s hide-m background-white">
        <div class="line">
          <div class="s-12 m-6 l-6">
            <div class="top-bar-contact">
              <p class="text-size-12">Kontak Kami: 0899 9371 409 | <a class="text-orange-hover" href="mailto:ahmad.kaelani9@gmai.com">ahmad.kaelani9@gmail.com</a></p>
            </div>
          </div>
          <div class="s-12 m-6 l-6">
            <div class="right">
              <ul class="top-bar-social right">
                <li><a href="/"><i class="icon-facebook_circle text-orange-hover"></i></a></li>
                <li><a href="/"><i class="icon-twitter_circle text-orange-hover"></i></a> </li>
                <li><a href="/"><i class="icon-google_plus_circle text-orange-hover"></i></a></li>
                <li><a href="/"><i class="icon-instagram_circle text-orange-hover"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Top Navigation -->
      <nav class="background-white background-primary-hightlight">
        <div class="line">
		
          <div class="s-12 l-2">
            <a href="profil-kami.html" class="logo"><img src="img/logo-free.png" alt=""></a>
          </div>
          <div class="top-nav s-12 l-10">
            
            <ul class="right chevron">
              <li><a href="profil-kami.html">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="cari-kategori.html">Kategori</a></li>
			        <li>
                <?php if($_SESSION[emails]!="" && $_SESSION[nomor]!=""){?>
                    <a href="logout-pemilik.html">Logout</a></li>
                <?php }else{ ?>
                    <a href="login-pemilik.html">Login Pemilik</a></li>

                <?php }?>
              <li>
                <?php if($_SESSION[emails]!="" && $_SESSION[nomor]!=""){?>
                    <a href="panel-pemilik.html">My Panel</a>
                <?php }else{ ?>  
                    <a href="daftar-pemilik.html">Mitra</a>
                <?php }?> 

              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
    <!-- MAIN -->
    <main role="main">
	<?php if ($_GET['module']=='home' || $_GET['module']==''){ 
	mysql_query("DELETE  FROM sementara ");
	
	
	?>
      <!-- Main Carousel -->
      <section class="section background-dark">
        <div class="line">
          <div class="carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-wide-arrows">
    <?php 
		$tampil=mysql_query("SELECT * FROM tempat, users where tempat.id_user=users.username ORDER BY users.username DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
			?> 
			<div class="item">
              <div class="s-12 center">
                <img src="foto_fasilitas/<? echo"kecil_$r[gambar]";?>" width="50px">
                <div class="carousel-content">
                  <div class="padding-2x">
                    <div class="s-12 m-12 l-8">
                      <p class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1"><? echo"$r[nama_agen]";?> </p>
                      <p class="text-white text-size-16 margin-bottom-40">alamat<br> <? echo"$r[alamat]";?></p>  
                    </div>                  
                  </div>
                </div>
              </div>
            </div>
			
			<? } ?> 
            
          </div>  
        </div>
      </section>

<!-- Section 2 -->
	  <main role="main">
      <!-- Content -->
      <article>
        <div class="section background-white"> 
          <div class="line">
            <div class="margin">
              
              <!-- Company Information -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Mitra Kosan</h2>
                <div class="float-left">
                  <i class="icon-placepin background-primary icon-circle-small text-size-20"></i>
                </div>
		<? $tampil=mysql_query("SELECT * FROM tempat, users where tempat.id_user=users.username ORDER BY  rand() limit 1 ");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ ?> 
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0">Nama Kosan :</h4>
                  <p><? echo"$r[nama_tempat]"; ?> <br>
                     <img src="foto_fasilitas/<? echo"$r[gambar]"; ?>"; width="20%" > <br>
                    
                  </p>               
                </div>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0">Keterangan :</h4>
                  <p><? echo"$r[detail_fasilitas]"; ?> <br>
                    
                  </p>               
                </div>
                <div class="float-left">
                  <i class="icon-paperplane_ico background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0">Alamat : </h4>
                  <p><? echo"$r[alamat]"; ?><br>
                     <br>
                  </p>              
                </div>
                <div class="float-left">
                  <i class="icon-smartphone background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80">
                  <h4 class="text-strong margin-bottom-0">Kodinat Lokasi : </h4>
                  <p><? echo"$r[kordinat]"; ?><br>
                     <br>
                     <br>
                  </p>             
                </div>
	<? } ?> 
              </div>
              
   <!-- Contact Form -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Pencarian Kos</h2>

                <form class="customform" method="post" action="hasil.html">
                <span class="badge badge-danger"><a data-toggle="modal" data-target="#myModal">Pilih Lokasi Saya</a></span>
                  <div class="line">
                    <div class="margin">
                      <div class="s-12 m-12 l-12">
                        <input name="kordinat" id="ltlong" class="required email border-radius" placeholder="Your e-mail" title="Your e-mail" type="text" required/>
                         <input name="ip" id="ip" value="<?=$localIP?>" type="hidden" required/>
                         <!-- <input name="ss" id="ss" value="<?=$_SESSION['cari']?>" type="hidden" required/> -->
                      </div>
                      
                    </div>
                  </div>
                  <div class="s-12"> 
                    
                   <?php echo"<select name='kd_kategori' class='subject border-radius' required>
                            <option value=0 selected>- Pilih Kategori -</option>";
                            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
                            while($r=mysql_fetch_array($tampil)){
                              echo "<option value=$r[ket_nilai]>$r[nama_kategori]</option>";
                            }
                    echo "</select>";  ?>
                    <hr>
                  </div>
                  <div class="s-12">
                  <h3 class="text-uppercase text-strong margin-bottom-30">PILIH HARGA</h3>
                  
                    <?php $tampil=mysql_query("SELECT * FROM harga ORDER BY id_harga ASC");
                        while($r=mysql_fetch_array($tampil)){
                            echo "<label><input type='radio' name='harga' value='$r[harga_nilai]' required>IDR ".number_format($r[harga_m])." S/D IDR ".number_format($r[harga_s])."</label><br>";
                            echo "<input type='hidden' name='hrgm$r[harga_nilai]' value='$r[harga_m]' required>";
                            echo "<input type='hidden' name='hrgs$r[harga_nilai]' value='$r[harga_s]' required>";
                        }
                    ?>
                    <hr>
                  </div>
                  <div class="s-12">
                  <h3 class="text-uppercase text-strong margin-bottom-30">PILIH RADIUS JARAK</h3>
                      <label><input type='radio' name='radius' value='3' required>3 Km </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label><input type='radio' name='radius' value='5' required>5 Km </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label><input type='radio' name='radius' value='7' required>7 Km </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label><input type='radio' name='radius' value='10' required>10 Km </label>
                  </div>
                  <div class="s-12">
                  <h3 class="text-uppercase text-strong margin-bottom-30">PILIH FASILITAS</h3>
                      <label><input type='checkbox' name='fasil[]'>Air Conditioner </label>&nbsp;&nbsp;&nbsp;
                      <label><input type='checkbox' name='fasil[]'>Lemari Es</label>&nbsp;&nbsp;&nbsp;
                      <label><input type='checkbox' name='fasil[]'>Televisisi</label><br>
                  </div>
                  <div class="s-12">
                      <label><input type='checkbox' name='fasil[]'>Kamar Mandi Luar</label>&nbsp;&nbsp;&nbsp;
                      <label><input type='checkbox' name='fasil[]'>Kamar Mandi Dalam</label>&nbsp;&nbsp;&nbsp;
                      <label><input type='checkbox' name='fasil[]'>Kipas Angin</label><br>
                  </div>
                      <label><input type='checkbox' name='fasil[]'>Lemari</label>&nbsp;&nbsp;&nbsp;
                      <label><input type='checkbox' name='fasil[]'>Kasur</label><br><br>
                      <button class="submit-form button background-primary border-radius text-white" type="submit">CARI LOKASI</button></div> 
                      <a class="submit-form button background-danger border-radius text-white" href="histori-cari.html">Lihat histori saya</a>
                  </div>
                  
                  
                </form>
              </div>  
            </div>  
          </div> 
        </div> 
      </article>
      <div class="background-primary padding text-center">
        <a href="/"><i class="icon-facebook_circle icon2x text-white"></i></a> 
        <a href="/"><i class="icon-twitter_circle icon2x text-white"></i></a>
        <a href="/"><i class="icon-google_plus_circle icon2x text-white"></i></a>
        <a href="/"><i class="icon-instagram_circle icon2x text-white"></i></a>                                                                        
      </div>
      
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
              <!-- heading modal -->
              <div class="modal-header">
                <button id="btnAction" class="btn btn-danger btn-xs" onClick="locate()">Lokasi Saya</button>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>
              <!-- body modal -->
              <div class="modal-body">
                <?php include"pick.php"; ?>
              </div>
              <!-- footer modal -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- Modal -->




      <!-- MAP -->
      <div class="s-12  center">  	  
       
      <iframe src='https://www.google.com/maps/d/u/4/embed?mid=1QfkMvXtARanmG4mDPxrMN6rqrvL7pclQ' width="100%" height="450" frameborder="0" style="border:0"></iframe>
	  </div>
    </main>
      
      <hr class="break margin-top-bottom-0">
      
      <!-- Section 4 --> 
      <section class="section background-white">
        <div class="line">
          <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50">Mitra <span class="text-primary">Kosan</span></h2>
          <div class="carousel-default owl-carousel carousel-wide-arrows">
            <?php 
			$tampil2=mysql_query("SELECT * FROM tempat ORDER BY id_tempat DESC");
    $no=1;
    while ($r3=mysql_fetch_array($tampil2)){
		
		
			?>
			
            <div class="item"> 
              <div class="margin"> 
			  <? $kos=mysql_query("SELECT * FROM tempat where id_tempat='$r3[id_tempat]' ORDER BY rand() limit 2");
    
    while ($r2=mysql_fetch_array($kos)){ ?>
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius margin-m-bottom">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/"><img src="<? echo"foto_fasilitas/$r2[gambar]";?> " alt=""></a>
                      </div>
                      <div class="s-12 m-12 l-8 margin-m-bottom">
                        <h3><a class="text-dark text-primary-hover" href="detail_kosan-<?php echo "$r3[id_agen]"; ?>.html"><?php echo "$r3[nama_tempat] "; ?> </a></h3>
                        <p><?php echo "$r2[nama_pengelola] "; ?>.</p>
                        <a class="text-more-info text-primary-hover" href="detailkosan<?=$r2[id_tempat]?>.html">Read more</a>
                      </div>
                    </div>  
                  </div>
                </div>
				
				<? } ?> 
				
              </div>
            </div>
			
			
	<?   
	} ?>  
			
          </div>
        </div>    
      </section>
	  <footer>
      <!-- Social -->
      <div class="background-primary padding text-center">
        <a href="/"><i class="icon-facebook_circle icon2x text-white"></i></a> 
        <a href="/"><i class="icon-twitter_circle icon2x text-white"></i></a>
        <a href="/"><i class="icon-google_plus_circle icon2x text-white"></i></a>
        <a href="/"><i class="icon-instagram_circle icon2x text-white"></i></a>                                                                        
      </div>
      
      <!-- Main Footer -->
      <section class="section background-dark">
        <div class="line">
          <div class="margin">
            <!-- Collumn 1 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">Mitra Kosan </h4>
              <p class="text-size-20"><em>"Kemudahan anda kebahagian kami"</em><p>
                            
              <div class="line">
                <h4 class="text-uppercase text-strong margin-top-30">Tentang Kami</h4>
                <div class="margin">
                  <div class="s-12 m-12 l-4 margin-m-bottom">
                    <a class="image-hover-zoom" href="/"><img src="img/blog-04.jpg" alt=""></a>
                  </div>
                  <div class="s-12 m-12 l-8 margin-m-bottom">
                    <p>Perusahaan kami hadir sejak dari tahun 2019.. kami hadir untuk anda..</p>
                    <a class="text-more-info text-primary-hover" href="about.html">Read more</a>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Collumn 2 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">Alamat</h4>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-placepin text-primary text-size-11"></i>
                </div>
                <div class="s-11 m-11 l-10 margin-bottom-10">
                  <p><b>Adress:</b> Responsive Street 7, London, UK</p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-mail text-primary text-size-11"></i>
                </div>
                <div class="s-11 m-11 l-10 margin-bottom-10">
                  <p><a href="/" class="text-primary-hover"><b>E-mail:</b> contact@sampledomain.com</a></p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-smartphone text-primary text-size-11"></i>
                </div>
                <div class="s-11 m-11 l-10 margin-bottom-10">
                  <p><b>Phone:</b> 0700 000 987</p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-twitter text-primary text-size-11"></i>
                </div>
                <div class="s-11 m-11 l-10 margin-bottom-10">
                  <p><a href="/" class="text-primary-hover"><b>Twitter</b></a></p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-facebook text-primary text-size-11"></i>
                </div>
                <div class="s-11 m-10 l-10">
                  <p><a href="/" class="text-primary-hover"><b>Facebook</b></a></p>
                </div>
              </div>
            </div>
            
            <!-- Collumn 3 -->
            <div class="s-12 m-12 l-4">
              <h4 class="text-uppercase text-strong">Hubungi Kami</h4>
              <form class="customform text-white" action="#" method="post" >
                <div class="line">
                  <div class="margin">
                    <div class="s-12 m-12 l-6">
                      <input name="email" class="required email border-radius" placeholder="Your e-mail" title="Your e-mail" type="text" />
                    </div>
                    <div class="s-12 m-12 l-6">
                      <input name="name" class="name border-radius" placeholder="Your name" title="Your name" type="text" />
                    </div>
                  </div>
                </div>
                <div class="s-12">
                  <textarea name="message" class="required message border-radius" placeholder="Your message" rows="3"></textarea>
                </div>
                <div class="s-12"><button name="simpan" class="submit-form button background-primary border-radius text-white" type="submit">Submit Button</button></div> 
              </form>
            </div>
          </div>
        </div>
      </section>
	  <? 
	  if (isset($_POST[simpan])){
			$email=$_POST[email];
			$name=$_POST[name];
			$message=$_POST[message];
			
			$query=mysql_query("insert into hubungi (email,name,message) values
			('$email','$name','$message')");
			if ($query){
			echo "Data Telah Disimpan";
			}
			else
			{
			echo "Gagal Menyimpan";
			}

	  }
	  
	  ?> 
	  
      <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 38, 51, 0.80);">
      
      <!-- Bottom Footer -->
      <section class="padding background-dark">
        <div class="line">
          <div class="s-12 l-6">
            <p class="text-size-12">Copyright 2019, Vision Design - graphic zoo</p>
            <p class="text-size-12">All images have been purchased from Bigstock. Do not use the images in your website.</p>
          </div>
          <div class="s-12 l-6">
            <a class="right text-size-12" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">Design and coding<br> by Responsee Team</a>
          </div>
        </div>
      </section>
    </footer>
	<?php } elseif ($_GET['module']=='lokasikami'){ 
$pel="KS.";
$y=substr($pel,0,2);
$query=mysql_query("select * from pengguna where substr(id_pengguna,1,2)='$y' order by id_pengguna desc limit 0,1");
$row=mysql_num_rows($query);
$data=mysql_fetch_array($query);

if ($row>0){
$no=substr($data['id_pengguna'],-3)+1;}
else{
$no=1;
}
$nourut=1000+$no;
$nopel=$pel.substr($nourut,-3);
	    mysql_query("INSERT INTO pengguna( id_pengguna, email, nama_pengguna,  kd_kategori, kordinat_pel, tgl_pengguna)
										  										  
						VALUES	('$nopel', '$_POST[email]','$_POST[nama]','$_POST[kd_kategori]','$_POST[kordinat]','$tgl_sekarang')");
						$utama=explode(",",$_POST[kordinat]);
	
	
$_SESSION[id_pengguna] = $nopel;	
	
	?>
	<section class="section background-dark">
        <div class="line">
          <div class="margin">
            <!-- Collumn 1 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">Mitra Kosan </h4>
              <p class="text-size-20"><em>"Kemudahan anda kebahagian kami"</em><p>
                            
              <div class="line">
                <h4 class="text-uppercase text-strong margin-top-30">Tentang Kami</h4>
                <div class="margin">
                  <div class="s-12 m-12 l-4 margin-m-bottom">
                    <a class="image-hover-zoom" href="#"><img src="img/blog-04.jpg" alt=""></a>
                  </div>
                  <div class="s-12 m-12 l-8 margin-m-bottom">
                    <p>Perusahaan kami hadir sejak dari tahun 2019.. kami hadir untuk anda..</p>
                    <a class="text-more-info text-primary-hover" href="#">Read more</a>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Collumn 2 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">Daftar Lokasi Kosan KU</h4>
			  <? 
			  $tampil=mysql_query("SELECT * FROM users, tempat where users.username=tempat.id_user ORDER BY tempat.id_tempat DESC");
			  while ($r=mysql_fetch_array($tampil)){
		$data=explode(",",$r[kordinat]);
		$jarak2=sqrt((($data[0]- $utama[0]) *  ($data[0]- $utama[0]) ) + (($data[1]- $utama[1]) * ($data[1]- $utama[1])))  ;
		
		$jarak=round($jarak2,2);
		
		echo"
		<form action='simpan-temp.html' method='post'>
		
		<input type='hidden' name='id_agen[]' value='$r[id_tempat]'>";
		echo"<input type='hidden' name='jarak[]' value='$jarak'>";
		
			  ?>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-placepin text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-8">
                  <p><b>Adress:</b><? echo" $r[nama_tempat]"; ?><br>
				          <b>Cluster :</b> <?=$jarak?><br>
				          <b>Kordinat:</b> <? echo" $r[kordinat]"; ?></p>
                </div>
              </div>
              
              <? } 
			  echo"<button name='simpan' class='submit-form button background-primary border-radius text-white' type='submit'>Cari Terdekat</button> </form>"; ?>
              
              
            </div>
            
            <!-- Collumn 3 -->
            <div class="s-12 m-12 l-4">
              <h4 class="text-uppercase text-strong">Lokasi Kosan KU</h4>
       
	   <iframe src='https://www.google.com/maps/d/embed?mid=1P3MWPhkZwAZdqnZ800kD34aT7cO5Oz0O' width="100%" height="250" frameborder="0" style="border:0"></iframe>
	   
	   
            </div>
          </div>
        </div>
      </section>
	        <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 38, 51, 0.80);">
      
      <!-- Bottom Footer -->
      <section class="padding background-dark">
        <div class="line">
          <div class="s-12 l-6">
            <p class="text-size-12">Copyright 2019, UMC IT Cirebon</p>
            <p class="text-size-12">Aplikasi pencarian Kosan berbasis Web dan Android</p>
          </div>
          <div class="s-12 l-6">
            <a class="right text-size-12" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">Design and coding<br> by Responsee Team</a>
          </div>
        </div>
      </section>

	<? } elseif ($_GET['module']=='simpantemp'){  

	$id_agen=$_POST[id_tempat];
	$jml=count($id_agen);
	$jarak=$_POST[jarak];
	for ($i=0; $i<$jml; $i++){
	    mysql_query("INSERT INTO sementara(id_agen,
									jarak) 
                            VALUES('$id_agen[$i]',
                                   '$jarak[$i]')");	
	}
	
	$edit=mysql_query("SELECT * FROM tempat, users where tempat.id_user=users.username order by id_tempat DESC");
  $r2=mysql_fetch_array($edit);
	
	?>
  
	<section class="section background-dark">
        <div class="line">
          <div class="margin">
            <!-- Collumn 1 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">Mitra Mami Kosan Terdekat</h4>
              <p class="text-size-20"><em><a href="direction/index.php" target="_blank"><? echo "$r2[nama_tempat]";?></a></em><p>
                            
              <div class="line">
                <h4 class="text-uppercase text-strong margin-top-30"><? echo "$r2[alamat]";?></h4>
                <div class="margin">
                  <div class="s-12 m-12 l-4 margin-m-bottom">
                    <a class="image-hover-zoom" href="#"><img src="foto_fasilitas/<? echo "$r2[gambar]"; ?> " alt=""></a>
                  </div>
                  <div class="s-12 m-12 l-8 margin-m-bottom">
                    <p><? echo "$r2[kordinat]";?></p>
                    <a class="text-more-info text-primary-hover" href="detailfasilitas<? echo"$r2[id_tempat]"; ?>.html">Lihat Detail</a>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Collumn 2 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
          <h4 class="text-uppercase text-strong">Daftar Lokasi Kosan KU yang lain</h4>
			  <? 
			  $tampil=mysql_query("SELECT * FROM tempat order by id_tempat DESC");
			  while ($r=mysql_fetch_array($tampil)){
			  ?>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-placepin text-primary text-size-4"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <b style="font-size:12px;">Adress:</b><a style="font-size:12px;" class="text-more-info text-primary-hover" href="detailfasilitas<? echo"$r[id_tempat]"; ?>.html"><? echo" $r[alamat]"; ?></a>
				          <p style="font-size:12px;"><b>Kordinat:</b> <? echo" $r[kordinat]"; ?></p>
                </div>
              </div>
              
              <? } ?>
              
              
            </div>
            
            <!-- Collumn 3 -->
            <div class="s-12 m-12 l-4">
              <h4 class="text-uppercase text-strong">Lokasi Kosan KU</h4>
       <? echo"$r2[frame]"; ?>
	  
	   
	   
            </div>
          </div>
        </div>
      </section>
	        <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 38, 51, 0.80);">
      
      <!-- Bottom Footer -->
      <section class="padding background-dark">
        <div class="line">
          <div class="s-12 l-6">
            <p class="text-size-12">Copyright 2019, Vision Design - graphic zoo</p>
            <p class="text-size-12">All images have been purchased from Bigstock. Do not use the images in your website.</p>
          </div>
          <div class="s-12 l-6">
            <a class="right text-size-12" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">Design and coding<br> by Responsee Team</a>
          </div>
        </div>
      </section>
	<? } elseif ($_GET['module']=='lihatdetail'){ ?> 
	<section class="section background-white">
        <div class="line">
          <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50">Mitra <span class="text-primary">Kosan</span></h2>
          <div class="carousel-default owl-carousel carousel-wide-arrows">
            <?php 
			$tampil2=mysql_query("SELECT * FROM detail where id_tempat='$_GET[id]' ");
    $no=1;
    while ($r3=mysql_fetch_array($tampil2)){
		
		
			?>
			
            <div class="item"> 
              <div class="margin"> 
			  <? $kos=mysql_query("SELECT * FROM detail where id_tempat='$r3[id_tempat]' ORDER BY rand() limit 2");
    
    while ($r2=mysql_fetch_array($kos)){ ?>
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius margin-m-bottom">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/"><img src="<? echo"foto_fasilitas/$r2[foto]";?> " alt=""></a>
                      </div>
                      <div class="s-12 m-12 l-8 margin-m-bottom">
                        <h3><a class="text-dark text-primary-hover" href="/"><?php echo "$r3[nama_tempat] "; ?> </a></h3>
                        <p><?php echo "$r2[nama] "; ?>.</p>
                        <a class="text-more-info text-primary-hover" href="/"></a>
                      </div>
                    </div>  
                  </div>
                </div>
				
				<? } ?> 
				
              </div>
            </div>
			
			
	<?   
	} 
	?>  
	
	
			
          </div>
        </div>    
      </section>
	<? }  
	elseif ($_GET['module']=='daftarpemilik'){   
	include "daftar.php"; }

  elseif ($_GET['module']=='panelpemilik'){   
  include "panel-pemilik.php"; }

  elseif ($_GET['module']=='profilpemilik'){   
  include "profil-pemilik.php"; }

  elseif ($_GET['module']=='histori'){   
  include "histori-cari.php"; }

   elseif ($_GET['module']=='histohasil'){   
  include "histo-hasil.php"; }

  elseif ($_GET['module']=='logoutpemilik'){   
  include "logout-pemilik.php"; }

  elseif ($_GET['module']=='tambahkost'){   
  include "tambah_kost.php"; }

  elseif ($_GET['module']=='editagen'){   
  include "edit_agen.php"; } 

  elseif ($_GET['module']=='editkosan'){   
  include "edit_kost.php"; }  
	
  elseif ($_GET['module']=='carikategori'){   
  include "cari_kategori.php"; 
  
  }elseif ($_GET['module']=='hasilspk'){   
  include "hasilspk.php"; 
  
  } elseif ($_GET['module']=='simpanagen'){ 
session_start();	 
	 $_SESSION[no_hp]     = $_POST[no_hp];
	     mysql_query("INSERT INTO agen(nama_agen,
                                    email,
                                    no_hp,
									petalokasi,
                                    alamat_lengkap) 
                            VALUES('$_POST[nama_agen]',
                                   '$_POST[email]',
                                   '$_POST[no_hp]',
								   '$_POST[petalokasi]',
								   '$_POST[alamat_lengkap]')");
	 
		header('location:daftar-lanjutan.html'); }

   elseif ($_GET['module']=='updateagen'){ 
session_start();   

    mysql_query("UPDATE agen SET nama_agen = '$_POST[nama_agen]',
                  email = '$_POST[email]',
                  no_hp = '$_POST[no_hp]',
                  petalokasi = '$_POST[petalokasi]',
                  alamat_lengkap = '$_POST[alamat_lengkap]'
                             WHERE id_agen   = '$_POST[id_agen]'");

   
    header('location:profil-kami.html'); }

   elseif ($_GET['module']=='updatekosan'){ 


    mysql_query("UPDATE detail_agen SET nama_kosan = '$_POST[nama_kosan]',
                  nama_pemilik = '$_POST[nama_pemilik]',
                  nohp_pemilik = '$_POST[nohp_pemilik]',
                  nama_pengelola = '$_POST[nama_pengelola]',
                  nohp_pengelola = '$_POST[nohp_pengelola]'
                   id_kategori = '$_POST[id_kategori]',
                  luas_kamar = '$_POST[luas_kamar]',
                  jml_kamar = '$_POST[jml_kamar]',
                  jml_kosong = '$_POST[jml_kosong]',
                  tarif = '$_POST[tarif]',
                  harga_tarif = '$_POST[harga_tarif]',
                  tambahan_harga = '$_POST[tambahan_harga]',
                  keterangan = '$_POST[keterangan]',
                  alamat_lengkap = '$_POST[alamat_lengkap]'
                             WHERE id_detail   = '$_POST[id_detail]'");

   
    header('location:profil-kami.html'); }
		
	elseif ($_GET['module']=='daftarlanjutan'){  
		include "daftar-lanjutan.php";  }		
		
	 elseif ($_GET['module']=='simpanlanjutan'){ 
	 
	$edit=mysql_query("SELECT * FROM agen WHERE no_hp='$_POST[no_hp]'");
    $r=mysql_fetch_array($edit);
	 
	     mysql_query("INSERT INTO detail_agen(id_agen,
                                    nama_kosan,
                                    nama_pemilik,
									nohp_pemilik,
                                    nama_pengelola,
									nohp_pengelola,
                                    id_kategori,
									luas_kamar,
                                    jml_kamar,
									jml_kosong,
									tarif,
                                    harga_tarif,
									tambahan_harga,
									keterangan) 
                            VALUES('$r[id_agen]',
                                   '$_POST[nama_kosan]',
                                   '$_POST[nama_pemilik]',
								   '$_POST[nohp_pemilik]',
								   '$_POST[nama_pengelola]',
								   '$_POST[nohp_pengelola]',
                                   '$_POST[id_kategori]',
                                   '$_POST[luas_kamar]',
								   '$_POST[jml_kamar]',
								   '$_POST[jml_kosong]',
								   '$_POST[tarif]',
                                   '$_POST[harga_tarif]',
								   '$_POST[tambahan_harga]',
								   '$_POST[keterangan]')");
	 
		header('location:daftar-lanjutan3.html'); }	
		elseif ($_GET['module']=='daftarlanjutan3'){   
	include "daftar-lanjutan3.php"; }
		
	elseif ($_GET['module']=='simpanlanjutan3'){
function UploadFasilitas($fupload_name){
  //direktori banner
  $vdir_upload = "foto_fasilitas/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
  
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  //Simpan dalam versi small 120 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 650;
  $dst_height = 230;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar di memori komputer

  imagedestroy($im);
}
		
$nama_file      = $_FILES['fupload']['name'];
$acak           = rand(1,99);
$nama_file_unik = $acak.$nama_file;

	
UploadFasilitas($nama_file_unik);
	
	$edit=mysql_query("SELECT * FROM detail_agen order by id_detail DESC limit 1 ");
    $r=mysql_fetch_array($edit);
	     mysql_query("INSERT INTO detail_fasilitas(id_detail,
                                    min_bayar,
                                    fasilitas,
									detail_fasilitas,
                                    foto_fasilitas,
									frame) 
                            VALUES('$r[id_detail]',
                                   '$_POST[min_bayar]',
                                   '$_POST[fasilitas]',
								   '$_POST[detail_fasilitas]',
								   '$nama_file_unik',
								   '$_POST[frame]')");
	
	header('location:profil-kami.html');
	
	}
elseif ($_GET['module']=='loginpemilik'){
	include "login-pemilik.php";
}
elseif ($_GET['module']=='ceklogin'){
	include "cek-login.php";
}
elseif ($_GET['module']=='tambahkost'){
  include "tambah_kost.php";
}

elseif ($_GET['module']=='detailfasilitas'){
	include "detail-fasilitas.php";
}
elseif ($_GET['module']=='detailkos'){
  include "detail_kosan.php";
}
elseif ($_GET['module']=='pesankamar'){ 
  
if($_POST[id_pengguna]==""){

}else{
      $pel="PS.";
      $y=substr($pel,0,2);
      $query=mysql_query("select * from pesanan where substr(id_pesanan,1,2)='$y' order by id_pesanan desc limit 0,1");
      $row=mysql_num_rows($query);
      $data=mysql_fetch_array($query);

      if ($row>0){
      $no=substr($data['id_pesanan'],-3)+1;}
      else{
      $no=1;
      }
      $nourut=1000+$no;
      $nopel=$pel.substr($nourut,-3);

          mysql_query("INSERT INTO pesanan(`id_pesanan`, `id_pengguna`, `jumlah`, `tgl_pesan`, `id_tempat`) 
                       VALUES('$nopel','$_POST[id_pengguna]','$_POST[jumlah_psn]','$tgl_sekarang','$_POST[id_tempat]')");
      	
        	echo "<script>window.alert('Terima kasih telah melakukan pemesanan kosan, Tunggu informasi selanjutnya via E-mail ya..');
              window.location=('profil-kami.html')</script>";
      }	
}
?> 	
		
    </main>
    
    <!-- FOOTER -->
     
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script>   
   </body>
</html>