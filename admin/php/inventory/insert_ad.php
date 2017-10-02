<?php  
 $connect = mysqli_connect("localhost", "root", "", "sde");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $product_code = mysqli_real_escape_string($connect, $_POST["product_code"]);
      $product_name = mysqli_real_escape_string($connect, $_POST["product_name"]);  
      $brand = mysqli_real_escape_string($connect, $_POST["brand"]);  
      $category = mysqli_real_escape_string($connect, $_POST["category"]);
      $quantity = mysqli_real_escape_string($connect, $_POST["quantity"]);  
      $status = mysqli_real_escape_string($connect, $_POST["status"]);  
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE product2  SET 
           product_code = '$product_code',   
           product_name = '$product_name',   
           brand = '$brand',   
           category = '$category',
           quantity = '$quantity',   
           status = '$status'   
           WHERE id_product ='".$_POST["employee_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO product2 (product_code, product_name, brand, category, quantity, status)  
           VALUES('$product_code','$product_name', '$brand', '$category', '$quantity', '$status');  
           ";  
           $message = 'Data Inserted'; 
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success" style="margin-top: -60px; margin-left: 15px;">' . $message . '</label>';  
           $select_query = "SELECT * FROM product2";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered ">  
                     <tr>  
                          <th width="70%">Product Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>
                          <th width="15%">Delete</th>
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["product_name"] . '</td>     
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id_product"] .'" class="edit_btn edit_data" /></td> 
                          <td><input type="button" name="view" value="view" id="' . $row["id_product"] . '" class="view_btn view_data" /></td>
                          <td><button class="del-btn" onclick="deleteme("' .$row['id_product']. '")">Delete</button></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>