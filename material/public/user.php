<?php

include '../koneksi/koneksi.php';
$us = $_GET['$id'];
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login/login_form.php');
}
if ($_SESSION['username'] === $us) {
    $hasil = "sama";
} else {
    $hasil = "beda";
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <style>
        li {
            list-style: none;
            margin: 0px 10px;
        }

        .navbar {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .gap {
            width: 100%;
            height: 80px;
        }

        .fi {
            height: 100vh;
            overflow: hidden;
        }

        .btn a {
            color: black;
            text-decoration: none;
        }

        .bg-grad {
            background: rgb(255, 158, 0);
            background: linear-gradient(47deg, rgba(255, 158, 0, 1) 0%, rgba(255, 0, 86, 1) 49%, rgba(93, 9, 121, 1) 100%)border-box;
        }

        .bg-grad-out {
            background: linear-gradient(rgb(255, 255, 255), white) padding-box, linear-gradient(45deg, rgb(255, 153, 0), rgb(241, 26, 241), rgb(36, 12, 247)) border-box;
        }

        .btn p {
            color: white;
        }

        .bg-grad-out span {
            color: black;
        }

        .delete {
            margin-left: 20px;
        }

        .sec-text {
            color: rgb(143, 143, 143);
        }

        .w-10 {
            width: 10%;
        }

        .card-title a {
            color: black;
            text-decoration: none;
        }

        .hidd {
            visibility: hidden;
            display: none;
            height: 0px;
        }

        .sidebar {
            height: 80vh;
        }
        .info-2{
            height: 350px;
        }
    </style>
</head>

<body>
    <header>
        <?php include "component/header.php" ?>
    </header>
    <div class="fi">
        <div class="gap"></div>
        <div class="container-xxl d-flex">

            <?php include "component/sidebar.php" ?>
            <?php include "component/main.php" ?>
            <?php include "component/album.php" ?>
        </div>
    </div>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>