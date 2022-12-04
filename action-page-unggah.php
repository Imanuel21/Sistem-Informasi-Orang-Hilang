<?php

include("Model/connection-database.php");
session_start();
$user = $_SESSION["idUser"];

$t=time();
$dateHariini = (date("Y-m-d",$t));

$pelapor = "";
$id_Polisi = "";

$sql0 = "SELECT ID_Polisi FROM missing_person_unit WHERE Username = '".$user."'";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
  // output data of each row
  while($row0 = $result0->fetch_assoc()) {
    $id_Polisi = $row0['ID_Polisi'];
  }
}

// untuk mendapatkan dara pelapor
$No_Identitas = $_GET["id_hilang"];
$sql1 = "SELECT  * FROM orang_hilang WHERE No_Identitas = '".$No_Identitas."'";
$result2 = $conn->query($sql1);
if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
    $pelapor = $row2['pelapor'];
  }
}
$conn->close();

include("connection-database.php");

$sql2 = "INSERT INTO laporan (`No_Laporan`, `ID_User`, `No_Identitas`, `ID_Polisi`, `Tanggal_Validasi`) VALUES ('','".$pelapor."','".$No_Identitas."','".$id_Polisi."','".$dateHariini."')";


if ($conn->query($sql2) === TRUE) {
  //set visible jadi 1 yang artinya sudah diunggah
  $sql3 = "UPDATE `orang_hilang` SET `Visible` = '1' WHERE `orang_hilang`.`No_Identitas` = '".$No_Identitas."'";
  if ($conn->query($sql3)) {
    echo '<script language="javascript">alert("LAPORAN BERHASIL DIUNGGAH");</script>';
    echo "<script>document.location = 'polisi-page-notif.php'</script>";
  }else {
    echo '<script language="javascript">alert("LAPORAN GAGAL DIUNGGAH");</script>';
    echo "<script>document.location = 'polisi-page-detail-notif.php'</script>";
  }
  
} 



?>