<?php 
  include("classes/functions.php");

  
  $OrderId=$_GET["OrderId"];
 echo  $sqlDelete="Delete from billing_details where Order_Id='".$OrderId."'";

  
  if(mysqli_query($dbcon, $sqlDelete))
      {
       //echo "New records Delted Successfully";
    	header("location:http://localhost/stock/orders.php");
      }
          

?>