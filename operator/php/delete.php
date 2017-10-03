<?php 
	include '../../config2.php';

	$id_product = $_GET['del_id'];
	$select = "DELETE FROM product2 WHERE id_product = '$id_product'";
	$query = mysqli_query($db, $select) or die ($select);
	header('location: ../inventory.php');

?>