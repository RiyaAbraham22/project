<?php 
include('connection.php');
  session_start();
  $id=$_SESSION['hid'];
  $name = $_SESSION['hotelname'];
  $month=0;$year=0;
  if(isset($_POST["report"]))
                   {
  $month=$_POST["month"];
  $year=$_POST["selYear"];
                   }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hotels</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="styles2.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
	
	<style>
		table {
		  border-collapse: collapse;
		  width: 90%;
		}

		th, td {
		  text-align: left;
		  padding: 10px;
		}

		th {
		  background-color: black;
		  color: white;
		}

		.btn1{
		  background-color: black;
		  border: none;
		  color: white;
		  padding: 10px 20px;
		  padding-left: 30px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		}
        
		.tableview{
		   font-size: 15px;
           position: absolute;
			font-size: 15px;
            width: 60%;
	    }
		.addroom{
	        position: absolute;
        }
    
	</style>
	
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark float-right">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">HOTEL BOOKING</a>
            <!-- Sidebar Toggle-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php">LogOut</a></li>
                        
                    </ul>
                </li>
            </ul>
            
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                    <a class="nav-link" href="hotelsite.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Add Hotels Details
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="addhotel.php"> Add more Hotel details</a>
                                    <a class="nav-link" href="addrooms.php">Add Rooms</a>
                                </nav>
                            </div>
							
							<a class="nav-link"href="viewrooms.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i>
                                Views Rooms
                            </div></a>
                           
                            <a class="nav-link" href="viewbook.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Book Details
                            </a>
                          <a class="nav-link" href="report.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Report Details
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        hotels
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <div class="container-fluid px-4">
                    <br><br>
                    <form action="#" method="post">
                    <div class="tableview">
                    <center>
			        <label> Select the year</label> <?php $nbsp;$nbsp; ?>
                    <select id="selYear" name="selYear">
                    
                    <?php
                    for($i=date('Y');$i>2020;$i--)
                    {
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                    }
                    ?>
                   </select>
                   <label> Select the Month</label> <?php $nbsp;$nbsp; ?>
                    <select name="month">
                    <option value="01" <?php if($month=='01') echo 'selected'; ?>>January</option>
                    <option value="02" <?php if($month=='02') echo 'selected'; ?>>February</option>
                    <option value="03" <?php if($month=='03') echo 'selected'; ?>>March</option>
                    <option value="04"<?php if($month=='04') echo 'selected'; ?>>April</option>
                    <option value="05" <?php if($month=='05') echo 'selected'; ?>>May</option>
                    <option value="06" <?php if($month=='06') echo 'selected'; ?>>June</option>
                    <option value="07"<?php if($month=='07') echo 'selected'; ?>>July</option>
                    <option value="08"<?php if($month=='08') echo 'selected'; ?>>August</option>
                    <option value="09"<?php if($month=='09') echo 'selected'; ?>>September</option>
                    <option value="10"<?php if($month=='10') echo 'selected'; ?>>November</option>
                    <option value="11"<?php if($month=='11') echo 'selected'; ?>>October</option>
                    <option value="12"<?php if($month=='12') echo 'selected'; ?>>December</option>
                   </select>
                   <button type='submit' name="report" class='btn1'> SUBMIT</button>
                   </center>

                   <?php 

                   if(isset($_POST["report"]))
                   {
                    
			       $result=mysqli_query($con,"SELECT register.name,book.room_id,payment.amt FROM register JOIN book ON 
                   register.regid=book.regid JOIN payment ON register.name=payment.name WHERE 
                   month(book.checkIn)='$month' and year(book.checkIn)='$year'");
                   if(mysqli_num_rows($result)>0)
                   {
                       ?><br/><br/>
                      <div id="toPrint"> <table border="1"  align="center">
                           <tr><td>Sl.No</td>
                           <td>Name</td>
                           <td>Room</td>
                           <td>Amount</td>
                           </tr>
                       <?php
                       $i=1;
                       $grand=0;
                       
			       while($row=mysqli_fetch_array($result)) 
                   
{ 

    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['room_id']; ?></td>
        <td><?php echo $row['amt']; ?></td>
    </tr>
    <?php
$i++;
$grand += $row['amt'];
                   }    ?>
                <tr>
                    <td colspan="3" align="right"><label>Grand Total</label></td>
                    <td><?php  echo 'Rs. '.$grand.'/-';  ?></td>
                </tr>
                </table> 
                
                
                </div><?php            }
                   else
                   {
                       echo "No Record Found";
                   } 
                }
                   
                   ?>


		            </div>
                </form>
                </div>			
            </div>                         
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
