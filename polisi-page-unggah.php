<?php

echo " AYO UNGGAH".$_GET['id_hilang']. "menjadi LAPORAN";
// intinya di unggah nanti dia buat record baru di tabel laporan
// kalau tolak buat value jadi beraoa gitu sehingga nanti codenya jika vallue sama dengan berapa maka laporannya ditolak.
// kalau gak, ya, gak usah dibuat ke laporan baru

$sql = "SELECT pelapor FROM orang_hilang WHERE No_Identitas = ".$_GET['id_hilang']."";
$polisi;

$dateHariini;

$sql1 = "INSERT INTO `laporan`(`No_Laporan`, `ID_User`, `No_Identitas`, `ID_Polisi`, `Tanggal_Validasi`) VALUES ('[value-1]','".$sql1."','".$_GET['id_hilang']."','".$polisi."','".$dateHariini."')";

?>