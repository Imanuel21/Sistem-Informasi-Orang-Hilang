<?php
include("Model/connection-database.php");
session_start();
$username = $_POST["username"];
$password = $_POST["password"];
session_start();
$_SESSION["user"] = $username;


$sql1 = "SELECT username, password FROM `users` WHERE username = '".$username."' AND password ='".$password."'";

$result = $conn->query($sql1);


if ($result->num_rows > 0) {
    header("Location: main-page.php");
} 
else { //jika yang login adalah polisi
        $sql2 = "SELECT username, password FROM `missing_person_unit` WHERE Username = '".$username."' AND Password ='".$password."'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            header("Location: polisi-main-page.php");
        } else {
            echo '<script language="javascript">alert("LOGIN GAGAL");</script>';
            echo "<script>document.location = 'page-register.php'</script>";
    }
}
?>