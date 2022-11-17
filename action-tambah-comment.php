<?php
echo "id_user = ". $_GET["id_user"];
$id_informan = $_GET["id_user"];
$informasi = $_GET["coment"];

include("connection-database.php");

$sql1 = "INSERT INTO `informasi`(`No_Informasi`, `Id_Informan`, `Informasi`, `Visible`) VALUES ('[value-1]','".$id_informan."','".$informasi."','[value-4]')";
if ($conn->query($sql1) === TRUE) {
    echo '<script language="javascript">alert("Informasi berhasil ditambahkan");</script>';
    echo "<script>document.location = 'main-page-login.php'</script>";
    } else {
        echo '<script language="javascript">alert("Informasi gagal ditambahkan");</script>';
        echo "<script>document.location = 'main-page-login.php'</script>";
    }


?>