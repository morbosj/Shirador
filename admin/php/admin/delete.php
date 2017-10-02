<?php 
	$db = mysqli_connect('localhost','root','','sde');

	$id_user = $_GET['del_id'];
	$select = "DELETE FROM registeradmin WHERE id_user = '$id_user'";
	$query = mysqli_query($db, $select) or die ($select);
	header('location: ../../account.php');

?>