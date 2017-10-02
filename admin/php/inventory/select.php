<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "sde");  
      $query = "SELECT * FROM product2 WHERE id_product = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Product Code</label></td>  
                     <td width="70%">'.$row["product_code"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Product Name</label></td>  
                     <td width="70%">'.$row["product_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Brand</label></td>  
                     <td width="70%">'.$row["brand"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Category</label></td>  
                     <td width="70%">'.$row["category"].'</td>  
                </tr>
                <tr> 
                    <td width="30%"><label>Quantity</label></td>
                    <td width="30%">'. $row['quantity'] . '</td>
                </tr>  
                <tr>  
                     <td width="30%"><label>Status</label></td>  
                     <td width="70%">'.$row["status"].'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
