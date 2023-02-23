<?php
session_start();

include("../db.php");

$brand_id = $_GET['id'];

$sql = "select *from brands where brand_id= $brand_id";

$res = mysqli_query($con, $sql);

if($res == true) {

    $count =  mysqli_num_rows($res);

    if($count == 1) {

      $rows = mysqli_fetch_assoc($res);
      $brand_title = $rows['brand_title'];


    } else {
      header("location: update-brand.php");
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
                <h5 class="title">UPDATE BRAND</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên thương hiệu</label>
                            <br/>
                            <input type="text" id="brand_title" required name="brand_title" value="<?php echo $brand_title?>" class="form-control">
                        </div>
                        </div>
                    
                
                    </div>
              
            </div>
          </div>
              <div class="card-footer">
                  <input type="hidden" name="brand_id" value="<?php echo $brand_id ?>" >
                  <button type="submit" id="btn-save" name="submit" required class="btn btn-fill btn-primary" value="Update Brands">UPDATE BRANDS</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
<?php
 
if(isset($_POST['submit'])) {
      $brand_id = $_POST['brand_id'];
      $brand_title = $_POST['brand_title'];
     
      $sql = "UPDATE brands SET brand_title = '$brand_title' WHERE brand_id = '$brand_id'";

      $res = mysqli_query($con, $sql);

      if($res == true ) {

        header('location: brandlist.php');

        $_SESSION['update']="Brand được cập nhật thành công!";
        

        
      } else {
        $_SESSION['update'] = "Brand được cập nhật không thành công!";

        header('location: update-brand.php');
      }
    }
  ?>
  <?php
include "footer.php";
?>