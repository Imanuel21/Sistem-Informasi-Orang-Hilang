<?php
include("Model/connection-database.php");
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
$sql1 = "SELECT  * FROM orang_hilang WHERE No_Identitas = '".$_GET["id_hilang"]."'";

$result = $conn->query($sql1);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="polisi-main-page.css" />
    <title>NOTIFIKASI</title>
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
  .button-terima {
    /* margin-top: 40px; */
      width: 100px;
      background-color: #4169E1;
      color: white;
      padding: 15px 0;
      font-size: 15px;
      font-weight: 60;
      border: none;
      cursor: pointer;
      margin-left: 100px;
  }
  .button-tolak {
    /* margin-top: 40px; */
      width: 100px;
      background-color: #4169E1;
      color: white;
      padding: 15px 0;
      font-size: 15px;
      font-weight: 60;
      border: none;
      cursor: pointer;
      
  }
  .button-kembali {
    /* margin-top: 40px; */
      width: 100px;
      background-color: #4169E1;
      color: white;
      padding: 15px 0;
      font-size: 15px;
      font-weight: 60;
      border: none;
      cursor: pointer;
      margin-left: 107px;
      
  }
  </style>
  <body>
  <nav class="navbar">
      <div class="nav-wrapper">
        <img src="img/logo.PNG" class="brand-img" alt="" />
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
          <div class="post">
                <div class="tabel-content">
              <table action="pencarian.php" method="POST" border="0" style="background-color: orange;">
                  <tr>
                    <td rowspan="7">
                      <?php
                      echo '<img src= "data:image/png;base64,'.base64_encode($row['Foto']).'"height = "400" width ="350"/> ';
                      ?>
                    </td>
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
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td><?php echo $row["Deskripsi"]; ?> </td>
                  </tr>
                  </table>
              <a href="action-tolak-laporan.php?id_hilang=<?php echo $row["No_Identitas"];  ?>"><button class="button-tolak">TOLAK</button></a>
              <a href="polisi-page-unggah.php?id_hilang=<?php echo $row["No_Identitas"];  ?>"><button class="button-terima">TERIMA</button></a>
              <a href="polisi-page-notif.php"><button class="button-kembali">KEMBALI</button></a>
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
