<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
}
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $user_id = $_SESSION['user_id'];
  // Lưu bài viết vào cơ sở dữ liệu
  $pdo = new PDO('mysql:host=localhost;dbname=xss_demo', 'root', '');
  $stmt = $pdo->prepare('INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)');
  $stmt->execute([$title, $content, $user_id]);
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Đăng bài viết</title>
</head>
<body>
  <h1>Đăng bài viết</h1>
  <form method="post">
    <label>Tiêu đề:</label>
    <input type="
