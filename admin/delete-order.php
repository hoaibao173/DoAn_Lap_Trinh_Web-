
<?php
    session_start();

    include("../db.php");

    $order_id = $_GET['id'];

    $sql = "delete from orders where order_id = $order_id";

    $res = mysqli_query($con, $sql);

    if($res == true) {

        $_SESSION['delete'] = "Order được xóa thành công!";

        header("location: orders.php");

    } else {

        $_SESSION['delete'] = "Xóa không thành công. Vui lòng thử lại!";

        header("location: orders.php");

        
    }
    
?>