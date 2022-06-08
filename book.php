<?php
include('connection.php');
session_start();
$id = $_SESSION['regid'];
$rid = $_SESSION['hid'];
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
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>
<style>

.column {
  float: left;
  width: 40%;
  padding: 15px;
  margin: 15px;
}


.row {
	margin-top: 60px;
	margin-left: 500px;
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
  background-color: #ebebe0;
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
          <li> <a href="index.php">Home</a> </li>
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
    <div class="main">
      <div class="row">
      <?php
			$result=mysqli_query($con,"SELECT * FROM `book` JOIN `tbl_room` ON book.room_id = tbl_room.room_id WHERE book.regid ='$id' AND book.status = 1");
			while($row=mysqli_fetch_array($result)) 
      {
			?>	
		  <div class='column'>
			<div class='card'>

			<b><label> Check-in Date &nbsp;&nbsp; : &nbsp; </label></b>
			<?php echo $row['checkin'];?>
			<br><br>
			<b><label> Check-out Date &nbsp;&nbsp; : &nbsp; </label></b>
			<?php echo $row['checkout'];?>
			<br><br>
			<b><label> Amount &nbsp;&nbsp; : &nbsp; </label></b>
			<label id="grandtotal"><?php echo $row['price'];?></label>
			<br><br>
			<button class="btn" type="submit" name="pay" id="payment">PAY NOW</button>
			<?php 
			}
			?>
			</div>
		   </div>

		<br><br>
      </div>    
    </div>
	
  </div>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <script>
                document.getElementById('payment').onclick = function(e) {
					let amt = $('#grandtotal').html();
                        var options = {
                            "key": "rzp_test_GhL9PFaTCAYjmm", // Enter the Key ID generated from the Dashboard
                            "amount": amt * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": "HotelBooking",
                            "description": "Hotel Rooms booking",
                            "image": "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.dreamstime.com%2Fsimple-illustration-dark-blue-hotel-logo-design-template-business-icon-inspiration-travel-tourism-sticker-idea-simple-image165633303&psig=AOvVaw2Tr2HF52IrgC267PmZqgRg&ust=1651811341231000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCNiAn_XCx_cCFQAAAAAdAAAAABAD",
                            "handler": function(response) {
                              alert("ok");
                              //success function
                            $.ajax({
                            url: "cartform.php",
                            type: "POST",
                            data: {
                            razorpay_payment_id: response.razorpay_payment_id,
                            Amount:amt
                            },
                            success: function(data, status) {
                            console.log(data);
                            window.location.href = "thankpage.php";
                            },
                            error: function(responseData, textStatus, errorThrown) {
                            console.log(responseData, textStatus, errorThrown);
                             }
                         });

                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                        e.preventDefault();
                   
                }
            </script>
</body>
</html>