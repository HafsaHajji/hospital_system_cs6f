<?php 
include "library/conn.php";
// id mesha lagu qabto oo laso mujiyo xogta
$id = $_GET['idd'];
$Sql = mysqli_query($conn, "select * from users where userid='$id'");
$data = mysqli_fetch_array($Sql);
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
            <h3 class="tile-title"> Edit User Registration Form</h3>
            <div class="tile-body">
              <form action="users_list.php" method="POST">
                <div class="mb-3">
                  <label class="form-label">Username</label>
                  <input type="hidden" name="id" value="<?php echo $data[0];?>">
                  <input class="form-control" type="text" name="username" value="<?php echo $data[1];?>" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input class="form-control" type="text" name="password" value="<?php echo $data[2];?>" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">User Type</label>
                 <select name="usertype" class="form-control" required>
                  <option value="<?php echo $data[3];?>"><?php echo $data[3];?></option>
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
              <button class="btn btn-primary" type="submit" name="btnupdate"><i class="bi bi-check-circle-fill me-2"></i>Update</button>
            </div>
            </form>
            
          </div>
        </div>
</div>
     </div>


    </main>
    <?php include "library/footer.php";?> 
    <?php include "library/script.php";?> 
  </body>
</html>