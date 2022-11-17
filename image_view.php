<?php
    include('connection-database.php');
    
    // if(isset($_POST['id_gambar'])) 
    // {
        // $sql1 = "SELECT * FROM orang_hilang WHERE No_Identitas='".$_GET['id_gambar']."'";
        // $sql1 = "SELECT * FROM orang_hilang";
        
        // $result = $conn->query($sql1);
        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while($row = $result->fetch_assoc()) {
        //         header("Content-type: jpeg");
        //         $image =  $row["Foto"];
        //         echo '<img src="data:image/jpeg;base64,'.base64_encode($image->load()) .'" />';
        //     }
        // }
        
    // }
    // else
    // {
    //     header('location:main-page.php');
    // }
    // if(isset($_POST['id_gambar'])) 
    // {
        // $gambar = $_GET["id_gambar"];
        // $query = mysqli_query($conn,"SELECT * FROM orang_hilang WHERE No_Identitas = '".$gambar."'");
        // $row = mysqli_fetch_array($query);
        // header("Content-type: jpeg");
        // $image =  $row["Foto"];
        // echo '<img src="data:image/jpeg;base64,'.base64_encode($image->load()) .'" />';
    // }
    // else
    // {
    //     header('location:main-page.php');
    // }

    $sql = "SELECT * FROM orang_hilang WHERE No_Identitas = '1111110101010001'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
?>