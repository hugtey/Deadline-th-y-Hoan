<?php
session_start();

// Kết nối đến MySQL server
$con = mysqli_connect("localhost","wordpress", "123123lc","user");

// Kiểm tra lỗi kết nối
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Đăng ký
if (isset($_POST["signup"])) {
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
