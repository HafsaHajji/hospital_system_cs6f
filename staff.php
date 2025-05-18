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
            <h3 class="tile-title">Staff Registration Form</h3>
            <div class="tile-body">
              <form action="" method="POST">
                <div class="mb-3">
                  <label class="form-label">Staff Name</label>
                  <input class="form-control" type="text" name="staffname" placeholder="Staff Name" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Tell</label>
                  <input class="form-control" type="number" name="tell" placeholder="Tell" required>
                </div>
                 <div class="mb-3">
                  <label class="form-label">Address</label>
                  <input class="form-control" type="text" name="address" placeholder="Address" required>
                </div>
                 <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <!-- ID SIDA LOGU SO AQRIYO TABLE KALE -->
                 <div class="mb-3">
                  <label class="form-label">Department Name</label>
                  <select class="form-control" name="ddldeptname">
                    <option value="">Select Department Name</option>
                    <?php
                    $sql = mysqli_query($conn,"SELECT department_id, department_name FROM department");
                    while($row = mysqli_fetch_array($sql)){
                      echo "<option value='$row[department_id]'>$row[department_name]</option>";
                    }
                    ?>
                  </select>

                </div>
                 <div class="mb-3">
                  <label class="form-label">Salary</label>
                  <input class="form-control" type="number" name="salary" placeholder="Salary" required >
                </div>

        
                </div>
                <div class="mb-3">
                  <label class="form-label">Date</label>
                  <input class="form-control" type="date" name="date" value="<?php echo Date("Y-m-d")?>">
                </div>
            
      
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="btnregister"><i class="bi bi-check-circle-fill me-2"></i>Register</button>
            </div>

            </form>

            <!-- save code -->
            <?php
            if(isset($_POST['btnregister'])){
              $sn = mysqli_real_escape_string($conn, $_POST['staffname']);
              $te = mysqli_real_escape_string($conn, $_POST['tell']);
              $ad = mysqli_real_escape_string($conn, $_POST['address']);
              $em = mysqli_real_escape_string($conn, $_POST['email']);
              $de = mysqli_real_escape_string($conn, $_POST['ddldeptname']);
              $sa = mysqli_real_escape_string($conn, $_POST['salary']);
              $da = mysqli_real_escape_string($conn, $_POST['date']);

              $insert = mysqli_query($conn,"INSERT INTO staff VALUES(null, '$sn', '$te', '$ad', '$em', '$de','$sa','$da')");
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