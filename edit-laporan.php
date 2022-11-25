<?php
include("connection-database.php");
$sql1 = "SELECT  * FROM orang_hilang e JOIN laporan d
ON (e.No_Identitas = d.No_Identitas) WHERE e.No_Identitas = '".$_GET['No_Identitas']."'";

$result = $conn->query($sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT LAPORAN</title>
</head>
<body>
            <?php
              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    // $Image=$row['Foto'];
                  ?> 
    <form action="action-update-laporan.php" method="POST">
            <div class="h5 font-weight-bold text-center mb-3">Edit Laporan</div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="No_Identitas" value="<?php echo $row['No_Identitas'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="Nama" value="<?php echo $row['Nama'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="Alamat" value="<?php echo $row['Alamat'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="Tanggal_Lahir" value="<?php echo $row['Tanggal_Lahir'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="Ciri_ciri" value="<?php echo $row['Ciri_ciri'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="Pekerjaan" value="<?php echo $row['Pekerjaan'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="Agama" value="<?php echo $row['Agama'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="Status" value="<?php echo $row['Status'];?>">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="Deskripsi" value="<?php echo $row['Deskripsi'];?>">
            </div>
            <p>
            <?php
                      echo '<img src= "data:image/png;base64,'.base64_encode($row['Foto']).'"height = "400" width ="350"/> ';
                      ?>
            </p>
            <!-- <div class="btn btn-primary mb-3" style="text-align: center;" >Daftar</div> -->
            <button>UPDATE LAPORAN</button>
    </form>
    <?php
                  }
              } else {
                  echo "Hasil Pencarian Tidak Ada";
              }
              ?>
</body>
</html>