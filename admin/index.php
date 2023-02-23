<?php
session_start();

//ktra dang nhap. Neu chua -> login.html 
if (!isset($_SESSION))
  session_start();
if (!isset($_SESSION['admin'])) {
  header('location:login.html');
  exit;
}
?>

<?php
include("../db.php");

include "sidenav.php";
include "topheader.php";
?>

<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="panel-body">
      <?php
      if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
      }

      ?>
      <a>
        <?php //success message
        if (isset($_POST['success'])) {
          $success = $_POST["success"];
          echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
        }
        ?>
      </a>

    </div>
    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title"> Danh sách User</h4>
          <br><br>

          <br>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table table-hover tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th>Mã</th>
                  <th>Tên</th>
                  <th>Mật khẩu</th>
                  <th>Liên hệ</th>
                  <th>Địa chỉ</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_query($con, "select * from khachhang") or die("query 1 incorrect.....");

                while (list($user_id, $first_name, $email, $password, $phone, $address1) = mysqli_fetch_array($result)) {
                  echo "<tr><td>$user_id</td><td>$first_name</td><td>$email</td><td>$password</td><td>$phone</td><td>$address1</td>

                        </tr>";
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
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Danh sách phân loại</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive ps">
              <table class="table table-hover tablesorter " id="">
                <thead class=" text-primary">
                  <tr>
                    <th>Mã</th>
                    <th>Loại</th>
                    <th>Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = mysqli_query($con, "select * from loai") or die("query 1 incorrect.....");
                  $i = 1;
                  while (list($cat_id, $cat_title) = mysqli_fetch_array($result)) {
                    $sql = "SELECT COUNT(*) AS count_items FROM mon WHERE maLoai=$i";
                    $query = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($query);
                    $count = $row["count_items"];
                    $i++;
                    echo "<tr><td>$cat_id</td><td>$cat_title</td><td>$count</td>

                        </tr>";
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
      </div>
    </div>
  </div>
  <?php
  include "footer.php";
  ?>