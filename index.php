<?php 
  include_once 'config/myConfig.php'; 
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }else{
    $page = 'home';
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Nhà hàng lẩu nướng PALM</title>
  <meta content="Nhà hàng Lẩu Nướng Palm - chuyên buffet lẩu nướng. Review chi tiết menu, hương vị độc đáo cùng ưu đãi, đặt chỗ lẩu nướng Palm nhanh nhất" name="descriptison">
  <meta content="Nhà hàng Lẩu Nướng Palm, Lẩu Nướng Palm menu, Lẩu Nướng Palm ưu đãi, Lẩu Nướng Palm giảm giá" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/jquery-ui.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5ee5e7ce9e5f6944229085bd/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
  </script>
  <!--End of Tawk.to Script-->

  <!-- ======= Header ======= -->
  <?php include_once 'layout/header.php'; ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <?php 
    if ($page == 'home') {
      include_once 'layout/info.php'; 
    }
  ?>
  <!-- End Hero -->

  <main id="main">

    <?php
      if (file_exists('views/'.$page.'.php')) {
        include_once 'views/'.$page.'.php'; 
      }else{
        header('Location: index.php');
      }
    ?>

    <!-- ======= Contact Section ======= -->
    <?php 
      if ($page == 'home') {
        include_once 'layout/contact.php'; 
      }
    ?>
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once 'layout/footer.php'; ?>
  <!-- End Footer -->

  <a href="#header" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/js/jquery-ui.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>