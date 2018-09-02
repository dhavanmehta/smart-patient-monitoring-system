<?php
	session_start();
	
 
		 if(isset($_SESSION['role'])){
		 if(isset($_POST['name']))	
		 {
		 $conn = mysqli_connect("localhost", "root", "", "patient_monitoring") or die("Database Not Found");
 	  	    
			$sql1 = "INSERT INTO `users`(`user_id`, `password`, `role`) VALUES ('".$_POST['name']."','".$_POST['password'] ."','user')";
           $sta = mysqli_query($conn,$sql1) or die("Error Occure Go back and try again");
           echo "<script>alert('User Added successfully');</script>";
           header("Location:admin_panel.php");
		
   		}
   		}else
   		{
   		 	header("Location:login.php");
   		}  	          		
     
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add New User</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Baxster Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link rel="icon" href="favicon.ico" type="image/x-icon" >
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
</head> 
<body class="login-bg">
		<div class="login-body">
			<div class="login-heading">
				<h1>Add New Patient</h1>
			</div>
			<div class="login-info">
				<form method="post" action=add_user.php> 
		     		<input type="text" class="user" name="name" placeholder="User Name" required="">
					<input type="text" name="password" class="lock" placeholder="password" required="">
					<input type="submit" name="add" value="Add User">
			</form>
			</div>
		</div>
		<div class="go-back login-go-back">
				<a href="admin_panel.php">Go To Home</a>
			</div>
		<div class="copyright login-copyright">
           <p>© 2017 Smart Patient Monitoring System . Design by <a href="http://w3layouts.com/">Group No :- 14</a></p>    
		</div>
</body>
</html>
