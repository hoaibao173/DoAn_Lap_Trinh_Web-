<?php
session_start();
include("../db.php");
error_reporting(0);
if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
  $id = $_GET['id'];
  /*this is delet query*/
  mysqli_query($con, "delete from giohang where maGH='$id'") or die("query is incorrect...");
}

///pagination

$page = $_GET['page'];

if ($page == "" || $page == "1") {
  $page1 = 0;
} else {
  $page1 = ($page * 10) - 10;
}
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">


    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Cart List</h4>

        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table tablesorter " id="page1">
              <thead class=" text-primary">
                <tr>
                  <th>ID</th>
                  <th>Tên món</th>
                  <th>ID Món</th>
                  <th>Giá</th>
                  <th>Hình ảnh</th>
                  <th>Số lượng</th>
                <tr>
              <tbody>
                <?php

                $result = mysqli_query($con, "select maGH,tenMon,maMon,gia,hinhAnh,soLuong from giohang") or die("query 1 incorrect.....");

                $sql = "select *from giohang";

                $res = mysqli_query($con, $sql);



                if ($res == true) {

                  $count = mysqli_num_rows($res);

                  $sn = 1;

                  if ($count > 0) {

                    while ($rows = mysqli_fetch_assoc($res)) {

                      $id = $rows['maGH'];
                      $tenM = $rows['tenMon'];
                      $maM = $rows['maMon'];
                      $gia = $rows['gia'];
                      $hinhanh = $rows['hinhAnh'];
                      $sl = $row['soLuong'];
                ?>
                <tr>
                  <td><?php echo $sn++ ?></td>
                  <td><?php echo $tenM ?></td>
                  <td><?php echo $maM ?></td>
                  <td><?php echo $gia ?></td>
                  <td><?php echo $hinhanh ?></td>
                  <td><?php echo $sl ?></td>

                  <td>
                    <a class=' btn btn-danger' href="delete-cart.php?id=<?php echo $id ?>">Delete</a>
                  </td>
                 
                </tr>
                <?php
                    }
                  } else {

                  }
                }
                ?>
              </tbody>
            </table>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
          </div>
        </div>
      </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
        </ul>
      </nav>



    </div>


  </div>
</div>
<?php
include "footer.php";
?>