<?php 
include "library/conn.php";
$id = $_GET['idd'];
$Sql = mysqli_query($conn, "select * from patients where patient_id='$id'");
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
            <h3 class="tile-title">Patient Registration Form</h3>
            <div class="tile-body">
              <form action="Patient_list.php" method="POST">
                <div class="mb-3">
                  <label class="form-label">Patient Name</label>
                  <input type="hidden" name="id" value="<?php echo $data[0];?>">
                  <input class="form-control" type="text" name="patientname" value="<?php echo $data[1];?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">Tell</label>
                  <input class="form-control" type="number" name="tell" value="<?php echo $data[2];?>">
                </div>
                 <div class="mb-3">
                  <label class="form-label">Address</label>
                  <input class="form-control" type="text" name="address" value="<?php echo $data[3];?>">
                </div>
                 <div class="mb-3">
                  <label class="form-label">Age</label>
                  <input class="form-control" type="number" name="age" value="<?php echo $data[4];?>">
                </div>
                 <div class="mb-3">
                  <label class="form-label">Doctor Name</label>
                  <select class="form-control" name="ddldoctorname">
                    <option value="<?php echo $data[5];?>"><?php echo $data[5];?></option>
                  <!-- JOIN side LO sameyo -->
                    <?php
                    $sql = mysqli_query($conn,"SELECT d.doctor_id, s.staff_name FROM doctors d
                     JOIN staff s ON s.staff_id = d.staff_id");
                    while($row = mysqli_fetch_array($sql)){
                      echo "<option value='$row[0]'>$row[1]</option>";
                    }
                    ?>
                  </select>

                </div>
                 <div class="mb-3">
                  <label class="form-label">Amount</label>
                  <input class="form-control" type="number" name="amount" value="<?php echo $data[6];?>">
                </div>

        
                </div>
                <div class="mb-3">
                  <label class="form-label">Date</label>
                  <input class="form-control" type="date" name="date" value="<?php echo $data[7];?>">
                </div>
            
            
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="btnupdate"><i class="bi
               bi-check-circle-fill me-2"></i>Update</button>
            </div>
            </form>

            <!-- save code -->
          
          </div>
        </div>
</div>
     </div>


    </main>
    <?php include "library/footer.php";?> 
    <?php include "library/script.php";?> 
  </body>
</html>