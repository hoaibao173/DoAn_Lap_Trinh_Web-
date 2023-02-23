<?php
include "db.php";

if (isset($_POST['submit'])) {
  if ($_POST['submit'] == "login") {
    $mail = $_POST['login_email'];
    $password = $_POST['login_password'];
    $query = "SELECT * from khachhang where Email ='$mail' AND matKhauKH='$password'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user'] = $row['tenKH'];
      $_SESSION['maKH'] = $row['maKH'];
      header("Location: header.php?login=" . "Đã đăng nhập thành công");
  }else
      echo "Tên đăng nhập hoặc mật khẩu không chính xác";
  }
}