<?php 
		date_default_timezone_set('US/Pacific');  			
		$db = mysqli_connect("localhost","root","","sde");
		
		if(isset($_REQUEST['fullnameAd'])){
			$fullnameAd = mysqli_real_escape_string($db, $_POST['fullnameAd']);
			$emailAd = mysqli_escape_string($db, $_POST['emailAd']);
			$userAd = mysqli_real_escape_string($db, $_POST['userAd']);
			$passAd = mysqli_real_escape_string($db, $_POST['passAd']);

			$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
			$saltedPW = $passAd . $salt;
			$hashedPW = hash('sha256', $saltedPW);

			$registerAdmin = "INSERT INTO registeradmin (fullnameAd, emailAd, userAd, passAd, salt , datecreated)
					VALUES('$fullnameAd', '$emailAd', '$userAd', '$hashedPW', '$salt', now())";
					mysqli_query($db, $registerAdmin);
	}
?>