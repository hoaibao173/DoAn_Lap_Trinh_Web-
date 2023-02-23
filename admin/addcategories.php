  <?php
session_start();
include("../db.php");


if(isset($_POST['btn_save']))
{
  $cat_title=$_POST['tenLoai'];


		
  mysqli_query($con,"insert into loai (tenLoai) values ('$cat_title')") or die ("query incorrect");
  header("location: sumit_form.php?success=1");

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
                <h5 class="title">THÊM LOẠI SẢN PHẨM</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tên loại sản phẩm</label>
                         <br/>
                        <input type="text" id="tenLoai" required name="tenLoai" class="form-control">
                      </div>
                    </div>
               
              </div>
              
            </div>
          </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Thêm loại sản phẩm</button>
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