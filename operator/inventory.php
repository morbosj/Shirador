<?php include ('../loginoper.php'); ?>
<?php include('../config.php');  
  $connect = mysqli_connect("localhost", "root", "", "sde");  
  $query = "SELECT * FROM product2";  
  $result2 = mysqli_query($connect, $query);

  $userOper = $_SESSION['userOper'];
  if (empty($_SESSION['userOper'])) {
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
.table-responsive {
  overflow-y: scroll;
}
</style>
<body>
  <header class="header-container">
      <section class="section1-container">
        <div class="heading-top">
            <div id="sde-style">
                <img src="../image/sdehorizontal.png">
            </div>

                <form>
                  <input class="app-search" type="text" name="search" id="search" placeholder="Search...">
                  <?php 
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
                <li><a href="home.php"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a></li>
                <li class="active"><a href="inventory.php"><i class="fa fa-folder-open" aria-hidden="true"></i>Inventory</a></li>
                <li><a href="category.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Category</a></li>
                <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Recently Stock</a></li>
                <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
                <li><a href="inventory.php?logout=1"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a></li>
              </ul>
            </nav>
        </div>
    </aside>
  </header>

  <section class="section2-container">
    <div>
      <h3> Inventory </h3>

      <ul>
        <li><i class="fa fa-tasks" aria-hidden="true"></i> Manage Product</li>
        <li><button>See more</button></li>
      </ul>
    </div>
  </section>

 <div class="container" style="width:80%; position: absolute; top: 200px; left: 250px; background-color: white;">  
    <br />  
    <div class="table-responsive">  
         <div align="right">  
              <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="add-btn">Add Product</button>  
         </div>  
         <br />  
         <div id="employee_table">  
              <table class="table table-responsive">  
                  <thead class="thead-inverse">
                   <tr>  
                        <th width="50%">Product Name</th>
                        <th width="50%">Status</th>  
                        <th width="15%">View</th>  
                        <th width="15%">Edit</th>
                        <th width="15%">Delete</th>  
                   </tr>
                  </thead>
                   <?php  
                   while($row = mysqli_fetch_array($result2))  
                   {  
                   ?>  
                   <tr>  
                        <td><?php echo $row["product_name"]; ?></td> 
                        <td><?php echo $row["status"]; ?></td>  
                        <td><input type="button" name="view" value="View" id="<?php echo $row["id_product"]; ?>" class="view_btn view_data" /></td>
                        <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id_product"]; ?>" class="edit_btn edit_data" /></td> 
                        <td>
                          <button class="del-btn" onclick="deleteme(<?php echo $row['id_product']; ?>)">Delete</button>
                        </td>
                   </tr>  
                   <?php  
                   }  
                   ?>  
              </table>  
         </div>  
    </div>  
</div>




    
  
    <?php 
      if(isset($_POST['id_product'])){
        $id_product = $_POST['id_product'];
      }
    ?>

  <script type="text/javascript">
    function deleteme(delid){
      if(confirm("Do you want to delete?")){
        window.location.href='php/delete.php?del_id=' +delid+'';
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
                     <h4 class="modal-title"> Add Product</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Product Code</label>  
                          <input type="text" name="product_code" id="product_code" class="form-control" onkeypress='validate(event)' />  
                          <br />  
                          <label>Product Name</label>  
                          <input type="text" name="product_name" id="product_name" class="form-control">  
                          <br />  
                          <label>Brand</label>  
                          <input type="text" name="brand" id="brand" class="form-control">
                          <br />
                      
                          <label>Category</label>  
                          <select name="category" id="category" class="form-control">
                          <?php 
                            $category = "SELECT * FROM category";
                            $rescatego = mysqli_query($connect, $category);
                            while($row_category = mysqli_fetch_array($rescatego)){
                          ?> 
                            <option><?php echo $row_category['category']; ?></option>
                          <?php }
                          ?>
                          </select> 

                          <label>Quantity</label>
                          <input type="text" name="quantity" id="quantity" class="form-control" onkeypress='validate(event)' />
                          <br />  
                          <label>Status</label>  
                          <select name="status" id="status" class="form-control">
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                          </select>  
                          <br />  
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
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
                url:"php/fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#product_code').val(data.product_code);  
                     $('#product_name').val(data.product_name);  
                     $('#brand').val(data.brand);  
                     $('#category').val(data.category);
                     $('#quantity').val(data.quantity); 
                     $('#status').val(data.status);  
                     $('#employee_id').val(data.id_product);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  

      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#product_code').val() == "")  
           {  
                alert("Product Code is required");  
           }  
           else if($('#product_name').val() == '')  
           {  
                alert("Product Name is required");  
           }  
           else if($('#brand').val() == '')  
           {  
                alert("Brand is required");  
           }  
           else if($('#category').val() == '')  
           {  
                alert("Category is required");  
           }else if($('#quantity').val() == '')
           {
              alert("Quantity is required");
           }else if($('#status').val() == '')
           {
              alert("Status is required");
           } 
           else  
           {  
                $.ajax({  
                     url:"php/insert.php",  
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
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"php/select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
</script>