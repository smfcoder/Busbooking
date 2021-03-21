<?php
session_start();
 $sname=$_SESSION['userId'];
if(!isset($_SESSION['userId']))
{
    header('location:login.php');
    exit();
   
}
?>
<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bus Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/overwrite.css">
	<link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/style.css" rel="stylesheet" />	
 
  </head>
  <body>	
	<header id="header">
        <nav class="navbar navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only"></span>
                        <span class="icon-bar" style="background-color: white;"></span>
                        <span class="icon-bar" style="background-color: white;"></span>
                        <span class="icon-bar" style="background-color: white;"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">4$ BUS</a>
                </div>				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="index.php">Feature</a></li>
                        <li><a href="index.php">Gallery</a></li>
                        <li><a href="view_buses.php">View Buses</a></li>
                        <li><a href="view_booking.php">My Bookings</a></li>
                        
                        <li><a href="index.php">Contact</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	

    <!-- DataTales Example -->
   	<div class="container" style="margin-top: 150px;">
   		<!--<div class="row">-->
   		<!--	<form action="view_booking.php" method="POST">-->
   		<!--	  <div class="form-group row">-->
     <!--         <label for="" class="col-sm-2 col-form-label">Email Id</label>-->
     <!--         <div class="col-sm-10">-->
     <!--             <input type="email" name="email" class="form-control" placeholder="Email Address" required>-->
     <!--         </div>-->
     <!--       </div>-->
     <!--         <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>-->
     <!--   </form>-->
   		<!--</div>-->


              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Name</th>
                      <th>Bus Number</th>
                      <th>Source</th>
                      <th>Destination</th>
                      <th>Phone Number</th>
                      <th>Reserved Seats</th>
                      <th>Reservation Date</th>
                      <th>Total Fare</th>
                      <th>Print</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Name</th>
                      <th>Bus Number</th>
                      <th>Source</th>
                      <th>Destination</th>
                      <th>Phone Number</th>
                      <th>Reserved Seats</th>
                      <th>Reservation Date</th>
                      <th>Total Fare</th>
                      <th>Print</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <?php
				
								$qry_table="SELECT * FROM cbookings WHERE email='$sname';";
								$qry_table_e=mysqli_query($sql,$qry_table);
								$rows_table=mysqli_num_rows($qry_table_e);
					
                        if($rows_table > 0)  
                        {  
                          while($rowt = mysqli_fetch_array($qry_table_e))  
                          {
                              $s=$rowt['csource'];
                              $d=$rowt['cdestination'];
                              $qryy_table="SELECT * FROM buses WHERE source='$s' and destination='$d';";
                              $qryy_table_e=mysqli_query($sql,$qryy_table);
                              while ($rowtsd = mysqli_fetch_array($qryy_table_e)) {
                                    $busno = $rowtsd['bnum'];
                                    $fare = $rowtsd['fare'];
                                    $t_fare = ($rowt['rseats'])*$fare; 
                              
                      ?>
                      <td><?php echo $rowt['fname']." ".$rowt['mname']." ".$rowt['lname'];?></td>
                      <td><?php echo $busno;?></td>
                      <td><?php echo $rowt['csource'];?></td>
                      <td><?php echo $rowt['cdestination'];?></td>
                      <td><?php echo $rowt['phone'];?></td>
                      <td><?php echo $rowt['rseats'];?></td>
                      <td><?php echo $rowt['rdate'];?></td>
                      <td><?php echo $t_fare;?></td>
                      <td><a style="padding: 8px;border-radius: 5px;" class="btn-primary" Onclick="return ConfirmDelete()" href="print_booking.php?id=<?php echo $rowt['id'];?>">Print</a></td>
                      <script>
                          function ConfirmDelete() {
                        return confirm("Are you sure you want to proceed for printing?");
                      }
                      </script>
                          </tr>  
                                <?php
                                }    
                                }  
                            }
                            else
                            {
                            	echo '<script>alert("No Reservations found fot his Email, Please contact to main Branch Office.");</script>';
                            }
                             
                        ?>
                  </tbody>
                </table>
              </div>
	</div>

	
	
	<footer>
		<div id="contact">
<?php
    $qry="SELECT * FROM register WHERE email='$sname';";
    $qry_e=mysqli_query($sql,$qry);
    $no=mysqli_num_rows($qry_e);
    if($no==1)
    {
        $row=mysqli_fetch_array($qry_e);
        $name=$row['name'];
    }
?>								
					
					
		<div class="text-center">
			<div class="copyright">
        &copy; Developed By smfcoder.
                <div class="credits">
                    <!-- 
                        All the links in the footer should remain intact. 
                        You can delete the links only if you purchased the pro version.
                        Licensing information: https://bootstrapmade.com/license/
                        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=RISHABH BUS
                    -->
                   
                </div>
                Currently Logged in as : <b><?php echo $name; ?></b>
			</div>
		</div>									
	</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>		
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>	
	<script src="js/parallax.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="js/functions.js"></script>
    <script src="contactform/contactform.js"></script>

  
</body>
</html>