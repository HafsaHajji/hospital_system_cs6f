<?php 
include "library/conn.php"
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<?php include "library/head.php";?> 
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include "library/header.php";?> 
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php require "library/sidebar.php";?> 
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-speedometer"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 5 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
     <div class="row">
      <div class="col-2"></div>
      <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">User Registration Form</h3>
            <div class="tile-body">
              <form action="" method="POST">
                <div class="mb-3">
                  <label class="form-label">Username</label>
                  <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">User Type</label>
                 <select name="usertype" class="form-control" required>
                  <option value="">Select User Type</option>
                  <option value="Admin">Admin</option>
                  <option value="User">User</option>
                 </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Date</label>
                  <input class="form-control" type="date" name="date" value="<?php echo Date("Y-m-d")?>">
                </div>
               
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="btnregister"><i class="bi bi-check-circle-fill me-2"></i>Register</button>
            </div>
            </form>
            <!-- save code -->
            <?php
            if(isset($_POST['btnregister'])){
              $un = mysqli_real_escape_string($conn, $_POST['username']);
              $pa = mysqli_real_escape_string($conn, $_POST['password']);
              $ut = mysqli_real_escape_string($conn, $_POST['usertype']);
              $da = mysqli_real_escape_string($conn, $_POST['date']);

              $insert = mysqli_query($conn,"INSERT INTO users VALUES(null, '$un', '$pa', '$ut', '$da')");
              echo "<h1 class='btn btn-success'>Insert Success</h1>";
            }
            ?>
          </div>
        </div>
</div>
     </div>


    </main>
    <?php include "library/footer.php";?> 
    <?php include "library/script.php";?> 
  </body>
</html>