<?php 
include('connection.php');
  session_start();
  $id=$_SESSION['hid'];
  $name = $_SESSION['hotelname'];

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
                <main>
                    <div class="container-fluid px-4">
                        <br>
                    
	   <div class="tableview">
			<table border =1 id="addr">
			<tr>
			<th>Room Type</th>
			<th>Price</th>
			<th>Number of rooms avaliable</th>
			<th>Picture</th>
            <th>Action</th>
			</tr>

			<?php
			$result=mysqli_query($con,"SELECT * FROM `tbl_room` JOIN `tbl_roomtype` ON tbl_room.type_id = tbl_roomtype.type_id  WHERE tbl_room.hid='$id'");
			while($row=mysqli_fetch_array($result)) 
			{ 
			?>
				
			<tr>
			<td><?php echo $row["roomtype"];?></td>
			<td><?php echo $row["price"];?></td>
			<td class="text-center"><?php echo $row["roomqty"];?></td>
			<td><img src="images/<?php echo $row["picture"];?>" height="100" width="100"></img></td>
            <td><button class="btn btn-sm btn-primary edit_cat"><a href="editroom.php?uid=<?php echo $row["room_id"];?> ">Edit</a></button>
             <button class="btn btn-sm btn-danger delete_cat"><a href="deleteroom.php?did=<?php echo $row["room_id"];?> ">Delete</a></button></td>
			</tr>

			<?php
			}
			?>
			</table>
		</div>
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
