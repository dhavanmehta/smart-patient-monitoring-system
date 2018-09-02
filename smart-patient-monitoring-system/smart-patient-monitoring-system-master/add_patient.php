
<?php
	session_start();
	
 	   if(isset($_SESSION['role']))
        {
		 $conn = mysqli_connect("localhost", "root", "", "patient_monitoring") or die("Database Not Found");
 	  	          		
        $sql = "SELECT patient_id FROM patient_data ORDER BY patient_id DESC LIMIT 1";
        try {
            $status = mysqli_query($conn,$sql);

        } catch (mysqli_sql_exception $e) {

        

        }
        
        }
        else
        { 
        			header("Location:login.php");
        }
        if($status)
        {
        	$row = mysqli_fetch_row($status);
        	$p_id = $row[0];
        	$p_id = $p_id + 1;
        }
        
      
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add New Patient</title>
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
				<form method="post" action=insert.php> 
					<input type="text" class="user" name="pid" placeholder="Name" required="" value=<?php echo $p_id;?> readonly="readonly">
					<input type="text" class="user" name="name" placeholder="Patient Name" required="">
					<input type="number"  max=80  min=0  name="age" class="lock" placeholder="Age">
					<input type="text" name="diseases" class="lock" placeholder="Diseases" required="">
					<input type="submit" name="add" value="Add Record">
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





















































