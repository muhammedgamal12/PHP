<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="design/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">

                    <h2 class="title">Registration Info</h2>
                    <form method="POST">
                    <?php
           if(isset($_POST["regbtn"]))
           {
			$reg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
            if(preg_match($reg,$_POST["pass"]))
            {
                if($_POST["pass"]==$_POST["cpass"]){
           
               include_once "farmer.php";
               $cust=new Farmer();
              
               $cust->setfname($_POST["fname"]);
               $cust->setlname($_POST["lname"]);
               $cust->setpassword($_POST["pass"]);
               $cust->setphone($_POST["phone"]);
               $cust->setusername($_POST["uname"]);
               $cust->setgov($_POST["gov"]);
               $cust->setcity($_POST["city"]);
               $cust->setstreet($_POST["street"]);
			   $ms=$cust->Add();
               if($ms=="ok")
               {
                   
                   echo("<div class='alert alert-success'> Your Account has been created </div>");

                   echo("<script> window.open('login.php', '_self')</script>");	

               }
               else if(strpos($ms,"Phone"))
               {
                echo("<div class='alert alert-warning'>This Phone Is Used</div>");
               }
               else if(strpos($ms,"UserName"))
               {
                echo("<div class='alert alert-warning'>This Username Is Used</div>");
               }
               else{
                   echo("<div class='alert alert-danger'>$ms</div>");
               }
               }
               else
			   {echo("<div class='alert alert-warning'> Password is Not Identical</div>");
               }
            }

               else
			   {echo("<div class='alert alert-warning'>This Password Is Weak , Minimum eight 
				characters, at least one uppercase letter, one lowercase letter, one number and one special character</div>");
               }
			}  
	   ?>
                       
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                <input class="input--style-2" type="text" placeholder="First Name" name="fname">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                <input class="input--style-2 " type="text" placeholder="Last Name" name="lname">

                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="User Name" name="uname">

                        </div>
                       
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Phone" name="phone">

                        </div>
                        <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gov">
                                            <option disabled="disabled" selected="selected">Government</option>
							<option selected value="Alexandria">الاسكندريه</option>
							<option value="Cairo">القاهره</option>
                            <option value="October">السادس من أكتوبر</option>
                            <option value="Menoufia">المنوفيه</option>
							<option value="Gharbia">الغربيه</option>
                            <option value="Ismailia">الاسماعيليه</option>
                            <option value="Behera">البحيره</option>
							<option value="Fayoum">الفيوم</option>
                            <option value="Matrooh">مطروح</option>
                            <option value="Domiatee">دمياط</option>
							<option value="kafrelsheikh">كفر الشيخ</option>
                            <option value="Giza">الجيزه</option>
                            <option value="Daqahlia">الدقهليه</option>
							<option value="Luxor">الاقصر</option>
                            <option value="Aswan">أسوان</option>
                            <option value="kafrelsheikh">قنا</option>
                            <option value="Mansoura">السويس</option>
                            <option value="Daqahlia">بني سويف</option>
							<option value="Luxor">بور سعيد</option>
                            <option value="Aswan">الشرقيه</option>
                            <option value="Aswan">البحر الاحمر</option>
                            <option value="Aswan"> سوهاج</option>


                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>

                        </div>
                      
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="City" name="city">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                <input class="input--style-2 " type="text" placeholder="Street" name="street">

                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Password" name="pass">

                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" name="cpass" placeholder="Confirm Password" >

                        </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green"name="regbtn" type="submit">Regester</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->