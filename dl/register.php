<?php

include 'connect.php';

if (isset($_POST['submit'])) {
    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['sex'];
    if(!empty($fullname) && !empty($username) && !empty($password) && !empty($email) && !empty($gender)){

        $sql = "INSERT INTO `tbl_users` (`fullname`, `username`, `password`, `email`, `gender`) VALUES('$fullname', '$username', md5('$password'),'$email','$gender')"; 

        if($conn->query($sql)===TRUE){
            echo 'Đăng kí thành công';
        } else {
            echo 'Lỗi {$sql}'.$conn->error;
        }

    }elseif(empty($fullname)){
        echo 'Bạn cần nhập họ và tên';
    }elseif(empty($password)){
        echo 'Bạn cần nhập mật khẩu';
    }elseif(empty($email)){
        echo 'Bạn cần nhập email';
    }elseif(empty($gender)){
        echo 'Bạn điền giới tính';
    }

}
?>
<br>
<a href="index.html"> Quay lại trang chủ</a>



































<?php
session_start();

// Kết nối đến MySQL server
$con = mysqli_connect("localhost", "wordpress", "123123lc", "user");

// Kiểm tra lỗi kết nối
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Đăng ký
if (isset($_POST["signup0"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Kiểm tra xem email đã được đăng ký trước đó chưa
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Email đã được sử dụng, vui lòng chọn một địa chỉ email khác!";
    } else {
        // Thêm người dùng mới vào database
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($con, $query)) {
            echo "Đăng ký thành công!";
        } else {
            echo "Đăng ký không thành công, vui lòng thử lại sau.";
        }
    }
}

// Đăng nhập
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Kiểm tra thông tin đăng nhập
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        // Đăng nhập thành công, lưu thông tin người dùng vào session
        $_SESSION["email"] = $email;
        header("Location: welcome.php");
    } else {
        echo "Thông tin đăng nhập không chính xác, vui lòng thử lại.";
    }
}

// Đóng kết nối
mysqli_close($con);
?>
