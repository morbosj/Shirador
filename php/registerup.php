<?php 
    include('../operator/profile.php');
    date_default_timezone_set('US/Pacific'); 
    $db = mysqli_connect("localhost","root","","sde");
    if(isset($_REQUEST['fullname'])){

      $fullname = mysqli_escape_string($db, $_POST['fullname']);
      $emailOper = mysqli_escape_string($db, $_POST['emailOper']);
      $cellp =  mysqli_escape_string($db, $_POST['cellp']);
      $brgy = mysqli_escape_string($db, $_POST['brgy']);
      $city = mysqli_escape_string($db, $_POST['city']);
      $updateInfo = "UPDATE registeroperator SET fullname= '$fullname', emailOper='$emailOper', cellp = '$cellp', brgy= '$brgy', city = '$city' WHERE userOper = '$userOper'";
      $resultup = mysqli_query($db, $updateInfo);
      
    }

  ?>