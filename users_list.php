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
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                        <th>Serial</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>User Type</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>

                <tbody>
                    <?php
                    if(isset($_GET['idd'])){
                        $id = $_GET['idd'];
                        $del = mysqli_query($conn, "DELETE FROM users WHERE userid='$id'");
                        echo "<h1 class='btn btn-danger'>Delete Success<h1/>";
                    }
                    ?>
                 <?php
                 $sql = mysqli_query($conn, "SELECT * FROM users");
                 while($row = mysqli_fetch_array($sql)){?>
                 <tr> 
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                    <td><?php echo $row[3];?></td>
                    <td><?php echo $row[4];?></td>
                    <td>
                        <a href="" class="fa fa-edit btn btn-success">Edit</a>
                        <a href="users_list.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-danger"
                         onclick= "return confirm('Mahubtaa Inaad Tiraysid Xogta')">Del</a>
                        <a href="users_report.php?idd=<?php echo $row[0];?>" class="fa fa-edit btn btn-info" target="_blank">Print</a>
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