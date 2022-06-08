<?php 
include('connection.php');
  session_start();
  $id = $_SESSION['hid'];
  $name = $_SESSION['hotelname'];
	 
if(isset($_POST["ok"]))
{
$id=$_SESSION['hid'];
$rtype=$_POST["roomtype"];
$price=$_POST["price"];
$qua=$_POST["quat"];
$upl=$_FILES["img"]["name"];
move_uploaded_file($_FILES["img"]["tmp_name"],"images/".$_FILES["img"]["name"]);
mysqli_query($con,"INSERT INTO `tbl_room`( `hid`, `type_id`, `price`, `picture`, `roomqty` ) VALUES ('$id','$rtype', 
'$price','$upl', '$qua')");
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
	    }
		.addroom{
	        position: absolute;
        }
        .tableview{
			position: absolute;
			top: 100px;
			right: 30px;
			font-size: 15px;
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
							
							<a class="nav-link" href="viewrooms.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Views Rooms
                            </a>
							
                            <a class="nav-link" href="viewbook.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Book Details
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
                <main>
                    <div class="container-fluid px-4">
                        <br>
                          <div class="addroom">
							<form action="#" method="post" enctype="multipart/form-data">
							  <h3>Add Rooms</h3>
							  <table>
								<tr>
								<td>Hotel name</td>
								<td><?php echo $name ;?> </td>
			                    </tr>
								<tr>
								<td>Add Room Type</td>
								<td><select name="roomtype"><?php $result=mysqli_query($con,"select * from `tbl_roomtype` ");
                                while($row=mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $row['type_id']; ?> "><?php echo $row['roomtype']; ?></option>
                                    <?php
                                } ?>
                                
                                </select></td>
								</tr>
								<tr>
								<td>Price</td>
								<td><input type="text" name="price"></td>
								</tr>
								<tr>
			                    <td>Number of Rooms</td>
			                    <td><input type="text" name="quat"></td></td>
			                    </tr>
								<tr>
								<td>Picture</td>
								<td><input type="file" name="img"></td>
								</tr>
								<tr>
								<td>
								</td>
								<td><input type="submit" class="btn1" name="ok" value="Save"></td>
								</tr>
							  </table>
							</form>
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
