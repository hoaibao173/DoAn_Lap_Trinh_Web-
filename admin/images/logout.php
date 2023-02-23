<?php

session_start();

unset($_SESSION["uid"]);//hủy biến uid

unset($_SESSION["name"]);//hủy biến name
//Khi trình duyệt web di chuyển từ trang web này sang trang web khác và giữa các trang của trang web, trình duyệt có thể tùy chọn chuyển URL đến từ đó
$BackToMyPage = $_SERVER['HTTP_REFERER'];
if(isset($BackToMyPage)) {
    header('Location: '.$BackToMyPage);
} else {
    header('Location: index.php'); // default page
}


?>
