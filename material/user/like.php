<?php
include('../koneksi/koneksi.php');

$foto_id = $_GET['fotoid'];
$user_id = $_GET['userid'];
$tanggal = date('Y-m-d');

// Cek apakah user sudah like foto sebelumnya
try {
  $cek_like = $conn->prepare("SELECT COUNT(*) FROM likefoto WHERE fotoid = ? AND userid = ?");
  $cek_like->bind_param('ss', $foto_id, $user_id);
  $cek_like->execute();
  $result = $cek_like->get_result();
  $row = $result->fetch_assoc();

  if ($row['COUNT(*)'] > 0) {
    echo "<script>
      alert('Kamu sudah menyukai foto ini!');
      window.location.href='../index.php';
    </script>";
    exit;
  }
} catch (Exception $e) {
  echo "<script>
    alert('Terjadi kesalahan saat mengecek like: " . $e->getMessage() . "');
    window.location.href='../index.php';
  </script>";
  exit;
}

// Like foto
try {
  $query = $conn->prepare("INSERT INTO likefoto
    (`fotoid`, `userid`, `tanggallike`)
    VALUES (?, ?, ?)");
  $query->bind_param('sss', $foto_id, $user_id, $tanggal);
  $query->execute();

  if ($query->affected_rows > 0) {
    echo "<script>
      alert('Terima kasih sudah menyukai foto ini!');
      window.location.href='../index.php';
    </script>";
  } else {
    echo "<script>
      alert('Gagal menyukai foto!');
      window.location.href='../index.php';
    </script>";
  }
} catch (Exception $e) {
  echo "<script>
    alert('Terjadi kesalahan saat like foto: " . $e->getMessage() . "');
    window.location.href='../index.php';
  </script>";
}
