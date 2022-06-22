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
            <a href="./add-product.php"><span style="text-decoration:none" class="text">Thêm sản phẩm</span></a>
            
          </div>

          <table>
            <thead>
              <tr>
                <th style="width:50px"> STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Gía sản phẩm</th>
                <th>Gía Sale</th>
                <th>Hình ảnh</th>
                <th>Loại sp</th>
                <th style="width:60px">Sửa</th>
              </tr>
            </thead>
            <tbody>
                <?php
                      $sql_products = $conn -> query("SELECT tbl_products.id_product, tbl_products.name_product, tbl_products.price_product, tbl_products.price_sale, tbl_products.img_product, tbl_products.category_product, tbl_category.title_category FROM tbl_products INNER JOIN tbl_category ON tbl_products.category_product = tbl_category.id_category ORDER BY id_product ASC");
                      while($row_product = mysqli_fetch_assoc($sql_products)){
                    ?>
                <tr>
                    <td style="width:50px"><?php echo $row_product['id_product'] ?></td>
                    <td><?php echo $row_product['name_product'] ?></td>
                    <td><?php echo $row_product['price_product'] ?></td>
                    <td><?php echo $row_product['price_sale'] ?></td>
                    <td><?php echo $row_product['img_product'] ?></td>
                    <td><?php echo $row_product['title_category'] ?></td>    
                    <td style="width:60px">
                    <a href="edit-product.php?id=<?php echo  $row_product['id_product']; ?>">Sửa</a>
                    <a href="delete-product.php?id=<?php echo  $row_product['id_product']; ?>">Xóa</a>
                    </td>  
                </tr>
               <?php
                      }
               ?>
              
            </tbody>
        </table>
          
        </div>
        </div>
      </div>
    </section>

    <script src="../assets/js/admin.js"></script>
  </body>
</html>
