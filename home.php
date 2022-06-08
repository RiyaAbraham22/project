<?php
include('connection.php');
session_start();
$id = $_SESSION['regid'];
$name = $_SESSION['names'];

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Hotel Booking Website</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    

  <style>
  
  li.dropbtn{
	display: inline-block;
	font-size: 24px;
}
.dropbtn: hover{
	padding: 5px 20px;
	color: black;
}
.dropdown {
  position: relative;
    display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #e6e6e6;
  color: black;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}   
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown:hover .dropdown-content {
  display: block;
  color: black;
}

.dropdown:hover .dropbtn {
  background-color: #fff;
  color: black;
}
  
  </style>
  
</head>
<?php
include './checkoutdate.php';
checkoutdate($con);
?>
<body>
  <header class="header">
    <div class="container">
      <nav class="navbar flex1">
        <div class="sticky_logo logo">
          <img src="images/logo.png" width="50" height="50">
        </div>
        <ul class="nav-menu">
          <li> <a href="home.php">Home</a> </li>
          <li> <a href="services.php">services</a> </li>
		  <li class="dropdown" style="padding-left: 700px;">
          <a class="dropbtn"><?php echo $name ?></a>  
          <div class="dropdown-content">
					    <a href="index.php">Logout</a>
					</div>
			</li>
        </ul>
        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </nav>
    </div>
  </header>
  
  <section class="home" id="home">
    <div class="container">
      <h1 style="color: white">Make Memories</h1>
      <p>Discover the place where you have fun & enjoy a lot</p>
    <form action="hotelsview.php" method="post">
      <div class="content grid">
        <div class="box">
		  <span>PLACE TO STAY </span> <br>
          <input type="text" placeholder="select the place to stay" name="place">
		  </div>
		<div class="box">
          <span>ARRIVAL DATE </span> <br>
          <input type="date" placeholder="29/20/2021" name="checkin" id="checkin">
        </div>
        <div class="box">
          <span>DEPARTURE DATE </span> <br>
          <input type="date" placeholder="29/20/2021" name="checkout" id="checkout">
        </div>
        <div class="box">
          <span>ADULTS</span> <br>
          <input type="number" placeholder="01">
        </div>
        <div class="box">
          <button class="flex1" name="search" >
            <span>Search</span>
          </button>
        </div>
      </div>
	  </form>
    </div>
  </section>
  
  <script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#checkin').attr('min',today);
  </script>
  <script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#checkout').attr('min',today);
  </script>
  
  </body>
</html>
  