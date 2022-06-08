<?php

  include ('connection.php');
  session_start();
  $id = $_SESSION['regid'];
  $name = $_SESSION['names'];

  $query = "SELECT * FROM `book` JOIN `register` ON book.regid = register.regid WHERE book.regid='$id'";
  $res1 = mysqli_query($con, $query) or die('error getting data');
  $row2 = mysqli_fetch_array($res1);
  
  

  $query2 = "SELECT * FROM `book` WHERE `bid` = (SELECT MAX(`bid`)FROM `book`)";
  $res2 = mysqli_query($con, $query2) or die('error getting data');  
  $row1 = mysqli_fetch_array($res2);

  $query4 = "SELECT `checkout`,  `checkin` FROM `book` WHERE `bid` = (SELECT MAX(`bid`)FROM `book`)";
  $res5 = mysqli_query($con, $query4) or die('error getting data');
  $row4 = mysqli_fetch_array($res5);


  $query3 = "SELECT `pay_id`, `date_added`, `name` FROM `payment` WHERE  `pid` = (SELECT MAX(`pid`)FROM `payment`)";
  $res3 = mysqli_query($con, $query3) or die('error getting data');
  $row3 = mysqli_fetch_array($res3);

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
#print {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#print td, #print th {
  border: 1px solid #ddd;
  padding: 8px;
}

#print tr:nth-child(even){background-color: #f2f2f2;}

#print tr:hover {background-color: #ddd;}

#print th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
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
  <div id="printableArea">
<center><br><br><br>
<table id="print"  border="1">
<tr>
<th>First Name:</th>
<td colspan="6"><input type="text" value="<?php echo $row2["name"]?> "</td>
</tr>
<tr>
<th>Address:</th>
<td colspan="6"><input type="text" value="<?php echo $row2["address"]?>" </td>
</tr>
<tr>
<th>Phone:</th>
<td colspan="2"> <input type="text" value="<?php echo $row2["phone"]?>"</td>
</tr>
<tr>
<th>Email:</th>
<td colspan="2"><input type="text" value="<?php echo $row2["email"]?>"</td>
</tr>
<tr>
<th>Checkin:</th>
<td colspan="2"><input type="text" value="<?php echo $row4["checkin"]?>"</td>
</tr>
<tr>
<th>Checkout:</th>
<td colspan="2"><input type="text" value="<?php echo $row4["checkout"]?>"</td>
</tr>
<tr>
<th>Order Date:</th>
<td colspan="2"><input type="text" value="<?php echo $row3["date_added"]?>"</td>
</tr>
<tr>
<th>Payment ID:</th>
<td colspan="2"><input type="text" value="<?php echo $row3["pay_id"]?>"</td>
</tr>
</table>
<br>
<th colspan="1"><button onclick="printDiv('printableArea')" class="button1"><a href="hotelsview.php"> Print</a></button></th>
</center>
</div>


<br><br><br><br><br>
       
  </body>
</html>