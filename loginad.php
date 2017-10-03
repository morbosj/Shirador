<?php 
		date_default_timezone_set('US/Pacific');  			
		$db = mysqli_connect("localhost","root","","sde");	
		$error = array();
		$userAd = "";
		$passAd = "";

		if(isset($_POST['logAd'])){
			$userAd = htmlentities($_POST['userAd']);
			$passAd = htmlentities($_POST['passAd']);
			$userAd = stripslashes($_POST['userAd']);
			$passAd = stripslashes($_POST['passAd']);
			$userAd = mysqli_real_escape_string($db, $_POST['userAd']);
			$passAd = mysqli_real_escape_string($db, $_POST['passAd']);

			if(empty($userAd)){
				array_push($error, "Username is required"); 	?>
						<h5 id="message-errorUser"><i class="fa fa-times" aria-hidden="true"></i><?php echo "Username is required"; ?></h5>
			<?php
				
			}
			if(empty($passAd)){
				array_push($error, "Password is required"); ?>
						<h5 id="message-errorPass"><i class="fa fa-times" aria-hidden="true"></i><?php echo "Password is required"; ?></h5>

			<?php

			}

			if(count($error) == 0){
				$userAd = htmlentities($_POST['userAd']);
				$passAd = htmlentities($_POST['passAd']);
				$userAd = stripslashes($_POST['userAd']);
				$passAd = stripslashes($_POST['passAd']);

				$userAd = mysqli_real_escape_string($db, $_POST['userAd']);
				$passAd = mysqli_real_escape_string($db, $_POST['passAd']);

				$saltquery = "SELECT salt FROM registeradmin WHERE userAd = '$userAd'";
				$result = mysqli_query($db, $saltquery);
				$row = mysqli_fetch_assoc($result);
				$salt = $row['salt'];

				$saltedPW = $passAd . $salt;
				$hashedPW = hash('sha256', $saltedPW);


				$stmt = $db->prepare("SELECT * FROM registeradmin WHERE userAd=? AND passAd=? ");
				$stmt->bind_param("ss", $useradd, $passadd);
				$useradd = $userAd;
				$passadd = $hashedPW;
				$stmt->execute();

				$result = $stmt->get_result();
				$rowAd = $result->num_rows;

				if($rowAd > 0){
					$_SESSION['userAd'] = $userAd;
					$_SESSION['success'] = "You are now logged in as Administrator.";
					$user_role = $_SESSION['user_role'];
					$user_role = "Administrator";
					$type = $_SESSION['type'];
					$type = "Login";
					$timein = date('M-d-Y h:i:s A');
					$audit_admin = "INSERT INTO login_history (username, user_role, type, log_date) VALUES ('$userAd', '$user_role', '$type', '$timein')";
					$resultaudit = mysqli_query($db, $audit_admin);

					header('location:../Shirador/admin/admin.php');
				}else{ ?>
					<h5 id="message-error"><i class="fa fa-times" aria-hidden="true"></i><?php echo "Wrong username/Password incorrect.";  ?></h5>
	<?php
				}
				
			}

		}
		
	?>