<?php  
	include("../conn.php");
	$id = $_GET['id'];
	$query = "DELETE FROM contactus WHERE id =$id";
	if(mysqli_query($sql, $query))  
	{
		header("location:view_message.php");
	}
	else
	{
		echo '<script>alert("Error in deleting the record");</script>';
	}  
 ?>