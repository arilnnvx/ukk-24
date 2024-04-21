<?php
$us = $_GET['$id'];
$query = " SELECT * FROM user WHERE UserID = '$us'";
$sql = mysqli_query($conn, $query);

$result3 = mysqli_fetch_assoc($sql);

$queryFoto = " SELECT * FROM foto WHERE UserID = '$us'";
$sqlFoto = mysqli_query($conn, $queryFoto);


if (!isset($_SESSION['username'])) {
    header('location:login/login_form.php');
}
$usn = $_SESSION['username'];

?>

<div class="main w-75 m">
    <div class="profil he-p d-flex ">
        <div class="l h-100   w-25 d-flex flex-column  justify-content-center align-items-center   ">
            <div class="circ-2 m-2 ">
                <img width="100px" height="100px" src="../img/logo.webp" alt="" />
            </div>
            <!-- nama -->
            <h5>@<?= $result3['NamaLengkap'] ?></h5>
        </div>
        <!-- right colloum -->
        <div class="r w-75 d-flex justify-content-center">
            <div class="nn m-5  d-flex flex-column   align-items-center ">
                <div class="no">
                    <h5>10</h5>
                </div>
                <div class="itm">
                    <p>postingan</p>
                </div>
            </div>
            <div class="nn m-5 d-flex flex-column   align-items-center ">
                <div class="no">
                    <h5>10</h5>
                </div>
                <div class="itm">
                    <p>suka</p>
                </div>
            </div>
            <div class="nn m-5 d-flex flex-column   align-items-center ">
                <div class="no">
                    <h5>10</h5>
                </div>
                <div class="itm">
                    <p>komentar</p>
                </div>
            </div>
            <!-- right colloum end-->

        </div>
    </div>
    <div class="main-content d-flex">
        <div class="rig w-25 m-3">
            <div class="cgr d-flex <?php if ($hasil == "beda") {
                                        echo "hidd";
                                    } elseif ($hasil == "sama") {
                                        echo "he";
                                    } else {
                                        echo "tam";
                                    }
                                    ?>">
                <div class="edit fs-10 mb-3">
                    <a class="mod" data-bs-toggle="modal" data-bs-target="#exampleModal-2">Edit Profile</a>
                </div>
                <div class="delete fs-10"> <a href="">Delete account</a></div>
            </div>

            <div class="info-2">
                <?= $result3['deskripsi'] ?>
            </div>
            <center> <button type="button" class="btn justify-content-center <?php if ($hasil == "beda") {
                                                                                    echo "hidd";
                                                                                } elseif ($hasil == "sama") {
                                                                                    echo "he";
                                                                                } else {
                                                                                    echo "tam";
                                                                                }
                                                                                ?>  bg-grad w-100 mt-3 " data-bs-toggle="modal" data-bs-target="#exampleModal-album">
                    <p>Tambah Foto</p>
                </button></center>
        </div>
        <div class="lef tw w-75 card d-flex flex-row flex-wrap overflow-scroll">

        <?php while ($resultFoto = mysqli_fetch_assoc($sqlFoto)) : ?>
                <div class="m-f fr">
                    <div class="img post" data-bs-toggle="modal" data-bs-target="#exampleModal-foto<?= $i++; ?>">
                        <a href="../tampil-foto?ud=<?= $resultFoto['FotoID'] ?>&id=<?= $usn?>">
                            <img width="160px" height="160px" src="../img/galeri/<?= $resultFoto['LokasiFile'] ?>" alt="" srcset="" />
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </div>
</div>

