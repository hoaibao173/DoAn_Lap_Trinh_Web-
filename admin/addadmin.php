<?php
session_start();
include("../db.php");


if(isset($_POST['btn_save']))
{
  $admin_email=$_POST['mailAdmin'];
  $admin_name=$_POST['userName'];
  $admin_password=$_POST['passAdmin'];


		
  mysqli_query($con,"insert into taikhoanadmin (mailAdmin,userName,passAdmin) values ('$admin_email','$admin_name','$admin_password')") or die ("query incorrect");
  header("location: adminlist.php");

mysqli_close($con);
}
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
                <h5 class="title">THÊM ADMIN</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Email admin</label>
                         <br/>
                        <input type="text" id="mailAdmin" required name="mailAdmin" class="form-control">
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tên admin</label>
                         <br/>
                        <input type="text" id="userName" required name="userName" class="form-control">
                      </div>
                    </div>
                   
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password admin</label>
                         <br/>
                        <input type="text" id="passAdmin" required name="passAdmin" class="form-control">
                      </div>
                    </div>
               
              </div>
              
            </div>
          </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Thêm ADMIN</button>
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