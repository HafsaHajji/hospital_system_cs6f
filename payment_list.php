<?php 
include "library/conn.php";
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
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                        <th>Serial</th>
                      <th>Patient_name</th>
                      <th>Amount</th>
                      <th>Paid</th>
                      <th>Remained</th>
                      <th>date</th>
                     <th>Action</th>

                    </tr>
</thead>
                <tbody>

                <!-- Update code -->
                <?php
                    if (isset($_POST['btnupdate'])) {
                     $id = mysqli_real_escape_string($conn, $_POST['id']);
                     $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
                     $amount = mysqli_real_escape_string($conn, $_POST['amount']);
                     $paid = mysqli_real_escape_string($conn, $_POST['paid']);
                     $remained = mysqli_real_escape_string($conn, $_POST['remained']);
                     $date = mysqli_real_escape_string($conn, $_POST['date']);

                     $edit = mysqli_query($conn, "UPDATE payment SET patient_id='$patient_id', amount='$amount', paid='$paid', remained='$remained', regdate='$date' 
                     WHERE payment_id='$id'");
                      echo "<h1 class='btn btn-success'>updated Success</h1>";

                     }

            ?>

                <!-- Delete code -->
                    <?php
                    if(isset($_GET['idd'])){
                        $id = $_GET['idd'];
                        $del = mysqli_query($conn, "DELETE FROM payment WHERE payment_id='$id'");
                        echo "<h1 class='btn btn-danger'>Delete Success<h1/>";
                    }
                    ?>
                    <!-- List USers -->
                 <?php
                 $sql = mysqli_query($conn, "SELECT * FROM payment");
                 while($row = mysqli_fetch_array($sql)){?>
                 <tr> 
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                    <td><?php echo $row[3];?></td>
                    <td><?php echo $row[4];?></td>
                    <td><?php echo $row[5];?></td>
                <td>
                      <!-- melaha laga tago actionska -->
                        <a href="payment_edit.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-success">Edit</a>
                        <a href="payment_list.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-danger"
                         onclick= "return confirm('Mahubtaa Inaad Tiraysid Xogta')">Del</a>
                        <a href="payment_report.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-info" target="_blank">Print</a>
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