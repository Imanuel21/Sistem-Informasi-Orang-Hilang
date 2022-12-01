<?php

// intinya di unggah nanti dia buat record baru di tabel laporan
// kalau tolak buat value jadi beraoa gitu sehingga nanti codenya jika vallue sama dengan berapa maka laporannya ditolak.
// kalau gak, ya, gak usah dibuat ke laporan baru

// $sql = "SELECT pelapor FROM orang_hilang WHERE No_Identitas = ".$_GET['id_hilang']."";

$t=time();
$dateHariini = (date("Y-m-d",$t));
// setelah unggah ke kembali ke main 

//koen sudah, sekarang lanjut sisi polisi atau kalau mau bagian pemberitahuan
include("connection-database.php");
session_start();
$user = $_SESSION["user"];

$id_user = "";

$sql0 = "SELECT ID_Polisi FROM missing_person_unit WHERE Username = '".$user."'";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
  // output data of each row
  while($row0 = $result0->fetch_assoc()) {
    $id_user = $row0['ID_Polisi'];
  }
}
$_SESSION["idUser"] = $user;
$sql1 = "SELECT  * FROM orang_hilang WHERE No_Identitas = '".$_GET["id_hilang"]."'";
// $sql1 = "INSERT INTO `laporan`(`No_Laporan`, `ID_User`, `No_Identitas`, `ID_Polisi`, `Tanggal_Validasi`) VALUES ('[value-1]','".$sql1."','".$_GET['id_hilang']."','".$polisi."','".$dateHariini."')";

$result = $conn->query($sql1);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="polisi-main-page.css" />
    <title>ORANG HILANG</title>
  </head>
  <style>
    .icon-button {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
  color: #333333;
  background: #dddddd;
  border: none;
  outline: none;
  border-radius: 50%;
}

.icon-button:hover {
  cursor: pointer;
}

.icon-button:active {
  background: #cccccc;
}

.icon-button__badge {
  position: absolute;
  top: -4px;
  right: 5px;
  width: 15px;
  height: 15px;
  background: red ;
  color: #ffffff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
}
.button{
  color: red;
}
  </style>
  <body>
  <nav class="navbar">
      <div class="nav-wrapper">
        <img src="img/logo.PNG" class="brand-img" alt="" />
        <!-- <input type="text" class="search-box" placeholder="search" /> -->
        <div class="nav-items">
        <a href="polisi-main-page.php"><img src="img/home.PNG" class="icon" alt="" /></a>
            <a href="polisi-page-notif.php"><img src="img/notif.png" class="icon" alt="" /></a>
          <span class="icon-button__badge">1</span>

          <?php
            $sql4 = "SELECT * FROM missing_person_unit WHERE username = '".$user."'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
              // output data of each row
              while($row4 = $result4->fetch_assoc()) {
              
          ?>

          <div class="dropdown">
            <?php echo '<img style="border-radius = 50%" src= "data:image/png;base64,'.base64_encode($row4['foto_profil']).'"/> ';  ?>
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
              <?php
              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $Image=$row['Foto'];
                  ?> 
                  <section class="main">
      <div class="wrapper">
        <div class="left-col">
          <!-- status wrappers -->
          <div class="post">
            <!-- <div class="info"> -->
              <!-- <div class="user">
                <div class="profile-pic"><img src="img/PForghilang.jpeg" alt="" /></div>
                <p class="username">Web_OrangHilang</p>
              </div>
                <img src="img/option.PNG" class="options" alt="" />
                </div> -->
                <div class="tabel-content">
              <!-- <img src="img/cover 14.png" class="post-image" alt="" /> -->
              <table action="pencarian.php" method="POST" border="0" style="background-color: orange;" >
                  
              <tr>
                    <td rowspan="5">
                      <!-- <img src="image_view.php?id_gambar=<?php echo $row['No_Identitas']; ?>" width="400"> -->
                      <?php
                      echo '<img src= "data:image/png;base64,'.base64_encode($row['Foto']).'"height = "400" width ="350"/> ';
                      $sql2 = "SELECT * FROM `laporan` ORDER BY No_Laporan DESC LIMIT 1";
                      $result2 = $conn->query($sql2);
                      if ($result2->num_rows > 0) {
                        // output data of each row
                        while($row2 = $result2->fetch_assoc()) {
                          $no_laporan=$row2['No_Laporan'];
                        }
                      } else {
                          echo "Hasil Pencarian Tidak Ada";
                      }
                      ?>
                    </td>
                    <td>No laporan</td>
                    <td>:</td>
                    <td><?php echo $no_laporan + 1; ?> </td>
                    
                  </tr><tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $row["Nama"]; ?> </td>
                    
                  </tr>
                  <tr>
                    <td>TTL</td>
                    <td>:</td>
                    <td><?php echo $row["Tanggal_Lahir"]; ?> </td>
                  </tr>
                  <tr >
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo $row["Pekerjaan"]; ?> </td>
                  </tr>
                  <tr >
                    <td>Agama</td>
                    <td>:</td>
                    <td><?php echo $row["Agama"]; ?> </td>
                  </tr>
                  <tr >
                    <td rowspan="2">NRP : <?php echo $id_user  ;?></td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $row["Alamat"]; ?> </td>
                  </tr>
                  <tr >
                    <td>Ciri-ciri</td>
                    <td>:</td>
                    <td><?php echo $row["Ciri_ciri"]; ?></td>
                  </tr>
                  <tr >
                    <td>Tanggal Validasi : <?php echo(date("Y-m-d",$t)); ?></td>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td><?php echo $row["Deskripsi"]; ?> </td>
                  </tr>
                  </table>
            <!-- </div> -->
            
            
                
                <!-- <form action="action-tambah-comment.php" method="GET">
                      <input type="text" name="comment" class="comment-box" placeholder="Add a comment..." />
                      <input hidden type="text" name="id_laporan" class="comment-box" value="<?php echo $no_laporan;?>" />
                      <input type="submit" name="submit" value="POST" class="comment-btn" />
              </form> -->
              <!-- <button>TOLAK</button> -->
              <a href="action-page-unggah.php?id_hilang=<?php echo $row["No_Identitas"];  ?>"><button>UNGGAH</button></a>
              
              <a href="polisi-page-detail-notif.php"><button>KEMBALI</button></a>
              
              
            </div>
          </div>
          </div> 
      </div>
    </section>
              <?php
                  }
              } else {
                  echo "Hasil Pencarian Tidak Ada";
              }
              ?>
    
  </body>
</html>