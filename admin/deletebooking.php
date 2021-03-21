<?php  
	include("../conn.php");
	$id = $_GET['id'];
	$query = "DELETE FROM cbookings WHERE id =$id";
	if(mysqli_query($sql, $query))  
	{
		header("location:bus_booking_details.php");
	}
	else
	{
		echo '<script>alert("Error in deleting the record");</script>';
	}  
 ?>