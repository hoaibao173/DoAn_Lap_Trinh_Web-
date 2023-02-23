<?php
session_start();

include("../db.php");


$sql='select * from loai';
$objStatement= $objPDO->prepare($sql);
$objStatement->execute();
$dataLoai = $objStatement->fetchAll(PDO::FETCH_OBJ);


$product_id = $_GET['id'];

$sql = "select *from mon where maMon = $product_id";

$res = mysqli_query($con, $sql);

if($res == true) {

    $count =  mysqli_num_rows($res);

    if($count == 1) {
        $rows = mysqli_fetch_assoc($res);
        $product_title = $rows['tenMon'];
        $product_price = $rows['gia'];
        $product_image =$rows['hinhAnh'];
        $details =$rows['moTa'];
        $product_cat=$rows['maLoai'];
    } else {
      header("location: update-product.php");
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
                <h5 class="title">CẬP NHẬT SẢN PHẨM</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tiều đề sản phẩm</label>
                         <br/>
                        <input type="text" id="tenMon" required name="tenMon" class="form-control" value="<?php echo $product_title?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Thêm hình ảnh sản phẩm</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" value="<?php echo $product_image?>">
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea rows="4" cols="80" id="moTa" required name="moTa" class="form-control" ><?php echo  $details?></textarea>
                      </div>
                    </div>                 
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>GIÁ sản phẩm</label>
                        <input type="text" id="gia" name="gia" required class="form-control" value="<?php echo $product_price?>">
                      </div>
                    </div>
                    
                  </div>
                 
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">CẬP NHẬT SẢN PHẨM</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <br/>

                        <select id="maLoai" name="maLoai" class="form-control">
                        <?php 
                        foreach($dataLoai as $r)
                        {
                            ?>
                            <option value="<?php echo $r->maLoai ?>"><?php echo $r->tenLoai ?></option>
                            <?php
                        }
                        ?>
                        </select> <br>
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="card-footer">
				  <input type="hidden" name="product_id" value="<?php echo $product_id ?>" >
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Cập nhật sản phẩm</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
      <?php
 
if(isset($_POST['btn_save'])) {
    // $product_id = $_POST['maMon'];
    $product_title=$_POST['tenMon'];//ten sản phẩm
    $price=$_POST['gia'];//giá sản phẩm
    $details=$_POST['moTa'];//Mô tả sản phẩm
    //$c_price=$_POST['c_price'];
    $product_type=$_POST['maLoai'];//Loại sản phẩm 

    //picture coding
    $picture_name=$_FILES['picture']['name'];
    $picture_type=$_FILES['picture']['type'];
    $picture_tmp_name=$_FILES['picture']['tmp_name'];
    $picture_size=$_FILES['picture']['size'];
      move_uploaded_file($_FILES["picture"]["tmp_name"], "../images/".$_FILES['picture']['name']);
      $sql = "UPDATE mon SET maLoai = '$product_type', tenMon = '$product_title', gia = $price,hinhAnh ='$picture_name', moTa ='$details'  WHERE maMon = '$product_id'";
	 
      $res = mysqli_query($con, $sql);

      if($res == true ) {

        header('location: productlist.php');
        $_SESSION['update']="product được cập nhật thành công!";
      
      } else {
        header('location: update-product.php');
        $_SESSION['update'] = "product được cập nhật không thành công!";

      }
    }
  ?>
  <?php
include "footer.php";
?>