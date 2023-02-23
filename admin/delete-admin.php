
<?php
    session_start();

    include("../db.php");

    $admin_id = $_GET['id'];

    $sql = "delete from taikhoanadmin where maAdmin = $admin_id";

    $res = mysqli_query($con, $sql);

    if($res == true) {

        $_SESSION['delete'] = "Admin được xóa thành công!";

        header("location: adminlist.php");

    } else {

        $_SESSION['delete'] = "Xóa không thành công. Vui lòng thử lại!";

        header("location: adminlist.php");

        
    }
?>