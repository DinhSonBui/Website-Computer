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
  </head>
  <body>
  <?php 
      require_once "connect.php";
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
          <?php
            $cart = (isset($_SESSION['cart'])) ?  $_SESSION['cart'] : []; 
            foreach($cart as $key => $value):
          ?>
            <div class="box">
              <a href="cart.php?id=<?php echo $value['id'] ?>&action=delete"><i class="fas fa-trash"></i></a>
              <img src="assets/img/<?php echo $value['image']; ?>" alt="" />
                <div class="content">
                    <h3><?php echo $value['name']; ?></h3>
                    <span class="price"><?php echo $value['price']; ?></span>
                    <span class="quantity">SL : <?php echo $value['quantify']; ?></span>
                </div>
            </div>
          <?php
            $total += $value['price']*$value['quantify'];
            endforeach
          ?>
            <div class="total">Tổng : <?php echo $total ?> vnd</div>
            <a href="order.php" class="btn">Đặt hàng</a>
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
        <div class="banner">
          <div class="slider">
            <image id="img" onClick="changeimage()" src="./assets/img/banner1.jpg" alt="" ></image>
          </div>
          <div class="banner-right">
            <div class="item-banner-1">
              <iframe   src="https://www.youtube.com/embed/BhBix0J_xII?autoplay=1"></iframe>
            </div>
            <div class="item-banner-2">
              <img src="./assets/img/banner1.jpg" alt="">
            </div>
          </div>
      </div>
    </div>
    <!-- END BANNER -->

    <!-- START PRODUCT -->
    <!-- Phần thân trang web -->
	  <div id="body_area">		
      <!-- Phần  laptop nổi bật -->
      <div class="body">
        <div class="navi_body1">
          <ul>
            <li class = "nb1_1">
              <a>
                <input type="button" id="btn1" value="SẢN PHẨM NỔI BẬT"/>
              </a>
            </li>
            
          </ul>		
        </div>
        <div class="thumbnail-slider">
          <div class="thumbnail-container">
              <div class="item">
                <div class="box">
                  <!--img-box---------->
                  <div class="slide-img">
                    <img alt="1" src="./assets/img/product-1.jpg">
                    <!--overlayer---------->
                    <div class="overlay">
                    <!--buy-btn------>	
                      <a href="#" class="buy-btn">Mua ngay</a>	
                    </div>
                  </div>
                  <!--detail-box--------->
                  <div class="detail-box">
                    <!--type-------->
                    <div class="type">
                      <a href="#">Macbook Air M1</a>
                      <span>Hàng mới về</span>
                    </div>
                    <!--price-------->
                    <a href="#" class="price">22.590.000 VNĐ</a>
                  </div>
                </div>		
              </div>
              <div class="item">
              <div class="box">
    <!--img-box---------->
    <div class="slide-img">
    <img alt="1" src="./assets/img/product-2.jpg">
    <!--overlayer---------->
    <div class="overlay">
    <!--buy-btn------>	
    <a href="#" class="buy-btn">Mua ngay</a>	
    </div>
    </div>
    <!--detail-box--------->
    <div class="detail-box">
    <!--type-------->
    <div class="type">
    <a href="#">ASUS Gaming ROG Strix G512</a>
    <span>Hàng mới về</span>
    </div>
    <!--price-------->
    <a href="#" class="price">26.190.000 VNĐ</a>
      
    </div>

    </div>		
              </div>
              <div class="item">
              <div class="box">
    <!--img-box---------->
    <div class="slide-img">
    <img alt="1" src="./assets/img/product-3.jpg">
    <!--overlayer---------->
    <div class="overlay">
    <!--buy-btn------>	
    <a href="#" class="buy-btn">Mua ngay</a>	
    </div>
    </div>
    <!--detail-box--------->
    <div class="detail-box">
    <!--type-------->
    <div class="type">
    <a href="#">ASUS Zenbook Duo 14</a>
    <span>Hàng mới về</span>
    </div>
    <!--price-------->
    <a href="#" class="price">24.300.000 VNĐ</a>
      
    </div>

    </div>		
              </div>
              <div class="item">
              <div class="box">
    <!--img-box---------->
    <div class="slide-img">
    <img alt="1" src="./assets/img/product-4.png">
    <!--overlayer---------->
    <div class="overlay">
    <!--buy-btn------>	
    <a href="#" class="buy-btn">Mua ngay</a>	
    </div>
    </div>
    <!--detail-box--------->
    <div class="detail-box">
    <!--type-------->
    <div class="type">
    <a href="#">Dell Gaming G3</a>
    <span>Hàng mới về</span>
    </div>
    <!--price-------->
    <a href="#" class="price">21.000.000 VNĐ</a>
      
    </div>

    </div>		
              </div>
              <div class="item">
        <div class="box">
    <!--img-box---------->
    <div class="slide-img">
    <img alt="1" src="./assets/img/product-5.jpg">
    <!--overlayer---------->
    <div class="overlay">
    <!--buy-btn------>	
    <a href="#" class="buy-btn">Mua ngay</a>	
    </div>
    </div>
    <!--detail-box--------->
    <div class="detail-box">
    <!--type-------->
    <div class="type">
    <a href="#">Acer Aspire 5</a>
    <span>Hàng mới về</span>
    </div>
    <!--price-------->
    <a href="#" class="price">20.900.000 VNĐ</a>
      
    </div>

    </div>		
              </div>
              <div class="item">
        <div class="box">
    <!--img-box---------->
    <div class="slide-img">
    <img alt="1" src="./assets/img/product-6.jpg">
    <!--overlayer---------->
    <div class="overlay">
    <!--buy-btn------>	
    <a href="#" class="buy-btn">Mua ngay</a>	
    </div>
    </div>
    <!--detail-box--------->
    <div class="detail-box">
    <!--type-------->
    <div class="type">
    <a href="#">Gaming Acer Nitro 5</a>
    <span>Hàng mới về</span>
    </div>
    <!--price-------->
    <a href="#" class="price">22.900.000 VNĐ</a>
      
    </div>

    </div>		
              </div>
              <div class="item">
        <div class="box">
    <!--img-box---------->
    <div class="slide-img">
    <img alt="1" src="./assets/img/product-7.jpg">
    <!--overlayer---------->
    <div class="overlay">
    <!--buy-btn------>	
    <a href="#" class="buy-btn">Mua ngay</a>	
    </div>
    </div>
    <!--detail-box--------->
    <div class="detail-box">
    <!--type-------->
    <div class="type">
    <a href="#"> Huawei Matebook D</a>
    <span>Hàng mới về</span>
    </div>
    <!--price-------->
    <a href="#" class="price">17.890.000 VNĐ</a>
      
    </div>

    </div>		
              </div>
              <div class="item">
        <div class="box">
    <!--img-box---------->
    <div class="slide-img">
    <img alt="1" src="./assets/img/product-8.jpg">
    <!--overlayer---------->
    <div class="overlay">
    <!--buy-btn------>	
    <a href="#" class="buy-btn">Mua ngay</a>	
    </div>
    </div>
    <!--detail-box--------->
    <div class="detail-box">
    <!--type-------->
    <div class="type">
    <a href="#">LG gram 2020</a>
    <span>Hàng mới về</span>
    </div>
    <!--price-------->
    <a href="#" class="price">27.590.000 VNĐ</a>
      
    </div>

    </div>	
              </div>
              <div class="item">
        <div class="box">
    <!--img-box---------->
    <div class="slide-img">
    <img alt="1" src="./assets/img/product-9.jpg">
    <!--overlayer---------->
    <div class="overlay">
    <!--buy-btn------>	
    <a href="#" class="buy-btn">Mua ngay</a>	
    </div>
    </div>
    <!--detail-box--------->
    <div class="detail-box">
    <!--type-------->
    <div class="type">
    <a href="#">Dell Inspiron 3580</a>
    <span>Hàng mới về</span>
    </div>
    <!--price-------->
    <a href="#" class="price">$723</a>
      
    </div>

    </div>	
              </div>
              <div class="item">
        <div class="box">
    <!--img-box---------->
    <div class="slide-img">
    <img alt="1" src="./assets/img/product-10.jpg">
    <!--overlayer---------->
    <div class="overlay">
    <!--buy-btn------>	
    <a href="#" class="buy-btn">Mua ngay</a>	
    </div>
    </div>
    <!--detail-box--------->
    <div class="detail-box">
    <!--type-------->
    <div class="type">
    <a href="#">ASUS Gaming ROG Zephyrus</a>
    <span>Hàng mới về</span>
    </div>
    <!--price-------->
    <a href="#" class="price">26.460.000 VNĐ</a>
      
    </div>

    </div>	
              </div>
          </div>
          <!-- controls slides -->
          <div class="controls">
          </div>
        </div> 
      </div>
    
      <!-- Phần  lap top khuyễn mãi -->

    </div>
    <!-- END PRODUCT -->

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
