<?php
session_start();
unset($_SESSION['user']);
session_destroy();
header("location: index.php?Message=" . "Đã đăng xuất!!");
?>

