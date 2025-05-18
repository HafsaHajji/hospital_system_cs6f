<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <?php include "library/head.php";?>
    <?php include "library/conn.php";?>
    <style>
        body{
            background:gray;
        }
        .container{
            background:white;
            height: 900px;

        }
        .header img{
            width: 100%;
            height:300px ;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="header">
                <img src="images/banner2.jpg" alt="">
            </div>
        <h1>Patient Report</h1>
        <table class="table table-bordered">
        <tr>
            <th>Serial</th>
           <th>Patient_name</th>
           <th>Tell</th>
           <th>Address</th>
           <th>Age</th>
           <th>Doctor_id</th>
           <th>Feeamount</th>
           <th>date</th>
       </tr>
       <tbody>
       <?php
                 $sql = mysqli_query($conn, "SELECT * FROM patients");
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
                   
                 </tr>
                 <?php 
                 }
                 
                 ?>
       </tbody>
        </table>
        </div>
    </div>
</body>
</html>