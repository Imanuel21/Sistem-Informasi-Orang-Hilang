<?php
session_start();
$nik = $_POST["nik"] ;
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$ttl = $_POST["ttl"];
$ciri = $_POST["ciri"];
$pekerjaan = $_POST["pekerjaan"];
$agama = $_POST["agama"];
$status = $_POST["status"];
$deskripsi = $_POST["deskripsi"];

$foto = $_FILES["myfile"]['name'];
$pelapor = $_SESSION["idPelapor"];


      if(!$foto){
          echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
      }
      else
      {
        $dbh = new PDO('mysql:host=localhost;port=3307;dbname=orang_hilang', 'root', '');
        if (isset($_POST['btn'])) {
            $data = file_get_contents($_FILES['myfile']['tmp_name']);
            $stmt = $dbh->prepare("INSERT INTO orang_hilang VALUES(?,?,?,?,?,?,?,?,?,'',?,?,'')");
            $stmt->bindParam(1,$nik);
            $stmt->bindParam(2,$nama);
            $stmt->bindParam(3,$alamat);
            $stmt->bindParam(4,$ttl);
            $stmt->bindParam(5,$ciri);
            $stmt->bindParam(6,$pekerjaan);
            $stmt->bindParam(7,$agama);
            $stmt->bindParam(8,$data);
            $stmt->bindParam(9,$status);
            $stmt->bindParam(10,$deskripsi);
            $stmt->bindParam(11,$pelapor);
            if ($stmt->execute() ==  TRUE) {
                echo '<script language="javascript">alert("Laporan anda berhasil ditambahkan, silahkan tunggu laporan diverivikasi");</script>';
                echo "<script>document.location = 'main-page.php'</script>";
            }else {
              echo '<script language="javascript">alert("Laporan anda gagal ditambahkan");</script>';
              echo "<script>document.location = 'page-tambah-laporan.php'</script>";
            }
        }else{
          echo "GAGAL";
        }
      }
?>