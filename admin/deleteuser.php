<?php  
	include("../conn.php");
	$id = $_GET['id'];
	$query = "DELETE FROM register WHERE id =$id";
	if(mysqli_query($sql, $query))  
	{
		header("location:reg_users.php");
	}
	else
	{
		echo '<script>alert("Error in deleting the record");</script>';
	}  
 ?>