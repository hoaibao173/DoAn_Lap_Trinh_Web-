  <?php

include("../db.php");

$admin_id = $_GET['id'];

$sql = "select *from taikhoanadmin where maAdmin= $admin_id";

$res = mysqli_query($con, $sql);

if($res == true) {

    $count =  mysqli_num_rows($res);

    if($count == 1) {

      $rows = mysqli_fetch_assoc($res);
      $admin_email = $rows['mailAdmin'];
      $admin_username = $rows['userName'];
      $admin_passWord = $rows['passAdmin'];


    } else {
    header("location: update-admin.php");
     
    }

} 
if(isset($_POST['submit'])) {
  $admin_id = $_POST['maAdmin'];
  $admin_email = $_POST['mailAdmin'];
  $admin_username = $_POST['userName'];
  $admin_passWord = $_POST['passAdmin'];
 

  $sql = "UPDATE taikhoanadmin SET userName = '$admin_username', passAdmin = '$admin_passWord',
  mailAdmin = '$admin_email' WHERE maAdmin = '$admin_id'";

  $res = mysqli_query($con, $sql);

  if($res == true ) {
    $_SESSION['update']="Admin được cập nhật thành công!";
    header("location: adminlist.php");
  } else {
    $_SESSION['update'] = "Admin được cập nhật không thành công!";

    header("location: adminlist.php");
  }
}
?>
<?php


include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">UPDATE ADMIN</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Tên username admin</label>
                         <br/>
                        <input type="text" id="userName" required name="userName" value="<?php echo $admin_username?>" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pass Word</label>
                         <br/>
                        <input type="text" id="passAdmin" required name="passAdmin" value="<?php echo $admin_passWord?>" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email admin</label>
                         <br/>
                        <input type="text" id="mailAdmin" required name="mailAdmin" class="form-control" value="<?php echo $admin_email?>">
                      </div>
                    </div>
              </div>
              
            </div>
          </div>
              <div class="card-footer">
                  <input type="hidden" name="maAdmin" value="<?php echo $admin_id; ?>" >
                  <button type="submit" id="btn-save" name="submit" required class="btn btn-fill btn-primary" value="Update Admin">UPDATE ADMIN</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
<?php
 

include "footer.php";
?>