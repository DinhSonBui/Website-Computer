<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./assets/css/login.css" />
    <title>Đăng nhập - Đăng ký tài khoản</title>
  </head>
  <body>
    <?php require_once "connect.php"; ?>
    <?php
      if(isset($_POST['login'])){
        $username =$_POST['username'];
        $password =$_POST['password'];
        $sql ="Select *  From tbl_user Where username = '".$_POST['username']."' and password = '".$_POST['password']."'";
        $result =$conn->query($sql); 
        if($result->num_rows >0) { 
          $row = $result->fetch_array(); 
          if($row['username'] == 'admin') { 
            header('Location: http://localhost:8080/Website-Computer/admin/'); 
          } else { 
            session_start(); 
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header('Location: index.php'); 
          } 
        } 
        else{ 
          echo '<script>alert("Email or password is fail");</script>'; 
          } 
        } 
    ?>

    <?php
      if(isset($_POST['register'])){
        $username =$_POST['username'];
        $password =$_POST['password'];
        $email = $_POST['email'];
        $sqlCheckUser = "SELECT * FROM tbl_user Where username = '".$_POST['username']."'";
        $resultCheckUser = $conn->query($sqlCheckUser); 
        if($resultCheckUser->num_rows >0)
        {
          echo '<script> alert("Tài khoản này đã tồn tại, vui lòng nhập tài khoản khác");</script>';
        }
        else{
          $sql = "INSERT INTO tbl_user (username,password,email)  VALUES ('".$_POST['username']."','".$_POST['password']."','".$_POST['email']."')";
          $result = $conn->query($sql); 
          if($result === TRUE) { 
            header("Location: login.php"); 
          } 
          else{ 
            echo '<script> alert("Đăng ký không thành công");</script>'; 
          } 
          $conn->close(); 
        }
      }
    ?>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form" method="POST">
            <h2 class="title">WELCOME</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Nhập tài khoản" name="username" required="required"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Nhập mật khẩu" name="password" required="required"/>
            </div>
            <input type="submit" name="login" value="Đăng nhập" class="btn solid" />
            <p class="social-text">Hoặc có thể đăng nhập bằng</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="#" class="sign-up-form" method="POST">
            <h2 class="title">Đăng ký</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="username" type="text" placeholder="Nhập tên tài khoản" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input name="email" type="email" placeholder="Nhập email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="password" type="password" placeholder="Nhập mật khẩu" />
            </div>
            <input name ="register" type="submit" class="btn" value="Đăng ký" />
            <p class="social-text">Hoặc có thể đăng ký bằng</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Bạn chưa có tài khoản</h3>
            <p>
              Nếu bạn chưa có tài khoản để đăng nhập, vui lòng click chuột vào
              button ở dưới, cảm ơn
            </p>
            <button class="btn transparent" id="sign-up-btn">Đăng ký</button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <p>
              Nếu đã có tài khoản, vùi lòng click chuột vào button ở dưới để
              đăng nhập
            </p>
            <button class="btn transparent" id="sign-in-btn">Đăng nhập</button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="./assets/js/login.js"></script>
  </body>
</html>
