 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "sde");  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM product2 WHERE id_product = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>