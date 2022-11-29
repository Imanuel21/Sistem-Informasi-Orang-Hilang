<?php

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
// if ($result1->num_rows > 0) {
//   // output data of each row
//   while($row1 = $result1->fetch_assoc()) {
//     $laporan = $row1['Nama'];
//     echo "laporan anda untuk ".$laporan." sudah di unggah <br>";
//   }
// }else{
//   echo "belum ada notifikasi";
// }
$count = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main-page.css" />
    <title>ORANG HILANG</title>
</head>
<body>
<nav class="navbar">
      <div class="nav-wrapper">
        <img src="img/logo.PNG" class="brand-img" alt="" />
        <input type="text" class="search-box" placeholder="search" />
        <div class="nav-items">
          <a href="main-page.php"><img src="img/home.PNG" class="icon" alt="" /></a>
          
          <a href="page-tambah-laporan.php"><img src="img/add.PNG"class="icon"/></a>
          <a href="user-notif.php?user=<?php echo $user ?>"><img src="img/notif.png" class="icon" alt="" /></a>
          
          <div class="dropdown">
          <button class="mainmenubtn"></button>
            <div class="dropdown-child">
                <a href="page-login.php">LOG OUT</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <section class="main">
      <div class="wrapper">
        <div class="left-col">
          <!-- status wrappers -->
          
          <div class="post">
          
                <div class="tabel-content">

                <?php
                  if ($result1->num_rows > 0) {
                    // output data of each row
                    while($row1 = $result1->fetch_assoc()) {
                      $laporan = $row1['Nama'];
                    // $Image=$row['Foto'];
                    // echo $row["pelapor"]." telah menambahkan laporan";

                  ?>
                  <div class="link">
                  <a style="color: black;" href="user-page-detail-notif.php?id_hilang=<?php echo $row1["No_Identitas"];  ?>"><?php echo $count.". laporan anda untuk ".$laporan." sudah di unggah <br>"; $count++; ?></a>
                  </div>
            <?php
                  }
              } else {
                  echo "Hasil Pencarian Tidak Ada";
              }
              ?>
              </div>
          </div>
          </div> 
      </div>
    </section>
</body>
</html>