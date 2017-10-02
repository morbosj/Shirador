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

 
  $query = "SELECT * FROM product2 LIMIT 3";  
  $result2 = mysqli_query($connect, $query);

  $category = "SELECT * FROM category LIMIT 3";
  $result_category = mysqli_query($connect, $category);

  $operatoruser = "SELECT * FROM registeroperator LIMIT 3";
  $result_operator = mysqli_query($connect, $operatoruser);

  $adminuser = "SELECT * FROM registeradmin LIMIT 3";
  $result_admin = mysqli_query($connect, $adminuser);
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
                <li class="active"><a href="account.php"><i class="fa fa-user-circle" aria-hidden="true"></i>Accounts</a></li>
                <li><a href="log.php"><i class="fa fa-history" aria-hidden="true"></i>Login History</a></li>
                <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
                <li><a href="account.php?logout=1"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a></li>
              </ul>
            </nav>
        </div>
    </aside>
  </header>

  <section class="section2-container">
    <div>
      <h3> Account </h3>

      <ul>
        <li><i class="fa fa-tasks" aria-hidden="true"></i>  Manage Account</li>
        <li><button>See more</button></li>
      </ul>
    </div>
  </section>


  <section class="manage_operatoracc">
      <h5>Operator Account</h5>
    <table class="table table-responsive">
      <thead class="thead-inverse">
        <tr>
          <th width="20%">Username</th>
          <th width="20%">Full Name</th>
          <th width="20%">Location </th>
          <th width="20%">Email</th>
          <th width="20%">Phone number</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
        <?php  
          while($row_operacc = mysqli_fetch_array($result_operator)) {  
        ?>  
        <tr>
          <td><?php echo $row_operacc['userOper']; ?></td>
          <td><?php echo $row_operacc['fullname']; ?></td> 
          <td><?php echo $row_operacc['brgy'];?>, <?php echo $row_operacc['city']; ?></td> 
          <td><?php echo $row_operacc['emailOper']; ?></td> 
          <td><?php echo $row_operacc['cellp'];?></td>
          <td><button class="del-btn" onclick="deleteme(<?php echo $row_operacc['id_user']; ?>)">Delete</button></td>
        </tr>

        <?php 
        }
        ?>
    </table>
  </section>

  <section class="manage_adminacc">
      <h5>Administrator Account</h5>
    <table class="table table-responsive">
      <thead class="thead-inverse">
        <tr>
           <th width="20%">Username</th>
          <th width="20%">Full Name</th>
          <th width="20%">Email</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
        <?php  
          while($row_adacc = mysqli_fetch_array($result_admin)) {  
        ?>  
        <tr>
          <td><?php echo $row_adacc['userAd']; ?></td>
          <td><?php echo $row_adacc['fullnameAd']; ?></td>
          <td><?php echo $row_adacc['emailAd']; ?></td>
          <td><button class="del-btn" onclick="deletemead(<?php echo $row_adacc['id_user']; ?>)">Delete</button></td>  
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
        window.location.href='php/delete.php?del_id=' +delid+'';
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