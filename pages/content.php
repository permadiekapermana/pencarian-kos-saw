<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
include "../config/fungsi_rupiah.php";

// Bagian Home
if ($_GET[module]=='home'){
  if ($_SESSION['leveluser']=='admin'){
  echo "<h2>Selamat Datang</h2>
          <p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Administrator.<br> Silahkan klik menu pilihan yang berada 
          di sebelah kiri untuk mengelola content website.</p>
          <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  }
}

// Bagian Modul
elseif ($_GET[module]=='user'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_users/users.php";
  }
}
elseif ($_GET[module]=='pengguna'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_pengguna/pengguna.php";
  }
}

// Bagian Kategori
elseif ($_GET[module]=='password'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_password/password.php";
  }
}

// Bagian Produk
elseif ($_GET[module]=='kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}


// Bagian Order
elseif ($_GET[module]=='tempat'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_tempat/tempat.php";
  }
}
elseif ($_GET[module]=='maps'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_tempat/maps.php";
  }
}
// Bagian Profil
elseif ($_GET[module]=='detail'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_detail/detail.php";
  }
}

// Bagian Order
elseif ($_GET[module]=='analisis'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_analisis/analisis.php";
  }
}



// Bagian Banner
elseif ($_GET[module]=='riwayat'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_riwayat/riwayat.php";
  }
}
elseif ($_GET[module]=='masa'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_masa/masa.php";
  }
}
elseif ($_GET[module]=='jurusan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_jurusan/jurusan.php";
  }
}
elseif ($_GET[module]=='pegawai'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_pegawai/pegawai.php";
  }
}
elseif ($_GET[module]=='keahlian'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_keahlian/keahlian.php";
  }
}
elseif ($_GET[module]=='ketentuan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_ketentuan/ketentuan.php";
  }
}
elseif ($_GET[module]=='bidang'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_bidang/bidang.php";
  }
}
elseif ($_GET[module]=='penempatan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_penempatan/penempatan.php";
  }
}
elseif ($_GET[module]=='analisis'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_analisis/analisis.php";
  }
}
// Bagian Kota/Ongkos Kirim
elseif ($_GET[module]=='laporan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_laporan/laporan.php";
  }
}

// Bagian Password
elseif ($_GET[module]=='password'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_password/password.php";
  }
}

// Bagian Password
elseif ($_GET[module]=='pemilik'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_pemilik/pemilik.php";
  }
}

// Bagian fasilitas
elseif ($_GET[module]=='data-fasilitas'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_fasilitas/fasilitas.php";
  }
}

elseif ($_GET[module]=='data-harga'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_harga/harga.php";
  }
}

elseif ($_GET[module]=='data-kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori-nilai.php";
  }
}

elseif ($_GET[module]=='normalisasi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_normalisasi/normalisasi.php";
  }
}


elseif ($_GET[module]=='data-provinsi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_povkota/provinsi.php";
  }
}


elseif ($_GET[module]=='data-kota'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_povkota/kota.php";
  }
}


// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
