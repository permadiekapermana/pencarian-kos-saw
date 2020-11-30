<?php

session_start();
//if($_SESSION[emails] =="" && $_SESSION[nomor]== ""){

?>

<main role='main'>
      <!-- Content -->
      <article>
        <header class='section background-primary text-center'>
            <h1 class='text-white margin-bottom-0 text-size-50 text-thin text-line-height-1'>CARI KATEGORI KOSAN</h1>
        </header>
        <div class='section background-white'> 
          <div class='line'>
            <div class='margin'>
              
              <!-- Company Information -->
              <div class='s-6 m-6 l-4'>
                <h2 class='text-uppercase text-strong margin-bottom-30'>KATEGORI KOSAN</h2>
                <div class='float-left'>
                  <img src="img/real.png" width="50px">
                </div>
                <div class='margin-left-80 margin-bottom'>
                  
                  <p>
                      <form action="" method="POST">
                      <h4 class='text-strong margin-bottom-0'>PILIH KOTA</h4><br>
                      <select style="width:100%; padding:8px;" name="kota" id="kota">
                           <option value="">---- Pilih Kota -----</option>
                           <?php

                              $qk = mysql_query("SELECT * FROM kota ORDER BY kota ASC");
                              while ($dk =mysql_fetch_array($qk)) {?>

                                <option value="<?=$dk[id_kota]?>" nama="<?=$dk[kota]?>"><?=$dk[kota]?></option>

                              <?php }?>
                         </select>
                         <br><br>
                         <h4 class='text-strong margin-bottom-0' id="tx-kt" style="display:none;">PILIH KATEGORI</h4><br>
                         <select style="width:100%; padding:8px; display:none;" name="kategori" id="drop" >
                           <option>---- Pilih Kategori -----</option>
                           <?php

                              $q = mysql_query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
                              while ($dt =mysql_fetch_array($q)) {?>

                                <option value="<?=$dt[id_kategori]?>" nama="<?=$dt[nama_kategori]?>"><?=$dt[nama_kategori]?></option>

                              <?php }?>
                         </select>
                         <input type="hidden" id="tk">
                         <input type="hidden" id="tag">
                      </form>


                      <br>
                      <br>
                      <span style="font-size:12px" >Hasil pencarian akan tampil disamping ya...</span>
                  </p>               
                </div>
                
                
              </div>
              
              <!-- Contact Form -->
              <div class='s-12 m-12 l-8'>
                  <div id="notif"></div>
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
// }else{
//  echo "<script>window.location=('panel-pemilik.html')</script>";
// }

?>



<script type="text/javascript">
$(document).ready(function(){
  $("#kota").on("change", function(){
      var p    = $("#kota option:selected").attr("value");
      var area = document.getElementById("drop");
      var jdl  = document.getElementById("tx-kt");
      var tag  = $("#tag").val();

      if(p!=""){
        area.style.display = "block";
        jdl.style.display = "block";
        document.getElementById("tk").value= p;
      }else{
        area.style.display = "none";
        jdl.style.display = "none";
       }

    });

    $("#drop").on("change", function(){
      var kode = $("#drop option:selected").attr("value");
      var nama = $("#drop option:selected").attr("nama");
      var ktk  = $("#tk").val();
      var tag  = $("#tag");

      if(kode!=""){
          tag.val(kode);
          $.ajax({
            type: 'POST',
            url:'carikos-kategori.php',
            data: {'kode':kode,'nama':nama,'p':ktk},
            success:function(data){
                   $('#notif').html(data);
            }

          });
      }
    });

  });   
</script>
