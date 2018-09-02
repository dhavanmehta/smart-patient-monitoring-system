		<?php
		 session_start();
		 if(isset($_SESSION['user'])){
		 if(isset($_POST['pid']))	
		 {
		 $conn = mysqli_connect("localhost", "root", "", "patient_monitoring") or die("Database Not Found");
 	  	    
			$sql1 = "INSERT INTO `patient_data`(`patient_id`, `patinet_name`, `age`, `diseases`) VALUES('".$_POST['pid']. "','".$_POST['name']."','".$_POST['age']."','".$_POST['diseases']. "')";
           $sta = mysqli_query($conn,$sql1) or die("Error Occure Go back and try again");
           echo "<script>alert('Patient data Added successfully');</script>";
           header("Location:admin_panel.php");
		
   		}else
   		{
   			header("Location:add_patient.php");
   		}
   	}else
   		{
   		 	header("Location:login.php");
   		}
   		?>