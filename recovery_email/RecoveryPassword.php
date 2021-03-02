<?php
    include_once "farmer.php";
	$cust=new Farmer();
if(isset($_SESSION["id"]))
{
}
else{
	echo("<script> window.open('login.php', '_self')</script>");		 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div style="margin-bottom:30px;" class="wrap-login100">
				<form method="post"  style="color:#c80000" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span style="padding:30px;" class="login100-form-title">
						Recovery Password
					</span>

                    <div style="margin-bottom:30px;" class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input  class="input100" type="text" name="verif" placeholder="Verification Code">
					</div>
                    <div style="margin-bottom:30px;" class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input  class="input100" type="text" name="pass" placeholder="New Password">
                    </div>
                    <div style="margin-bottom:30px;" class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input  class="input100" type="text" name="cpass" placeholder="Confirm Password">
					</div>
					<div style="margin-bottom:30px;" class="container-login100-form-btn">
						<input type="submit" name="btnrecovery" value="Recovery Password" class="login100-form-btn">
						
		</input>
                    </div>
					
					<?php
                    if(isset($_POST["btnrecovery"]))
                    {
                          
                            if($_SESSION["code"]==$_POST["verif"])
                            {
								$reg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
								if(preg_match($reg,$_POST["pass"]))
								{
                              if($_POST["pass"]==$_POST["cpass"]){
                                  $cust->setpassword($_POST["pass"]);
                                      $ms=$cust->UpdatePW();
									  echo("<script> window.open('login.php', '_self')</script>");		 
									
								}
								else{
									echo("<br/><div class='alert alert-danger'>Confirm must be match password , Try Again </div>");

								}
							}
                              else
							  echo("<div class='alert alert-warning'>This Password Is Weak , Minimum eight 
							  characters, at least one uppercase letter, one lowercase letter, one number and one special character</div>");                            }
                            else
                            echo("<br/><div class='alert alert-danger'> Invaild Code , Try Again </div>");
                        }
                    ?>
					 

                    </form>
                    </div>
                    </div>
                    </div>