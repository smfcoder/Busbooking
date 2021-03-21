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
$date=$_GET['date'];
?>
<?php
    
    $error = '';
    if(isset($_POST['submit'])){
        
        $from = $_POST['source'];
        $to = $_POST['destination'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $pnum = $_POST['pnum'];
        $email = $_POST['email'];
        $gender = $_POST['optradio'];
        $address = $_POST['address'];
        $reserseats = $_POST['reserseats'];
        $bnum = $_POST['bnum'];
        $busid = $_POST['busid'];
        //$rdate = $_POST['rdate'];
        $date1 = $_POST['rdate'];
        $d1 = date('Y-m-d',strtotime($date1));


        $qryy="SELECT * FROM buses where source='$from' and destination='$to';";
        $qryy_exe=mysqli_query($sql,$qryy);
        $rowy = mysqli_fetch_array($qryy_exe);  
        $bn = $rowy['bnum'];

        $qry="SELECT SUM(rseats) AS value_sum FROM cbookings where bnum ='$bn' and rdate='$d1';";
        $qry_exe=mysqli_query($sql,$qry);
        $rows = mysqli_num_rows($qry_exe);
        $rows_v = mysqli_fetch_array($qry_exe);
        $occ_seats=0;
        $occ_seats=$rows_v['value_sum'];
        $av_seats=$rowy['seats']-$occ_seats;
        if($av_seats>=$reserseats){


            $ins="INSERT INTO cbookings(csource,cdestination,fname,mname,lname,phone,email,gender,address,rseats,rdate,bnum,busid) values('$from','$to','$fname','$mname','$lname','$pnum','$email','$gender','$address','$reserseats','$d1','$bnum','$busid');";

            if(mysqli_query($sql,$ins)) {
                $_SESSION['registration'] = 'success';
            }   
            else {
                $_SESSION['registration'] = 'failed';

            }
          }
          else{
              echo '<script>alert("Entered Number of Seats are not available.Please Enter Valid number of Seats to reserve");</script>';
              header('location:seats_exceeded.php');
          } 
    }
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
<?php

    if(isset($_SESSION['registration'])) {
        if($_SESSION['registration']=='success')   {
            header('location:success.php');
            //echo '<script>alert("Registration Success")</script>';
            //unset($_SESSION['registration']);
            
        }
        else {
            // echo '<script>alert("Sorry :( Failed Registration)")</script>';
            // unset($_SESSION['registration']);
            header('location:failure.php');
        }
    }
?> 	
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
      $qry_table="SELECT * FROM buses WHERE id='$id';";
      $qry_table_e=mysqli_query($sql,$qry_table);
      $rows_table=mysqli_num_rows($qry_table_e);
          
      if($rows_table > 0)  
      {  
        while($rowt = mysqli_fetch_array($qry_table_e))  
        {
             $bnum=$rowt['bnum'];
             $busid=$rowt['id'];
             $source=$rowt['source'];
             $destination=$rowt['destination'];
        }
      }
      
      
      $qryy_table="SELECT * FROM register WHERE email='$sname';";
      $qryy_table_e=mysqli_query($sql,$qryy_table);
      $rowsy_table=mysqli_num_rows($qryy_table_e);
          
      if($rowsy_table > 0)  
      {  
        while($rowty = mysqli_fetch_array($qryy_table_e))  
        {
             $email=$rowty['email'];
        }
      }
?>



   		<div class="row">
   			<form action="book_bus.php" method="POST">
          <input type="hidden" name="bnum" value="<?php echo($bnum); ?>">
          <input type="hidden" name="busid" value="<?php echo($busid); ?>">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Source(From)</label>
              <div class="col-sm-10">
                  <input type="text" name="source" class="form-control" placeholder="Source City" value="<?php echo $source; ?>"  readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Destination(To)</label>
              <div class="col-sm-10">
                  <input type="text" name="destination" class="form-control" placeholder="Destination City" value="<?php echo $destination; ?>" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">First Name</label>
              <div class="col-sm-10">
                  <input type="text" name="fname" class="form-control" placeholder="First Name" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Middle Name</label>
              <div class="col-sm-10">
                  <input type="text" name="mname" class="form-control" placeholder="Middle Name" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Last Name</label>
              <div class="col-sm-10">
                  <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Phone Number</label>
              <div class="col-sm-10">
                  <input type="number" pattern="[789][0-9]{9}" name="pnum" class="form-control" placeholder="Phone Number" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Email Id</label>
              <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-10">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optradio" value="Male" required="">Male
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optradio" value="Female" required="">Female
                    </label>
                  </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Resedential Address</label>
              <div class="col-sm-10">
                  <textarea type="text" name="address" class="form-control" placeholder="Resedential Address" required></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Total Seats to reserve</label>
              <div class="col-sm-10">
                  <input type="text" name="reserseats" class="form-control" placeholder="Number of Seats to reserve" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Date for reservation</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control" name="rdate" id="rdate" value="<?php echo $date; ?>" readonly required="">
              </div>
            </div>
            


   			      <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
              </form>
   		</div>


    </div>

	
	
	<footer>
		<div id="contact">
								
					
							
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