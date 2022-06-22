<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <title>Website Cửa Hàng Máy Tính</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/product.css">
  </head>
  <body>
  <?php 
      include("connect.php");
      session_start();
      $total = 0;
    ?>
    <!-- START HEADER -->
    <div id="header" class="header">
      <div class="container">
        <div class="logo"><a style="color: #fff " href="./index.php">TTG-Shop</a> </div>
        <div class="search">
          <input type="search" placeholder="Tìm kiếm sản phẩm ..." />
          <div class="icon"><i class="fa fa-search"></i></div>
        </div>
        <div style="display: flex">
          <div class="phone">
            <i class="fa-solid fa-phone"></i>
          </div>

          <div class="cart" id="cart-btn" >
            <i  class="fa-solid fa-cart-plus"></i>
          </div>
            <?php
              $id = (isset($_SESSION['id'])) ? $_SESSION['id'] : 0;
            ?>
            <?php
              if($id != 0 )
              {
            ?>
            <div class="login">
              <a href="./login.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
            <?php
              }
              else{
            ?>
          <div class="login">
            <a href="./login.php"><i class="fa-solid fa-user"></i></a>
          </div>
          <?php
              }
             ?>

          
          <div class="shopping-cart">
            <div class="box">
                <i class="fas fa-trash"></i>
                <img src="./assets/img/product-1.jpg" alt="">
                <div class="content">
                    <h3>watermelon</h3>
                    <span class="price">$4.99/-</span>
                    <span class="quantity">qty : 1</span>
                </div>
            </div>
           
            <div class="total"> total : $19.69/- </div>
            
            <a href="#" class="btn">Đặt hàng</a>
          </div>
        </div>
      </div>
    </div>
    <!-- END HEADER -->

    <!-- START NAVIGATION -->
    <div id="nav">
      <div class="container">
        <div class="menu">
          <i class="fa-solid fa-bars"></i>
          DANH MỤC SẢN PHẨM
        </div>
        <div class="list-item">
          <div class="item">
            <i class="fa-solid fa-hand-holding-hand"></i> Cam kết
          </div>
          <div class="item"><i class="fas fa-truck-moving"></i> Vận chuyển</div>
          <div class="item">
            <i class="fa-brands fa-cc-amazon-pay"></i> Thanh toán
          </div>
          <div class="item"><i class="fas fa-sync-alt"></i> Đổi trả</div>
          <div class="item">
            <i class="fa-solid fa-screwdriver-wrench"></i> Bảo hành
          </div>
        </div>
      </div>
    </div>
    <!-- END NAVIGATION -->

    <!-- START BANNER -->
    <div id="banner">
      <div class="container">
      <div class="list-menu">
          <?php
            $sql_category = mysqli_query($conn,"SELECT * FROM tbl_category Order By id_category ASC");
            while($row_category = mysqli_fetch_assoc($sql_category)){
          ?>
          <div class="item"><a href="./product.php?id=<?php echo $row_category['id_category'] ?>"><i style="padding-right:30px" class="<?php echo $row_category['img_category'] ?>"></i><?php echo $row_category['title_category'] ?></a></div>
          <?php
            }
          ?>
        </div>
        <!-- Products -->
        <section class="section_products">

            <div class="product-layout">
            <?php
              if(isset($_GET['id'])){
                  $category_product = $_GET['id'];
              }
            ?>
            <?php
                $sql_product = mysqli_query($conn,"SELECT * FROM tbl_products Where category_product = $category_product");
                while($row_product = mysqli_fetch_assoc($sql_product)){
            ?>
              <div class="product">
                <div class="img-container">
                  <img src="./assets/img/<?php echo $row_product['img_product'] ?>" alt="" />
                  <div class="addCart">
                    <a href="cart.php?id=<?php echo $row_product['id_product'] ?>&action=add" class="button menu__button">
                      <i style="color:#000" class="fas fa-shopping-cart"></i>
                    </a>
                    
                  </div>
                </div>
                <div class="bottom">
                  <a href="./detail-product.php?id=<?php echo $row_product['id_product'] ?>"><?php echo $row_product['name_product'] ?></a>
                  <div class="price">
                   
                     <span style="font-size:14px"class="cancel"><?php echo $row_product['price_product'] ?> VNĐ</span>
                     <span style="font-size:18px"><?php echo $row_product['price_sale'] ?>VNĐ</span>
                  </div>
                </div>
              </div>
              <?php
                }
              ?>
            </div>
          </section>
    </div>
    <!-- END BANNER -->



    <!-- START FOOTER -->
      <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="footer-col">
              <h4>Cửa hàng</h4>
              <ul>
                <li><a href="#">Thông tin</a></li>
                <li><a href="#">Dịch vụ</a></li>
                <li><a href="#">Chính sách</a></li>
                <li><a href="#">Chương trình liên kết</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>trợ giúp</h4>
              <ul>
                <li><a href="#">Câu hỏi</a></li>
                <li><a href="#">Các phương thức Giao hàng</a></li>
                <li><a href="#">Các lựa chọn Thanh toán</a></li>
                <li><a href="#">Tình trạng đơn hàng</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Cửa hàng trục tuyến</h4>
              <ul>
                <li><a href="#">Xem cửa hàng</a></li>
                <li><a href="#">Laptop</a></li>
                <li><a href="#">PC gaming</a></li>
                <li><a href="#">Thiết bị - phụ kiện</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Theo dõi cửa hàng</h4>
              <div class="social-links">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
        </div>
       </footer>
      <!-- END FOOTER -->

    <script src="./assets/js/script.js"></script>
  </body>
</html>
