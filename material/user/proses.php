<?php
include 'function.php';

$aksi = $_GET['a'];

if (isset($_POST['submit'])) {

    $berhasil = regristrasi($_POST, $_FILES);
};
if (isset($_POST['editProfil'])) {
    if ($_POST['editProfil'] == 'editProfil') :

        $berhasil = editProfil($_POST, $_FILES);

        if ($berhasil) {
            header("location:../index.php");
        } else {
            echo $berhasil;
        }
    endif;
}
if (isset($_POST['tambahAlbum'])) {
    if ($_POST['tambahAlbum'] == 'tambahAlbum') :

        $berhasil = tambahAlbum($_POST, $_FILES);

        if ($berhasil) {
            header("location:../index.php");
        } else {
            echo $berhasil;
        }
    endif;
}

if (isset($_GET['Halbum'])) {

    $berhasil = hapusAlbum($_GET);

    if ($berhasil) {
        header("location: location:../index.php");
    } else {
        echo $berhasil;
    }
}

if ($aksi == 'addfoto') {
    $nama = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $deskripsi = $_POST['deskripsi'];
    $album = $_POST['album'];
    $user = $_POST['user'];
    move_uploaded_file($file_tmp, '../img/galeri/' . $nama);
    $query = mysqli_query($GLOBALS['conn'], "INSERT INTO foto VALUES('', '',
   '$deskripsi', now(), '$nama','$album','$user')");
    if ($query) {
        echo '<script language="javascript">
    window.alert("Foto Berhasil Diunggah");
    window.location.href="../";
    </script>';
    } else {
        echo '<script language="javascript">
    window.alert("Foto Gagal Diunggah");
    window.location.href="../";
    </script>';
    }
} elseif ($aksi == 'dellfoto') {
    $FotoID = $_GET['id'];
    $img = $_GET['img'];

    $query = mysqli_query($GLOBALS['conn'], "DELETE FROM foto WHERE FotoID='$FotoID'");
    unlink("../img/galeri/" . $img);
    if ($query) {
        echo '<script language="javascript">
    window.alert("Foto Berhasil Dihapus");
    window.location.href="../";
    </script>';
    } else {
        echo '<script language="javascript">
    window.alert("Foto Gagal Dihapus");
    window.location.href="../";
    </script>';
    }
} elseif ($aksi == 'like') {
    $id = $_GET['id'];
    $uid = $_GET['uid'];
    $sql = mysqli_query($GLOBALS['conn'], "INSERT INTO likefoto VALUES('','" . $uid . "','" . $id . "',now())");
    echo '<script language="javascript">
    window.location.href="../tampil-foto?ud='.$uid.'&id='.$id.'";
    </script>';
} elseif ($aksi == 'unlike') {
    $id = $_GET['id'];
    $uid = $_GET['uid'];
    $sql = mysqli_query($GLOBALS['conn'], "DELETE FROM likefoto WHERE FotoID='" . $uid . "' AND UserID='" . $id . "'");
    echo '<script language="javascript">
    window.location.href="../tampil-foto?ud='.$uid.'&id='.$id.'";
    </script>';
} elseif ($aksi == 'komentar') {
    $uid = $_GET['uid'];
    $id = $_GET['id'];
    $FotoID = $_POST['FotoID'];
    $komentar = $_POST['komentar'];
    $sql = mysqli_query($GLOBALS['conn'], "INSERT INTO komentarfoto
   VALUE('','" . $uid . "','" . $id . "','" . $komentar . "',now())");
    echo '<script language="javascript">
    window.location.href="../tampil-foto?ud='.$uid.'&id='.$id.'";
    </script>';
}
