<?php
session_start();
unset($_SESSION[emails]);
unset($_SESSION[nomor]);
session_destroy();

header('location:login-pemilik.html');
?>