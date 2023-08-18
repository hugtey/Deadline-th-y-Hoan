<?php
    $host = "localhost";
    $username = "db";
    $password = "";
    $dbname = "hugtey";

    $conn = new mysqli($host, $username, $password, $dbname);

    if($conn->connect_error){
        die("Kết nối không thành công:". $conn->connect_error);
    }
    return 0;
?>
