<?php
include("connection-database.php");

$nik = $_GET["nik"] ;
$nama = $_GET["nama"];
$alamat = $_GET["alamat"];
$hp = $_GET["hp"];
$user = $_GET["username"];
$pass = $_GET["password"];

$sql1 = "INSERT INTO `users`(`Id_user`, `nama`, `alamat`, `no_HP`, `username`, `password`) VALUES ('".$nik."','".$nama."','".$alamat."','".$hp."','".$user."','".$pass."')";

if ($conn->query($sql1) === TRUE) {
    echo '<script language="javascript">alert("Akun ada berhasil didaftarkan, silahkan login");</script>';
    echo "<script>document.location = 'page-login.php'</script>";
  } else {
    echo '<script language="javascript">alert("Akun anda gagal terdaftar");</script>';
    echo "<script>document.location = 'page-register.php'</script>";
  }

?>