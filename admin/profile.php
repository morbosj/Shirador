  <?php include ('../loginad.php'); ?>
<?php include('../config.php');  
  $timeout = date('M-d-Y h:i:s A');
  $userAd = $_SESSION['userAd'];
  if (empty($_SESSION['userAd'])) {
    header('location: ../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shirador Enterprises</title>
    <link rel="stylesheet" type="text/css" href="../css/style-home.css">
    <link rel="shortcut icon" type="image/png" href="../image/favicon.png"/>
    	<!-- font awesome -->
	  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.css">
    <script src="../js/jquery.js"></script>
</head>
<style>
body {
  background: #EDF1F5;

}
 #welcome {
  background-color: rgb(25,118,210);
  width: 300px;
  color: white;
  position: fixed;
  top: 10px;
  left: 550px;
  font-weight: bold;
  font-size: 14px;
  padding: 10px;
  border-radius: 20px;
  z-index: 1000;
}
#message-oper {
        display: none;
        position: fixed;
        top: 120px;
        left: 630px;
        border: 5px solid #32936F;
        padding: 10px;
        border-radius: 3px;
        background: white;
        z-index: 1000;
  }
#message-oper i {
    color: #32936F;
    padding-right: 10px;
}
#message-img {
        display: none;
        position: fixed;
        top: 120px;
        left: 630px;
        border: 5px solid #32936F;
        padding: 10px;
        border-radius: 3px;
        background: white;
        z-index: 1000;
  }
  #message-img i {
    color: #32936F;
    padding-right: 10px;
  }

#message-imgerror {
        display: none;
        position: fixed;
        top: 120px;
        left: 630px;
        border: 5px solid #32936F;
        padding: 10px;
        border-radius: 3px;
        background: white;
        z-index: 1000;
  }
  #message-imgerror i {
    color: #32936F;
    padding-right: 10px;
  }
</style>
<body>
  <?php if(isset($_SESSION['success'])): ?>
                        <h3 id="welcome">
                          <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                          ?>
                        </h3>
  <?php endif ?>
  <!-- Error/Success Message -->
  <h5 id="message-oper"><i class="fa fa-check" aria-hidden="true"></i>Information has been successfully updated</h5>


  <header class="header-container">
      <section class="section1-container">
        <div class="heading-top">
            <div id="sde-style">
                <img src="../image/sdeadmin.png">
            </div>

                <form>
                  <input class="app-search" type="text" name="search" id="search" placeholder="Search...">
                   <?php 
                      $db = mysqli_connect("localhost","root","","sde");
                      $userAd = $_SESSION['userAd'];
                      $viewImg = "SELECT ad_image FROM registeradmin WHERE userAd = '$userAd'";
                      $resultimg = mysqli_query($db, $viewImg);
                      if (mysqli_num_rows($resultimg)>0) {
                        while($row3 = mysqli_fetch_assoc($resultimg)){
                          echo "<img id='person-pic' src='admin-image/". $_SESSION['userAd'] . "/".$row3['ad_image']."'>";  
                        }
                      }
                  ?>
                  <?php 
                    $db = mysqli_connect("localhost","root","","sde");
                    $userAd = $_SESSION['userAd'];
                    $viewUser = "SELECT fullnameAd FROM registeradmin WHERE userAd = '$userAd'";
                    $result = mysqli_query($db, $viewUser);
                    if (mysqli_num_rows($result)> 0) {
                      while ($row = mysqli_fetch_assoc($result)) { ?>
                        <h5><?php echo $row['fullnameAd'] ?></h5>
                  <?php    }
                    }
                  ?>
                  
                </form>
        </div>
      </section>
      
      <aside>
        <div class="nav-container">
            <nav class="nav-fixed">
              <ul>
                <li><a href="admin.php"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a></li>
                <li><a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i>Inventory</a></li>
                <li><a href="category.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Category</a></li>
                 <li><a href="account.php"><i class="fa fa-user-circle" aria-hidden="true"></i>Accounts</a></li>
                 <li><a href="log.php"><i class="fa fa-history" aria-hidden="true"></i>Login History</a></li>
                <li class="active"><a href="#"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
                <li><a href="profile.php?logout=0"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a></li>
              </ul>
            </nav>
        </div>
    </aside>
  </header>

  <section class="section2-container">
    <div>
      <h3> Profile / Administrator </h3>

      <ul>
        <li>Profile / Administrator </li>
        <li><button>See more</button></li>
      </ul>
    </div>
  </section>

  <article id="profile-article">
    <section class="info-section">
    <?php        
                    $db = mysqli_connect("localhost","root","","sde");
                    $userAd = $_SESSION['userAd'];
                    $viewUser = "SELECT fullnameAd, emailAd FROM registeradmin WHERE userAd = '$userAd'";
                    $result = mysqli_query($db, $viewUser);
                    if (mysqli_num_rows($result)> 0) {
                      while ($row2 = mysqli_fetch_assoc($result)) { ?>
        <div class="white-box">
          <div class="user-bg">
            <img width="100%" src="../image/img1.jpg">

            <div class="overlay-box">
              <div class="user-content">
              <?php 
                $db = mysqli_connect("localhost","root","","sde");
                $userAd = $_SESSION['userAd'];
                $viewImg = "SELECT ad_image FROM registeradmin WHERE userAd = '$userAd'";
                $resultimg = mysqli_query($db, $viewImg);
                if (mysqli_num_rows($resultimg)>0) {
                  while($row3 = mysqli_fetch_assoc($resultimg)){
                    echo "<img class='thumb-lg  img-circle' src='admin-image/". $_SESSION['userAd'] . "/".$row3['ad_image']."'>";  
                  }
                }
              ?>

                <h4 class="text-white"><?php echo $userAd; ?></h4>
                <h5 class="text-white"><?php echo $row2['emailAd']; ?></h5>
              </div>
            </div>
          </div>
        </div>

        
        <div class="white-box2">
          <form id="updateAd" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-horizontal  form-material">
            <div class="form-group">
              <label>Full Name</label><br>
              <input id="fullnameAd" type="text" name="fullnameAd" placeholder="<?php echo $row2['fullnameAd'];?>" class="form-control  form-control-line" value="<?php echo $row2['fullnameAd'];?>">
            </div>

             <div class="form-group">
              <label>Email</label><br>
              <input id="emailAd" type="text" name="emailAd" placeholder="<?php echo $row2['emailAd'];?>" class="form-control  form-control-line" value="<?php echo $row2['emailAd'];?>">
            </div>

             <div class="form-group">
              <input type="submit" name="updateAd" value="Update Profile" class="btn  btn-success">
            </div>
          </form>
        </div>

        <div class="white-box3">
          <div class="user-info">
            <h4><i class="fa fa-info" aria-hidden="true"></i><?php echo $row2['fullnameAd'];  ?></h4>
            <h4><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row2['emailAd']; ?></h4>

             <?php    }
                    }
      ?>

          </div>
        </div>
        <?php 
        if (isset($_POST['upload'])) {
            $db = mysqli_connect("localhost","root","","sde");
            $target = "admin-image/". $_SESSION['userAd'] . "/". basename($_FILES['image']['name']);

            $image = $_FILES['image']['name'];

            $sql = "UPDATE registeradmin SET ad_image ='$image' WHERE userAd = '$userAd'";
            mysqli_query($db, $sql);

            if(!is_dir("admin-image/". $_SESSION['userAd']."/")){
                mkdir("admin-image/". $_SESSION['userAd']."/");
            }


            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){ 
                
              ?>
              <h5 id="message-img"><i class="fa fa-check" aria-hidden="true"></i>Image uploaded successfully</h5>
              
    <?php    }else{ ?>
              <h5 id="message-imgerror"><i class="fa fa-check" aria-hidden="true"></i>There was a problem uploading image.</h5>
              <?php return; ?>
   <?php         }
      }
        ?>
        <div class="white-box4">
          <form id="upload-section" method="post" action="" enctype="multipart/form-data">
              <input type="hidden" name="size" value="1000000">
            <div class="file-selected">
              <br>
              <input type="file" name="image" id="file-2" class="inputfile  inputfile-2" data-multiple-caption="{count} files selected" multiple >
              <label for="file-2"><svg  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
            </div>

            <div>
              <input class="upload-btn" type="submit" name="upload" value="Upload image">
            </div>
          </form>
        </div>
    </section>
  </article>

  <script> 
    $(document).ready(function(){
          $("#updateAd").submit(function(e) {
                    var fullnameAd = $("#fullnameAd").val();
                    var emailAd = $("#emailAd").val();

                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "../php/registerupad.php",
                        data: "fullnameAd=" + fullnameAd + "&emailAd=" + emailAd,
                        success: function(data) {
                           $("#message-oper").fadeIn(1000);
                           $("#message-oper").fadeOut(500);
                        }
                    });


            });


     
        }); 
  </script>
  <script>
  $(document).ready(function(){
    $("#message-img").fadeIn(1000);
    $("#message-img").fadeOut(500);
    $("#message-imgerror").fadeIn(1000);
    $("#message-imgerror").fadeOut(500);
  });
  </script>










<footer class="footer-section">
  <div>
    <p>2017 &copy; Shirador Enterprises Inventory System</p>
  </div>
</footer>

  <?php if (isset($_GET['logout'])) {
    error_reporting(0);
    $user_role =''; 
    $user_role = $_SESSION['user_role'];
    $user_role = "Administrator";
    $type = $_SESSION['type'];
    $type = "Logout";
    $timeout = date('M-d-Y h:i:s A');
    $audit = "INSERT INTO login_history (username, user_role, type, log_date) VALUES ('$userAd', '$user_role', '$type', '$timeout')";
    $resultupaudit = mysqli_query($db, $audit);
    session_destroy();
    unset($_SESSION['userAd']);
    header('location: ../index.php');
  }
  ?>

<script src="../js/functionall.js"></script>
<script src="../js/custom-file-input.js"></script>
</body>
</html>