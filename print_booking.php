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
$id=$_GET['id'];
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
                    <a class="navbar-brand" href="index.html">4$ Bus</a>
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
<?php
                
                $qry_table="SELECT * FROM cbookings WHERE id='$id';";
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
                              while ($rowtsd = mysqli_fetch_array($qryy_table_e)) 
                              {
                                    $busno = $rowtsd['bnum'];
                                    $fare = $rowtsd['fare'];
                                    $t_fare = ($rowt['rseats'])*$fare; 
                                    $name = $rowt['fname']." ".$rowt['mname']." ".$rowt['lname'];
                                    $email = $rowt['email'];
                                    $gender = $rowt['gender'];
                                    $address = $rowt['address'];
                                    $arrival = $rowtsd['arrival'];
                                    $bnum=$busno;
                                    $csource=$rowt['csource'];
                                    $cdestination=$rowt['cdestination'];
                                    $phone=$rowt['phone'];
                                    $rseats=$rowt['rseats'];
                                    $rdate=$rowt['rdate'];
                                    $total_fare=$t_fare;
    
                                }    
                          }
                        }
       ?>
       <div id='DivIdToPrint'>
              <div class="table-responsive">
                <table class="table table-bordered" border="1" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Entity</th>
                      <th>Information</th>
                    </tr>
                  </thead>
                    <tr>
                      <th>Customer Name</th>
                      <td><?php echo $name; ?></td>
                    </tr>
                    <tr>
                      <th>Bus Number</th>
                      <td><?php echo $bnum; ?></td>
                    </tr>
                    <tr>
                      <th>Source</th>
                      <td><?php echo $csource; ?></td>
                    </tr>
                    <tr>
                      <th>Destination</th>
                      <td><?php echo $cdestination; ?></td>
                    </tr>
                    <tr>
                      <th>Arrival Time</th>
                      <td><?php echo $arrival; ?></td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td><?php echo $email; ?></td>
                    </tr>
                      <th>Phone Number</th>
                      <td><?php echo $phone; ?></td>
                    </tr>
                    <tr>
                      <th>Gender</th>
                      <td><?php echo $gender; ?></td>
                    </tr>
                    <tr>
                      <th>Customer Address</th>
                      <td><?php echo $address; ?></td>
                    </tr>
                    <tr>
                      <th>Reserved Seats</th>
                      <td><?php echo $rseats; ?></td>
                    </tr>
                    <tr>
                      <th>Reservation Date</th>
                      <td><?php echo $rdate; ?></td>
                    </tr>
                    <tr>
                      <th>Total Fare</th>
                      <td><?php echo $total_fare; ?></td>
                    </tr>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <center>
              <input type='button' id='btn' value='Print' class="btn-primary" style="padding: 10px;border-radius: 5px;margin-bottom: 25px;" onclick='printDiv();'>
            </center>
	</div>
	<script type="text/javascript">
   function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

} 
  </script>
	<footer>
		<div id="contact">
								
					
		<div class="social-icon">
			<div class="container">
				<div class="col-md-6 col-md-offset-3">						
					<ul class="social-network">
						<li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="#" class="dribbble tool-tip" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#" class="pinterest tool-tip" title="Pinterest"><i class="fa fa-pinterest-square"></i></a></li>
					</ul>						
				</div>
			</div>
		</div>
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