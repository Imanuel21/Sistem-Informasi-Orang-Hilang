<?php
    include("Model/connection-database.php");

    $sql = "SELECT * FROM orang_hilang WHERE No_Identitas = '1111110101010001'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
?>