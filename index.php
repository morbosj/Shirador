<?php session_start(); ?>
<?php include ('loginoper.php'); ?>
<?php include ('loginad.php'); ?>
<html ng-app>
<head>
	<title>SDE Inventory System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="image/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<!-- CSS Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
	<!-- JS -->
	<script src="js/modal.js"></script>
	<!-- JS Bootstrap -->
	<script src="js/jquery.js"></script>
	<script src="js/jquery.min.js"></script>
	<!-- JS Auto validation -->
	<script src="js/angular.min.js"></script>
	<script ng:autobind
        src="js/angular-0.9.19.js"></script>

	<script src="js/bootstrap js/js/bootstrap.js"></script>

	<!-- Error Message css -->
	<link rel="stylesheet" type="text/css" href="css/errormessage.css">


	<!-- Bootstrap 3 ver.
	<link rel="stylesheet" href="css/bootstrap3.min.css"> -->

	<!-- font awesome -->
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<style>
	html {
		background-color: #EDF1F5;
	}
	body {
		background: #FFF;
	}


	
</style>
<body>
	<section class="style-top">
		<!--<h2 style="color:white; padding-top: 10px; padding-left: 10px;">Shirador SDE</h2>-->
		<a href="index.php"><img style="width: 350px; margin-top: 5px; margin-left: 100px; background: #2C3742;" src="image/horizontalsde.png"></a>

	</section>
			<h5 id="message-oper"><i class="fa fa-check" aria-hidden="true"></i>Success register new operator.</h5>
			<h5 id="message-ad"><i class="fa fa-check" aria-hidden="true"></i>Success register new administrator.</h5>

	<header class="header-ini" id="user-role">
		<div class="div-dialog">
			<h1>Inventory System for Shirador Enterprises</h1>

			<h4>Welcome</h4>
			<p>This is a system to ease managing of your inventory.
			Please select user role on the right panel to access the system.</p>
		</div>

		<div class="div-selection">
				<form>
					<h4><i class="fa fa-user" aria-hidden="true"></i>User Role</h4>
						<select id="Goto">
							<option>Select if you are..</option>
							<option id="oper" value="Operator">Operator</option>
							<option id="admin" value="Administrator">Administrator</option>
						</select><br>
				</form>
		</div>

		<div class="header-bottom">
			<img src="image/sde1.png">
		</div>
	</header>
	
	<section class="login-section" id="Operator">
		<div class="top-login">
			<ul>
				<li><img src="image/sde1.png"></li>
				<li><h3>Inventory</h3></li>
				<li><h5>Operator</h5></li>
		</div>

		<div>
			<form method="POST" action="index.php">

				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><img src="image/user.png"></span>
					<input class="form-control" type="text" name="userOper" placeholder="Username" aria-describedby="basic-addon1">
				</div>

				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><img src="image/pass.png"></span>
					<input class="form-control  password" type="password" name="passOper" placeholder="Password" aria-describedby="basic-addon1">
					<i class="fa fa-eye fa-2x" aria-hidden="true" id="showHide"></i>
				</div>
				<input class="btn btn-primary loginbtn" type="submit" name="logOper" value="Login">
				<h6 id="reg" style="display: inline; float: right; margin-top: 17px; cursor: pointer;">Register</h6>
				
			</form>
		</div>
	</section>		
	
	<script>
		$(document).ready(function() {
		  $("#showHide").click(function() {
		    if ($(".password").attr("type") == "password") {
		      $(".password").attr("type", "text");

		    } else {
		      $(".password").attr("type", "password");
		    }
		  });
		});
	</script>

     <script> 
		$(document).ready(function(){
      		$("#registeroper").submit(function(event) {
      				var fullnameOper = $("#fullnameOper").val();
                    var brgy = $("#brgy").val();
                    var city = $("#city").val();
                    var cellp = $("#cellp").val();
                    var emailOper = $("#emailOper").val();
                    var userOper = $("#userOper").val();
                    var passOper = $("#passOper").val();


                    event.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "php/registeroper.php",
                        data: "fullnameOper=" + fullnameOper + "&brgy=" + brgy + "&city=" + city + "&cellp=" + cellp + "&emailOper=" + emailOper + "&userOper=" + userOper + "&passOper=" + passOper + "&salt",
                        success: function(data) {
                           $("#message-oper").fadeIn(1000);
                           $("#message-oper").fadeOut(500);
                        }
                    });


            });
        });	
	</script>
		<section>
			<div id="Register">
			<h2 style="background: #2C3742;"><span class="label label-default" style="margin-right: 10px;">New</span>Operator Registration</h2>
			<div>
			<form  class="form-horizontal  form-material" id="registeroper" method="POST" action="<?php $_SERVER['PHP_SELF'];?>" name="register"  onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy.'); return false; }">
					
					<div class="form-group">
						<label> Full Name </label>	
						<span class="error  error2" ng-show="register.fullnameOper.$touched && register.fullnameOper.$invalid"> </span>
						<span style="font-size: 11px; color: #DB222A;" ng-show="register.fullnameOper.$error.minlength"><i class="fa fa-times" aria-hidden="true"></i> Your must be at least 10 characters with your surname and firstname. </span>
						<span class="valid" ng-show="register.fullnameOper.$valid"><i class="fa fa-check" aria-hidden="true"></i> Full name is valid. </span>
						<input id="fullnameOper" class="form-control-address  form-control-line" name="fullnameOper" placeholder="Full Name" 
								ng-model="fullnameOper" 
								ng-minlength="7" 
								required
								onkeypress='onlya(event)'
								>
					</div>

					<div class="form-group">
						<label> Address </label>
						<span class="error" ng-show="register.brgy.$touched && register.brgy.$invalid"><i class="fa fa-times" aria-hidden="true"></i> Address is required.</span>
						<span class="error valid" ng-show="register.brgy.$valid"><i class="fa fa-check" aria-hidden="true"></i> Address is valid. </span>

						<span class="error" ng-show="register.city.$touched && register.addressOper2.$invalid"><i class="fa fa-times" aria-hidden="true"></i> Address is required.</span>
						<span class="error valid" ng-show="register.city.$valid"><i class="fa fa-check" aria-hidden="true"></i> Address is valid. </span>
						<br>
						<input id="brgy"  class="form-control-address2  form-control-line"  name="brgy" placeholder="Barangay" ng-model="brgy" required>

						<input id="city"  class="form-control-address2  form-control-line" name="city" placeholder="City" ng-model="city" required>
					</div>

					<div class="form-group">
						<label>Phone no.</label>	
						<span class="error" ng-show="register.cellp.$error.pattern"><i class="fa fa-times" aria-hidden="true"></i> Your must be contain a valid number.</span>
						<span class="error valid" ng-show="register.cellp.$valid"><i class="fa fa-check" aria-hidden="true"></i> Cellphone number is valid. </span>

						<span class="error" ng-show="register.cellp.$untouched && register.cellp.$error.minlength"><i class="fa fa-times" aria-hidden="true"></i> Phone number must be at least 11 characters.</span>
						<input id="cellp"  class="form-control-address  form-control-line" name="cellp" placeholder="Cellphone number" 
								ng-model="cellp"
								ng-pattern="/^[0-9]*$/"
								ng-minlength="11"
								 required
								 onkeypress='validate(event)'
								 >
					</div>

					<div class="form-group">
						<label> Email </label>	
						<span class="error" ng-show="register.emailOper.$touched && register.emailOper.$invalid"><i class="fa fa-times" aria-hidden="true"></i> Its not a email.</span>
						<span class="error valid" ng-show="register.emailOper.$touched && register.emailOper.$valid"><i class="fa fa-check" aria-hidden="true"></i> Your email is correct.</span>
						<input id="emailOper"  class="form-control-address  form-control-line" type="email" name="emailOper"  placeholder="Email Address"
								ng-model="emailOper"
								required
						>
					</div>

					<div class="form-group">
						<label>Username</label>	
						<span class="error" ng-show="register.userOper.$touched && register.userOper.$invalid"></span>
						<span id="show"></span>
						<span  style="font-size: 13px;"  class="error" ng-show="register.userOper.$error.minlength"><i class="fa fa-times" aria-hidden="true"></i> Your username must be atleast 7 characters.</span>
						<input id="userOper"  class="form-control-address  form-control-line" name="userOper" placeholder="Username" 
								ng-minlength="7"
								ng-model="userOper" required
								>
					</div>

					<script>
						$(document).ready(function(){
							$('#userOper').change(function(){
								var userOper = $('#userOper').val();
								$.ajax({
									type: 'POST',
									url: 'php/useroperator.php',
									data: {action: 'validate', userOper : userOper},
									dataType: 'json',
									success:function(response){
										if(response.success == true){
											$('#show').addClass('valid').html(response.message);

										}else{
											$('#show').addClass('error').html(response.message);
											$('#show').removeClass('valid');	
										}
									}
								});
							});
						});
					</script>
					
					<div class="form-group">
						<label> Password </label>		
						<input id="passOper"  class="form-control-address  form-control-line"  type="password" name="passOper" placeholder="Password"
	    						ng-model="user.passOper"
	    						ng-pattern="user.reTypePassword"
	    						ng-minlength="8"
								required="true">
					</div>

					<div class="form-group">
						<label> Retype Password</label>
						<input   class="form-control-address  form-control-line" type="password" name="passwordReType" placeholder="Retype Password"
								ng-model="user.reTypePassword"
								ng-pattern="user.passOper"
								ng-minlength="8"
								required="true">
						<span class="error" ng-show="register.passOper.$untouched && register.passOper.$error.minlength"><i class="fa fa-times" aria-hidden="true"></i> Passwords must be at least 8 characters.</span>
						<span class="error valid" ng-show="register.passwordReType.$valid"><i class="fa fa-check" aria-hidden="true"></i> Password is match</span>
						<span class="error" ng-show="register.passwordReType.$dirty && register.passwordReType.$invalid"><i class="fa fa-times" aria-hidden="true"></i> Your password and confirmation password do not match.</span>
					</div>

					<div class="form-group">
						<p><input ng-model="agreeCheck" id="checkbox" type="checkbox" name="checkbox" value="check" id="agree" required> I have read and agree to the <strong>Terms and Conditions and Privacy Policy.</strong> </p>
					</div>
					
					<input id="registerbtn" style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submitOper" value="Register" ng-disabled="register.$invalid" onclick="check(userOper)">
					<h6 id="sign" style="display: inline; float: right; margin-top: 10px; cursor: pointer;">Sign in</h6>
			</form>

			</div>
			</div>
		</section>

	<section class="login-sectionAd" id="Administrator">
		<div id="form-login">
			<div class="top-login">
				<ul>
					<li><img src="image/sde1.png"></li>
					<li><h3>Inventory</h3></li>
					<li><h5>Administrator</h5></li>
				</ul>
			</div>

			 
					<form method="POST" action="index.php">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><img src="image/user.png"></span>
							<input class="form-control" type="text" name="userAd" placeholder="Username" aria-describedby="basic-addon1">
						</div>

						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><img src="image/pass.png"></span>
							<input class="form-control  password" type="password" name="passAd" placeholder="Password" aria-describedby="basic-addon1">
							<i class="fa fa-eye fa-2x" aria-hidden="true" id="showHide"></i>
						</div>
						<input class="btn btn-primary loginbtn" type="submit" name="logAd" value="Login">
					</form>
						<button style="margin-top: -38px;" id="myBtn"> Register</button>
		</div>
	</section>		
	

	
	<?php 
		date_default_timezone_set('US/Pacific');  			
		$db = mysqli_connect("localhost","root","","SDE");
		
		if(isset($_POST['submitAd'])){
			$fullnameAd = mysqli_real_escape_string($db, $_POST['fullnameAd']);
			$userAd = mysqli_real_escape_string($db, $_POST['userAd']);
			$passAd = mysqli_real_escape_string($db, $_POST['passAd']);

			$passAd = md5($passAd);
			$registerAdmin = "INSERT INTO registeradmin (fullnameAd, userAd, passAd, datecreated)
					VALUES('$fullnameAd', '$userAd', '$passAd', now())";
					mysqli_query($db, $registerAdmin);
	}
	?>


	<script> 
		$(document).ready(function(){
      		$("#registeradmin").submit(function(event) {
      				var fullnameAd = $("#fullnameAd").val();
      				var emailAd = $("#emailAd").val();
                    var userAd = $("#userAd").val();
                    var passAd = $("#passAd").val();


                    event.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "php/registeradmin.php",
                        data: "fullnameAd=" + fullnameAd + "&emailAd=" + emailAd + "&userAd=" + userAd + "&passAd=" + passAd + "&salt",
                        success: function(data) {
                           $("#message-ad").fadeIn(1000);
                           $("#message-ad").fadeOut(500);
                        }
                    });


            });
        });	
	</script>

	<section id="myModal" class="modal">
  		<!-- Modal content -->
 
 <section id="RegisterAd">
	  	<i class="fa fa-times" aria-hidden="true" style="float: right; cursor: pointer; background: #2C3742;"></i>
	    	<h2 style="background: #2C3742;"><span class="label label-default" style="margin-right: 10px;">New</span>Administrator Register</h2>
			<form id="registeradmin" method="POST" name="registerAd" action="<?php $_SERVER['PHP_SELF'];?>" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy.'); return false; }">
				<ul>
					<li>
						<span class="error  error3" ng-show="registerAd.fullnameAd.$touched && registerAd.fullnameAd.$invalid"></span>
						<span style="font-size: 12px; padding-top: 10px;" class="passerror" ng-show="registerAd.fullnameAd.$error.minlength"><i class="fa fa-times" aria-hidden="true"></i> Your must be at least 10 characters with your surname and firstname. </span>
						<span class="valid2" ng-show="registerAd.fullnameAd.$valid"><i  class="fa fa-check" aria-hidden="true"></i> Full name is valid. </span>
						<input id="fullnameAd" class="form-control-address  form-control-line" name="fullnameAd" ng-model="fullnameAd" placeholder="Full Name" ng-minlength="7" onkeypress='onlya(event)' required>
					</li>
					<li>
						<span class="error error3" ng-show="registerAd.emailAd.$touched && registerAd.emailAd.$invalid"><i class="fa fa-times" aria-hidden="true"></i> Its not a email.</span>
						<span class="valid2" ng-show="registerAd.emailAd.$touched && registerAd.emailAd.$valid"><i class="fa fa-check" aria-hidden="true"></i>Your email is correct.</span>
						<input id="emailAd" class="form-control-address  form-control-line" type="email" name="emailAd" placeholder="Email Address"
							ng-model="emailAd"
							required
					>
					</li>
					<li>
						<span id="show2"></span>
						<span class="error  error3" ng-show="registerAd.userAd.$touched  && registerAd.userAd.$invalid"></span>
						<span  style="font-size: 12px;"  class="passerror" ng-show="registerAd.userAd.$error.minlength"><i class="fa fa-times" aria-hidden="true"></i> Your username must be atleast 7 characters.</span>
						<input id="userAd" class="form-control-address  form-control-line" name="userAd" placeholder="Username" 
								ng-model="userAd" 
								ng-minlength="7"
								required>
					</li>
					<script>
						$(document).ready(function(){
							$('#userAd').change(function(){
								var userAd = $('#userAd').val();
								$.ajax({
									type: 'POST',
									url: 'php/usercheckadmin.php',
									data: {action: 'validate', userAd : userAd},
									dataType: 'json',
									success:function(response){
										if(response.success == true){
											$('#show2').addClass('valid2').html(response.message);

										}else{
											$('#show2').addClass('error  error3').html(response.message);	
											$('#show2').removeClass('valid2')
										}
									}
								});
							});
						});
					</script>
					<li>
							
							<input id="passAd" class="form-control-address  form-control-line" type="password" name="passAd" placeholder="Password"
							ng-model="user.passAd"
							ng-pattern="user.reTypePassword"
							ng-minlength="8"
							required="true">
			
					</li>

					<li>
					<span class="passerror" ng-show="registerAd.passAd.$untouched && registerAd.passAd.$error.minlength"><i class="fa fa-times" aria-hidden="true"></i> Passwords must be at least 8 characters.</span>
					<span class="error valid2" ng-show="registerAd.passwordReType.$valid"><i  style="background: #2C3742;" class="fa fa-check" aria-hidden="true"></i> Password is match</span>
							<input class="form-control-address  form-control-line" type="password" name="passwordReType" placeholder="Retype Password"
							ng-model="user.reTypePassword"
							ng-pattern="user.passAd"
							ng-minlength="8"
							required="true">
					<span style="margin-bottom: 10px;" class="passerror" ng-show="registerAd.passwordReType.$dirty && registerAd.passwordReType.$invalid"><i class="fa fa-times" aria-hidden="true"></i> Your password and confirmation password do not match.</span>	
			
					</li>
					

					<li>
						<p><input type="checkbox" name="checkbox" value="check" id="agree" ng-model="agreeCheck" required> I have read and agree to the <strong>Terms and Conditions and Privacy Policy.</strong> </p>
					</li>
					<li>
						<input id="registeradbtn" class="btn btn-primary loginbtn" type="submit" name="submitAd" value="Register" ng-disabled="registerAd.$invalid" onclick="check(userAd)">
					</li>
				</ul>
			</form>
	    </section>
	    

	</section>

	<script>
		function PasswordController2($xhr) {
			// watch the password field and grade it.
			this.$watch('password', function() {
				if (angular.isDefined(this.password)) {
					if (this.password.length > 8) {
						this.strength = 'strong';
					} else if (this.password.length > 4) {
						this.strength = 'medium';
					} else if(this.password.length > 2) {
						this.strength = 'weak';
					} else {
						this.strength = 'hide';
					}
				}
			});

		}

		function  twosub(){
			check(userOper);
			agree();
		}


		function agree(){
			if(!this.form.checkbox.checked){
				alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy.');
			return false
			}
		}
		function validate(evt) {
	      var theEvent = evt || window.event;
	      var key = theEvent.keyCode || theEvent.which;
	      key = String.fromCharCode( key );
	      var regex = /[0-9]|\./;
	        if( !regex.test(key) ) {
	          theEvent.returnValue = false;
	          if(theEvent.preventDefault) theEvent.preventDefault();
	        }
    	}

    	function onlya(evt) {
		      var theEvent = evt || window.event;
		      var key = theEvent.keyCode || theEvent.which;
		      key = String.fromCharCode( key );
		      var regex = /[a-z]|\./;
		        if( !regex.test(key) ) {
		          theEvent.returnValue = false;
		          if(theEvent.preventDefault) theEvent.preventDefault();
		        }
    	}

		function check(userOper){
			var a = /^[0-9A-Za-z]+$/;
			if (!userOper.value.match(a)) {
				alert('Special characters not allowed');
				return false;
			}
		}

		function check(userAd){
			var a = /^[0-9A-Za-z]+$/;
			if (!userAd.value.match(a)) {
				alert('Special characters not allowed');
				return false;
			}
		}
	</script>
	

<!--
	<footer class="container">
		<div class="copyright">
        	<h6> Copyright (c) 2017 Love Word All Rights Reserved. </h6>
    	</div>
	</footer>
-->
<script src="js/functionall.js"></script>
</body>
</html>