<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="Picture/SH.png" />
    <link
      rel="stylesheet"
      type="text/css"
      href="./assets/css/detail-product.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <title>SH-Computer</title>
  </head>

  <body>
  <?php 
      include("connect.php");
    ?>
    <marquee
      style="
        font-size: 17pt;
        font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times,
          'Times New Roman', 'serif';
        color: #232e35;
      "
      >Cửa hàng máy tính TTG-Shop khuyến mãi lên đến 70% duy nhất ngày hôm
      nay</marquee
    >
    <?php
      if(isset($_GET['id'])){
        $id_product = $_GET['id'];
      }
    ?>
    <?php
      $sql_product = mysqli_query($conn,"SELECT * FROM tbl_products Where id_product = $id_product");
      $row_product = mysqli_fetch_assoc($sql_product);
    ?>
    <?php
      $sql_detail = mysqli_query($conn,"SELECT * FROM tbl_detail_product Where id_product = $id_product");
      $row_detail = mysqli_fetch_assoc($sql_detail);
    ?>
    
    <div class="card-wrapper">
      <div class="card">
        <!-- card left -->
        <div class="product-imgs">
          <div class="img-display">
            <div class="img-showcase">
              <img src="./assets/img/<?php echo $row_detail['img_detail_1'] ?>" alt="1" />
              <img
                src="./assets/img/<?php echo $row_detail['img_detail_2'] ?>"
                alt="2"
              />
              <img src="./assets/img/<?php echo $row_detail['img_detail_3'] ?>" alt="3" />
              <img src="./assets/img/<?php echo $row_detail['img_detail_4'] ?>" alt="4" />
            </div>
          </div>
          <div class="img-select">
            <div class="img-item">
              <a href="#" data-id="1">
                <img
                  src="./assets/img/<?php echo $row_detail['img_detail_1'] ?>"
                  alt="1"
                />
              </a>
            </div>
            <div class="img-item">
              <a href="#" data-id="2">
                <img
                  src="./assets/img/<?php echo $row_detail['img_detail_2'] ?>"
                  alt="2"
                />
              </a>
            </div>
            <div class="img-item">
              <a href="#" data-id="3">
                <img src="./assets/img/<?php echo $row_detail['img_detail_3'] ?>" alt="3" />
              </a>
            </div>
            <div class="img-item">
              <a href="#" data-id="4">
                <img
                  src="./assets/img/<?php echo $row_detail['img_detail_4'] ?>"
                  alt="4"
                />
              </a>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class="product-content">
          <h2 class="product-title" style="margin-top: 60px">
            <?php echo $row_product['name_product'] ?>
          </h2>

          <div class="product-price">
            <p class="last-price">Gía : <span><?php echo $row_product['price_product'] ?> VNĐ</span></p>
            <p class="new-price">Khuyến mãi: <span><?php echo $row_product['price_sale'] ?> VNĐ</span></p>
          </div>

          <div class="product-detail">
            <h2>Thông Tin Sản Phẩm:</h2>
            <p>
            <?php echo $row_detail['info_product'] ?>
            </p>
            <ul>
              <li>Màu sắc : <span><?php echo $row_detail['color'] ?></span></li>
              <li>Ram : <span><?php echo $row_detail['ram'] ?></span></li>
              <li>Rom : <span><?php echo $row_detail['rom'] ?></span></li>
              <li>Màn hình : <span><?php echo $row_detail['display'] ?> INCH</span></li>
              <li>Core : <span><?php echo $row_detail['core'] ?></span></li>
            </ul>
          </div>

          <div class="purchase-info">
            <input type="number" min="0" value="1" />
            <button type="button" class="btn">
              Thêm vào giỏ <i class="fas fa-shopping-cart"></i>
            </button>
            <button type="button" class="btn">Sản phẩm tương tự</button>
          </div>

          <div class="social-links">
            <p>Chia sẻ:</p>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <script src="./assets/js/detail-product.js"></script>
  </body>
</html>
