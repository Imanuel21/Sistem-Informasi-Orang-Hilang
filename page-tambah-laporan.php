<?php
include("Model/connection-database.php");
session_start();
$_SESSION["idPelapor"] = $_SESSION["idUser"];
$user = $_GET["user"];
$komen = "";
$id_user = "";
$pelapor = "";

$sql0 = "SELECT * FROM users WHERE username = '".$user."'";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
  // output data of each row
  while($row0 = $result0->fetch_assoc()) {
    $id_user = $row0['Id_user'];
  }
}
$_SESSION["idUser"] = $id_user;
$sql1 = "SELECT  *
FROM orang_hilang e JOIN laporan d
ON (e.No_Identitas = d.No_Identitas) WHERE e.Status = 'Menghilang'";

$result = $conn->query($sql1);

$sql5 = "SELECT  * FROM orang_hilang WHERE pelapor = '".$id_user."' AND NOT Visible = '0'";
$result5 = $conn->query($sql5);
$countNotif = 0;
if ($result5->num_rows > 0) {
  // output data of each row
  while ($row5 = $result5->fetch_assoc()) {
    $countNotif++;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH LAPORAN</title>
    <link rel="stylesheet" href="page-tambah-laporan.css">
</head>
<body>
<nav class="navbar">
    <div class="nav-wrapper">
        <img src="img/logo.PNG" class="brand-img" alt="">
        <div class="nav-items">
        <a href="main-page.php"><img src="img/home.PNG" class="icon" alt="" /></a>
        <a href="page-tambah-laporan.php?user=<?php echo $user; ?>"><img src="img/add.PNG"class="icon"/></a>
        <a href="user-notif.php?user=<?php echo $user ?>"><img src="img/notif.png" class="icon" alt="" /></a>
        <span class="icon-button__badge"><?php echo $countNotif;?></span>
            <?php
            $sql4 = "SELECT * FROM users WHERE username = '".$user."'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
              // output data of each row
              while($row4 = $result4->fetch_assoc()) {
          ?>
          <div class="dropdown">
            <?php echo '<img src="data:image/png;base64,'.base64_encode($row4['foto_profil']).'"/>'; ?>
          <button class="mainmenubtn"></button>
            <div class="dropdown-child">
                <a href="page-login.php">LOGOUT</a>
            </div>
          </div>
          <?php
          }
        }
          ?>
        </div>
    </div>
</nav>
<div class="wrapper">
        <form action="action-page-tambah-laporan.php" method="POST" enctype="multipart/form-data">
            <h3>Tambah Orang Hilang</h3>
            <br></br>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="nik" placeholder="NIK">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="date" data-date-format="YYYY-MMM-DD" title="Tanggal Lahir" class="form-control" name="ttl" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="ciri" placeholder="Ciri-ciri">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="agama" placeholder="Agama">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="status" value="Menghilang" placeholder="Status" title="Status" disabled>
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" title="Pilih Foto" type="file" class="form-control" name="myfile" enctype="multipart/form-data" placeholder="Foto">
            </div>
            <button class="tambah" name="btn">Tambahkan</button>
        </form>
        <a href="main-page.php"><button class="kembali">Kembali</button></a>
    </div>
    
</body>
</html>