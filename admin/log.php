<?php include ('../loginad.php'); ?>
<?php include('../config.php');  
  $connect = mysqli_connect("localhost", "root", "", "sde"); 
  $userAd = $_SESSION['userAd'];
  if (empty($_SESSION['userAd'])) {
    header('location: ../index.php');
  }
  $selectad = "SELECT * FROM registeradmin";
  $result_ads = mysqli_query($connect, $selectad);
  $nums_ads = mysqli_num_rows($result_ads);
  if (empty($nums_ads)) {
    header('location: ../index.php');
    session_destroy();
  }

  $login = "SELECT * FROM login_history WHERE type='Login'";  
  $result_login = mysqli_query($connect, $login);

  $logout = "SELECT * FROM login_history WHERE type='Logout'";
  $result_logout = mysqli_query($connect, $logout);
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
                <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Add Category</a></li>
                <li><a href="account.php"><i class="fa fa-user-circle" aria-hidden="true"></i>Accounts</a></li>
                <li class="active"><a href="log.php"><i class="fa fa-history" aria-hidden="true"></i>Login History</a></li>
                <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
                <li><a href="log.php?logout=1"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a></li>
              </ul>
            </nav>
        </div>
    </aside>
  </header>

  <section class="section2-container">
    <div>
      <h3> Login History </h3>

      <ul>
        <li><i class="fa fa-tasks" aria-hidden="true"></i>  Manage Login History</li>
        <li><button>See more</button></li>
      </ul>
    </div>
  </section>


  <section class="view_login  table-responsive">
      <h5>Login Account</h5>
    <table class="table table-responsive">
      <thead class="thead-inverse">
        <tr>
          <th width="20%">Username</th>
          <th width="20%">User Role</th>
          <th width="20%"> Type </th>
          <th width="20%">Login Date</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
        <?php  
          while($row_login = mysqli_fetch_array($result_login)) {  
        ?>  
        <tr>
          <td><?php echo $row_login['username']; ?></td>
          <td><?php echo $row_login['user_role']; ?></td> 
          <td><?php echo $row_login['type'];?></td> 
          <td><?php echo $row_login['log_date']; ?></td> 
          <td><button class="del-btn" onclick="deleteme(<?php echo $row_login['log_id']; ?>)">Delete</button></td>
        </tr>

        <?php 
        }
        ?>
    </table>
  </section>

  <section class="view_logout table-responsive" id="style-1">
      <h5>Logout Account</h5>
    <table class="table table-responsive">
      <thead class="thead-inverse">
        <tr>
           <th width="20%">Username</th>
          <th width="20%">User Role</th>
          <th width="20%">Type</th>
          <th width="20%">Logout Date</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
        <?php  
          while($row_logout = mysqli_fetch_array($result_logout)) {  
        ?>  
        <tr>
          <td><?php echo $row_logout['username']; ?></td>
          <td><?php echo $row_logout['user_role']; ?></td>
          <td><?php echo $row_logout['type']; ?></td>
          <td><?php echo $row_logout['log_date']; ?></td>
          <td><button class="del-btn" onclick="deleteme(<?php echo $row_logout['log_id']; ?>)">Delete</button></td>  
        </tr>

        <?php 
        }
        ?>
    </table>
  </section>






<footer class="footer-section">
  <div>
    <p>2017 &copy; Shirador Enterprises Inventory System</p>
  </div>
</footer>


  <?php if (isset($_GET['logout'])) {
    error_reporting(0);
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
<script>
   function deleteme(delid){
      if(confirm("Do you want to delete?")){
        window.location.href='php/delete_login.php?del_id=' +delid+'';
        return true;
      }
    }
  function deletemead(delid){
      if(confirm("Do you want to delete?")){
        window.location.href='php/admin/delete.php?del_id=' +delid+'';
        return true;
      }
    }
</script>
</body>
</html>