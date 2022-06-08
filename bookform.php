<?php
include('connection.php');
session_start();

$name = $_SESSION['names'];
$aid = $_POST['submit2'];
if(isset($_POST["book"]))
{
$id= $_SESSION['regid'];
$ids = $_SESSION['hid'];

echo $bookiD = $_POST['book'];

$cin = $_POST["checkin"];
$cout = $_POST["checkout"];
$noroom = $_POST["noroom"];
 $sqll="INSERT INTO `book`( `regid` ,`hid` , `room_id`, `checkin` , `checkout`, `No_of_rooms` ) VALUES
( '$id', '$ids', '$bookiD', '$cin', '$cout', '$noroom')";
$res=mysqli_query($con,$sqll);
 if($res){
   $qtyupdate="UPDATE `tbl_room` SET `roomqty`=roomqty-'$noroom' WHERE room_id='$bookiD'" ;
   if(mysqli_query($con,$qtyupdate)){
     header('Location:book.php ');}
  

 }else{
   echo "no";
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
</head>
<style>
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
main{
	padding: 30px;
}
.column {
  float: left;
  width: 30%;
  padding-top: 20px;
  margin: 40px;
}
.row {
	margin-top: 10px;
	margin-left: 80px;
  margin-right: 90px;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 60px;
  width: 150%;
  padding-right: 80px;
  padding-left: 80px;
  padding-top: 80px;
  margin: 120px;
  margin-top: 50px;
  margin-right: 120px;
  text-align: center;
  background-color: #ebe6e6;
}
input {
	width: 250px;
	height: 40px;
	border:none;
	outline: none;
	padding-left: 40px;
	box-sizing: border-box;
	font-size: 15px;
	color: #333;
	margin-bottom: 30px;
}
select {
	width: 250px;
	height: 40px;
	border:none;
	outline: none;
	padding-left: 40px;
	box-sizing: border-box;
	font-size: 15px;
	color: #333;
	margin-bottom: 30px;
}
label{
	align: right;
	
}
.btn2{
  background-color: #ff6600;
  border: none;
  color: white;
  padding: 0px 20px;
  padding-left: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
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
  <div>
  <form action="#" method="post">
    <div class="main">
      <div class="row">
	      <div class="column">
          <div class="card">
			      <label>Check-In</label>
			      <input type="date" name="checkin" id="checkin">
			      <label>Check-out</label>
			      <input type="date" name="checkout" id="checkout"><br>
            <label>No. of Rooms</label>
            <?php 
$select="SELECT roomqty FROM tbl_room WHERE room_id=$aid";
$result=mysqli_query($con,$select);
$row=mysqli_fetch_array($result);

            ?>
			      <input type="number" name="noroom" id="noroom" min="1" max="<?php echo $row['roomqty']?>">
			      <button class="btn2" type="submit" name="book" value="<?php echo $aid; ?>" style="width:170px; height:50px;">Book</button>
		      </div>
	      </div>
      </div>   
    </div> 
  </form>
  </div>
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