<?php
include('connection.php');
session_start();
$ids = $_SESSION['hid'];
$bid=$_POST['submit1'];
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


</head>
<style>

.column {
  float: left;
  width: 25%;
  padding: 15px;
  margin: 15px;
}


.row {
	margin-top: 30px;
	margin-left: 40px;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}


.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 15px;
  text-align: center;
  background-color: #f2f2f2;
}
.btn{
  background-color: #ff6600;
  border: none;
  color: white;
  padding: 10px 20px;
  padding-left: 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
li.dropbtn{
	display: inline-block;
	font-size: 24px;
}
.dropbtn: hover{
	padding: 5px 20px;

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
<body>
  <header class="header">
    <div class="container">
      <nav class="navbar flex1">
        <div class="sticky_logo logo">
          <img src="images/logo.png" width="50" height="50">
        </div>

        <ul class="nav-menu">
          <li> <a href="home.php">Home</a> </li>
          <li> <a href="#services">services</a> </li>
		  <li class="dropdown" style="padding-left: 700px;">
          <a class="dropbtn"><?php echo $name ?></a>  
          <div class="dropdown-content">
					    <a href="#">Profile</a>
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
  <script>
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", mobliemmenu);

    function mobliemmenu() {
      hamburger.classList.toggle("active");
      navMenu.classList.toggle("active");
    }

    window.addEventListener("scroll", function() {
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0)
    })
  </script>
  <header>
  </header>  
  <form action="bookform.php" method="post">
    <div class="main">
      <div class="row">
        <center>
					  <?php
              $result1=mysqli_query($con,"SELECT * FROM `tbl_room` JOIN `tbl_roomtype` ON tbl_room.type_id = tbl_roomtype.type_id  WHERE tbl_room.hid= '$bid'");
			        while($row=mysqli_fetch_array($result1)) 
                       
						{
						echo "<div class='column'>
			            <div class='card'>
						<div class='image'><img src='./images/".$row['picture']."' width= 200px  height= 150px></div>
						<p class='roomtype' style='padding-left: 30px; color:black;'>".$row['roomtype']."</p>
						<p class='price' style='padding-left: 30px; color:black;'>".$row['price']."</p>
						<button type='submit' class='btn' value='".$row['room_id']."' name='submit2'>BOOK NOW</button> </div></div>";
						}
						
						?>
				</center>
					<br><br>
      </div>    
    </div>
  </form>
</body>
</html>