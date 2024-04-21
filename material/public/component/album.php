<?php
include '../koneksi/koneksi.php';
$ses = $_SESSION['username'];
$us = $_GET['$id'];
$queryA = " SELECT * FROM album WHERE UserID = '$ses'";
$sqlA = mysqli_query($conn, $queryA);

$queryT = " SELECT * FROM album WHERE UserID = '$us'";
$sqlT = mysqli_query($conn, $queryT);
$no = 1;
?>
<div class="album w-25 m-1  ">
    <center> <button type="button" class="btn justify-content-center <?php if ($hasil == "beda") {
                                                                            echo "hidd";
                                                                        } elseif ($hasil == "sama") {
                                                                            echo "he";
                                                                        } else {
                                                                            echo "tam";
                                                                        }
                                                                        ?>   bg-grad w-50 m-3" data-bs-toggle="modal" data-bs-target="#exampleModal-album">
            <p>Album</p>
        </button></center>
    <div class="alb-main">
        <?php while ($resultT = mysqli_fetch_assoc($sqlT)) : ?>
            <center>
                <div class="card mt-3 mb-3  kh d-flex">
                    <div class="knt d-flex align-items-center justify-content-between  ">
                        <h5 class=" card-title m-2 text-capitalize "><?= $resultT['NamaAlbum'] ?></h5>
                        <div class="pst m-2 d-flex ">
                            <p> 10 gambar</p>
                        </div>
                    </div>
                </div>
            </center>
        <?php endwhile; ?>
    </div>
</div>

<div class=" modal modal-xl  fade" id="exampleModal-album" tabindex="-1" aria-labelledby="exampleModalLabel-album" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel-2">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex ">
                <div class="w card  m-3  w-75 ">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Album</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- while -->
                            <?php while ($resultu = mysqli_fetch_assoc($sqlA)) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $resultu['NamaAlbum'] ?></td>
                                    <td><?= substr($resultu['Deskripsi'], 0, 30); ?>...</td>
                                    <td><?= $resultu['TanggalDibuat'] ?></td>
                                    <td><button name="hapusAlbum" value="hapusAlbum" class="btn bg-grad-out"><span><a href="../user/proses?Halbum=<?= $resultu['AlbumID'] ?>">Delete</a></span></button></td>
                                </tr>
                            <?php endwhile; ?>
                            <!-- end while -->
                        </tbody>
                    </table>

                </div>
                <div class="k m-3  w-25">
                    <form action="../user/proses.php" method="post">
                        <label class=" mb-2" for="album">Album</label> <br>
                        <input class="form-control" type="text" name="album" required placeholder="enter your album"><br>

                        <label class=" mb-2" for="Deskripsi">Deskripsi</label> <br>
                        <input class="form-control" type="text" name="deskripsi" required placeholder="enter your Deskripsi"><br>

                        <input class="form-control" type="hidden" name="UserID" value="<?= $_SESSION['username'] ?>" placeholder=""><br>

                        <input class="form-control" type="hidden" name="level" placeholder="user" value="user">

                        <button type="submit" name="tambahAlbum" value="tambahAlbum" class="btn bg-grad">
                            <p>Tambah Album</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>