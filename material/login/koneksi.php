<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "galeri_aril";
if (!$conn = mysqli_connect($host, $user, $pass, $db)) {
    echo "Database tidak merespon";
}
