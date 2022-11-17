

<?php
include("connection-database.php");
$sql1 = "";
$nik = $_POST["nik"] ;
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$ttl = $_POST["ttl"];
$ciri = $_POST["ciri"];
$pekerjaan = $_POST["pekerjaan"];
$agama = $_POST["agama"];
$status = $_POST["status"];
$deskripsi = $_POST["deskripsi"];

$foto = $_FILES["foto"]['name'];

// if(isset($_POST['foto']))
//   {
      if(!$foto){
          echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
      }
      else
      {
          // $file_name = $_FILES['foto']['name'];
          // $file_size = $_FILES['foto']['size'];
          // $file_type = $_FILES['foto']['type'];
          // if ($file_size < 2048000 )
          // {
              $image   = addslashes(file_get_contents($foto));
              //$keterangan = $_POST['keterangan'];
              // mysqli_query($koneksi,"insert into tb_gambar (gambar) values ('$image')");
              $sql1 = "INSERT INTO orang_hilang(No_Identitas, Nama, Alamat, Tanggal_Lahir, Ciri_ciri, Pekerjaan, Agama, Foto, Status, Deskripsi) VALUES ('".$nik."','".$nama."','".$alamat."','".$ttl."','".$ciri."','".$pekerjaan."','".$agama."','".$image."','".$status."','".$deskripsi."')";
              if ($conn->query($sql1) === TRUE) {
                echo '<script language="javascript">alert("Laporan anda berhasil ditambahkan, silahkan tunggu laporan diverivikasi");</script>';
                echo "<script>document.location = 'main-page-login.php'</script>";
              } else {
                echo '<script language="javascript">alert("Laporan anda gagal ditambahkan");</script>';
                echo "<script>document.location = 'page-tambah-laporan.php'</script>";
              }
          // }
          // else
          // {
          //     echo '<span style="color:red"><b><u><i>Ukuruan File </i></u></b></span>';
          // }
      }
  // }else{
  //   echo "Gagal";
  // }


// $sql1 = "INSERT INTO orang_hilang(No_Identitas, Nama, Alamat, Tanggal_Lahir, Ciri_ciri, Pekerjaan, Agama, Foto, Status, Visible, Deskripsi) VALUES ('".$nik."','".$nama."','".$alamat."','".$ttl."','".$ciri."','".$pekerjaan."','".$agama."','".$status."','".$deskripsi."')";

// if ($conn->query($sql1) === TRUE) {
//     echo '<script language="javascript">alert("Kaporan anda berhasil ditambahkan, silahkan tunggu laporan diverivikasi");</script>';
//     echo "<script>document.location = 'page-login.php'</script>";
//   } else {
//     echo '<script language="javascript">alert("Laporan anda gagal ditambahkan");</script>';
//     echo "<script>document.location = 'page-register.php'</script>";
//   }


  

?>