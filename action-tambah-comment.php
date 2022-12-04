<?php
include("Model/connection-database.php");
session_start();

$informasi = "";
$id_informan = $_SESSION["idUser"];
$informasi = $_GET["comment"];
$id_laporan = $_GET["id_laporan"];

$sql1 = "INSERT INTO `informasi`(No_Informasi, Id_Informan, Informasi, Visible) VALUES ('[value-1]','".$id_informan."','".$informasi."','[value-4]')";
if ($conn->query($sql1) === TRUE) {
    $sql2 = "SELECT * FROM `informasi` ORDER BY No_Informasi DESC LIMIT 1";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        // output data of each row
        while($row2 = $result2->fetch_assoc()) {
            $sql3 = "INSERT INTO `detail_laporan`(No_Laporan, No_Informasi) VALUES ('".$id_laporan."','". $row2["No_Informasi"]."')";
            if ($conn->query($sql3) === TRUE) {
                echo '<script language="javascript">alert("Informasi berhasil ditambahkan");</script>';
                echo "<script>document.location = 'main-page.php'</script>";
            }else {
                echo '<script language="javascript">alert("Informasi gagal ditambahkan");</script>';
                echo "<script>document.location = 'main-page.php'</script>";
            }
        }
    }
    echo '<script language="javascript">alert("Informasi berhasil ditambahkan");</script>';
    echo "<script>document.location = 'main-page-login.php'</script>";
} else {
    echo '<script language="javascript">alert("Informasi gagal ditambahkan");</script>';
    echo "<script>document.location = 'main-page-login.php'</script>";
}


?>