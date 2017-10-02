<?php 
	include '../../config2.php';

	$log_id = $_GET['del_id'];
	$select = "DELETE FROM login_history WHERE log_id = '$log_id'";
	$query = mysqli_query($db, $select) or die ($select);
	header('location: ../log.php');

?>