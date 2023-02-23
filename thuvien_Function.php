<?php
function taogiohang($tenMon,$hinhmon,$dongia,$soLuong,$thanhtien,$idbill){
  $conn = ketnoidb();
  $sql ="INSERT INTO chitietgiohang (tenMon,hinhmon,dongia,soLuong,thanhtien,idbill) VALUE ('$tenMon','$hinhmon','$dongia','$soLuong','$thanhtien','$idbill')";
  //
  $conn-> exec($sql);
  $conn = null;

}

function taodonhang($maCart,$maGH,$maMon,$soLuong){
    $conn =ketnoidb();
    $sql = "INSERT INTO chitietgiohang (maChiTietGH,maGH,maMon,soLuong) VALUE ('$maCart','$maGH','$maMon','$soLuong')";
    //use exe()
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    $conn=null;
    return $last_id;
}
function ketnoidb(){
  $servername="localhost";
  $username="root";
  $password="";
  $dbname= "dbunizone";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    //
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    return $conn; 
  }catch(PDOException $e)   
  {
    return $e->getMessage();
  }
}
function showgiohang()
{
  if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
    $tong=0;
    $sl=0;
    for ($i=0; $i <sizeof($_SESSION['giohang']) ; $i++) {   
     $tong+=$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3];
     $sl+=$_SESSION['giohang'][$i][3];
    echo'        
        <tr class="text-center">
            <td>'.($i+1).'</td>
            <td class="img"><img src="images/'.$_SESSION['giohang'][$i][0].'" alt=""> </td>				
            <td >'.$_SESSION['giohang'][$i][1].'</td>						
            <td >'. $_SESSION['giohang'][$i][3].'</td>				
            <td>'. $_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3].'</td>
            <td><a href="cart.php?delid='.$i.'">Delete</a> </td>
         </tr>';   
              
        }  
        echo'        
        <tr class="text-center">			
            <td ></td>
            <td><h3>Tổng sản phẩm</h3></td >		
            <td></td>					
            <td >'.$sl.'</td>	
            <td>'.$tong.'</td>			
            <td></td>          
         </tr>';        
      } 
             
}
function tongdonhang(){
  $tong=0;
  if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
    if(sizeof($_SESSION['giohang'])>0){
    $sl=0;
        for ($i=0; $i <sizeof($_SESSION['giohang']) ; $i++) {   
        $tong+=$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3];
        $sl+=$_SESSION['giohang'][$i][3];    
        }           
      }
  }   
  return $tong;
}
