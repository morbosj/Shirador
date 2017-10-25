<?php
	date_default_timezone_set('US/Pacific');  			
	$db = mysqli_connect("localhost","root","","SDE");

	if(isset($_REQUEST['fullnameOper'])){
		$fullnameOper = mysqli_real_escape_string($db, $_POST['fullnameOper']);
		$brgy = mysqli_real_escape_string($db, $_POST['brgy']);
		$city = mysqli_escape_string($db, $_POST['city']);
		$cellp = mysqli_real_escape_string($db, $_POST['cellp']);
		$emailOper = mysqli_real_escape_string($db, $_POST['emailOper']);
		$userOper = mysqli_real_escape_string($db, $_POST['userOper']);
		$passOper = mysqli_real_escape_string($db, $_POST['passOper']);

		$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
		$saltedPW = $passOper . $salt;
		$hashedPW = hash('sha256', $saltedPW);

		$registerOper = "INSERT INTO registeroperator(fullname, brgy, city, cellp, emailOper, userOper, passOper, salt, datecreated)
			VALUES('$fullnameOper','$brgy', '$city', '$cellp', '$emailOper', '$userOper', '$hashedPW','$salt', now())";
		mysqli_query($db, $registerOper);
			
	}
?>