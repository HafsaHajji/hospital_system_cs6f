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
                      <th>Drug_name</th>
                      <th>Country</th>
                      <th>Company</th>
                      <th>Issue Date</th>
                      <th>Expire Date</th>
                      <th>Price</th>
                      <th>date</th>
                     <th>Action</th>

                    </tr>
</thead>
                <tbody>

                <!-- Update code -->
          <?php
            if(isset($_POST['btnupdate'])){
              $id = mysqli_real_escape_string($conn, $_POST['id']);
              $dn = mysqli_real_escape_string($conn, $_POST['drugname']);
              $co = mysqli_real_escape_string($conn, $_POST['drugcountry']);
              $mc = mysqli_real_escape_string($conn, $_POST['company']);
              $is = mysqli_real_escape_string($conn, $_POST['issuedate']);
              $ed = mysqli_real_escape_string($conn, $_POST['expiredate']);
              $pr = mysqli_real_escape_string($conn, $_POST['price']);
              $da = mysqli_real_escape_string($conn, $_POST['date']);

           $edit = mysqli_query($conn, "UPDATE drugs SET 
             drug_name='$dn', country='$co', company='$mc', issuedate='$is', expire_date='$ed', price='$pr', regdate='$da' WHERE drugs_id='$id'");
              echo "<h1 class='btn btn-success'>updated Success</h1>";
                }
?>


                

                <!-- Delete code -->
                    <?php
                    if(isset($_GET['idd'])){
                        $id = $_GET['idd'];
                        $del = mysqli_query($conn, "DELETE FROM drugs WHERE drugs_id='$id'");
                        echo "<h1 class='btn btn-danger'>Delete Success<h1/>";
                    }
                    ?>
                    <!-- List USers -->
                 <?php
                 $sql = mysqli_query($conn, "SELECT * FROM drugs");
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
                        <a href="drug_edit.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-success">Edit</a>
                        <a href="drug_list.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-danger"
                         onclick= "return confirm('Mahubtaa Inaad Tiraysid Xogta')">Del</a>
                        <a href="drug_report.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-info" target="_blank">Print</a>
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