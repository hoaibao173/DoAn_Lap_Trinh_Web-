
<?php
    session_start();

    include("../db.php");

    $id = $_GET['id'];

    $sql = "delete from giohang where maGH = $id";

    $res = mysqli_query($con, $sql);

    if($res == true) {

        $_SESSION['delete'] = "Cart được xóa thành công!";

        header("location: cartlist.php");

    } else {

        $_SESSION['delete'] = "Xóa không thành công. Vui lòng thử lại!";

        header("location: cartlist.php");

        
    }
?>