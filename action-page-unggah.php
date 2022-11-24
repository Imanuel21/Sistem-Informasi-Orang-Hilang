<?php

//koen sudah, sekarang lanjut sisi polisi atau kalau mau bagian pemberitahuan
include("connection-database.php");
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
// $_SESSION["idUser"] = $id_user;
// $polisi = $id_user;

// untuk dapatkan yang lapor
$No_Identitas = $_GET["id_hilang"];
$sql1 = "SELECT  * FROM orang_hilang WHERE No_Identitas = '".$No_Identitas."'";
$result2 = $conn->query($sql1);
if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
    $pelapor = $row2['pelapor'];
  }
}
echo "pelapor : ".$pelapor ."<br>";
echo "yang hilang : ".$No_Identitas ."<br>";
echo "polisi : ".$id_Polisi ."<br>";
echo "tanggal : ".$dateHariini ."<br>";
$conn->close();
include("connection-database.php");

// $sql2 = "INSERT INTO laporan (`No_Laporan`, `ID_User`, `No_Identitas`, `ID_Polisi`, `Tanggal_Validasi`) VALUES ('',".$pelapor."','".$No_Identitas."','".$id_Polisi."','".$dateHariini."')";
$sql2 = "INSERT INTO laporan (`No_Laporan`, `ID_User`, `No_Identitas`, `ID_Polisi`, `Tanggal_Validasi`) VALUES ('','".$pelapor."','".$No_Identitas."','".$id_Polisi."','".$dateHariini."')";


if ($conn->query($sql2) === TRUE) {
  echo '<script language="javascript">alert("LAPORAN BERHASIL DIUNGGAH");</script>';
  echo "<script>document.location = 'polisi-page-notif.php'</script>";
} else {
  echo '<script language="javascript">alert("LAPORAN GAGAL DIUNGGAH");</script>';
  echo "<script>document.location = 'polisi-page-detail-notif.php'</script>";
}


?>