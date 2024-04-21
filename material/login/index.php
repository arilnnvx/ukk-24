<?php

@include 'koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
   header('location:login_form.php');
}

?>
<a href="logout.php">logout</a>