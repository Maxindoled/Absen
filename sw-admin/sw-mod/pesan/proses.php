<?php
session_start();
if(empty($_SESSION['SESSION_USER']) && empty($_SESSION['SESSION_ID'])){
    header('location:../../login/');
 exit;}
else {
require_once'../../../sw-library/sw-config.php';
require_once'../../login/login_session.php';
include('../../../sw-library/sw-function.php');
}
require_once'../../../sw-library/sw-config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Tangani form input
  $pesank = $_POST['pesank'];
  $tanggal = $_POST['tanggal'];

  // Query untuk menyimpan data baru ke tabel "users"
  $sql = "INSERT INTO pesan (pesank, tanggal) VALUES ('$pesank', '$tanggal')";
  $result = mysqli_query($connection, $sql);

  // Setelah menyimpan data, alihkan pengguna ke halaman tampilan data (bisa juga ke halaman lain)
  header("Location: pesan.php");
}
?>
