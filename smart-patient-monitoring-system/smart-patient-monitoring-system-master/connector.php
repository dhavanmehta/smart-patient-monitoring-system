<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","patient_monitoring");
	if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    	}
	else
	{
		$query = "SELECT `tempreture`, `pulse_rate`, `ecg` FROM `health_record` WHERE `patient_id` =  '". $_SESSION['patient'] ."'";
		$res = mysqli_query($conn,$query);
		$result = mysqli_fetch_array($res);
		$temp = $result[0];
		$pulse = $result[1];
		$ecg = $result[2];
		$arr =  array('tempreture' => $temp, 'pulse_rate' => $pulse,'ecg' => $ecg);
		echo json_encode($arr);
	}
		
?>