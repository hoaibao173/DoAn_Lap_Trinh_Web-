  <?php
session_start();
include("../db.php");

$sql='select * from loai';
$objStatement= $objPDO->prepare($sql);
$objStatement->execute();
$dataLoai = $objStatement->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['btn_save']))
{
$product_name=$_POST['tenMon'];//ten sản phẩm
$details=$_POST['moTa'];//Mô tả sản phẩm
$price=$_POST['gia'];//giá sản phẩm
//$c_price=$_POST['c_price'];
$product_type=$_POST['maLoai'];//Loại sản phẩm 

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)	
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../images/".$pic_name);		
    mysqli_query($con,"insert into mon (tenMon, gia, hinhAnh, moTa, maLoai) values ('$product_name','$price','$pic_name','$details','$product_type')") or die ("query incorrect");

 header("location: sumit_form.php?success=1");
}

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
                <h5 class="title">THÊM SẢN PHẨM</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tiều đề sản phẩm</label>
                         <br/>
                        <input type="text" id="tenMon" required name="tenMon" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Thêm hình ảnh sản phẩm</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="hinhAnh" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea rows="4" cols="80" id="moTa" required name="moTa" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>GIÁ sản phẩm</label>
                        <input type="text" id="gia" name="gia" required class="form-control" >
                      </div>
                    </div>
                   
                    
                  </div>
                 
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">THÊM SẢN PHẨM</h5>
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
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Thêm sản phẩm</button>
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