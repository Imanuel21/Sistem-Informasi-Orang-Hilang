<?php
include("connection-database.php");
session_start();
$username = $_POST["username"];
$password = $_POST["password"];
session_start();
$_SESSION["user"] = $username;
header("Location: main-page.php");

$sql1 = "SELECT username, password FROM `users` WHERE username = '".$username."' AND password ='".$password."'";

$result = $conn->query($sql1);


if ($result->num_rows > 0) {
    echo '<script language="javascript">alert("ANDA sukses LOGIN");</script>';
    echo "<script>document.location = 'main-page.php'</script>";
} else {
    $sql2 = "SELECT username, password FROM `missing_person_unit` WHERE Username = '".$username."' AND Password ='".$password."'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        echo '<script language="javascript">alert("ANDA sukses LOGIN");</script>';
        echo "<script>document.location = 'testing1.php'</script>";
    } else {
        echo '<script language="javascript">alert("Akun anda belum terdaftar");</script>';
        echo "<script>document.location = 'page-register.php'</script>";
    }
}


?>