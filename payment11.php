<?php
include "library/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include "library/head.php";?>
  <script src="js/jquery.js"></script>
  
  <script>
    function subtract(){
      let currbalance = document.getElementById("currbalance").value;
      let paid = document.getElementById("paid").value;
      let remained = document.getElementById("remained").value = currbalance - paid;

    }
  </script>
  <script>
     $(function(){
       $('#ddlpname').on('change',function(){

        var id = $(this).val();
        $.post('get_patient.php',{id:$(this).val()},function(res){
        var res1 = res.split(",");

        $("#currbalance").val($.trim(res1[0]));
        
               
        });

        });
     });
  </script>
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
            <h3 class="tile-title">Payment Registration Form</h3>
            <div class="tile-body">
              <form action="" method="POST">
                <div class="mb-3">
                  <label class="form-label">Patient Name</label>
                 <select class="form-control" name="pname" id="ddlpname">
                    <option>Select Patient Name</option>
                    <?php
                      $sql = mysqli_query($conn, "SELECT patient_id, patient_name from patients");
                      while($row = mysqli_fetch_array($sql)){
                        echo "<option value='$row[0]'>$row[1]</option>";
                      }
                    ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Current Balance</label>
                  <input class="form-control" type="number" name="currentbalance" id="currbalance" placeholder="Current Balance" required readonly>
                </div>
                 <div class="mb-3">
                  <label class="form-label">Paid</label>
                  <input class="form-control" type="number" name="paid" id="paid" placeholder="Paid" required onkeyup=subtract()>
                </div>
                 <div class="mb-3">
                  <label class="form-label">Remained</label>
                  <input class="form-control" type="number" name="remained" id="remained" placeholder="Remained" required readonly>
                </div>

                
                <div class="mb-3">
                  <label class="form-label">Date</label>
                  <input class="form-control" type="date" name="date" value="<?php echo Date("Y-m-d");?>">
                </div>
             
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="btnregister"><i class="bi bi-check-circle-fill me-2"></i>Register</button>
            </div>
            </form>
            <?php
              if(isset($_POST['btnregister'])){
                $pn = mysqli_real_escape_string($conn, $_POST['pname']);
                $cb = mysqli_real_escape_string($conn, $_POST['currentbalance']);
                $pa = mysqli_real_escape_string($conn, $_POST['paid']); 
                $re = mysqli_real_escape_string($conn, $_POST['remained']);               
                $da = mysqli_real_escape_string($conn, $_POST['date']);

                $insert = mysqli_query($conn, "INSERT INTO payment VALUES(null, '$pn', '$cb', '$pa', '$re', '$da')");
                echo "<h1 class='btn btn-success'>Inserted Success</h1>";
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