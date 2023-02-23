<?php
include './session.php';
include './thuvien_Function.php';
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Feane </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
       .table .thead-primary {
        background: #c49b63;
    }
    
    .table .thead-primary tr th {
        padding: 20px 10px;
        color: #fff !important;
        border: 2px solid transparent !important;
    }
    .text-center {
        text-align: left;
    }
    .table tr td.product-remove a {
        bordeR: 1px solid rgba(255, 255, 255, 0.1);
        padding: 5px 10px;
    }
    
    .table tr td.product-remove a:hover {
        background: #c49b63;
    }
    
    .table  tr td.product-remove a:hover span {
        color: #000;
    }
    .table  tr td img{
      width: 100px;
      height:100px;
    
    }
  </style>

</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <?php
    include './header_cart.php'
    ?>
    <!-- end header section -->
  </div>

  <!-- about section -->

  <?php
  //include './cartmon.php'
  ?>
<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">  		
    			<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
                     <th>Stt</th>					        
						        <th>Hình ảnh</th>
						        <th>Tên món</th>
						        <th>Số lượng</th>
						        <th>giá</th>
                    <th></th>                    
						      </tr>
						    </thead>
						   					      
                <?php 
            showgiohang();
            
                    ?>		        
                    
						      <!-- END TR-->					     
						    
						  </table>	

    		</div>
      
    		<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
    				<!-- <div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>$20.60</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>  
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>$17.60</span>
    					</p>
    				</div> -->
    				<p class="text-center"><a href="menu.php" class="btn btn-primary py-3 px-4">Tiếp tục mua hàng</a></p>
            <p class="text-center"><a href="cart.php?delcart=1" class="btn btn-primary py-3 px-4">Xóa giỏ hàng</a></p>

    			</div>
        
    		</div>
			</div>
		</section>
    
  <!-- end about section -->

  <!-- footer section -->

  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
 
</body>

</html>