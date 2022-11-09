<?php
include("connection-database.php");

$user = $_GET["username"];
$pass = $_GET["password"];

$sql1 = "SELECT username, password FROM `users` WHERE username = '".$user."' AND password ='".$pass."'";

$result = $conn->query($sql1);


if ($result->num_rows > 0) {
    echo '<script language="javascript">alert("ANDA sukses LOGIN");</script>';
    echo "<script>document.location = 'main-page.php'</script>";
} else {
    echo '<script language="javascript">alert("Akun anda belum terdaftar");</script>';
    echo "<script>document.location = 'page-register.php'</script>";
}


?>