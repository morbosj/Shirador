<?php
        date_default_timezone_set('US/Pacific');  			
		$db = mysqli_connect("localhost","root","","SDE");
		$errors = array();
		$userOper = "";
		$passOper = "";



		if(isset($_POST['logOper'])){
			$userOper = htmlentities($_POST['userOper']);
			$passOper = htmlentities($_POST['passOper']);
			$userOper = stripslashes($_POST['userOper']);
			$passOper = stripslashes($_POST['passOper']);
			$userOper = mysqli_real_escape_string($db, $_POST['userOper']);
			$passOper = mysqli_real_escape_string($db, $_POST['passOper']);

			if(empty($userOper)){ array_push($errors, "Username is required"); ?>
					<h5 id="message-errorUser"><i class="fa fa-times" aria-hidden="true"></i><?php echo "Username is required"; ?></h5>
			<?php
	
			}
			if(empty($passOper)){ array_push($errors, "Password is required"); ?>
					<h5 id="message-errorPass"><i class="fa fa-times" aria-hidden="true"></i><?php echo "Password is required"; ?></h5>
			<?php
				
			}

			if(count($errors) == 0){
				$userOper = htmlentities($_POST['userOper']);
				$passOper = htmlentities($_POST['passOper']);
				$userOper = stripslashes($_POST['userOper']);
				$passOper = stripslashes($_POST['passOper']);

				$userOper = mysqli_real_escape_string($db, $_POST['userOper']);
				$passOper = mysqli_real_escape_string($db, $_POST['passOper']);

				$saltquery = "SELECT salt FROM registeroperator WHERE userOper = '$userOper'";
				$result = mysqli_query($db, $saltquery);
				$row = mysqli_fetch_assoc($result);
				$salt = $row['salt'];

				$saltedPW = $passOper . $salt;
				$hashedPW = hash('sha256', $saltedPW);

				$stmt = $db->prepare("SELECT * FROM registeroperator WHERE userOper=? AND passOper=?");
				$stmt->bind_param("ss", $userop, $passop);
				$userop = $userOper;
				$passop = $hashedPW;
				$stmt->execute();

				$result = $stmt->get_result();
				$rowOper = $result->num_rows;

				if($rowOper > 0){
					$_SESSION['userOper'] = $userOper;
					$_SESSION['success'] = "You are now logged in as Operator.";
					$user_role = $_SESSION['user_role'];
					$user_role = "Operator";
					$type = $_SESSION['type'];
					$type = "Login";
					$timein = date('M-d-Y h:i:s A');
					$audit = "INSERT INTO login_history (username, user_role, type, log_date) VALUES ('$userOper', '$user_role', '$type', '$timein')";
					$resultaudit = mysqli_query($db, $audit);

					header('location: ../Shirador/operator/home.php');
				}else{ ?>
					<h5 id="message-error"><i class="fa fa-times" aria-hidden="true"></i><?php echo "Wrong username/Password incorrect.";  ?></h5>
    <?php		
		 					
				}
			}


	        }
    ?>