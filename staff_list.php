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
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
            <div class="col-10"></div>
              <div class="col-2 ">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                 data-bs-target="#staffModal">
                 Add staff
               </button>
              </div>
          </div>
          <?php include "modal/system_modal.php";?>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                <tbody>
                  <thead>
                    <tr>
                        <th>Serial</th>
                      <th>Staff name</th>
                      <th>Tell</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Department</th>
                      <th>Salary</th>
                      <th>Date</th>
                     <th>Action</th>

                    </tr>
                 </thead>
               </tbody>
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

                <!-- Update code -->
          <?php
              if(isset($_POST['btnupdate'])){
              $id = mysqli_real_escape_string($conn, $_POST['id']);
              $sn = mysqli_real_escape_string($conn, $_POST['staffname']);
              $te = mysqli_real_escape_string($conn, $_POST['tell']);
              $ad = mysqli_real_escape_string($conn, $_POST['address']);
              $em = mysqli_real_escape_string($conn, $_POST['email']);
              $de = mysqli_real_escape_string($conn, $_POST['ddldeptname']);
              $sa = mysqli_real_escape_string($conn, $_POST['salary']);
              $da = mysqli_real_escape_string($conn, $_POST['date']);


              $edit = mysqli_query($conn,"UPDATE staff SET staff_name='$sn', tell='$te', address='$ad', email='$em',
              department_id='$de', salary='$sa', regdate='$da' WHERE staff_id='$id'");

                echo "<h1 class='btn btn-success'>updated Success</h1>";
                }
          ?>

                <!-- Delete code -->
                    <?php
                    if(isset($_GET['idd'])){
                        $id = $_GET['idd'];
                        $del = mysqli_query($conn, "DELETE FROM staff WHERE staff_id='$id'");
                        echo "<h1 class='btn btn-danger'>Delete Success<h1/>";
                    }
                    ?>
                    <!-- List USers -->
                 <?php
                 $sql = mysqli_query($conn, "SELECT * FROM staff");
                 while($row = mysqli_fetch_array($sql)){?>
                 <tr> 
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                    <td><?php echo $row[3];?></td>
                    <td><?php echo $row[4];?></td>
                    <td><?php echo $row[5];?></td>
                    <td><?php echo $row[6];?></td>
                    <td><?php echo $row[7];?></td>
                  
                <td>
                      <!-- melaha laga tago actionska -->
                        <a href="staff_edit.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-success">Edit</a>
                        <a href="staff_list.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-danger"
                         onclick= "return confirm('Mahubtaa Inaad Tiraysid Xogta')">Del</a>
                        <a href="staff_report.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-info" target="_blank">Print</a>
                    </td>
                 </tr>
                 <?php 
                 }
                 
                 ?>
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>   
 </main>
    <?php include "library/footer.php";?> 
    <?php include "library/script.php";?> 
  </body>
</html>