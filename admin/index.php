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
    link:
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
            <a href="./list-category.php">
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
        <div class="overview">
          <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">Thống kê</span>
          </div>

          <div class="boxes">
          <?php
            $sql_count_users = mysqli_query($conn,"SELECT COUNT(*) as total FROM tbl_user");
            $result_count_users = mysqli_fetch_assoc($sql_count_users);

            $sql_count_products = mysqli_query($conn,"SELECT COUNT(*) as total FROM tbl_products");
            $result_count_products = mysqli_fetch_assoc($sql_count_products);

            $sql_count_carts = mysqli_query($conn,"SELECT COUNT(*) as total FROM tbl_cart");
            $result_count_carts = mysqli_fetch_assoc($sql_count_carts);

          ?>
            <div class="box box1">
            <i class="fa-solid fa-computer"></i>
              <span class="text">Tổng số sản phẩm</span>
              <span class="number"><?php echo $result_count_products['total']; ?></span>
            </div>
            <div class="box box2">
            <i class="fa-solid fa-users"></i>
              <span class="text">Tổng số khách hàng</span>
              <span class="number"><?php echo $result_count_users['total'] - 1; ?></span>
            </div>
            <div class="box box3">
            <i class="fa-solid fa-file-invoice"></i>
              <span class="text">Tổng số đơn hàng</span>
              <span class="number"><?php echo $result_count_carts['total']; ?></span>
            </div>
          </div>
        </div>

        <div class="activity">
          <div class="title">
          <i class="fa-solid fa-users"></i>
            <span class="text">Khách hàng</span>
          </div>

          <div class="activity-data">
            <div class="data stt">
              <span class="data-title">STT</span>
              <?php
                $sql_user = mysqli_query($conn,"SELECT * FROM tbl_user Where username != 'admin' Order By id DESC");
                while($row_user = mysqli_fetch_assoc($sql_user)){
              ?>
              <span class="data-list"><?php echo $row_user['id'] ?></span>
              <?php
                }
              ?>
              
            </div>

            <div class="data username">
              <span class="data-title">Username</span>
              <?php
                $sql_user = mysqli_query($conn,"SELECT * FROM tbl_user Where username != 'admin' Order By id DESC");
                while($row_user = mysqli_fetch_assoc($sql_user)){
              ?>
              <span class="data-list"><?php echo $row_user['username'] ?></span>
              <?php
                }
              ?>
            </div>

            <div class="data email">
              <span class="data-title">Email</span>
              <?php
                $sql_user = mysqli_query($conn,"SELECT * FROM tbl_user Where username != 'admin' Order By id DESC");
                while($row_user = mysqli_fetch_assoc($sql_user)){
              ?>
              <span class="data-list"><?php echo $row_user['email'] ?></span>
              <?php
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="../assets/js/admin.js"></script>
  </body>
</html>
