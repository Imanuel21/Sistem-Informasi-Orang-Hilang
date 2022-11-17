<?php
include("connection-database.php");
$sql1 = "SELECT  *
FROM orang_hilang e JOIN laporan d
ON (e.No_Identitas = d.No_Identitas)";
// $sql1 = "SELECT * FROM orang_hilang";

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
                    // echo "<td>";
                    // echo '<img src= "data:image/png;base64,'.base64_encode($row['Foto']).'"height = "100" width ="100"/> ';
                  ?> 
                  <section class="main">
      <div class="wrapper">
        <div class="left-col">
          <!-- status wrappers -->
          <div class="post">
            <div class="info">
              <div class="user">
                <div class="profile-pic"><img src="img/cover 8.png" alt="" /></div>
                <p class="username">modern_web_channel</p>
              </div>
                <img src="img/option.PNG" class="options" alt="" />
                </div>
                <div class="tabel-content">
              <!-- <img src="img/cover 14.png" class="post-image" alt="" /> -->
              <table action="pencarian.php" method="POST" border="1">
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $row["Nama"]; ?> </td>
                    <td rowspan="7">
                      <!-- <img src="image_view.php?id_gambar=<?php echo $row['No_Identitas']; ?>" width="400"> -->
                      <?php
                      echo '<img src= "data:image/png;base64,'.base64_encode($row['Foto']).'"height = "400" width ="400"/> ';
                      ?>
                    </td>
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
                <img src="img/like.PNG" class="icon" alt="" />
                <img src="img/comment.PNG" class="icon" alt="" />
                <img src="img/send.PNG" class="icon" alt="" />
                <img src="img/save.PNG" class="save icon" alt="" />
              </div>
              <p class="likes">1,012 likes</p>
              <p class="description"><span>username </span> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur tenetur veritatis placeat, molestiae impedit aut provident eum quo natus molestias?</p>
              <p class="post-time">2 minutes ago</p>
            </div>
            <div class="comment-wrapper">
              <img src="img/smile.PNG" class="icon" alt="" />
              <input type="text" class="comment-box" placeholder="Add a comment" />
              <button class="comment-btn">post</button>
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
