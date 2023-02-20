<?php

include 'connect.php';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
}

// Truy vấn dữ liệu từ bảng
$sql = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password' ";
$result = mysqli_query($conn, $sql);

// Kiểm tra kết quả
if (mysqli_num_rows($result) == 1) {
  // Hiển thị dữ liệu
  while ($row = mysqli_fetch_assoc($result)) {
    echo 'Xin chào ' . $row["fullname"];
  }
} elseif (mysqli_num_rows($result) > 1) {
  echo 'Tên đăng nhập hoặc mật khẩu đã tồn tại';
} else {
  echo 'Tài khoản hoặc mật khẩu không hợp lệ';
}

// Đóng kết nối
mysqli_close($conn);
?>
<br>
<a href="index.html"> Quay lại trang chủ</a>