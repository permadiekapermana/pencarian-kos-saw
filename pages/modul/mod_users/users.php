<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM users WHERE level = 'admin' or level='kepala' ORDER BY username");
    
    }
    else{
      $tampil=mysql_query("SELECT * FROM users 
                           WHERE username='$_SESSION[namauser]'");
      echo "<h2>User</h2>";
    }
    
    echo "
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
        <div class='row'>
          <div class='col-sm-6'>
              <h3>DATA ADMINISTRATOR</h3>
          </div> 
          <div class='col-sm-6 text-right'>
              <input type=button value='Tambah User' class='btn btn-primary btn-xs' onclick=\"window.location.href='?module=user&act=tambahuser';\">
          </div>   
        </div>  
            
            <div class='table-responsive '>
              <table class='table table-striped'><thead>
                    <tr>
                    <td class='left'>No</td>
                    <td class='left'>Username</td>
                    <td class='left'>Nama lengkap</td>
                    <td class='left'>Email</td>
                    <td class='left'>No.Telp/HP</td>
                    <td class='center'>Level</td>
                    <td class='center'>Blokir</td>
                    <td class='center'>Aksi</td>
                    </tr></thead> "; 
                    $no=1;
                    while ($r=mysql_fetch_array($tampil)){
                       echo "<tr><td class='left' width='25'>$no</td>
                             <td class='left'>$r[username]</td>
                             <td class='left'>$r[nama_lengkap]</td>
                		         <td class='left'><a href=mailto:$r[email]>$r[email]</a></td>
                		         <td class='left'>$r[no_telp]</td>
                		         <td class='center'>$r[level]</td>
                		         <td class='center'>$r[blokir]</td>
                             <td class='center' width='50'>";
                                if($r[level]=='kepala'){}else{
                                echo"<a href=?module=user&act=edituser&id=$r[id_session]>
                                <img src='../img/edit.png' border='0' title='edit' />
                                </a>";
                                }
                        echo"</td>
                             </tr>";
                      $no++;
                    }
        echo "</table>
         </div>
        </div>
      </div>
    </div>";
break;
  
case "tambahuser":
    if ($_SESSION[leveluser]=='admin'){
    echo "
    <div class='col-xl-16 col-lg-16 col-md-12 col-sm-12 col-12'>
      <div class='card'>
        <div class='card-body'>
          <h3>TAMBAH USER ADMIN</h3>
          <div class='row'>
          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
            <form method=POST action='$aksi?module=user&act=input'>
              <label for=''>Username</label>
              <input type=text name='username' id='username' class='form-control' required>
              <br>
              <label for=''>Password</label>
              <input type=text name='password' class='form-control' required>
              <br>
              <label for=''>Nama Lengkap</label>
              <input type=text name='nama_lengkap' size='30' class='form-control' required>
              <br>
              <label for='username'>Email</label>  
              <input type=email name='email' size='30' class='form-control' required>
              <br>
              <label for='username'>No.Telp</label> 
              <input type=number name='no_telp' size='20' class='form-control' required>
              <br>

              <input type='submit' value='Simpan' class='btn btn-success btn-sm'>
              <input type='button' value='Batal' class='btn btn-warning btn-sm' onclick=self.history.back()>
            </form>
          </div>

          <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12'>
            <p>      
            <i class='fas fa-bullhorn'></i> Perhatian<br>
            Semua Field wajib untuk di isi.<br>
            User yang ditambahkan merupakan user level Admin.<br><br>

            Perubahan data akan disimpan sesuai data yang terisi tiap Field.</p>
          </div>

          </div><!--row-->  
        </div>    
      </div>      
    </div>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM users WHERE id_session='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin'){
    echo "<h2>Edit User</h2>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
          <table class='list'>
          <tr><td class='left'>Username</td>     <td> : <input type=text name='username' value='$r[username]' disabled> **)</td></tr>
          <tr><td class='left'>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td class='left'>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
          <tr><td class='left'>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td class='left'>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=30 value='$r[no_telp]'></td></tr>";

    if ($r[blokir]=='N'){
      echo "<tr><td class='left'>Blokir</td>     <td> : <input type=radio name='blokir' value='Y'> Y   
                                           <input type=radio name='blokir' value='N' checked> N </td></tr>";
    }
    else{
      echo "<tr><td class='left'>Blokir</td>     <td> : <input type=radio name='blokir' value='Y' checked> Y  
                                          <input type=radio name='blokir' value='N'> N </td></tr>";
    }
    
    echo "<tr><td class='left' colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
          <tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }
    else{
    echo "<h2>Edit User</h2>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
          <input type=hidden name=blokir value='$r[blokir]'>
          <table>
          <tr><td class='left'>Username</td>     <td> : <input type=text name='username' value='$r[username]' disabled> **)</td></tr>
          <tr><td class='left'>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td class='left'>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
          <tr><td class='left'>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td class='left'>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=30 value='$r[no_telp]'></td></tr>";    
    echo "<tr><td class='left' colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
          <tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }
    break;  
}
}
?>
