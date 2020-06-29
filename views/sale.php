<?php  
  $sql = "SELECT *FROM tbl_news WHERE status = 2";
  $query = mysqli_query($conn, $sql);
?>

<section id="news">

  <img style="width: 100%;" src="https://hotpotstory.vn/wp-content/uploads/2019/07/banner_trong_2.jpg" alt="">

  <div class="container" style="margin-top: 30px;">
    <div class="row">

      <?php  
        while ($row = mysqli_fetch_array($query)) {
      ?>
        <div class="col-sm-6 col-xs-12 col-md-4" style="margin-bottom: 30px;">

          <div class="thumbnail">
            <a href="index.php?page=detail&id=<?php echo $row['id']; ?>">
              <img src="backend/images/<?php echo $row['avatar']; ?>" style="width: 100%;" alt="Vua lẩu nướng" />
              <div class="caption">
                <h5><?php echo $row['title']; ?></h5>
              </div>
            </a>
          </div>

        </div>
      <?php
        }
      ?>

    </div>
  </div>
</section>