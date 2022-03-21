<?php
	include('../../../include/db.php');
	$email = $_POST['email'];
	$res = mysqli_query($con, "SELECT * FROM persons WHERE Email='$email' ");
	if(!$res || mysqli_num_rows($res)==1){
		$array = mysqli_fetch_row($res);
		echo json_encode($array);
	} else {
		echo '<p style="color: #D8000C;font-weight: bold;">Something Went Wrong, Try Again.</p>';
	}
?>