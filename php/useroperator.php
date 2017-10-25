<?php 
	include '../config2.php';

	if($_POST['action'] == 'validate'){
		$userOper = mysqli_escape_string($db, $_POST['userOper']);

		$query = $db->query("SELECT * FROM registeroperator WHERE userOper = '$userOper'");
		$check = $query->num_rows;
		if($check > 0){
			echo json_encode(array('success' => false, 'message' => ' Username is already exist.'));
		}else{
			echo json_encode(array('success' => true, 'message' => ' Username is available.'));
		}
	}

?>