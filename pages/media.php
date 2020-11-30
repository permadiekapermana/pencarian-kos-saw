<?php

  error_reporting(0);
  session_start(0);
  if($_SESSION[leveluser]=='admin' || $_SESSION[leveluser]=='kepala'){ 
  ?>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
      <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-success fixed-top">
                <a class="navbar-brand" href="media.php?module=home" width=100%>ADMIN KOSANKU</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        
                       
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?=$_SESSION[namalengkap]?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="?module=user"><i class="fa fa-user-circle  mr-2"></i>Account</a>
                                <a class="dropdown-item" href="?module=password"><i class="fas fa-cog mr-2"></i>Setting Password</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
       <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider text-success">
                                Menu
                            </li>
                            
                            
                            
                            <li class="nav-item ">
                                <a class="nav-link text-info" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms text-info"></i>Lokasi Kos</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=tempat">Tempat Kos</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=detail">Detail</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=kategori">Kategori</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link text-warning" href="modul/mod_laporan/cetak_tempat.php" target="_blank">Cetak laporan</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-info" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table text-info"></i>Pengguna</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=pengguna">Data pengguna</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=pemilik">Data Pemilik</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="modul/mod_laporan/lap_pelanggan.php" target="?module=pengguna">Lap pengguna</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            
                            <li class="nav-item">
                                <a class="nav-link text-info" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox text-info"></i>Utility <span class="badge badge-secondary">New</span></a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=user">Tambah User</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=password">Ubah Password</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=data-provinsi">Data Provinsi</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=data-kota">Data Kota</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-info" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox text-info"></i>Sistem <span class="badge badge-secondary">New</span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=data-fasilitas">Nilai Fasilitas</a>
                                        </li>
                                        

                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=data-harga">Nilai Harga</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=data-kategori">Nilai Kategori</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=normalisasi">Normalisasi</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link text-info" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns text-info"></i>Rulle Base K Mean</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=analisis">Analisis</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=analisis&act=lihatterdekat">Kos Terdekat</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="modul/mod_laporan/cetak_tempat.php" target="_blank">Cetak laporan</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link text-info" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-map-marker-alt text-info"></i>Maps</a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-warning" href="?module=maps">Lokasi Kos</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
		<div class="dashboard-wrapper">
		<div class="container-fluid  dashboard-content">
        <?php include "content.php";?> 
		</div>
		</div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/custom-js/jquery.multi-select.html"></script>
    <script src="../assets/libs/js/main-js.js"></script>
</body>
 
</html>

<?php }else{

    echo "<script>window.alert('Anda bukan admin, dilarang akses....');
          window.location=('../login-pemilik.html')</script>";
}?>