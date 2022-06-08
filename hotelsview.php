<?php
include('connection.php');
session_start();
$ids = $_SESSION['hid'];
$name = $_SESSION['names'];
      
if(isset($_POST["search"])){
  $searchKey = $_POST["search"];
  $sql = "select * from hotels where place like '%$searchKey%'";
 }
 else{
 $sql = "SELECT * FROM `hotels`";
 $searchKey = "";
 }
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
  width: 28%;
  padding: 30px;
  margin: 15px;
}


.row {
	margin-top: 22px;
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

.sear{
  padding-left: 960px;
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
					    <a href="bookingdetails.php">Booking Details</a>
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
  <br>
  <div class="sear">
  <form  role="search" method="POST">
  <input type="search" id="query" name="search" placeholder="Search place" aria-label="Search through site content" value="<?php echo $searchKey; ?>">
  <button>Search</button>
  </form><br>
  </div>

  <div>
  <form action="rooms.php" method="post">
    <div class="main">
      <div class="row">
        <center>
					  <?php
						$query="select * from `hotels`" ;
						$query_run=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($query_run))
						{
						    $quer="select hotelname  from register2 where hid = '$row[hid]'";
							$quer_run=mysqli_query($con,$quer);
							$var=mysqli_fetch_assoc($quer_run);
							
						echo "<div class='column'>
			            <div class='card'>
						<b><p class='price' style='padding-left: 30px; color:black; font-size: 17px; '>".$var['hotelname']."</p></b>
						<div class='image'><img src='./images/".$row['picture']."' width= 200px  height= 150px></div>
						<p class='price' style='padding-left: 30px; color:black;'>".$row['place']."</p>
						<p class='desc' style='padding-left: 30px; color:black;'>".$row['description']."</p>
						<button type='submit' class='btn' value='".$row['hid']."' name='submit1'>SELECT ROOM</button> </div></div>";
						}
						?>
				</center>
					<br><br>
      </div>    
    </div>
  </form>
  </div>
</body>
</html>