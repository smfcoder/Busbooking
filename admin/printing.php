<?php
include("../conn.php");
session_start();
$id=$_GET['id'];
 $sname=$_SESSION['adminId'];
if(!isset($_SESSION['adminId']))
{
    header('location:login.php');
    exit();
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bus Booking</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bus Booking</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="addbus.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Add Bus</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="allbuses.php">
          <i class="fas fa-fw fa-table"></i>
          <span>All Buses</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="bus_booking_details.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Bus Bookings</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="view_cust.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Customer Enquiry</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="reg_users.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Registered Users</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $sname; ?></span>
                <div style="font-size: 0.5rem; color:black ;">
                <i class="fa fa-address-book fa-5x"></i>
                </div>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <div class="hi-icon-wrap hi-icon-effect">
                    <i class="fa fa-camera"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Details of Customer</h1>
          </div>

          <!-- Content Row -->
         
          <!-- DataTales Example -->
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
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Buses</h6>
            </div>
        <div class="card-body">
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
          </div>
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
    </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>  &copy; Developed By smfcoder</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
