<!DOCTYPE html>
<?php
include "../config/koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username = antiinjection($_POST[username]);
$pass     = antiinjection(md5($_POST[password]));

$login=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  //session_register("namauser");
 // session_register("namalengkap");
  //session_register("passuser");
  //session_register("leveluser");

  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[level];
  
  header('location:media.php?module=home');
}
else{
  echo "<link href=../config/userstyle.css rel=stylesheet type=text/css>";
  echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
}
?>
<header>
<style 
url(https://fonts.googleapis.com/css?family=Lato:400,700);
<body>
body{
  font-family: 'Lato', sans-serif;
  text-align: center;
  background: #2c3e50;
  color: #ecf0f1;
}

h1 {
  font-size: 50px;
  text-shadow: 0  5px #000;
}

#button {
  height: 130px;
  width: 300px;
  margin: 0 auto;
}

#button div {
  position: absolute;
  transition:all .2s;
}

#floor {
  height: 50px;
  width: 300px;
  background: #34495e;
  border-radius: 50%;
  margin-top: 80px;
  z-index: -1;
}

#top {
  background: #e74c3c;
  height: 40px;
  width: 250px;
  border-radius: 50%;
  z-index:1;
  margin-left: 25px;
}

#bottom {
  background: #c0392b;
  height: 40px;
  width: 250px;
  border-radius: 50%;
  margin-top: 80px;
  margin-left: 25px;
}

#body {
  background: #c0392b;
  width: 250px;
  border-radius: 0;
  margin-left: 25px;
}

.body {
  height: 80px;
  margin-top: 20px;
}

#button:hover {
  cursor: pointer;
}

.top-click {
  margin-top: 40px;
} 

.body-click  {
  height: 40px;
  margin-top: 60px;
} 

#button:hover #floor{
 background: #95a5a6;
} 

@-webkit-keyframes pulse-bg  
{
0% {background-color: #ff2d2d;} 
100% {background-color: #2c3e50;}
}

.pulse-bg {-webkit-animation: pulse-bg 0.5s infinite; }
</style></body></header>
<h1>Alert Button</h1>
<div id="button">
  <a href="login.php">
  <div id="top"></div>
  <div id="bottom"></div>
  <div id="body" class="body"></div>
  <div id="floor"></div>
</div>
</a>
<p>TOLONG TEKAN TOMBOL DI TENGAH JIKA INGIN MENGULANG</p>