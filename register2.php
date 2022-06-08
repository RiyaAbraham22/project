<?php
if(isset($_POST["registers"]))
{
include "connection.php";
$hotelname = $_POST["hotelname"];
$phones = $_POST["phones"];
$emails = $_POST["emails"];
$unames = $_POST["usernames"];
$pwds = $_POST["passwords"];
$query = "SELECT `usernames` FROM register2 WHERE usernames = '$unames' ";
$result1 = mysqli_query($con, $query);
if(mysqli_num_rows($result1))
{
echo "<font color=red><center>Registration failed. Username exists<center></font>";
}
else
{

$sql = "INSERT INTO register2 (`hotelname`,`phones`, `emails`, `usernames`, `passwords`) VALUES ('$hotelname' , '$phones', 
'$emails','$unames','$pwds' )";
$res = mysqli_query($con, $sql);

$_SESSION["hotelname"] = $_POST["hotelname"];
$_SESSION["emails"] = $_POST["emails"];
$_SESSION["phones"] = $_POST["phones"];
$_SESSION["usernames"] = $_POST["unames"];
$_SESSION["passwords"] = $_POST["pwds"];
echo ("<script LANGUAGE='JavaScript'>
window.alert('Register Success');
window.location.href='login.php';
</script>");

}
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Hotel Booking Website</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">

  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
  
  <style>
	   
    .main {
		align: center;
		text-align: center;
	}
	.main .container{
		max-width: 90%;
        margin-top: 20px;
	}
	

	.main1 input{
		width: 300px;
		height: 40px;
		radius: 1px;
		border: 1px solid black;
		padding-left: 40px;
		box-sizing: border-box;
		font-size: 15px;
		margin-bottom: 40px;
	}

	.main button,input[type=submit] {
		width: 120px;
		height: 40px;
		padding-left: 0;
		background-color: #CC8C18;
		letter-spacing: 1px;
		font-weight: bold;
		margin-bottom: 50px;
	}

	.main button:hover {
		box-shadow: 2px 2px 5px #555;
		background-color: #CC8C18;
	}
	.main input:hover {
		box-shadow: 2px 2px 5px #555;
		background-color: #ddd;
	}

	.main i {
		position: absolute;
		left: 15px;
		color: #333;
		font-size: 16px;
		top: 2px;
	}   
   
  </style>
  
</head>

<body>
  <header class="header">
    <div class="container">
      <nav class="navbar flex1">
        <div class="sticky_logo logo">
          <img src="images/logo.png" width="50" height="50">
        </div>
        <ul class="nav-menu">
          <li> <a href="index.php">Home</a> </li>
          <li> <a href="services.php">services</a> </li>
		  <li> <a href="register2.php">Hotels</a> </li>
		  <li style="padding-left: 800px;"> <a href="login.php">Login</a> </li>
		  <li> <a href="register.php">Register</a> </li>
        </ul>
        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </nav>
    </div>
  </header>
  
 <section class="main" id="main">
    <div class="container">
	<div class="box">
	<br>
	<center>
	 <div class="main1">
	    <form action="#" method="post" name = "Register" enctype = "multipart/form-data">
		
		<script>

                    function firstfocus()
                        {
                                var name = document.Register.hotelname.focus();
                                return true;
                        }
            
                        function names()
                        {
                                var name = document.forms["Register"]["name"];
                                var letters = /^[A-Za-z\s]+$/;
                               
            
                                if(name.value == "")
                                {
                                          name = "Please enter your name";
                                          document.getElementById("Ename").innerHTML = name;
                                          name.focus();
                                          return false;
                                }
            
                              else if(name.value.match(letters))
                                {
                                // Focus goes to next field i.e. Address.
            
                                           document.getElementById("Ename").innerHTML = "";
                                           document.Register.phones.focus();
                                           return true;
                                 }
            
                                else
                                {
                                         document.getElementById("Ename").innerHTML = "Name must have alphabet characters only";
                                         name.focus();
                                         return false;
                                 }
            
                        }
            
          
                        function Phones()
                        {
                                var phones = document.forms["Register"]["phones"];
                                var phn = /^\(?([1-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
            
                            if(phones.value == "")
                            {
                                document.getElementById("EPhone").innerHTML = "Please enter your phone no";
                                phone.focus();
                                return false;
                            }
            
                            else if(phones.value.match(phn))
                            {
                                document.getElementById("EPhone").innerHTML = "";
                                document.Register.emails.focus();
                                return true;
                            }
            
                            else
                            {
                                document.getElementById("EPhone").innerHTML = "Invalid Phone No";
                                phones.focus();
                                return false;
            
                            }
                        }
            
        
            
                        function EMail()
                        {
                            var EMail = document.forms["Register"]["emails"];
                              var mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            
            
                            if(EMail.value == "")
                            {
                                     document.getElementById("Eemail").innerHTML = "Please enter your email";
                                     EMail.focus();
                                     return false;
                            }
            
                            else if(EMail.value.match(mail))
                            {
                                     document.getElementById("Eemail").innerHTML = "";
                                     document.Register.usernames.focus();
                                     return true;
                            }
            
                            else
                            {
                                     document.getElementById("Eemail").innerHTML = "Invalid Email";
                                     EMail.focus();
                                     return false;
                            }
                        }
						
						  function unames()
                        {
                                var unames = document.forms["Register"]["usernames"];
                                var letters = /^[A-Za-z\s]+$/;
                               
            
                                if(unames.value == "")
                                {
                                          unames = "Please enter your name";
                                          document.getElementById("Euname").innerHTML = unames;
                                          unames.focus();
                                          return false;
                                }
            
                              else if(unames.value.match(letters))
                                {
                                // Focus goes to next field i.e. Address.
            
                                           document.getElementById("Euname").innerHTML = "";
                                           document.Register.passwords.focus();
                                           return true;
                                 }
            
                                else
                                {
                                         document.getElementById("Euname").innerHTML = "Name must have alphabet characters only";
                                         unames.focus();
                                         return false;
                                 }
            
                        }
            
                      
            
            
            
                        function Paswd()
                        {
                            var paswd = document.forms["Register"]["Passwords"];
                            var pwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
            
                            if(paswd.value == "")
                            {
                                document.getElementById("EPwd").innerHTML = "Please enter your password";
                                paswd.focus();
                                return false;
                            }
            
                            else if(paswd.value.match(pwd))
                            {
                                document.getElementById("EPwd").innerHTML = "";
                                document.Register.passwords.focus();
                                return true;
                            }
            
                            else
                            {
                                document.getElementById("EPwd").innerHTML= "Invalid Password";
                                paswd.focus();
                                return false;
                            }
                        }
            
                     
            
            
                    </script>
					
					
		        <center><h3 style="color:#CC8C18">Register For Hotels</h3></center><br>
 				<input type="text" placeholder="HotelName" name="hotelname" onblur ="names()"/>
				<p id="Ename"></p>
				<input type="text" placeholder="Phone" name="phones" onblur ="Phones()"/>
				<p id="EPhone"></p>
				<input type="text" placeholder="Email" name="emails" onblur ="EMail()"/>
				<p id="Eemail"></p>
 				<input type="text" placeholder="Username" name="usernames" onblur ="unames()"/>
				<p id="Euname"></p>
				<input type="password" placeholder="Password" name="passwords" onblur ="Paswd()"/>
				<p id="EPwd"></p>
 				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button type="submit" value="registers" name="registers">Register</button>
				
        </form>
	  </div>
	  </center>
	 </div>
    </div>
</section>
</body>
</html>
