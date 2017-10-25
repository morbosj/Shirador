<?php 
    include('../admin/profile.php');
    date_default_timezone_set('US/Pacific'); 
    $db = mysqli_connect("localhost","root","","sde");
    if(isset($_REQUEST['fullnameAd'])){

      $fullnameAd = mysqli_escape_string($db, $_POST['fullnameAd']);
      $emailAd = mysqli_escape_string($db, $_POST['emailAd']);
      $updateInfo = "UPDATE registeradmin SET fullnameAd = '$fullnameAd', emailAd = '$emailAd' WHERE userAd = '$userAd'";
      $resultup = mysqli_query($db, $updateInfo);
      
    }

  ?>