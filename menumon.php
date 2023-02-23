<?php
//session_start();
include_once('db.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
    crossorigin="anonymous"></script>
  <!-- web fonts -->
  <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
    rel="stylesheet">
  <link
    href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
    rel="stylesheet">
  <!-- //web fonts -->
  <link href="css/style.css" rel="stylesheet" />

</head>

<body>
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <ul class="filters_menu">
        <li data-filter=".burger"><?php include('menutest.php') ?></li>
      </ul>
      <div class="filters-content">
        <div class="row grid">
          <?php
          if (isset($_GET['quanly'])) {
            $tam = $_GET['quanly'];
          } else {
            $tam = '';
          }

          if ($tam == 'danhmuc') {
            include('danhmuc.php');
          } elseif ($tam == 'chitietsp') {
            include('chitietsp.php');
          } elseif ($tam == 'giohang') {
            include('giohang.php');
          }elseif ($tam=='xemdonhang') {
            include('xemdonhang.php');
          }
          ?>
</body>


<!-- <div class="btn-box">
        <a href="">
          View More
        </a>
      </div> -->
</div>
</section>
</body>

</html>