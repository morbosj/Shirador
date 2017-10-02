<?php  
 $connect = mysqli_connect("localhost", "root", "", "sde");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $category = mysqli_real_escape_string($connect, $_POST["category"]);  
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE category SET category = '$category'   
           WHERE id_category ='".$_POST["employee_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO category(category)  
           VALUES('$category');  
           ";  
           $message = 'Data New Category Inserted'; 
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success" style="margin-top: -60px; margin-left: 15px;">' . $message . '</label>';  
           $select_query = "SELECT * FROM category";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered ">  
                     <tr>  
                          <th width="70%">Category</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">Delete</th>
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["category"] . '</td>     
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id_category"] .'" class="edit_btn edit_data" /></td> 
                          <td><button class="del-btn" onclick="deleteme("' .$row['id_category']. '")">Delete</button></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>