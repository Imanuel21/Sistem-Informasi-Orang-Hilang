<?php
include("Model/connection-database.php");
$No_Identitas = $_POST['No_Identitas'];
$Nama  = $_POST['Nama'];
$Alamat = $_POST['Alamat'];
$Tanggal_Lahir = $_POST['Tanggal_Lahir'];
$Ciri_ciri = $_POST['Ciri_ciri'];
$Pekerjaan = $_POST['Pekerjaan'];
$Agama = $_POST['Agama'];
$Status = $_POST['Status'];
$Deskripsi = $_POST['Deskripsi'];
$sql = "UPDATE `orang_hilang` SET `Nama`='".$Nama."',`Alamat`='".$Alamat."',
                `Tanggal_Lahir`='".$Tanggal_Lahir."',`Ciri_ciri`='".$Ciri_ciri."',
                `Pekerjaan`='".$Pekerjaan."',`Agama`='".$Agama."',
                `Status`='".$Status."',`Deskripsi`='".$Deskripsi."' WHERE No_Identitas = '".$No_Identitas."'";

    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("Laporan berhasil diedit");</script>';
        echo "<script>document.location = 'polisi-main-page.php'</script>";
    } else {
        echo '<script language="javascript">alert("Laporan gagal diedit");</script>';
        echo "<script>document.location = 'edit-laporan.php'</script>";
    }
?>