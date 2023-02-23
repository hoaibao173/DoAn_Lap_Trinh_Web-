<?php
session_start();
include("../db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$admin_id=$_GET['maAdmin'];
/*this is delet query*/
mysqli_query($con,"delete from taikhoanadmin where maAdmin='$admin_id'")or die("query is incorrect...");
}

///pagination

$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
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
                <h4 class="card-title"> Admin List</h4>

                <br>
                <?php
                  if(isset($_SESSION['delete'])) {

                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);

                  }
                  if(isset($_SESSION['update'])) {

                    echo $_SESSION['update'];
                    unset($_SESSION['update']);

                  }
                ?>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Tên admin</th><th>
	<a class=" btn btn-primary" href="addadmin.php">Add New</a></th></tr></thead>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"select maAdmin,userName from taikhoanadmin")or die ("query 1 incorrect.....");

                        $sql = "select *from taikhoanadmin";

                        $res = mysqli_query($con, $sql);

                        
                        
                          if($res== true) {

                          $count = mysqli_num_rows($res);

                          $sn = 1;

                          if($count >0) {

                            while($rows = mysqli_fetch_assoc($res)) {

                                $admin_id = $rows['maAdmin'];
                                $admin_email = $rows['mailAdmin'];
                                $admin_username = $rows['userName'];
                                $admin_password = $rows['passAdmin'];
                               
                          ?>
                          <tr>
                            <td><?php echo $sn++ ?><td><?php echo $admin_username?></td></td><td><?php echo $admin_password ?></td><td><?php echo $admin_email ?></td>
                            <td>
                                <a class=' btn btn-danger' href="delete-admin.php?id=<?php echo $admin_id?>">Delete</a>
                            </td>
                            <td>
                                <a class=' btn btn-success' href="update-admin.php?id=<?php echo $admin_id?>">Update</a>
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
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
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
                 <?php 
//counting paging

                $paging=mysqli_query($con,"select maLoai, tenLoai from loai");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="categorieslist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
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