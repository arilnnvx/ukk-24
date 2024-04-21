<?php
require "../koneksi/koneksi.php";

function regristrasi($data, $files)
{
    $name = mysqli_real_escape_string($GLOBALS['conn'], $data['name']);
    $nameL = mysqli_real_escape_string($GLOBALS['conn'], $data['NamaLengkap']);
    $email = mysqli_real_escape_string($GLOBALS['conn'], $data['email']);
    $pass = md5($data['password']);
    $cpass = md5($data['cpassword']);
    $level = $data['level'];
    $select = " SELECT * FROM user WHERE UserName = '$name' && Password = '$pass' ";

    $result = mysqli_query($GLOBALS['conn'], $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'user already exist!';
    } else {

        if ($pass != $cpass) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO user(UserName, Password, Email,NamaLengkap,  level) VALUES('$nameL','$pass','$email','$name','$level')";
            mysqli_query($GLOBALS['conn'], $insert);
            header('location:../login/login_form.php');
        }
    }
}
function editProfil($data, $files)
{
    $id = $data['UserID'];
    $UserName = $data['UserName'];
    $deskripsi = $data['deskripsi'];

    $foto = $files['gambar']['UserName'];

    $dir = "../img/user/";
    $tmpFILE = $files['gambar_artikel']['tmp_name'];

    move_uploaded_file($tmpFILE, $dir . $foto);

    $query = "SELECT * FROM user WHERE UserID='$id';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    $result = mysqli_fetch_assoc($sql);


    $query2 = "UPDATE user SET UserName='$UserName', deskripsi='$deskripsi', gambar='$foto' WHERE UserID='$id';";
    $sql2 = mysqli_query($GLOBALS['conn'], $query2);

    return true;
}
function tambahAlbum($data, $files)
{
    $album = $data['album'];
    $deskripsi = $data['deskripsi'];
    $user = $data['UserID'];
    $query = mysqli_query($GLOBALS['conn'], "INSERT INTO album VALUES('', '$album','$deskripsi', now(), '$user')");
    if ($query) {
        echo '<script language="javascript">
        window.alert("Album Berhasil Dibuat");
        window.location.href="../index.php";
        </script>';
    } else {
        echo '<script language="javascript">
        window.alert("Album Gagal Dibuat");
        window.location.href="album_add.php";
        </script>';
    }
}
function hapusAlbum($data)
{
    $id = $data['Halbum'];

    $queryhp = mysqli_query($GLOBALS['conn'], "DELETE FROM album WHERE AlbumID = '$id';");
    if ($queryhp) {
        echo '<script language="javascript">
        window.alert("Album Berhasil Dihapus");
        window.location.href="../index.php";
        </script>';
    } else {
        echo '<script language="javascript">
        window.alert("Album Gagal Dibuat");
        window.location.href="album_add.php";
        </script>';
    }
}

