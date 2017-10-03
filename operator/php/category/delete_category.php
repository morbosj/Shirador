<?php 
	$db = mysqli_connect("localhost","root","","sde");

	$id_category = $_GET['del_id'];
	$del = "DELETE FROM category WHERE id_category = '$id_category'";
	$query = mysqli_query($db, $del) or die ($del);
	header('location: ../../category.php');

?>