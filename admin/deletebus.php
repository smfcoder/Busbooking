<?php  
	include("../conn.php");
	$id = $_GET['id'];
	$query = "DELETE FROM buses WHERE id =$id";
	if(mysqli_query($sql, $query))  
	{
		header("location:allbuses.php");
	}
	else
	{
		echo '<script>alert("Error in deleting the record");</script>';
	}  
 ?>