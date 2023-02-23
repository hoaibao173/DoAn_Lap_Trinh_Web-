
<?php
    session_start();

    include("../db.php");

    $user_id = $_GET['id'];

    $sql = "delete from khachhang where maKH = $user_id";

    $res = mysqli_query($con, $sql);

    if($res == true) {

        $_SESSION['delete'] = "User được xóa thành công!";

        header("location: userlist.php");

    } else {

        $_SESSION['delete'] = "Xóa không thành công. Vui lòng thử lại!";

        header("location: userlist.php");

        
    }
?>