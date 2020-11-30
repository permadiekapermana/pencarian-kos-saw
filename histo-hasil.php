<main role='main'>
      <!-- Content --> 
      <article>
        <header class='section background-primary text-center'>
            <h1 class='text-white margin-bottom-0 text-size-50 text-thin text-line-height-1'>DETAIL HISTORI PENCARIAN</h1>
        </header>
        <div class='section background-white'> 
          <div class='line'>
          <h2 class="card-title">Pencarian yang pernah dilakukan</h2>
          
          
            <div class='margin'>
              <!-- Contact Form -->
              <!-- here -->
              <div class='s-12 m-12 l-12'>
                  <div class="card w-100">
                    <div class="card-body">
                      <table class="table">
                        <th>#</th>
                        <th>Nama Kosan</th>
                        <th>Telp</th>
                        <th>Tarif</th>
                        <th>Fasilitas</th>
                        <th>Kategori</th>
                        <th>Alamat</th>
                        <tbody>
                         <?php 
                          
                          $Q = mysql_query("SELECT * FROM perhitungan,tempat,users WHERE perhitungan.id_tempat=tempat.id_tempat 
                            AND tempat.id_user =users.username AND session='$_GET[id]'");
                          
                          if(mysql_num_rows($Q)>0){
                            while ($kost = mysql_fetch_array($Q)) {$no++;
                         ?>   

                          <tr>
                            <td><?=$no?></td>
                            <td><?=$kost[nama_tempat]?></td>
                            <td><?=$kost[no_telp]?></td>
                            <td><?=number_format($kost[harga_tarif])." - ".$kost[tarif]?></td>
                            <td><?=$kost[detail_fasilitas]?></td>

                            <td>
                                <?php $J = mysql_query("SELECT * FROM kategori WHERE id_kategori='$kost[id_kategori]'");
                                  $jm = mysql_fetch_array($J);
                                  echo $jm[nama_kategori];
                                ?>
                            </td>
                            <td><?=$kost[alamat]?></td>
                          </tr>

                          <?php
                              }$no=0;
                             
                            }else{
                              echo "<tr><td colspan='5'>kamu belum memiliki histori pencarian</td></tr>";
                            }
                           ?> 
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div> 
				     <!-- here -->
              

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