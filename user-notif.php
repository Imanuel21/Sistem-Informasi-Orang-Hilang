<?php

//koen sudah, sekarang lanjut sisi polisi atau kalau mau bagian pemberitahuan
include("connection-database.php");
session_start();
$user = $_GET["user"];

$id_user = "";

echo "user : ".$user."<br>" ;
$sql0 = "SELECT Id_user FROM users WHERE username = '".$user."'";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
  // output data of each row
  while($row0 = $result0->fetch_assoc()) {
    $id_user = $row0['Id_user'];
  }
}
// echo "id user :". $id_user;
// $sql1 = "SELECT * FROM `orang_hilang` WHERE pelapor = '".$id_user."' AND 'Visible' = '1'";
$sql1 = "SELECT * FROM `orang_hilang` WHERE orang_hilang.pelapor = '".$id_user."' AND Visible = '1';";


$laporan= "";

$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
  // output data of each row
  while($row1 = $result1->fetch_assoc()) {
    $laporan = $row1['Nama'];
    echo "laporan anda untuk ".$laporan." sudah di unggah <br>";
  }
}else{
  echo "Laporan anda belum di unggah";
}


?>