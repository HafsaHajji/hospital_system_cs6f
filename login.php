<?php include "library/conn.php";
// session_start();
?>
<!DOCTYPE html>
<html>
  <head>
   <?php include "library/head.php";?>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Hospital System</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="bi bi-person me-2"></i>SIGN IN</h3>
          <div class="mb-3">
            <label class="form-label">USERNAME</label>
            <input class="form-control" type="text" name="username" placeholder="Username" required autofocus>
          </div>
          <div class="mb-3">
            <label class="form-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" required placeholder="Password">
          </div>
          <div class="mb-3">
            <div class="utility">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="mb-3 btn-container d-grid">
            <button type="submit" name="btnlogin" class="btn btn-primary btn-block"><i class="bi bi-box-arrow-in-right me-2 fs-5"></i>SIGN IN</button>
          </div>
        </form>
        <!-- Login Code -->
          <?php
        if(isset($_POST['btnlogin'])){
          $user = mysqli_query($conn, "SELECT * FROM users WHERE username='".$_POST['username']."' and password='".$_POST['password']."'");
          if(mysqli_num_rows($user) > 0){
            $us = mysqli_fetch_array($user);

            $usern = $us['username'];
            $_SESSION['userid'] = $us['userid'];
            $_SESSION['username'] = $usern;
 
            echo "<script>window.location='index.php'</script>";
          }else{
            echo "<br>";
            echo "<h1 class='btn btn-success' style='width:100%'>Invalid Username or Password</h1>";
          }
        }
        
        ?>
        <!-- <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="bi bi-person-lock me-2"></i>Forgot Password ?</h3>
          <div class="mb-3">
            <label class="form-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="mb-3 btn-container d-grid">
            <button class="btn btn-primary btn-block"><i class="bi bi-unlock me-2 fs-5"></i>RESET</button>
          </div>
          <div class="mb-3 mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="bi bi-chevron-left me-1"></i> Back to Login</a></p>
          </div>
        </form> -->
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>