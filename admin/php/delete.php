<?php 
	include '../../config2.php';

	$id_user = $_GET['del_id'];
	$select = "DELETE FROM registeroperator WHERE id_user = '$id_user'";
	$query = mysqli_query($db, $select) or die ($select);
	header('location: ../account.php');

?>