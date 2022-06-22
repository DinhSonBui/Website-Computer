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
            <span style="text-decoration:none" class="text">Chi Tiết Hóa Đơn</span>
            
          </div>

          <table>
            <thead>
              <tr>
                <th>Id</th>
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền </th>
              </tr>
            </thead>
            <tbody>
            <?php 
                $total =0;
                if(isset($_GET['code-cart']))
                {
                    $code_cart = $_GET['code-cart'];
                }
                $sql_list_detail_order = $conn -> query("SELECT * FROM tbl_cart_detail WHERE code_cart = $code_cart");
                      
                while($row_list_detail_order = mysqli_fetch_assoc($sql_list_detail_order)){

                $sql_product ="Select *  From tbl_products Where id_product = '".$row_list_detail_order['id_product']."'";
                $result_product =$conn->query($sql_product);
                if($result_product->num_rows >0){
                    $row_product= $result_product->fetch_array();
                    $total_product = $row_list_detail_order['quantify'] * $row_product['price_product'];
                } 
                ?>
                <tr>
                <tr>
                    <td><?php echo $row_list_detail_order['id_cart_detail'] ?></td>
                    <td><?php echo $row_list_detail_order['code_cart'] ?></td>
                    <td><?php echo $row_product['name_product'] ?></td>
                    <td><?php echo $row_list_detail_order['quantify'] ?></td>
                    <td><?php echo $row_product['price_product'] ?></td>
                    <td><?php echo $total_product ?></td>  
                    <?php $total += $total_product ?>
                  </tr>
                  <?php
                      }
                  ?>
                  <tr>
                      <td colspan='6' style="text-align:center ; color:red; font-size:20px; text-dec">Tổng tiền : <?php echo $total ?>VND</td>
                  </tr>
              
            </tbody>
        </table>
          
        </div>
        </div>
      </div>
    </section>

    <script src="../assets/js/admin.js"></script>
  </body>
</html>
