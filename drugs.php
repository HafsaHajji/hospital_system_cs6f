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
            <h3 class="tile-title">Drug Registration Form</h3>
            <div class="tile-body">
              <form action="" method="POST">
                <div class="mb-3">
                  <label class="form-label">Drug Name</label>
                  <input class="form-control" type="text" name="drugname" placeholder="Drug Name" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Drug Country</label>
                  <input class="form-control" type="text" name="drugcountry" placeholder="Drug Country" required>
                </div>
                 <div class="mb-3">
                  <label class="form-label">Company</label>
                  <input class="form-control" type="text" name="company" placeholder="Company" required>
                </div>
                 <div class="mb-3">
                  <label class="form-label">Issue Dat</label>
                  <input class="form-control" type="date" name="issuedate" placeholder="Issue Date" required>
                </div>
                 <div class="mb-3">
                  <label class="form-label">Expire Dat</label>
                  <input class="form-control" type="date" name="expiredate" placeholder="Expire Date" required>
                </div>
                 
                 <div class="mb-3">
                  <label class="form-label">Price</label>
                  <input class="form-control" type="number" name="price" placeholder="price" required >
                </div>

        
                </div>
                <div class="mb-3">
                  <label class="form-label">Date</label>
                  <input class="form-control" type="date" name="date" value="<?php echo Date("Y-m-d")?>">
                </div>
            
          
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="btnregister"><i class="bi
               bi-check-circle-fill me-2"></i>Register</button>
            </div>
            </form>

            <!-- save code -->
            <?php
            if(isset($_POST['btnregister'])){
              $dn = mysqli_real_escape_string($conn, $_POST['drugname']);
              $co = mysqli_real_escape_string($conn, $_POST['drugcountry']);
              $mc = mysqli_real_escape_string($conn, $_POST['company']);
              $id = mysqli_real_escape_string($conn, $_POST['issuedate']);
              $ed = mysqli_real_escape_string($conn, $_POST['expiredate']);
              $pr = mysqli_real_escape_string($conn, $_POST['price']);
              $da = mysqli_real_escape_string($conn, $_POST['date']);

              $insert = mysqli_query($conn,"INSERT INTO drugs VALUES(null, '$dn', '$co', '$mc', '$id', '$ed','$pr','$da')");
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