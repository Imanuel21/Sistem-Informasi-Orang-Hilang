<?php
include("Model/connection-database.php");
$user = $_GET["user"];
$sql1 = "SELECT  * FROM orang_hilang e JOIN laporan d
ON (e.No_Identitas = d.No_Identitas) WHERE e.No_Identitas = '".$_GET['No_Identitas']."'";

$result = $conn->query($sql1);

$sql5 = "SELECT  * FROM orang_hilang WHERE Visible = '0'";
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
    <link rel="stylesheet" href="edit-laporan.css">
    <title>EDIT LAPORAN</title>
</head>

<body>
<nav class="navbar">
      <div class="nav-wrapper">
        <img src="img/logo.PNG" class="brand-img" alt="" />
        <!-- <input type="text" class="search-box" placeholder="search" /> -->
        <div class="nav-items">
        <a href="polisi-main-page.php"><img src="img/home.PNG" class="icon" alt="" /></a>
            <a href="polisi-page-notif.php"><img src="img/notif.png" class="icon" alt="" /></a>
            <span class="icon-button__badge"><?php echo $countNotif;?></span>

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
                    // $Image=$row['Foto'];
                  ?> 
    <div class="wrapper">
    <form action="action-update-laporan.php" method="POST">
            <h3>Edit Laporan</h3>
            <br></br>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" readonly type="text" class="form-control" title="No_Identitas" name="No_Identitas" value="<?php echo $row['No_Identitas'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" title="Nama" name="Nama" value="<?php echo $row['Nama'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" title="Alamat" name="Alamat" value="<?php echo $row['Alamat'];?>">
            </div>
            <div class="form-group d-flex align-items-center"> 
              <input autocomplete="off" type="date" data-date-format="YYYY-MMM-DD" class="form-control" title="Tanggal_Lahir" name="Tanggal_Lahir" value="<?php echo $row['Tanggal_Lahir'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" title="Ciri_ciri" name="Ciri_ciri" value="<?php echo $row['Ciri_ciri'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" title="Pekerjaan" name="Pekerjaan" value="<?php echo $row['Pekerjaan'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" title="Agama" name="Agama" value="<?php echo $row['Agama'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" title="Status Keberadaan" name="Status" value="<?php echo $row['Status'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" title="Deskripsi" name="Deskripsi" value="<?php echo $row['Deskripsi'];?>">
            </div>
            <!-- <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="file" class="form-control" name="update foto" enctype="multipart/form-data">
            </div> -->
            <p>
            <?php
                      echo '<img src= "data:image/png;base64,'.base64_encode($row['Foto']).'"height = "400" width ="350"/> ';
                      ?>
            </p>
            <br></br>
            <!-- <div class="button"><button>UPDATE LAPORAN</button></div> -->
            <button class="button" name="btn">Update Laporan</button>
            
            
            <!-- <button>UPDATE LAPORAN</button> -->
    </form>
    <a href="polisi-main-page.php"><button class="button-kembali" name="btn">Kembali</button></a>
    </div>
    <?php
                  }
              } else {
                  echo "Hasil Pencarian Tidak Ada";
              }
              ?>
</body>
</html>