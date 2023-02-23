<?php
session_start();

include("../db.php");

$cat_id = $_GET['id'];

$sql = "select *from loai where maLoai= $cat_id";

$res = mysqli_query($con, $sql);

if($res == true) {

    $count =  mysqli_num_rows($res);

    if($count == 1) {

      $rows = mysqli_fetch_assoc($res);
      $cat_title = $rows['tenLoai'];


    } else {
      header("location: update-categories.php");
    }

   

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
                <h5 class="title">UPDATE CATEGORIES</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên loại sản phẩm</label>
                            <br/>
                            <input type="text" id="tenLoai" required name="tenLoai" value="<?php echo $cat_title?>" class="form-control">
                        </div>
                        </div>
                    
                
                    </div>
              
            </div>
          </div>
              <div class="card-footer">
                  <input type="hidden" name="maLoai" value="<?php echo $cat_id ?>" >
                  <button type="submit" id="btn-save" name="submit" required class="btn btn-fill btn-primary" value="Update Categories">UPDATE CATEGORIES</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
<?php
 
if(isset($_POST['submit'])) {
      $cat_id = $_POST['maLoai'];
      $cat_title = $_POST['tenLoai'];
     
      $sql = "UPDATE loai SET tenLoai = '$cat_title' WHERE maLoai = '$cat_id'";

      $res = mysqli_query($con, $sql);

      if($res == true ) {

        $_SESSION['update']="Categories được cập nhật thành công!";

        header('location: update-categories.php');        


        
      } else {
        header('location: update-categories.php');

        $_SESSION['update'] = "Categories được cập nhật không thành công!";

      }
    }
  ?>
  <?php
include "footer.php";
?>