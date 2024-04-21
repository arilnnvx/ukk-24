<?php
$id = $_GET['id'];
$ud = $_GET['ud'];
include 'koneksi/koneksi.php';
$queryFoto2 = " SELECT * FROM foto WHERE FotoID = '$ud'";
$sqlFoto2 = mysqli_query($conn, $queryFoto2);
$resultFoto2 = mysqli_fetch_assoc($sqlFoto2);

$queryKom = " SELECT * FROM foto WHERE UserID = '$id'";
$sqlKom = mysqli_query($conn, $queryKom);
$resultKom =  mysqli_fetch_assoc($sqlKom);

$sqlKomen = mysqli_query($conn, "SELECT a.FotoID, a.LokasiFile, a.JudulFoto, a.DeskripsiFoto, COUNT(b.LikeID) as jmlLike, c.NamaLengkap, COUNT(d.KomentarID) as jmlKomen 
FROM foto a LEFT JOIN likefoto b ON b.FotoID=a.FotoID LEFT JOIN user c ON a.UserID=c.UserID LEFT JOIN komentarfoto d ON a.FotoID=d.FotoID
WHERE a.FotoID='$ud' GROUP BY a.FotoID ORDER BY a.TanggalUnggah DESC");

$sqlKomentar = mysqli_query($conn, "SELECT a.*, b.NamaLengkap FROM
komentarfoto a LEFT JOIN user b ON a.UserID=b.UserID WHERE a.FotoID='$ud'");

session_start();

if (!isset($_SESSION['username'])) {
    header('location:login/login_form.php');
}

if ($_SESSION['username'] === $id) {
    $hasil = "sama";
} else {
    $hasil = "beda";
}
$querylike = mysqli_query($conn, "SELECT COUNT(likeid) AS jml FROM likeFoto WHERE fotoid='$ud'");
                $datalike = mysqli_fetch_assoc($querylike);
?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <style>
        .hidd {
            visibility: hidden;
            display: none;
            height: 0px;
        }
        .hee{
            height : 60px;
        }
        .kl{
            height : 80px;
        }
    </style>
</head>

<body>
    <div class="l d-flex align-items-center ">
        <a href="index"><i class="fa-solid fa-arrow-left m-3 fs-3 "></i></a>
        <h3 class="m-3 right">Postingan</h3>
    </div>
    <div class=" d-flex m-3 ">
        <div class="kan card w-50 h-100">
            <div class="img-modal d-flex  justify-content-center ">
                <img class=" card" src="img/galeri/<?= $resultFoto2['LokasiFile'] ?>" alt="" width="100%" height="540px" />
            </div>
            <div class="icon d-flex justify-content-between ">
                <div class="ll d-flex align-items-center ">
                <a href="user/like.php?fotoid=<?php echo $ud ?>&userid=<?php echo $id ?>" class="btn">
                    <i class="fa-regular fa-heart xl-font line"></i>
                </a>
                    <div class="comment xl-font line d-flex align-items-center"><i class="fa-regular fa-comment"></i></div>
                    <div class="card  m-2  p-2 d-flex align-items-center ">
                        <p style=" margin: auto;">...</p>
                    </div>
                </div>
                <div class="rr ">
                    <div class="del d-flex align-items-center float-end m-2">
                        <a class="<?php if ($hasil == "beda") {
                             echo "hidd"; } elseif ($hasil == "sama") {
                                                                                    echo "he";
                                                                                } else {
                                                                                    echo "tam";
                                                                                }
                                                                                ?>
                        " href='user/proses?a=dellfoto&id=<?= $resultFoto2['FotoID'] ?>&img=<?= $resultFoto2['LokasiFile'] ?>'>Hapus Gambar</a>
                    </div>
                </div>
            </div>

            <div class="liked m-2 ">
                <p>Di sukai oleh <?php echo isset($datalike['jml']) ? $datalike['jml'] : 0; ?> orang</p>
            </div>

            <div class="deskrepsi-gambar m-2 ">
                <p class=" mb-3 ">
                <?= $resultFoto2['DeskripsiFoto'] ?>
                </p>
            </div>

        </div>
        <div class=" kir w-50">

            <div class="card m-3 ">
                <form name="fkomentar" method="post" action="user/proses?a=komentar&uid=<?= $ud ?>&id=<?= $id ?>">
                    <input type="hidden" name="FotoID" value="<?= $resultFoto2['FotoID'] ?>">
                    <p class=" m-3"> Komentar</p>
                    <input type="text" class=" form-control m-3 w-90 " name="komentar">
                    <center><input type="submit" value="Kirim Komentar" class="btn btn-l pp m-3 w-90 hee"></center>
                </form>
            </div>
            <?php while ($datakomen = mysqli_fetch_array($sqlKomentar)) : ?>
                <div class="card m-3 ">
                    <div class="knt m-2 d-flex align-items-center ">
                        <div class="lef">
                            <div class="circ m-2 ">
                                <img width="45px" height="45px" src="img/logo.webp" alt="" />
                            </div>
                        </div>
                        <div class="rig">
                            <div class="ctn d-flex ">
                                <p class="m-2 text-capitalize "><?= $datakomen['NamaLengkap'] ?></p>
                                <p class="m-2 text-capitalize sec-text"><?= $datakomen['TanggalKomentar'] ?></p>
                            </div>
                            <div class="pst m-2 d-flex ">
                                <small><?= $datakomen['IsiKomentar'] ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>