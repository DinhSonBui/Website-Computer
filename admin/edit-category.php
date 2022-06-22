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
            <a href="./edit-category.php">
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
            <span class="text">Sửa loại sản phẩm</span>
          </div>

          <?php
                require_once "../connect.php";
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_category WHERE id_category= $id";
                    $result = $conn->query($sql);
                        if($result->num_rows > 0)
                        {
                            $row= $result->fetch_array();
                            $name_type_product = $row['title_category'];
                            $img_type_product = $row['img_category'];
                        }
                }
                if(isset($_POST['edit-type-product'])){
                    $name_type_product = $_POST['name-type-product'];
                    $img_type_product = $_POST['img-type-product'];
                    $sql = "UPDATE tbl_category SET title_category ='$name_type_product', img_category = '$img_type_product' Where id_category =$id";
                    if (mysqli_query($conn, $sql)) {
                        echo '<script>alert("Update thành công");</script>';
                    } else {
                        echo '<script>alert("Update that bại");</script>'. mysqli_error($conn);
                    }
                    
                }
            ?>

          <div class="home-content">
            <div class="container">
              <div class="content">
                <form action="" method="post">
                  <div class="user-details">
                    <div class="input-box">
                      <span class="details">Tên loại sp</span>
                      <input
                        type="text"
                        value=""
                        placeholder="Nhập tên loại sp"
                        required
                        name="name-type-product"
                      />
                    </div>

                    <div class="input-box">
                      <span class="details">Anh loại sp</span>
                      <input
                        type="text"
                        value=""
                        placeholder="Nhập ảnh loại sp mới"
                        required
                        name="img-type-product"
                      />
                    </div>
                  </div>

                  <div class="button">
                    <input
                      type="submit"
                      name="edit-type-product"
                      value="Sửa Ngay"
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
