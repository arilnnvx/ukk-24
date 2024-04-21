<?php
include '../koneksi/koneksi.php';
$uss = $_SESSION['username'];
$queryu = " SELECT * FROM user where UserID not in('$uss')";
$sqlu = mysqli_query($conn, $queryu);
?>
<div class="sidebar m-1 w-25 overflow-scroll he-side">

    <?php while ($resultu = mysqli_fetch_assoc($sqlu)) : ?>
        <center>
            <div class="card mt-3 mb-3  kh ">
                <div class="knt d-flex align-items-center ">
                    <div class="lef">
                        <div class="circ m-2 ">
                            <img width="45px" height="45px" src="../img/logo.webp" alt="" />
                        </div>
                    </div>
                    <div class="rig">
                        <h5 class=" card-title m-2 text-capitalize "><a href="user?$id=<?= $resultu['UserID'] ?>"> <?= $resultu['NamaLengkap'] ?></a></h5>
                        <div class="pst m-2 d-flex ">
                            <p> 10 post</p>
                        </div>
                    </div>

                </div>
            </div>
        </center>
    <?php endwhile; ?>

</div>