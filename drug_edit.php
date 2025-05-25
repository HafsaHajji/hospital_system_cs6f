<?php 
include "library/conn.php";
// id mesha lagu qabto oo laso mujiyo xogta
$id = $_GET['idd'];
$Sql = mysqli_query($conn, "select * from drugs where drugs_id='$id'");
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
            <h3 class="tile-title">Drug Registration Form</h3>
            <div class="tile-body">
              <form action="drug_list.php" method="POST">
                <div class="mb-3">
                  <label class="form-label">Drug Name</label>
                  <input type="hidden" name="id" value="<?php echo $data[0];?>">
                  <input class="form-control" type="text" name="drugname" value="<?php echo $data[1];?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">Drug Country</label>
                  <input class="form-control" type="text" name="drugcountry" value="<?php echo $data[2];?>">
                </div>
                 <div class="mb-3">
                  <label class="form-label">Company</label>
                  <input class="form-control" type="text" name="company" value="<?php echo $data[3];?>">
                </div>
                 <div class="mb-3">
                  <label class="form-label">Issue Dat</label>
                  <input class="form-control" type="date" name="issuedate" value="<?php echo $data[4];?>">
                </div>
                 <div class="mb-3">
                  <label class="form-label">Expire Dat</label>
                  <input class="form-control" type="date" name="expiredate" value="<?php echo $data[5];?>">
                </div>
                 
                 <div class="mb-3">
                  <label class="form-label">Price</label>
                  <input class="form-control" type="number" name="price" value="<?php echo $data[6];?>">
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