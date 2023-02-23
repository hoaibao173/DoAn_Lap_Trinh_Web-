<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
#src{
	width: auto;
	height: 300px;
}
	</style>
</head>
<body>
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$sql_cate = mysqli_query($con,"SELECT * FROM loai,mon WHERE loai.maLoai=mon.maLoai AND mon.maLoai='$id' ORDER BY mon.maMon DESC");	
	$sql_category = mysqli_query($con,"SELECT * FROM loai,mon WHERE loai.maLoai=mon.maLoai AND mon.maLoai='$id' ORDER BY mon.maMon DESC");		

	$row_title = mysqli_fetch_array($sql_category);
	if($row_title==null){
		echo" Không có món để hiển thị";
	}
	else{
		$title = $row_title['tenLoai'];	
	}
	// var_dump($row_title);
	// exit;
		
	?>
<!-- top Products -->
	
		<div class="container py-xl-4 py-lg-2">
			
			
			
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
							<?php
								while($row_sanpham = mysqli_fetch_array($sql_cate)){ 
									
								?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img id="src" src="images/<?php echo $row_sanpham['hinhAnh'] ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['maMon'] ?>" class="link-product-add-cart">Xem sản phẩm</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['maMon'] ?>"><?php echo $row_sanpham['tenMon'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<?php echo number_format($row_sanpham['gia']).'&ensp;vnđ' ?>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?quanly=giohang" method="post">
												<fieldset>
													<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['tenMon'] ?>" />
													<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['maMon'] ?>" />
													<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['gia'] ?>" />
													<input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['hinhAnh'] ?>" />
													<input type="hidden" name="soluong" value="1" />			
													<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
												</fieldset>
											</form>
											</div>
										</div>
									</div>
								</div>
								<?php
								} 
								?>
							</div>
						</div>
						<!-- //first section -->
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- //top products -->
</body>
</html>
