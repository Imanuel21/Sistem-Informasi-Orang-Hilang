<?php

//koen sudah, sekarang lanjut sisi polisi atau kalau mau bagian pemberitahuan
include("connection-database.php");
session_start();
$user = $_SESSION["idUser"];

$t=time();
$dateHariini = (date("Y-m-d",$t));

$id_user = "";

$sql0 = "SELECT Id_user FROM users WHERE username = '".$user."'";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
  // output data of each row
  while($row0 = $result0->fetch_assoc()) {
    $id_user = $row0['Id_user'];
  }
}
$_SESSION["idUser"] = $id_user;
$polisi = $id_user;

// untuk dapatkan ID_User
$sql1 = "SELECT  Pelapor FROM orang_hilang WHERE No_Identitas = '".$_GET["id_hilang"]."'";
if ($result0->num_rows > 0) {
  // output data of each row
  while($row0 = $result0->fetch_assoc()) {
    $id_user = $row0['Id_user'];
  }
}
$sql2 = "INSERT INTO `laporan`(`No_Laporan`, `ID_User`, `No_Identitas`, `ID_Polisi`, `Tanggal_Validasi`) VALUES ('[value-1]','".$id_user."','".$_GET['id_hilang']."','".$polisi."','".$dateHariini."')";


if ($conn->query($sql2) === TRUE) {
  echo '<script language="javascript">alert("LAPORAN BERHASIL DIUNGGAH");</script>';
  echo "<script>document.location = 'polisi-page-notif.php'</script>";
} else {
  echo '<script language="javascript">alert("LAPORAN GAGAL DIUNGGAH");</script>';
  echo "<script>document.location = 'polisi-page-detail-notif.php'</script>";
}


?>