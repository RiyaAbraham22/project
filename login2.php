<?php
if (isset($_POST['logins'])){
  session_start();
  include('connection.php');
  
  
  $name = $_POST['usernames'];
  $password = $_POST['passwords'];
  $query = "SELECT * FROM register2 WHERE usernames = '$name' AND passwords = '$password'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $name = $row['hotelname'];
      $phn=$row['phones'];
      $ema=$row['emails'];
      $un = $row['usernames'];
      $pws = $row['passwords'];  
	  $id = $row['hid'];
    }
    if ($password == $pws) 
	{
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Hotel Login Success');
        window.location.href='hotelsite.php';
        </script>");
	    $_SESSION['hid'] = $id;
        $_SESSION['hotelname'] = $name;
	}
    else 
	{
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Incorrect username/password');
        window.location.href='login2.php';
        </script>");
    }
         
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
		  <li> <a href="register2.php">Register</a> </li>
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
	<br><br><br><br><br>
	<center>
	 <div class="main1">
	    <form action="#" method="post">
		        <center><h3 style="color:#CC8C18">Login</h3></center><br>
 				<input type="text" placeholder="Username" name="usernames"><br><br>
 				<input type="password" placeholder="password" name="passwords"><br>
 				<button type="submit" value="Logins" name="logins"/>Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button type="submit" value="registers" name="registers">Register</button>
        </form>
	  </div>
	  </center>
	 </div>
    </div>
</section>
</body>
</html>
