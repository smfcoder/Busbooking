<link rel="stylesheet" type="text/css" href="../css/sb-admin-2.min.css">
<?php

$server_name="localhost";
$dbuser_name="root";
$dbpassword="";
$dbname="bus";
$sql = mysqli_connect($server_name,$dbuser_name,$dbpassword,$dbname);

if ($sql)
{
	//echo "Database Connected";
}
else
{
	echo '
<div class="container-fluid">

           <div class="text-center">
            <div class="error mx-auto" data-text="error ">error</div>
            <p class="lead text-gray-800 mb-3">Database connection Failure</p>
            <p class="text-gray-50 mb-0">Please Check your database connection...</p>
            <a href="asdfg">&larr; Back to Home page</a>
          </div>

        </div>
	';
}

?>