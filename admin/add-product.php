<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../assets/css/admin.css" />

    <!----===== Iconscout CSS ===== -->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link rel="stylesheet" href="../assets/css/list.css">
    <link rel="stylesheet" href="../assets/css/edit.css">
    <!--<title>Admin Dashboard Panel</title>-->
  </head>
  <body>
  <?php require_once "../connect.php"; ?>
    <nav>
      <div class="logo-name">
        <div class="logo-image">
          <!--<img src="images/logo.png" alt="">-->
        </div>

        <span class="logo_name">TTG-Shop</span>
      </div>

      <div class="menu-items">
        <ul class="nav-links">
          <li>
            <a href="./index.php">
              <i class="uil uil-estate"></i>
              <span class="link-name">Quản Lý</span>
            </a>
          </li>
          <li>
            <a href="./list-product.php">
              <i class="fa-solid fa-computer"></i>
              <span class="link-name">Quản lý sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="./list-category.php">
            <i class="fa-solid fa-calendar-day"></i>
              <span class="link-name">Quản lý loại sp</span>
            </a>
          </li>
          <li>
            <a href="./chart.php">
            <i class="fa-solid fa-chart-area"></i>
              <span class="link-name">Quản lý biểu đồ</span>
            </a>
          </li>

          <li>
            <a href="./order.php">
            <i class="fa-solid fa-receipt"></i>
              <span class="link-name">Quản lý hóa đơn</span>
            </a>
          </li>
        </ul>

        <ul class="logout-mode">
          <li>
            <a href="#">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
              <span class="link-name">Đăng xuất</span>
            </a>
          </li>

          <li class="mode">
            <a href="#">
            <i class="fa-solid fa-toggle-off"></i>
              <span class="link-name">Dark Mode</span>
            </a>

            <div class="mode-toggle">
              <span class="switch"></span>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <section class="dashboard">
      <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="search-box">
          <i class="uil uil-search"></i>
          <input type="text" placeholder="Tìm kiếm tại đây..." />
        </div>

        <!--<img src="images/profile.jpg" alt="">-->
      </div>

      <div class="dash-content">
      <div class="list-category">
          <div class="title">
            <i class="fa-solid fa-calendar-day"></i>
            <span class="text">Thêm  sản phẩm</span>
          </div>

          <?php
        if(isset($_POST['add-product'])){
          require_once "../connect.php";
          $sqlCheckProduct = "SELECT * FROM tbl_products Where name_product = '".$_POST['name-product']."'";
          $resultCheckProduct = $conn->query($sqlCheckProduct); 
          if($resultCheckProduct->num_rows >0)
          {
            echo '<script> alert("Sản phẩm này đã tồn tại, vui lòng nhập tài khoản khác");</script>';
          }
          else{
            $sql = "INSERT INTO tbl_products (name_product,price_product,price_sale,img_product,category_product)  VALUES ('".$_POST['name-product']."','".$_POST['price-product']."','".$_POST['price-sale']."','".$_POST['img-product']."','".$_POST['category-product']."')";
            $result =$conn->query($sql); 
            if($result === TRUE) { 
              echo '<script> alert("Thêm vào thành công !!");</script>'; 
            } 
            else{ 
              echo '<script> alert("Thêm vào không thành công !!");</script>'; 
            } 
            $conn->close(); 
          }
        }
    ?>

          <div class="home-content">
            <div class="container">
              <div class="content">
                <form action="" method="post">
                  <div class="user-details">
                  <div class="input-box">
                    <span class="details">Tên sản phẩm</span>
                    <input
                      type="text"
                      placeholder="Nhập tên sản phẩm"
                      required
                      name="name-product"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Gía sản phẩm</span>
                    <input
                      type="text"
                      placeholder="Nhập giá sản phẩm"
                      required
                      name="price-product"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Gía sale</span>
                    <input
                      type="text"
                      placeholder="Nhập giá giảm giá"
                      required
                      name="price-sale"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Hình ảnh sản phẩm</span>
                    <input
                      type="text"
                      placeholder="Nhập hình ảnh sản phẩm"
                      required
                      name="img-product"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Loại sản phẩm</span>
                    <select name="category-product" id="category-product">
                      <?php
                      require_once "../connect.php";
                      $sql_category = "SELECT * FROM tbl_category";
                      $result_category = $conn->query($sql_category);
                        while($row_category = $result_category->fetch_assoc()){
                          print "<option value=".$row_category['id_category'].">".$row_category['title_category']."</option>";
                        }
                      ?>
                    </select>
                    <!-- <input
                      type="text"
                      placeholder="Nhập loại sản phẩm"
                      required
                      name="category-product"
                    /> -->
                  </div>
                  </div>

                  <div class="button">
                    <input
                      type="submit"
                      name="add-product"
                      value="Thêm ngay"
                    />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>

    <script src="../assets/js/admin.js"></script>
  </body>
</html>
