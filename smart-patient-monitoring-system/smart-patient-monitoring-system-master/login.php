<?php
session_start();
 $conn = mysqli_connect("localhost", "root", "", "patient_monitoring") or die("Database Not Found");
 $posted = false;
$status = false;
if($_POST) {
    $posted = true;
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

  $admin = test_input($_POST["email"]);
   $adpassword = test_input($_POST["password"]);
  if ($conn) {
        $sql = "select * from users where user_id = '".$admin."' and password = '".$adpassword."'";
        try {
            $status = mysqli_query($conn,$sql);

        } catch (mysqli_sql_exception $e) {

        }

    }
}
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Patient Monitoring System</title>
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
				<h1>Login To Continue</h1>
			</div>
			<div class="login-info">
				<form action="login.php" method="post">
				 <DIV>
				 <?php
                if($posted) {
                    if ($status) {
                        $row = mysqli_num_rows($status);
                        if($row == 1)
                        {
     					              $data = mysqli_fetch_row($status);
                            if(strcmp($data[3],'admin') == 0)
                            {
                              	$_SESSION['user'] = $_POST['email']; 
                                $_SESSION['role'] = 'admin'; 
                                header("Location:admin_panel.php");
                            }else  if(strcmp($data[3],'user') == 0)
                           
                            {
                                $_SESSION['user'] = $_POST['email']; 
                                header("Location:user_panel.php?id=" . $_SESSION['user']."");
                          }
                    }
                        else
                        {
                            echo "<center>No match for id and password</center>";
                        }

                    }
                	}
                	?>
</DIV>
					<input type="text" class="user" name="email" placeholder="Email" required="">
					<input type="password" name="password" class="lock" placeholder="Password">
					<div class="forgot-top-grids">
							<div class="clearfix"> </div>
					</div>
					<input type="submit" name="Sign In" value="Login">
			
				</form>
			</div>
		</div>
	<div class="copyright login-copyright">
           <p>© 2016 Smart Patient Monitoring System. Design by <a href="http://w3layouts.com/">Group No :- 14</a></p>    
		</div>
</body>
</html>