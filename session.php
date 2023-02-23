<?php
session_start();
if(!isset($_SESSION['giohang']))$_SESSION['giohang']=[];
//Xóa giỏ hng
if(isset($_GET['delcart'])&&($_GET['delcart']==1)) unset($_SESSION['giohang']);
//Xóa món
if(isset($_GET['delid'])&&($_GET['delid']>=0)){
array_splice($_SESSION['giohang'],$_GET['delid'],1);
}

//lấy dữ liệu
if(isset($_POST['addcart'])){
$hinh=$_POST['hinh'];
$tenmon=$_POST['tenmon'];
$gia=$_POST['gia'];
$soluong=$_POST['soluong'];
//kiểm tra mon đã có chưa
$fl=0;
for ($i=0; $i <sizeof($_SESSION['giohang']) ; $i++) {
  if(($_SESSION['giohang'][$i][1]==$tenmon)){
      $sl=$soluong+$_SESSION['giohang'][$i][3];
      $_SESSION['giohang'][$i][3]=$sl;
      $fl=1;
      break;
  }
}

if($fl==0){
  $sp=[$hinh,$tenmon,$gia,$soluong];
$_SESSION['giohang'][]=$sp;
}

}

?>