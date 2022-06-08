<?php 
include('connection.php');
  session_start();
  $id=$_SESSION['hid'];
  $rid=$_SESSION['room_id'];
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            width: 90%;
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
        <form action="viewbook1.php" method="post">
	   <div class="tableview">
			<table border =1 id="addr">
			<tr>
            <th>RoomType</th>
			<th>Status</th>
            <th>Action</th>
			</tr>

			<?php
			$result=mysqli_query($con,"SELECT * FROM `book` JOIN `tbl_room` ON book.room_id = tbl_room.room_id 
            JOIN tbl_roomtype ON tbl_room.type_id = tbl_roomtype.type_id WHERE book.hid='$id'");
			while($row=mysqli_fetch_array($result)) 
			{ 
			?>
				
			<tr>
            <td><?php echo $row["roomtype"]; ?></td>
			<?php  if($row["status"]==1): ?>
            <td>Checked-IN</td>
			<?php else:?>
			<td>Checked-Out</td>
			<?php endif; ?>
		    <td>
            
            <button type="submit" name="view" value="<?php echo $row['bid'];?>"class="btn btn-info btn-lg" >View</button>
	         </td>
			</tr>

			<?php
			}
			?> 
			</table>
		</div>
        </form>
		</div>
        </div>			
                

</div> 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
            /* function popModal(ID) {
                $.ajax({
                    url: "viewbook1.php",
                    type: "post",
                    data: {
                        IdItem: ID
                    },
                    success: function(response) {
                        $('#exampleModal').modal('show');
                        $('.modal-body').html(response);
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            } */
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
