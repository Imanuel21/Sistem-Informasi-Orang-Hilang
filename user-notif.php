<?php
include("Model/connection-database.php");
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
$sql1 = "SELECT * FROM `orang_hilang` WHERE orang_hilang.pelapor = '".$id_user."' AND Visible = '1' AND Status = 'Menghilang'";
$result1 = $conn->query($sql1);
$laporan= "";
$count = 1;

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
  <link rel="stylesheet" href="main-page.css" />
    <title>ORANG HILANG</title>
</head>
<body>
<nav class="navbar">
      <div class="nav-wrapper">
        <img src="img/logo.PNG" class="brand-img" alt="" />
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
            <?php echo '<img src= "data:image/png;base64,'.base64_encode($row4['foto_profil']).'"/> ';  ?>
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
    <section class="main">
      <div class="wrapper">
        <div class="left-col">
          <div class="post">
                <div class="tabel-content">
                <?php
                $sql2 = "SELECT * FROM `orang_hilang` WHERE orang_hilang.pelapor = '".$id_user."' AND Visible = '1' AND Status = 'Ditemukan'";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                  // output data of each row
                  while($row2 = $result2->fetch_assoc()) {
                    $laporanDitemukan = $row2['Nama'];
                  ?>
                  <div class="link">
              <a style="color: black;" href="user-page-detail-notif-diterima.php?id_hilang=<?php echo $row2["No_Identitas"];  ?>"><?php echo $count.". laporan anda untuk ".$laporanDitemukan." sudah di temukan <br>"; $count++; ?></a>
              </div>
                  <?php
                }
                } else {
                  
                }
                  if ($result1->num_rows > 0) {
                    // output data of each row
                    while($row1 = $result1->fetch_assoc()) {
                      $laporan = $row1['Nama'];
                    
                  ?>
                  <div class="link">
                  <a style="color: black;" href="user-page-detail-notif.php?id_hilang=<?php echo $row1["No_Identitas"];  ?>"><?php echo $count.". laporan anda untuk ".$laporan." sudah di unggah <br>"; $count++; ?></a>
                  </div>
            <?php
                  }
              } else {
                  echo "Hasil Pencarian Tidak Ada";
              }
              $sql3 = "SELECT * FROM `orang_hilang` WHERE orang_hilang.pelapor = '".$id_user."' AND Visible = '2' ";
                $result3 = $conn->query($sql3);
                if ($result3->num_rows > 0) {
                  // output data of each row
                  while($row3 = $result3->fetch_assoc()) {
                    $laporanDitolak = $row3['Nama'];
                  ?>
                  <div class="link">
              <a style="color: black;" href="user-page-detail-notif-tolak.php?id_hilang=<?php echo $row3["No_Identitas"];  ?>"><?php echo $count.". laporan anda untuk ".$laporanDitolak." ditolak <br>"; $count++; ?></a>
              </div>
                  <?php
                }
                } else {
                  
                }
              ?>
              </div>
          </div>
          </div> 
      </div>
    </section>
</body>
</html>