<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tes</title>
</head>
<body>
    <!-- <table action="tes.php" method="GET">
        <input type="text" name ="comment" id = "comment"class="comment-box" placeholder="Add a comment" />
        <button>tes</button>
    </table> -->
    <form action="tes.php" method="GET">
        <input type="text" name ="comment" id = "comment"  class="comment-box" placeholder="Add a comment" />
        <label for="id" name = "hehe" hidden>1</label>
        <a href="tes.php?id=1"><button name="submit">gassss</button></a>
    </form>
    <?php
        // echo '<script type="text/javascript">' . 
        // 'document.getElementById("comment").value;' .
        // '</script>';
    ?>
    
    
</body>
</html> -->

<?php

//koen sudah, sekarang lanjut sisi polisi atau kalau mau bagian pemberitahuan
include("connection-database.php");
session_start();
$user = $_SESSION["user"];
$komen = "";
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
$sql1 = "SELECT  *
FROM orang_hilang e JOIN laporan d
ON (e.No_Identitas = d.No_Identitas)";

$result = $conn->query($sql1);

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
          <img src="img/home.PNG" class="icon" alt="" />
          <a href="page-tambah-laporan.php"><img src="img/add.PNG"class="icon"/></a>
          <img src="img/notif.png" class="icon" alt="" />
          <div class="icon user-profile"></div>
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
            <div class="info">
              <div class="user">
                <div class="profile-pic"><img src="img/PForghilang.jpeg" alt="" /></div>
                <p class="username">Web_OrangHilang</p>
              </div>
                <img src="img/option.PNG" class="options" alt="" />
                </div>
                <div class="tabel-content">
              <!-- <img src="img/cover 14.png" class="post-image" alt="" /> -->
              <table action="pencarian.php" method="POST" border="0" style="background-color: orange;">
                  <tr>
                    <td rowspan="7">
                      <!-- <img src="image_view.php?id_gambar=<?php echo $row['No_Identitas']; ?>" width="400"> -->
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
            </div>
            <div class="post-content">
              <div class="reaction-wrapper">
                
                <img src="img/comment.PNG" class="icon" alt="" />
                <img src="img/send.PNG" class="icon" alt="" />
                <img src="img/save.PNG" class="save icon" alt="" />
              </div>
              
              <?php
                $no_laporan = $row["No_Laporan"];
                $sql2 = "SELECT * FROM laporan 
                JOIN detail_laporan ON laporan.No_Laporan = detail_laporan.No_Laporan
                JOIN informasi ON informasi.No_Informasi = detail_laporan.No_Informasi 
                JOIN users ON users.Id_user = informasi.Id_Informan WHERE laporan.No_Laporan = ".$no_laporan."";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                  // output data of each row
                  while($row2 = $result2->fetch_assoc()) {
              ?>
                  <p class="description"><span><?php echo $row2["username"]; ?></span> <?php echo $row2["Informasi"]; ?></p>
              <?php
                  }
                }
              ?>
              <p class="post-time">2 minutes ago</p>
            </div>
            <div class="comment-wrapper">
              <img src="img/smile.PNG" class="icon" alt="" />
                
                <form action="action-tambah-comment.php" method="GET">
                      <input type="text" name="comment" class="comment-box" placeholder="Add a comment..." />
                      <input hidden type="text" name="id_laporan" class="comment-box" value="<?php echo $no_laporan;?>" />
                      <input type="submit" name="submit" value="POST" class="comment-btn" />
              </form>
              
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
