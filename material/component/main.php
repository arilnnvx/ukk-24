<?php
$us = $_SESSION['username'];
$query = " SELECT * FROM user WHERE UserID = '$us'";
$sql = mysqli_query($conn, $query);
$result3 = mysqli_fetch_assoc($sql);
?>
<?php
$queryAlbum = " SELECT * FROM album WHERE UserID = '$us'";
$sqlAlbum = mysqli_query($conn, $queryAlbum);

$queryFoto = " SELECT * FROM foto WHERE UserID = '$us'";
$sqlFoto = mysqli_query($conn, $queryFoto);

?>
<div class="main w-75 m">
    <div class="profil he-p d-flex ">
        <div class="l h-100   w-25 d-flex flex-column  justify-content-center align-items-center   ">
            <div class="circ-2 m-2 ">
                <img width="100px" height="100px" src="img/logo.webp" alt="" />
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
            <div class="cgr d-flex ">
                <div class="edit fs-10 mb-3">
                    <a class="mod" data-bs-toggle="modal" data-bs-target="#exampleModal-2">Edit Profile</a>
                </div>
                <div class="delete fs-10"> <a href="">Delete account</a></div>
            </div>

            <div class="info">
                <?= $result3['deskripsi'] ?>
            </div>
            <center> <button type="button" class="btn justify-content-center  bg-grad w-100 mt-3 " data-bs-toggle="modal" data-bs-target="#exampleModal-Foto">
                    <p>Tambah Foto</p>
                </button></center>
        </div>
        <div class="lef tw w-75 card d-flex flex-row flex-wrap overflow-scroll">

            <?php while ($resultFoto = mysqli_fetch_assoc($sqlFoto)) : ?>
                <div class="m-f fr">
                    <div class="img post" data-bs-toggle="modal" data-bs-target="#exampleModal-foto<?= $i++; ?>">
                        <a href="tampil-foto?ud=<?= $resultFoto['FotoID'] ?>&id=<?= $us ?>">
                            <img width="160px" height="160px" src="img/galeri/<?= $resultFoto['LokasiFile'] ?>" alt="" srcset="" />
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>


        </div>
    </div>
</div>
<!-- modal edit profil -->
<div class="modal fade" id="exampleModal-2" tabindex="-1" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel-2">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="user/proses.php" method="post" enctype="multipart/form-data">


                    <input class="form-control" type="hidden" name="UserID" value="<?= $result3['UserID'] ?>"><br>


                    <label class=" mb-2" for="Deskripsi">Deskripsi</label> <br>
                    <input class="form-control" type="text" name="deskripsi" value="<?= $result3['deskripsi'] ?>" placeholder="enter your Deskripsi"><br>


                    <div class="modal-footer">
                        <button type="button" class="btn bg-grad-out" data-bs-dismiss="modal"><span>close</span></button>
                        <button type="submit" name="editProfil" value="editProfil" class="btn bg-grad">
                            <p>Save changes</p>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal edit profil end -->

<!-- modal Tambah Foto -->
<div class="modal fade" id="exampleModal-Foto" tabindex="-1" aria-labelledby="exampleModalLabel-Foto" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel-2">Tambah Foto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="user/proses.php?a=addfoto" method="post" enctype="multipart/form-data">
                    <input class="form-control" type="text" name="user" value="<?= $result3['UserID'] ?>">

                    <label class=" mb-2" for="Profile">Foto</label> <br>
                    <input class=" mb-2" type="file" name="foto" id="foto"><br>

                    <label class=" mb-2" for="Profile">Album</label> <br>
                    <select class="form-control" id="album" name="album">
                        <?php while ($resultAlbum = mysqli_fetch_assoc($sqlAlbum)) : ?>
                            <option value="<?= $resultAlbum['AlbumID'] ?>"><?= $resultAlbum['NamaAlbum'] ?></option>
                        <?php endwhile; ?>
                    </select><br>

                    <label class=" mb-2" for="Deskripsi">Deskripsi</label> <br>
                    <input class="form-control" type="text" name="deskripsi" value="" placeholder="enter your Deskripsi"><br>

                    <div class="modal-footer">
                        <button type="button" class="btn bg-grad-out" data-bs-dismiss="modal"><span>close</span></button>
                        <button type="submit" name="editProfil" value="Upload Foto" class="btn bg-grad">
                            <p>Save changes</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal Tambah Foto end -->