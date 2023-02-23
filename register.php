<?php

include "db.php";


if (isset($_POST['submit'])) {
  if ($_POST['submit'] == "register") {
    $username = $_POST['register_username'];
    $password = $_POST['register_password'];
    $sdt = $_POST['register_sdt'];
    $dchi = $_POST['register_dc'];
    $email = $_POST['register_email'];
    $query = "select * from khachhang where Email = '$email' ";
    $result = mysqli_query($con, $query) or die(mysql_error);
    if (mysqli_num_rows($result) > 0) {
      header("Location: header.php?register=" . "Tên người dùng đã được sử dụng...Sử dụng tên người dùng khác");
    } else {
      $query = "INSERT INTO khachhang VALUES (NULL,'$username','$password','$sdt','$dchi','$email')";
      $result = mysqli_query($con, $query);
      header("Location: index.php?register=" . "Đăng ký thành công!!");
    }
  }
}

?>