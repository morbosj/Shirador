<?php include ('../loginoper.php'); ?>
<?php include('../config.php'); 
  $connect = mysqli_connect("localhost", "root", "", "sde"); 
  $userOper = $_SESSION['userOper'];
  if (empty($_SESSION['userOper'])) {
    header('location: ../index.php');
  }

  $query = "SELECT * FROM product2 LIMIT 3";  
  $result2 = mysqli_query($connect, $query);

  $category = "SELECT * FROM category LIMIT 3";
  $result_category = mysqli_query($connect, $category);
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
                <img src="../image/sdehorizontal.png">
            </div>

                <form>
                  <input class="app-search" type="text" name="search" id="search" placeholder="Search...">
                  <?php 
                    $db = mysqli_connect("localhost","root","","sde");
                    $userOper = $_SESSION['userOper'];
                    $viewImg = "SELECT oper_image FROM registeroperator WHERE userOper = '$userOper'";
                    $resultimg = mysqli_query($db, $viewImg);
                    if (mysqli_num_rows($resultimg)>0) {
                      while($row3 = mysqli_fetch_assoc($resultimg)){
                        echo "<img id='person-pic' src='operator-image/". $_SESSION['userOper'] . "/".$row3['oper_image']."'>";  
                      }
                    }
                  ?> 
                  <?php 
                    $db = mysqli_connect("localhost","root","","sde");
                    $userOper = $_SESSION['userOper'];
                    $viewUser = "SELECT fullname FROM registeroperator WHERE userOper = '$userOper'";
                    $result = mysqli_query($db, $viewUser);
                    if (mysqli_num_rows($result)> 0) {
                      while ($row = mysqli_fetch_assoc($result)) { ?>
                        <h5><?php echo $row['fullname'] ?></h5>
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
                <li class="active"><a href="home.php"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a></li>
                <li><a href="inventory.php"><i class="fa fa-folder-open" aria-hidden="true"></i>Inventory</a></li>
                <li><a href="category.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Category</a></li>
                <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Recently Stock</a></li>
                <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
                <li><a href="home.php?logout=1"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a></li>
              </ul>
            </nav>
        </div>
    </aside>
  </header>

  <section class="section2-container">
    <div>
      <h3> Dashboard </h3>

      <ul>
        <li>Dashboard</li>
        <li><button>See more</button></li>
      </ul>
    </div>
  </section>

  <article id="total-article">
    <section class="article-section">
      <ul>
        <li>
          <div class="box-div">
            <h4>Category</h4>
            <?php 
              $db = mysqli_connect('localhost','root','','sde');
              $result_cate = mysqli_query($db, "SELECT * FROM category");
              $count_category = mysqli_num_rows($result_cate);  ?>
            <p class="category_color">Total: <?php echo $count_category; ?> items</p>
          </div>
        </li>

        <li>
          <div class="box-div">
            <?php 
              $db = mysqli_connect('localhost','root','','sde');
              $result = mysqli_query($db, "SELECT * FROM product2");
              $count = mysqli_num_rows($result);  ?>
            <h4>Total Products</h4>
            <p class="total_color">Total: <?php echo $count; ?> items</p>

          <?php  ?>
          </div>
        </li>

        <li>
          <div class="box-div">
            <?php 
              $db = mysqli_connect('localhost','root','','sde');
              $result = mysqli_query($db, "SELECT * FROM product2 WHERE status ='Not Available'");
              $notavail = mysqli_num_rows($result);  ?>
            <h4>Not Available</h4>
            <p class="notavail_color">Total : <?php echo $notavail; ?> items</p>
          </div>
        </li>

        <li>
          <div class="box-div">
          <?php 
              $db = mysqli_connect('localhost','root','','sde');
              $stockquery = "SELECT SUM(quantity) FROM product2 WHERE status = 'Available'";
              $result_stock = mysqli_query($db, $stockquery);

              if($row_stock = mysqli_fetch_array($result_stock)){
          ?>

            <h4 style="font-size: 21px;">Stock</h4>
            <p class="remain_color">Total : <?php  echo $row_stock[0]; ?> items  </p>

            <?php } ?>
          </div>
        </li>
      </ul>
    </section>
  </article>

  <section class="view_inventory">
    <a href="inventory.php">See more</a>
    <table class="table table-responsive">
      <thead class="thead-inverse">
        <tr>
          <th width="20%">Product Name</th>
          <th width="20%">Brand</th>
          <th width="20%">Category</th>
          <th width="20%">Status</th>
        </tr>
      </thead>
        <?php  
          while($row = mysqli_fetch_array($result2)) {  
        ?>  
        <tr>
          <td><?php echo $row['product_name']; ?></td>
          <td><?php echo $row['brand']; ?></td>
          <td><?php echo $row['category']; ?></td>
          <td><?php echo $row['status']; ?></td>  
        </tr>

        <?php 
        }
        ?>
    </table>
  </section>

    <section class="view_category">
      <a href="category.php">See more</a>
    <table class="table table-responsive">
      <thead class="thead-inverse">
        <tr>
          <th width="20%">Category</th>
        </tr>
      </thead>
        <?php  
          while($row_category = mysqli_fetch_array($result_category)) {  
        ?>  
        <tr>
          <td><?php echo $row_category['category']; ?></td>  
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

  <?php	if (isset($_GET['logout'])) {
    error_reporting(0); 
    $user_role = $_SESSION['user_role'];
    $user_role = "Operator";
    $type = $_SESSION['type'];
    $type = "Logout";
    $timeout = date('M-d-Y h:i:s A');
    $audit = "INSERT INTO login_history (username, user_role, type, log_date) VALUES ('$userOper', '$user_role', '$type', '$timeout')";
    $resultupaudit = mysqli_query($db, $audit);
    session_destroy();
		unset($_SESSION['userOper']);
		header('location: ../index.php');
	}
  ?>

<script src="../js/functionall.js"></script>
</body>
</html>