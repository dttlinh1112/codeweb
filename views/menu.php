<?php  
  $sql = "SELECT *FROM tbl_menus";
  $query = mysqli_query($conn, $sql);
?>

<section id="news">

  <img style="width: 100%;" src="assets/img/menu.jpg" alt="">

  <div class="container" style="margin-top: 30px;">
    <div class="row">

      <?php  
        while ($row = mysqli_fetch_array($query)) {
      ?>
        <div class="col-sm-6 col-xs-12 col-md-4" style="margin-bottom: 30px;">

          <div class="thumbnail">
            <a href="index.php?page=detail-menu&id=<?php echo $row['id']; ?>">
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