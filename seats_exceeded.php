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
 <?php

    if(isset($_SESSION['registration'])) {
        if($_SESSION['registration']=='success')   {
            //echo '<script>alert("Registration Success")</script>';
            unset($_SESSION['registration']);
            
        }
        else if($_SESSION['registration']=='already') {
            //echo '<script>alert("Bus Already registered")</script>';
            unset($_SESSION['registration']);
        }
        else {
            //echo '<script>alert("Sorry :( Failed Registration)")</script>';
            unset($_SESSION['registration']);
            
        }
    }
?>  
    <!-- DataTales Example -->
   	<div class="container" style="margin-top: 200px;margin-bottom: 50px;">
   		<div class="row">
          <h1 style="color: red;">Your Booking is Failed.<br>Please select valid number of seats for reservation.<br>Click here to view buses and available seats<a href="view_buses.php"> Buses</a></h1>;
        <?php
            header("Refresh:5; url=view_buses.php");
        ?>
   		</div>     
	</div>

	
	
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