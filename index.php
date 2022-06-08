
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

  

  <section class="home" id="home">
    <div class="container">
      <h1 style="color: white" "font-family: 'Great Vibes', cursive";>Make Memories</h1>
      <p>Discover the place where you have fun & enjoy a lot</p>

      <div class="content grid">
        <div class="box">
		  <span>PLACE TO STAY </span> <br>
          <input type="text" placeholder="select the place to stay">
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
          <button class="flex1">
            <span>Search</span>
          </button>
        </div>
      </div>
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

  <section class="room wrapper2 top" id="room">
    <div class="container">
      <div class="heading">
        <h5>OUR ROOMS</h5>
        <h2>Fascinating rooms & suites </h2>
      </div>
      <div class="content flex mtop">
        <div class="left grid2">
          <div class="box">
            <i class="fas fa-desktop"></i>
            <p>Free Cost</p>
            <h3>No booking fee</h3>
          </div>
          <div class="box">
            <i class="fas fa-dollar-sign"></i>
            <p>Free Cost</p>
            <h3>Best rate guarantee</h3>
          </div>
          <div class="box">
            <i class="fab fa-resolving"></i>
            <p>Free Cost</p>
            <h3>Reservations 24/7</h3>
          </div>
          <div class="box">
            <i class="fal fa-alarm-clock"></i>
            <p>Free Cost</p>
            <h3>High-speed Wi-Fi</h3>
          </div>
          <div class="box">
            <i class="fas fa-mug-hot"></i>
            <p>Free Cost</p>
            <h3>Free breakfast</h3>
          </div>
          <div class="box">
            <i class="fas fa-user-tie"></i>
            <p>Free Cost</p>
            <h3>One person free</h3>
          </div>
        </div>
        <div class="right">
          <img src="images/3.jpg" alt="">
        </div>
      </div>
    </div>
  </section>

 
  <footer>
    <div class="container top">
   <center><h5>hotelbooking.com</h5></center>
    </div>
  </footer>
</body>
</html>
