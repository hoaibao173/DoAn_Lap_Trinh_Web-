<?php
	if(isset($_GET['huydon'])&& isset($_GET['magiaodich'])){
		$huydon = $_GET['huydon'];
		$magiaodich = $_GET['magiaodich'];
	}else{
		$huydon = '';
		$magiaodich = '';
	}
	$sql_update_giaodich = mysqli_query($con,"UPDATE chitietdonhang SET huydon='$huydon' WHERE magiaodich='$magiaodich'");
?>
<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Xem đơn hàng</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						
							<div class="row">
								<?php
								if(isset($_SESSION['user'])){
									echo 'Đơn hàng : '.$_SESSION['user'];
								} 
								?>
							<div class="col-md-12">
								
								<?php
								if(isset($_GET['khachhang'])){
									$id_khachhang = $_GET['khachhang'];
								}else{
									$id_khachhang = '';
								}
								$sql_select = mysqli_query($con,"SELECT * FROM chitietdonhang WHERE chitietdonhang.maKH='$id_khachhang' GROUP BY chitietdonhang.maChiTietDH"); 
								?> 
								<table class="table table-bordered ">
									<tr>
										<th>Thứ tự</th>
										<th>Mã giao dịch</th>
									
										<th>Ngày đặt</th>
										<th>Quản lý</th>
										<th>Tình trạng</th>
										<th>Yêu cầu</th>
									</tr>
									<?php
									$i = 0;
									while($row_donhang = mysqli_fetch_array($sql_select)){ 
										$i++;
									?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['magiaodich']; ?></td>
									
										
										<td><?php echo $row_donhang['ngaythang'] ?></td>
										<td><a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['maKH'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>">Xem chi tiết</a></td>
										<td><?php 
										if($row_donhang['tinhtrangdon']==0){
											echo 'Đã đặt hàng';
										}else{
											echo 'Đã xử lý | Đang giao hàng';
										}
										?></td>
										<td>
											<?php
											if($row_donhang['huydon']==0){ 
											?>
											<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['maKH'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>&huydon=1">Yêu cầu hủy</a>
											<?php
										}elseif($row_donhang['huydon']==1){											
											?>
											<p>Đang chờ hủy...</p>
											<?php
											}else{
												echo 'Đã hủy';
											}
											?>
										</td>
									</tr>
									 <?php
									} 
									?> 
								</table>
							</div>


							<div class="col-md-12">
								<p>Chi tiết đơn hàng</p><br>
								<?php
								if(isset($_GET['magiaodich'])){
									$magiaodich = $_GET['magiaodich'];
								}else{
									$magiaodich = '';
								}
								$sql_select = mysqli_query($con,"SELECT * FROM chitietdonhang,khachhang,mon WHERE chitietdonhang.maMon=mon.maMon AND khachhang.maKH=chitietdonhang.maKH AND chitietdonhang.magiaodich='$magiaodich' ORDER BY chitietdonhang.maChiTietDH DESC"); 
								?> 
								<table class="table table-bordered ">
									<tr>
										<th>Thứ tự</th>
										<th>Mã giao dịch</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Ngày đặt</th>
										
									</tr>
									<?php
									$i = 0;
									while($row_donhang = mysqli_fetch_array($sql_select)){ 
										$i++;
									?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['magiaodich']; ?></td>
									
										<td><?php echo $row_donhang['tenMon']; ?></td>

										<td><?php echo $row_donhang['soLuong']; ?></td>
										
										<td><?php echo $row_donhang['ngaythang'] ?></td>
									
										
									</tr>
									 <?php
									} 
									?> 
								</table>
							</div>
							</div>

						
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
				
			</div>
		</div>
	</div>
	<!-- //top products -->