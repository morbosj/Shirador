<?php 
	include '../config2.php';

	if($_POST['action'] == 'validate'){
		$userAd = mysqli_escape_string($db, $_POST['userAd']);

		$query = $db->query("SELECT * FROM registeradmin WHERE userAd = '$userAd'");
		$check = $query->num_rows;
		if($check > 0){
			echo json_encode(array('success' => false, 'message' => ' Username is already exist.'));
		}else{
			echo json_encode(array('success' => true, 'message' => ' Username is available.'));
		}
	}

?>