<?php
session_start();
include "db.php";

if (isset($_GET['Message'])) {
  print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}

if (isset($_GET['response'])) {
  print '<script type="text/javascript">
               alert("' . $_GET['response'] . '");
           </script>';
}

if (isset($_POST['submit'])) {
  if ($_POST['submit'] == "login") {
    $mail = $_POST['login_email'];
    $password = $_POST['login_password'];
    $query = "SELECT * from khachhang where Email ='$mail' AND matKhauKH='$password'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user'] = $row['tenKH'];
      $_SESSION['maKH'] = $row['maKH'];

      print '
                <script type="text/javascript">alert("Đã đăng nhập thành công!!!");</script>
                  ';
    } else {
      print '
              <script type="text/javascript">alert("Tên đăng nhập hoặc mật khẩu không chính xác!!");</script>
                  ';
    }
  } else if ($_POST['submit'] == "register") {
    $username = $_POST['register_username'];
    $password = $_POST['register_password'];
    $sdt = $_POST['register_sdt'];
    $dchi = $_POST['register_dc'];
    $mail = $_POST['register_email'];
    $query = "select * from khachhang where Email = '$mail'";
    $result = mysqli_query($con, $query) or die(mysql_error);
    if (mysqli_num_rows($result) > 0) {
      print '
               <script type="text/javascript">alert("Tên người dùng đã được sử dụng");</script>
                    ';

    } else {
      $query = "INSERT INTO khachhang VALUES (NULL,'$username','$password','$sdt','$dchi','$mail')";
      $result = mysqli_query($con, $query);
      print '
                <script type="text/javascript">
                 alert("Đăng ký thành công, vui lòng đăng nhập lại");
                </script>
               ';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    #login_button,
    #register_button {
      background: none;
      color: #D67B22 !important;
    }

    #bs-example-navbar-collapse-1 a {
      color: Red;
    }
  </style>
</head>

<body>
  <!-- header section strats -->
  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span>
            Uni Zone
          </span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  mx-auto ">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menu.php?quanly=danhmuc&id=23">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">Về Uni Zone</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="book.php">Chính sách giao hàng</a>
            </li>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
            <li class="text-center border-right text-white">
              <a href="menu.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['maKH'] ?>" class="text-white">
                <i class="fas fa-truck mr-2"></i>Xem đơn hàng : <?php echo $_SESSION['user'] ?></a>
            </li>
            <?php
            }
            ?>
          </ul>
          <div class="user_option">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#" style="padding: 1px;">
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (!isset($_SESSION['user'])) {
                          echo '
            <li>
                <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#login">Đăng nhập</button>
                  <div id="login" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center">Đăng nhập tài khoản</h4>
                            </div>
                            <div class="modal-body">
                                          <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                              <div class="form-group">
                                              <label class="sr-only" for="email">email</label>
                                              <input type="email" name="login_email" class="form-control"  placeholder="Email" required>
                                            </div>

                                              <div class="form-group">
                                                  <label class="sr-only" for="password">Password</label>
                                                  <input type="password" name="login_password" class="form-control"  placeholder="Mật khẩu" required>
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit" name="submit" value="login" class="btn btn-block">
                                                      Đăng nhập
                                                  </button>
                                              </div>
                                          </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                  </div>
            </li>
            <li>
              <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register">Đăng kí</button>
                <div id="register" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title text-center">Đăng kí tài khoản</h4>
                          </div>
                          <div class="modal-body">
                                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                            <div class="form-group">
                                                <label class="sr-only" for="username">Username</label>
                                                <input type="text" name="register_username" class="form-control" placeholder="Họ và tên" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" name="register_password" class="form-control"  placeholder="Mật khẩu" required>
                                            </div>
                                            <div class="form-group">
                                              <label class="sr-only" for="sdt">sdt</label>
                                              <input type="text" name="register_sdt" class="form-control"  placeholder="Số điện thoại" required>
                                            </div>
                                            <div class="form-group">
                                            <label class="sr-only" for="dc">dc</label>
                                            <input type="text" name="register_dc" class="form-control"  placeholder="Địa chỉ" required>
                                          </div>

                                          <div class="form-group">
                                          <label class="sr-only" for="email">email</label>
                                          <input type="email" name="register_email" class="form-control"  placeholder="Email" required>
                                        </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" value="register" class="btn btn-block">
                                                    Đăng kí
                                                </button>
                                            </div>
                                        </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
                </div>
            </li>';
                        } else {
                          echo ' 
                          
                          <li> <a href="#" class="btn btn-lg"> Hello ' . $_SESSION['user'] . '.</a></li>
                    <li> <a href="destroy.php" class="btn btn-lg"> Đăng xuất </a> </li>';

                        }
                        ?>

                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
                </a>
            </div>


            <a class="cart_link" href="cart.php">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029"
                style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                <g>
                  <g>
                    <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                  </g>
                </g>
                <g>
                  <g>
                    <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                  </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
              </svg>
            </a>
          </div>
      </nav>
    </div>
  </header>

  <!-- end header section -->
  <div class="modal fade" id="Modal_login" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <?php
          include "login_form.php";

          ?>

        </div>

      </div>

    </div>
  </div>
  <div class="modal fade" id="Modal_register" role="dialog">
    <div class="modal-dialog" style="">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body" style="height: 700px;">
          <?php
          include "register_form.php";

          ?>

        </div>

      </div>

    </div>
  </div>
</body>

</html>