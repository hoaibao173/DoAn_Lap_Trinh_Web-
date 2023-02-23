<?php
 if(isset($_POST['themgiohang'])){
 	$tensanpham = $_POST['tensanpham'];
 	$sanpham_id = $_POST['sanpham_id'];
 	$hinhanh = $_POST['hinhanh'];
 	$gia = $_POST['giasanpham'];
 	$soLuong = $_POST['soluong'];	
 	$sql_select_giohang = mysqli_query($con,"SELECT * FROM giohang WHERE maMon='$sanpham_id'");
 	$count = mysqli_num_rows($sql_select_giohang);
 	if($count>0){
 		$row_sanpham = mysqli_fetch_array($sql_select_giohang);
 		$soluong = $row_sanpham['soLuong'] + 1;
 		$sql_giohang = "UPDATE giohang SET soLuong='$soluong' WHERE maMon='$sanpham_id'";
 	}else{
 		$soluong = $soLuong;
 		$sql_giohang = "INSERT INTO giohang(tenMon,maMon,gia,hinhAnh,soLuong) values ('$tensanpham','$sanpham_id','$gia','$hinhanh','$soLuong')";

 	}
 	$insert_row = mysqli_query($con,$sql_giohang);
 	// if($insert_row==0){
 	// 	header('Location:index.php?quanly=chitietsp&id='.$sanpham_id);	
 	// }

 }elseif(isset($_POST['capnhatsoluong'])){
 	
	for($i=0;$i<count($_POST['product_id']);$i++){
		$sanpham_id = $_POST['product_id'][$i];
		$soluong = $_POST['soluong'][$i];
	   // var_dump($_POST);
	   // exit;
		if($soluong>=10){
		   echo"Liên Hệ Để được giá tốt"; 			
		}
	   else if($soluong<10&&$soluong>0){			
		   $sql_update = mysqli_query($con,"UPDATE giohang SET soLuong='$soluong' WHERE maMon='$sanpham_id'");
	   }
	 
	}
 

 }elseif(isset($_GET['xoa'])){
 	$id = $_GET['xoa'];
 	$sql_delete = mysqli_query($con,"DELETE FROM giohang WHERE maGH='$id'");

 }elseif(isset($_GET['dangxuat'])){
 	$id = $_GET['dangxuat'];
 	if($id==1){
 		unset($_SESSION['login']);
 	}

 
 }elseif(isset($_POST['thanhtoan'])){
	$name = $_POST['tenKH'];
	$phone = $_POST['SDT'];
	$email = $_POST['Email'];
	$password = md5($_POST['matKhauKH']);
	$address = $_POST['DiaChi'];

	$sql_khachhang = mysqli_query($con,"INSERT INTO khachhang(tenKH,matKhauKH, SDT, DiaChi, Email) values ('$name','$password''$phone','$address','$email')");
	if($sql_khachhang){
		$sql_select_khachhang = mysqli_query($con,"SELECT * FROM khachhang ORDER BY maKH DESC LIMIT 1");
		$mahang = rand(0,9999);
		$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
		$khachhang_id = $row_khachhang['maKH'];
		$_SESSION['login'] = $row_khachhang['tenKH'];
		$_SESSION['maKH'] = $khachhang_id;
		// var_dump($_SESSION['maKH']);	exit;

		for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
			$sanpham_id = $_POST['thanhtoan_product_id'][$i];
			$soluong = $_POST['thanhtoan_soluong'][$i];
			$sql_giaodich = mysqli_query($con,"INSERT INTO chitietdonhang(maMon,soluong,magiaodich,maKH) values ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
			$sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM giohang WHERE maMon='$sanpham_id'");
		}

	}
}elseif(isset($_POST['thanhtoandangnhap'])){
	
	$khachhang_id = $_SESSION['maKH'];
	// var_dump($khachhang_id);
	// exit;
	$mahang = rand(0,9999);	
	for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
			$sanpham_id = $_POST['thanhtoan_product_id'][$i];
			$soluong = $_POST['thanhtoan_soluong'][$i];
			$sql_giaodich = mysqli_query($con,"INSERT INTO chitietdonhang(maMon,soluong,magiaodich,maKH) values ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
			$sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM giohang WHERE maMon='$sanpham_id'");
		}

	
}
?>

<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Giỏ hàng của bạn
			</h3>
				<?php 
				if(isset($_SESSION['user'])){
					echo '<p style="color:#000;">Xin chào bạn: '.$_SESSION['user'];
					
					
				}else{
					echo '';
				}
				?>
				 
			<!-- //tittle heading -->
			<div class="checkout-right">
			<?php
			$sql_lay_giohang = mysqli_query($con,"SELECT * FROM giohang ORDER BY maGH DESC");

			?>

				<div class="table-responsive">
					<form action="" method="POST">
					
					<table class="timetable_sub" >
						<thead>
							<tr>
								<th>Thứ tự &emsp;&emsp;&emsp;</th>
								<th>Sản phẩm&emsp;&emsp;&emsp;</th>
								<th>&emsp;&emsp;&emsp;Số lượng&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
								<th>Tên sản phẩm&emsp;&emsp;&emsp;</th>

								<th>Giá&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
								<th>Giá tổng&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
								<th>Quản lý&emsp;&emsp;&emsp;</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$i = 0;
						$total = 0;
						while($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)){ 

							$subtotal = $row_fetch_giohang['soLuong'] * $row_fetch_giohang['gia'];
							$total+=$subtotal;
							$i++;
						?>
							<tr class="rem1">
								<td class="invert"><?php echo $i ?></td>
								<td class="invert-image">
									<a href="single.html">
										<img src="images/<?php echo $row_fetch_giohang['hinhAnh'] ?>" alt=" " height="120" class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['maMon'] ?>">
									<input type="number" min="1" name="soluong[]" value="<?php echo $row_fetch_giohang['soLuong'] ?>">
								
									
								</td>
								<td class="invert"><?php echo $row_fetch_giohang['tenMon'] ?></td >
								<td class="invert"><?php echo number_format($row_fetch_giohang['gia']).'&ensp;vnđ' ?></td>
								<td class="invert"><?php echo number_format($subtotal).'&ensp;vnđ' ?></td>
								<td class="invert">
									<a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['maGH'] ?>">Xóa</a>
								</td>
							</tr>
							<?php
							} 
							?>
							<tr>
								<td colspan="7">Tổng tiền : <?php echo number_format($total).'&ensp;vnđ' ?></td>

							</tr>
							<tr>
								<td colspan="7"><input type="submit" class="btn btn-success" value="Cập nhật giỏ hàng" name="capnhatsoluong">
								<?php 
								$sql_giohang_select = mysqli_query($con,"SELECT * FROM giohang");
								$count_giohang_select = mysqli_num_rows($sql_giohang_select);

								if(isset($_SESSION['user']) && $count_giohang_select>0){
									while($row_1 = mysqli_fetch_array($sql_giohang_select)){
								?>
								
								<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['maMon'] ?>">
								<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['soLuong'] ?>">
								<?php 
							}
	                               
								?>
								
								<input type="submit" class="btn btn-primary" value="Thanh toán giỏ hàng" name="thanhtoandangnhap">
		
								<?php
								} 
								?>
								
								</td>
							
							</tr>
						</tbody>
					</table>
					</form>
				</div>
			</div>
			<?php
			if(!isset($_SESSION['user'])){ 
			?>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Thêm địa chỉ giao hàng</h4>
					<form action="" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Điền tên" required="">
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Password" name="password" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Số phone" name="phone" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Địa chỉ" name="address" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Email" name="email" required="">
									</div>
									
								</div>
								<?php
								$sql_lay_giohang = mysqli_query($con,"SELECT * FROM giohang ORDER BY maGH DESC");
								while($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)){ 
								?>
									<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['maMon'] ?>">
									<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soLuong'] ?>">
								<?php
								} 
								?>
								<input type="submit" name="thanhtoan" class="btn btn-success" style="width: 20%" value="Thanh toán">
								
							</div>
						</div>
					</form>
					
				</div>
			</div>
			<?php
			} 
			?>
		</div>
	</div>
	<!-- //checkout page -->