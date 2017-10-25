<?php	
    if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['userAd']);
		header('location: index.php');
	}
?>