<?php 

$us = $_SESSION['username'];
$query = " SELECT * FROM user WHERE UserID = '$us'";
$sqltt = mysqli_query($conn, $query);
$result3t = mysqli_fetch_assoc($sqltt);

?>
<nav class="navbar bg-white navbar-expand-lg bg-body-tertiary  position-fixed z-3 mm-t">
    <div class="header bg-white d-flex justify-content-between align-items-center border">
        <div class="right d-flex">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <p class="main-text">galeri</p>
            <p>foto aril</p>
        </div>
        <div class="left d-flex">
            <div class="container-fluid">
            <p> Hello "<?= $result3t['NamaLengkap'] ?>"</p>
            </div>
            <button type="button" class="btn btn-l pp"><a href="login/logout">Logout</a></button>
            <div class="circle">
                <div class="in-circle">
                    <img width="45px" height="45px" src="img/logo.webp" alt="" />
                </div>
            </div>
        </div>
    </div>
</nav>
