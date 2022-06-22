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
            <a href="./list-order.php">
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
            <a href="./add-category.php"><span style="text-decoration:none" class="text">Thêm loại sản phẩm</span></a>
            
          </div>

          <table>
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên Loại Sản Phẩm</th>
                <th>Hình ảnh</th>
                <th>Sửa / Xóa</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $sql_type_product = mysqli_query($conn,"SELECT * FROM tbl_category Order By id_category ASC");
                    while($row_type_product = mysqli_fetch_assoc($sql_type_product)){
                ?>
                <tr>
                    <td><?php echo $row_type_product['id_category'] ?></td>
                    <td><?php echo $row_type_product['title_category'] ?></td>
                    <td><?php echo $row_type_product['img_category'] ?></td>
                    <td>
                    <a href="edit-category.php?id=<?php echo  $row_type_product['id_category']; ?>">Sửa</a>
                    <a href="delete-category.php?id=<?php echo  $row_type_product['id_category']; ?>">Xóa</a>
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
