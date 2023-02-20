<?php
// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "wordpress";
$password = "123123lc";
$dbname = "user";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Xử lý dữ liệu đăng ký
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $email = $_POST['email'];

  // Kiểm tra mật khẩu và xác nhận mật khẩu có khớp nhau không
  if ($password !== $confirm_password) {
    echo "Mật khẩu và xác nhận mật khẩu không khớp.";
  } else {
    // Kiểm tra xem tên đăng nhập đã tồn tại trong cơ sở dữ liệu chưa
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "Tên đăng nhập đã tồn tại.";
    } else {
      // Lưu thông tin người dùng vào cơ sở dữ liệu
      $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
      if (mysqli_query($conn, $sql)) {
        echo "Đăng ký thành công.";
      } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }

  // Đóng kết nối cơ sở dữ liệu
  mysqli_close($conn);
}
?>