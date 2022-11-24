<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>BLOB FILE</title>
</head>
<body>
    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $db = "test";
        // $port ="3307";
        
        // // Create connection
        // $dbh = new mysqli($servername, $username, $password,$db ,$port);
        
        // // Check connection
        // if ($conn->connect_error) {
        //   die("Connection failed: " . $conn->connect_error);
        // }
        // $dbh = new PDO("mysql:host=localhost;dbname=test"."root","");
        $dbh = new PDO('mysql:host=localhost;port=3307;dbname=test', 'root', '');
        // mysql:host=localhost;port=3307;dbname=testdb
        if (isset($_POST['btn'])) {
            $name = $_FILES['myfile']['name'];
            $type = $_FILES['myfile']['type'];
            $data = file_get_contents($_FILES['myfile']['tmp_name']);
            $stmt = $dbh->prepare("INSERT INTO foto values('',?,?)");
            $stmt->bindParam(1,$name);
            // $stmt->bindParam(2,$type);
            $stmt->bindParam(2,$data);
            $stmt->execute();
        }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <button name="btn">Upload</button>
    </form>
</body>
</html>