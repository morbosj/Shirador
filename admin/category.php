<?php include ('../loginad.php'); ?>
<?php include('../config.php');  
  $connect = mysqli_connect("localhost", "root", "", "sde");  
  $query = "SELECT * FROM category";  
  $result2 = mysqli_query($connect, $query);

  $userOper = $_SESSION['userAd'];
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<style>
body {
  background: #EDF1F5;

}
 #welcome {
  background-color: rgb(25,118,210);
  color: white;
  position: fixed;
  top: 10px;
  left: 550px;
  font-weight: bold;
  padding: 10px;
  border-radius: 20px ;
  z-index: 1000;
}
</style>
<body>
  <header class="header-container">
      <section class="section1-container">
        <div class="heading-top">
            <div id="sde-style">
                <img src="../image/sdeadmin.png">
            </div>

                <form>
                  <input class="app-search" type="text" name="search" id="search" placeholder="Search...">
                  <?php 
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
                    $userOper = $_SESSION['userAd'];
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
                <li><a href="inventory.php"><i class="fa fa-folder-open" aria-hidden="true"></i>Inventory</a></li>
                <li class="active"><a href="category.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Category</a></li>
                <li><a href="account.php"><i class="fa fa-user-circle" aria-hidden="true"></i>Accounts</a></li>
                <li><a href="log.php"><i class="fa fa-history" aria-hidden="true"></i>Login History</a></li>
                <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
                <li><a href="category.php?logout=1"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a></li>
              </ul>
            </nav>
        </div>
    </aside>
  </header>

  <section class="section2-container">
    <div>
      <h3> Inventory </h3>

      <ul>
        <li><i class="fa fa-tasks" aria-hidden="true"></i> Manage Category</li>
        <li><button>See more</button></li>
      </ul>
    </div>
  </section>

 <div class="container" style="width:80%; position: absolute; top: 200px; left: 250px; background-color: white;">  
    <br />  
    <div class="table-responsive">  
         <div align="right">  
              <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="add-btn">Add Category</button>  
         </div>  
         <br />  
         <div id="employee_table">  
              <table class="table table-responsive">  
                  <thead class="thead-inverse">
                   <tr>  
                        <th width="70%">Category</th>    
                        <th width="15%">Edit</th>
                        <th width="15%">Delete</th>  
                   </tr>
                  </thead>
                   <?php  
                   while($row = mysqli_fetch_array($result2))  
                   {  
                   ?>  
                   <tr>  
                        <td><?php echo $row["category"]; ?></td>   
                        <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id_category"]; ?>" class="edit_btn edit_data" /></td> 
                        <td>
                          <button class="del-btn" onclick="deleteme(<?php echo $row['id_category']; ?>)">Delete</button>
                        </td>
                   </tr>  
                   <?php  
                   }  
                   ?>  
              </table>  
         </div>  
    </div>  
</div>




    

  <script type="text/javascript">
    function deleteme(delid){
      if(confirm("Do you want to delete?")){
        window.location.href='php/category/delete_category.php?del_id=' +delid+'';
        return true;
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

  </script>





<footer class="footer-section"  >
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
</body>
</html>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Product Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 

<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"> Add Category </h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Category</label>  
                          <input type="text" name="category" id="category" class="form-control"/>  
                          <br />   
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" style="margin-top: 5px;" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

<script>
  $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      }); 

      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"php/category/fetch_category.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#category').val(data.category);  
                     $('#employee_id').val(data.id_category);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  

      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#category').val() == "")  
           {  
                alert("Category is required");  
           }   
           else  
           {  
                $.ajax({  
                     url:"php/category/insert_category.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
 
 });  
</script>