<?php  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT *FROM tbl_menus WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
  }
 
?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Tin tức/ khuyến mãi</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>tin tức/ khuyến mãi</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="portfolio-details-container" data-aos="fade-up" data-aos-delay="100">

      <div class="owl-carousel portfolio-details-carousel">
        <img src="backend/images/<?php echo $row['images_menu']; ?>" style="width: 100%;" class="img-fluid" alt="">
      </div>

      <div class="portfolio-info">
        <h3>Đặt bàn nhanh</h3>
        <ul>
          <li><strong>Gọi điện</strong>: 1800 8899</li>
          <li>Để lại thông tin đặt bàn</li>
          <a href="index.php?page=order"><li><button class="btn btn-danger">Đặt bàn</button></li></a>
        </ul>
      </div>

    </div>

    <div class="portfolio-description">
      <h2><?php echo $row['title']; ?></h2>
      <p>
        <?php echo $row['description']; ?>
      </p>
    </div>

  </div>
</section><!-- End Portfolio Details Section -->