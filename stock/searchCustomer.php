<?php 
  include("classes/functions.php");

  
  $q = $_REQUEST["q"];
 
     $sqlselect="select Customer_Number,Customer_Name,Phone_Number from customer where Customer_Name Like '%".$q."%'";

    $result=mysqli_query($dbcon,$sqlselect);
     
            
           while($row = $result->fetch_assoc())
            {
           
               echo $output=$row["Phone_Number"];

            }

?>
