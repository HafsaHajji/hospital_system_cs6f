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
            <h3 class="tile-title">Doctor Registration Form</h3>
            <div class="tile-body">
              <form action="" method="POST">
                <div class="mb-3">
                  <label class="form-label">Staff Name</label>
                  <select class="form-control" name="staffname">
                    <option value="">Select Doctor Name</option>
                    <?php
                    $sql = mysqli_query($conn,"SELECT staff_id, staff_name FROM staff");
                    while($row = mysqli_fetch_array($sql)){
                      echo "<option value='$row[0]'>$row[1]</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Fee Amount</label>
                  <input class="form-control" type="text" name="amount" placeholder="Amount" required>
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
              $am = mysqli_real_escape_string($conn, $_POST['amount']);
              $da = mysqli_real_escape_string($conn, $_POST['date']);

              $insert = mysqli_query($conn,"INSERT INTO doctors VALUES(null, '$sn','$am','$da')");
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