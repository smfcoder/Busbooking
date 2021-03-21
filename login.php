<?php
session_start();
    if(isset($_SESSION['userId'])) {
        unset($_SESSION['userId']);
    }
?>

<?php
include('conn.php');
    if(isset($_POST['submitl'])){
        $uname=$_POST['email'];
        $pass=$_POST['password'];
        if($uname!="" && $pass!="")
        {
            $log_q="SELECT * FROM register WHERE email='$uname';";
            $log_q_e=mysqli_query($sql,$log_q);
            $log_no=mysqli_num_rows($log_q_e);
            $row=mysqli_fetch_array($log_q_e);
            if($log_no==1)
            {
                if($uname==$row['email'] && $pass==$row['pass'])
                {
                    $_SESSION['userId']=$uname;
                    header('Location:index.php');
                    exit();
                }
                else
                {
                    echo '<script>alert("Incorrect Details");</script>';
                }
            }
            else
            {
                echo '<script>alert("Record not found!... Please Register first then proceed to login");</script>';   
            }
        }
        else
        {
            echo '<script>alert("Please Enter your details");</script>';
        }
    }
    if(isset($_POST['submitr'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $pass_c=$_POST['password_confirmation'];
        
        if($pass==$pass_c){
            $qry="SELECT * FROM register WHERE email='$email';";
            $qry_e=mysqli_query($sql,$qry);
            $no=mysqli_num_rows($qry_e);
            if($no==0)
            {
                $ins="INSERT INTO register(name,email,pass) VALUES('$name','$email','$pass');";
                $ins_e=mysqli_query($sql,$ins);
                if($ins_e)
                {
                    echo '<script>alert("Successfully Registered :)");</script>';
                }
                else
                {
                    echo '<script>alert("Registration Failed :(");</script>';
                }
            }
            else
            {
                echo '<script>alert("Already Registered");</script>';
            }
        }
        else
        {
            echo '<script>alert(" :(  Please Enter correct confirm password");</script>';
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="img/busicon.png" />
<title>Login - Bus Booking</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel='stylesheet' href='https://bootswatch.com/4/lumen/bootstrap.min.css'>
<style>
body {
    background: url('https://images.unsplash.com/photo-1534408679207-69b9615e55a7?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&s=cfbabd80cd2d5cae495a2a732d473562') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.card {
  max-width: 600px;
}

.nav-item .nav-link[disabled]:hover {
  
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<div class="container mt-5 pt-5">
<div class="card mx-auto border-0">
<div class="card-header border-bottom-0 bg-transparent">
<ul class="nav nav-tabs justify-content-center pt-4" id="pills-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active text-primary" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
</li>
<li class="nav-item">
<a class="nav-link text-primary" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
</li>
</ul>
</div>
<div class="card-body pb-4">
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
<form action="login.php" method="POST">
<div class="form-group">
<input type="email" name="email" class="form-control" id="email" placeholder="Email" required autofocus>
</div>
<div class="form-group">
<input type="password" name="password" class="form-control" id="password" id="password" placeholder="Password" required>
</div>
<div class="custom-control custom-checkbox">
<input class="custom-control-input" id="customCheck1" checked="" type="checkbox">
<label class="custom-control-label" for="customCheck1">Check me out</label>
</div>
<div class="text-center pt-4">
<button type="submit" name="submitl" class="btn btn-primary">Login</button>
</div>
<div class="text-center pt-2">
<a class="btn btn-link text-primary" href="admin/login.php">Admin Login</a>
</div>
</form>
</div>
<div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
<form action="login.php" method="POST">
<div class="form-group">
<input type="text" name="name" id="name" class="form-control" placeholder="name" required autofocus>
</div>
<div class="form-group">
<input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
</div>
<div class="form-group">
<input type="password" name="password" id="password" class="form-control" placeholder="Set a password" required>
</div>
<div class="form-group">
<input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm password" required>
</div>
<div class="text-center pt-2 pb-1">
<button type="submit" name="submitr" class="btn btn-primary">Register</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script src='https://use.fontawesome.com/releases/v5.2.0/js/all.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
</body>
</html>
