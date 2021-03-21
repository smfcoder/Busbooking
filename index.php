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
	$errormessage='';
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];
		if ($name!="" && $email!="" && $subject!="" && $message!="") {
			
			$qry="INSERT INTO contactus(name,email,subject,message) VALUES('$name','$email','$subject','$message');";
			$qry_e=mysqli_query($sql,$qry);
			if($qry_e){
				$_SESSION['message']='success';
				
			}
			else
			{
				$_SESSION['message']='errorsending';
				
			}
		}
		else{
			$_SESSION['message']='fail';
			
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
  	if(isset($_SESSION['message']))
  	{
  		if($_SESSION['message']=='success')
  		{
  			echo'<script>alert("Your Message has been sent successfully");</script>';
  			unset($_SESSION['message']);
  		}
  		else if($_SESSION['message']=='errorsending')
  		{
  			echo'<script>alert("Error in sending Message.Please try again.");</script>';	
  			unset($_SESSION['message']);
  		}
  		else
  		{
  			echo'<script>alert("Please enter all the fields and details properly.");</script>';
  			unset($_SESSION['message']);
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
                    <a class="navbar-brand" href="index.php"> 4$ Bus</a>
                </div>				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="#feature">Feature</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="view_buses.php">View Buses</a></li>
                        <li><a href="view_booking.php">My Bookings</a></li>
                       
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="logout.php">Logout</a></li>                        
                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->
    
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
	<div class="slider">		
		<div id="about-slider">
			<div id="carousel-slider" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators visible-xs">
					<li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-slider" data-slide-to="1"></li>
					<li data-target="#carousel-slider" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner">
					<div class="item active">						
						<img src="img/18.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">								
								<h2><span><font face="Cooper Black">Welcome<br><font style=" text-shadow: 2px 2px 5px red;" color="#00000"> <?php echo $name; ?></font><br>to Bus Booking System</font></span></h2>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
								
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">								
								
							</div>
						</div>
				    </div>
			
				    <div class="item ">
						<img src="img/bus41.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">

								<h2><font color="white"><font face="Cooper Black">Clean & Fully Modern Design</font></font></h2>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.3s">								
								<p></p>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">								
								
							</div>
						</div>
				    </div> 
				    <div class="item">
						<img src="img/5.jpg" class="img-responsive" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">								
								<h2><font color="white"><font face="Cooper Black">Modern Design</font></font></h2>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
								<p></p>
							</div>
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">								
								
							</div>
						</div>
				    </div> 
				</div>
				
				<a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
					<i class="fa fa-angle-left"></i> 
				</a>
				
				<a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
					<i class="fa fa-angle-right"></i> 
				</a>
			</div> <!--/#carousel-slider-->
		</div><!--/#about-slider-->
	</div><!--/#slider-->
	
	<div id="feature">
		<div class="container">
			<div class="row">
				<div class="text-center">
					<h3><font face="Cooper Black" color="black" size="18">Features</font></h3>
					<p>Providing you the possible BUS and Service<br>To our Customer</p>
				</div>
				<div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<div class="text-center">
						<div class="hi-icon-wrap hi-icon-effect">
							<i class="fa fa-laptop"></i>						
							<h2>Fully Compatible</h2>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<div class="text-center">
						<div class="hi-icon-wrap hi-icon-effect">
							<i class="fa fa-heart-o"></i>
							<h2>Always Ready & Clean</h2>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
					<div class="text-center">
						<div class="hi-icon-wrap hi-icon-effect">
							<i class="fa fa-cloud"></i>
							<h2>Fully A/C</h2>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
					<div class="text-center">
						<div class="hi-icon-wrap hi-icon-effect">
							<i class="fa fa-camera"></i>
							<h2>Less Cost</h2>
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/#gallery-->

	<div id="gallery">
    <div class="container pt-5 pb-4">
      <div class="text-center">
         <h1><font face="Cooper Black" color="red" size="18">Gallery</font><h1>
         <font face="Aerial" color="black" size="8"> Buses For Our Customers</font>

      </div>
      <div class="row">
                    
           <div class="container pt-5 pb-4"> 
       
            
             <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-12  mb-4 pb-4">
            <img src="img/5.jpg" class="img-fluid img-thumbnail" >
            
          </div>
          
           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4 pb-4">
            <img src="img\1 (2).jpg" class="img-fluid img-thumbnail">
            
          </div>
           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4 pb-4">
            <img src="img\4(2).jpeg" class="img-fluid img-thumbnail">
            
          </div>
          </div>
        </div>
      </div>


 <div class="container pt-5 pb-4">
            

            <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4 pb-4">
            <img src="img\9.jpg" class="img-fluid img-thumbnail">
            
          </div>

           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4 pb-4">
            <img src="img\3(3).jpeg" class="img-fluid img-thumbnail">
            
          </div>
           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4 pb-4">
            <img src="img\2(3).jpeg" class="img-fluid img-thumbnail">
          </div>

           
          </div>
        </div>



          <div class="container pt-5 pb-4">
           

            <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4 ">
            <img src="img\6.jpg" class="img-fluid img-thumbnail">
            
          </div>

           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4 ">
            <img src="img\15.jpg" class="img-fluid img-thumbnail">
            
          </div>
           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4 pb-4">
            <img src="img\16.jpg" class="img-fluid img-thumbnail">
          </div>


           
          </div>
        </div>


         <div class="container pt-5 pb-4">
         
         <div class="row"> 
      
           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4">
            <img src="img\18.jpg" class="img-fluid img-thumbnail">
            
          </div>

           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4">
            <img src="img\5(3).jpeg" class="img-fluid img-thumbnail">
            
          </div>
           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4">
            <img src="img\17.jpg" class="img-fluid img-thumbnail">
            
          </div>

           
          
          </div>
        </div>
      </div>

       
          <div class="container pt-5 pb-4">
       
         <div class="row"> 
      
           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4">
            <img src="img\1.jpg" class="img-fluid img-thumbnail">
            
          </div>

           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4">
            <img src="img\19.jpg" class="img-fluid img-thumbnail">
            
          </div>
           <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4">
            <img src="img\15.jpg" class="img-fluid img-thumbnail">
            
          </div>
          
          </div>
        </div>
      </div>

	

	<footer>

		<div id="contact">
			<div class="container">
				
				<div class="text-center">
					<h3><font face="Cooper Black" color="black" size="18">Contact Us</font></h3>
					<p>We are very Glade to Help You</p>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
						<h2></h2>
						<p>                            <br>                             </p>				
					</div>				
				
					<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">  
						
					    <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="index.php" method="post" role="form" class="contactForm">

                                <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars"  required="" />
                                        <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email"  required="" />
                                        <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"  required="" />
                                        <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required="" ></textarea>
                                        <div class="validation"></div>
                                </div>
                            
                            <button type="submit" name="submit" class="btn btn-theme pull-left">SEND MESSAGE</button>
                        </form>
					</div>	
				</div>
			</div>
		</div><!--/#contact-->					
					
							
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
                   <!-- <a href="http://localhost/bus/admin/login.php"><font face="Cooper Black" color="black">Admin Login</font></a>-->
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