<?php

//koen sudah, sekarang lanjut sisi polisi atau kalau mau bagian pemberitahuan
include("connection-database.php");
session_start();
$user = $_SESSION["user"];

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
$sql1 = "SELECT  * FROM orang_hilang WHERE Visible = '0'";

$result = $conn->query($sql1);
$count = 1;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main-page.css" />
    <title>ORANG HILANG</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-wrapper">
        <img src="img/logo.PNG" class="brand-img" alt="" />
        <input type="text" class="search-box" placeholder="search" />
        <div class="nav-items">
        <a href="polisi-main-page.php"><img src="img/home.PNG" class="icon" alt="" /></a>
          <!-- <a href="page-tambah-laporan.php"><img src="img/add.PNG"class="icon"/></a> -->
          <img src="img/notif.png" class="icon" alt="" />
          <div class="icon user-profile"></div>
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
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    // $Image=$row['Foto'];
                    // echo $row["pelapor"]." telah menambahkan laporan";
                  ?>
                  <div class="link">
                  <a style="color: black;" href="polisi-page-detail-notif.php?id_hilang=<?php echo $row["No_Identitas"];  ?>"><?php echo $count.". ".$row["pelapor"]." telah menambahkan laporan <br>"; $count++; ?></a>
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
