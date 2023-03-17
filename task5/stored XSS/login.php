<?php
session_start();
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  // Kiểm tra tài khoản đăng nhập
  if ($username === 'admin' && $password === 'password') {
    $_SESSION['user_id'] = 1;
    header('Location: index.php');
  } else {
    $error = 'Đăng nhập thất bại. Vui lòng thử lại!';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Đăng nhập</title>
</head>
<body>
  <h1>Đăng nhập</h1>
  <?php if (isset($error)): ?>
    <div style="color: red;"><?php echo $error; ?></div>
  <?php endif; ?>
  <form method="post">
    <label>Tên đăng nhập:</label>
    <input type="text" name="username"><br><br>
    <label>Mật khẩu:</label>
    <input type="password" name="password"><br><br>
    <input type="submit" name="submit" value="Đăng nhập">
  </form>
</body>
</html>
