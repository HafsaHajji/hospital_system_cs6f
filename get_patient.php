<?php
include "library/conn.php";

if(isset($_POST['id'])){
	$read = mysqli_query($conn, "SELECT feeamount FROM patients WHERE patient_id=$_POST[id]");
	$res = mysqli_fetch_assoc($read);

	echo implode(",", $res);
}
?>