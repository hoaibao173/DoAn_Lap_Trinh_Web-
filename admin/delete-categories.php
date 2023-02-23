
<?php
    session_start();

    include("../db.php");

    $cat_id = $_GET['id'];

    $sql1 = "select *from mon where maLoai = $cat_id";

    $res1 = mysqli_query($con, $sql1);

    if($res1 == true){
        $count = mysqli_num_rows($res1);

        if($count > 0){
            $_SESSION['delete'] = "Có khóa ngoại bên bảng product!";

            header("location: categorieslist.php");
        }else{
            $sql = "delete from loai where maLoai = $cat_id";

            $res = mysqli_query($con, $sql);

            if($res == true) {

            $_SESSION['delete'] = "Categories được xóa thành công!";

            header("location: categorieslist.php");

            } else {

            $_SESSION['delete'] = "Xóa không thành công. Vui lòng thử lại!";

            header("location:  categorieslist.php");

        
            }
        }
    }
?>