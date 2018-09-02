<?php
		session_start();
		$temp = $_POST['temp'];
		$ecg = $_POST['ecg'];
		$pulse = $_POST['pulse'];
		$con=mysqli_connect("localhost","root","","patient_monitoring");
		if(isset($_SESSION['COUNT']))
		{
			$cnt = $_SESSION['COUNT'];
			$cnt++;	
			$_SESSION['COUNT'] = $cnt;
		}
		else
		{
			$cnt = 1;
			$tempcnt = 0;
			$plccnt = 0;
			$_SESSION['TMPCOUNT'] = $tempcnt;
			$_SESSION['plcCOUNT'] = $plccnt;
		    $_SESSION['COUNT'] = $cnt;
		}
		
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Perform queries 
mysqli_query($con,"UPDATE `health_record` SET `tempreture`='".$temp."',`pulse_rate`='".$pulse."',`ecg`='".$ecg."' WHERE `id` = 1");
$tempcnt = $_SESSION['TMPCOUNT'];
$tempcnt = $tempcnt + $temp;
$plccnt = $_SESSION['plcCOUNT'];
$plccnt = $pulse + $plccnt;
$_SESSION['TMPCOUNT'] = $tempcnt;
$_SESSION['plcCOUNT'] = $plccnt;
		    
if($cnt > 59)
{
	$tc = $_SESSION['TMPCOUNT'];
	$tc = $tc/60;
	$pc = $_SESSION['plcCOUNT'];
	$pc = $pc/60;
	mysqli_query($con,"INSERT INTO `pulse_log`(`patient_id`, `pulse_rate`) VALUES (10,'".$pc."')");
    mysqli_query($con,"INSERT INTO `tempreture_log`(`p_id`, `tempreture`) VALUES (10,'".$tc."')");  
}
mysqli_close($con);

?>