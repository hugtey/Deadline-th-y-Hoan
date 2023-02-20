<?php
$severname = 'localhost';
$username = 'wordpress';
$password = '123123lc';
$dbname = 'user';

$conn = new mysqli($severname, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Kết nối thất bại:' . $conn->connect_error);
}
    return 0;
?>