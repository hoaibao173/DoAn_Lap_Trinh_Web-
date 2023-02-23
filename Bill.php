<?php
include './session.php';
include 'thuvien_Function.php';

if(isset($_POST['xacnhan'])&&($_POST['xacnhan'])){
   $hoten=$_POST['hoten'];
   $maGH=$_POST['diachi'];
   $maMon=$_POST['sdt'];
   $soLuong=$_POST['email'];
   $total=tongdonhang();
   $pttt=0;
   var_dump ($_SESSION['giohang']);
   var_dump($_POST);
// exit;          
   // ( taogiohang ($maCart,$maGH,$maMon,$soLuong)){
   //    $conn = ketnoidb();
   //    $sql ="INSERT INTO chitietgiohang (tenMon,hinhmon,dongia,soLuong,thanhtien,idbill) VALUE ('$tenMon','$hinhmon','$dongia','$soLuong','$thanhtien','$idbill')";
   //    //
   //    $conn-> exec($sql);
   //    $conn = null;
   // }
 //  taodonhang($maCart,$maGH,$maMon,$soLuong) ;

  // echo"Bạn đã đặt hàng thành công !!! ";
}