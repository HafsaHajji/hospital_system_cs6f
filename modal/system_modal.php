<!-- Patient Modal -->
<div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Patient Registration Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="tile-body">
              <form action="patients.php" method="POST">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="mb-3 col-12">
                          <label class="form-label">Patient Name</label>
                          <input class="form-control" type="text" name="patientname" placeholder="Patient Name" required>
                        </div>
                    </div>

                    <div class="mb-3 col-4">
                      <label class="form-label">Tell</label>
                      <input class="form-control" type="number" name="tell" placeholder="Tell" required>
                    </div>

                    <div class="mb-3 col-4">
                     <label class="form-label">Address</label>
                     <input class="form-control" type="text" name="address" placeholder="Address" required>
                   </div>
                   <div class="mb-3 col-4">
                    <label class="form-label">Age</label>
                    <input class="form-control" type="number" name="age" placeholder="Age" required>
                  </div>
                </div>
                <div class="row">

                    <div class="mb-3 col-4">
                     <label class="form-label">Doctor Name</label>
                     <select class="form-control" name="ddldoctorname">
                       <option value="">Select Doctor Name</option>
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
                   
                   <div class="mb-3 col-4">
                    <label class="form-label">Amount</label>
                    <input class="form-control" type="number" name="amount" placeholder="Amount" required >
                    </div>

                  <div class="mb-3 col-4">
                  <label class="form-label">Date</label>
                  <input class="form-control" type="date" name="date" value="<?php echo Date("Y-m-d")?>">
                  </div>

                </div>   

        
           </div>
                
           
             <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" name="btnregister" class="btn btn-primary">Register</button>
              </div>
      </form>
        </div>
      </div>
    
    </div>
  </div>
</div>

<!-- User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Registration Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <!-- Start Form Modal -->
            <div class="tile-body">
            <div class="tile-body">
              <form action="" method="POST">
                <div class="mb-3">
                  <label class="form-label">Username</label>
                  <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">User Type</label>
                 <select name="usertype" class="form-control" required>
                  <option value="">Select User Type</option>
                  <option value="Admin">Admin</option>
                  <option value="User">User</option>
                 </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Date</label>
                  <input class="form-control" type="date" name="date" value="<?php echo Date("Y-m-d")?>">
                </div>
                    </div>
            </div>
                

           <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" name="btnregister" class="btn btn-primary">Register</button>
              </div>
        </form>
            <!-- END form  -->
               
            </div>
        
      </div>
    
    </div>
  </div>
</div>
<!-- Staff Modal -->
<div class="modal fade" id="staffModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Staff Registration Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="tile-body">
            <form action="staff_list.php" method="POST">
              <div class="row">

                <div class="mb-3 col-12">
                  <label class="form-label">Staff Name</label>
                  <input class="form-control" type="text" name="staffname" placeholder="Staff Name" required>
                </div>

                <div class="mb-3 col-4">
                  <label class="form-label">Tell</label>
                  <input class="form-control" type="number" name="tell" placeholder="Tell" required>
                </div>
                <div class="mb-3 col-4">
                 <label class="form-label">Address</label>
                 <input class="form-control" type="text" name="address" placeholder="Address" required>
               </div>
               <div class="mb-3 col-4">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email" required>
              </div>
              <!-- ID SIDA LOGU SO AQRIYO TABLE KALE -->
               <div class="mb-3 col-4">
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

              <div class="mb-3 col-4">
               <label class="form-label">Salary</label>
               <input class="form-control" type="number" name="salary" placeholder="Salary" required >
             </div>
             <div class="mb-3 col-4">
               <label class="form-label">Date</label>
               <input class="form-control" type="date" name="date" value="<?php echo Date("Y-m-d")?>">
             </div>

            </div>

        
          </div>
            
      
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" name="btnregister" class="btn btn-primary">Register</button>
              </div>

            </form>
        </div>
      </div>
    
    </div>
  </div>
</div>
<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Staff Registration Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="tile-body">
              <form action="payment_list.php" method="POST">
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
            
      
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" name="btnregister" class="btn btn-primary">Register</button>
              </div>

            </form>
        </div>
      </div>
    
    </div>
  </div>
</div>


