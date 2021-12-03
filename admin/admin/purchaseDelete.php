<?php 
  include("classes/functions.php");

  
  $purchaseid=$_GET["purchaseid"];
  $sqlDelete="Delete from purchase where purchase_id='".$purchaseid."'";

  if(mysqli_query($dbcon, $sqlDelete))
      {
       //echo "New records Delted Successfully";

      	header("location:http://localhost/stock/purchase.php");
      }
          

?>