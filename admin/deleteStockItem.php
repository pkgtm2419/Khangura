<?php 
  include("classes/functions.php");

  
  $itemid=$_GET["itemid"];
 echo  $sqlDelete="Delete from itemdetails where Item_Id='".$itemid."'";

  
  if(mysqli_query($dbcon, $sqlDelete))
      {
       //echo "New records Delted Successfully";
    	header("location:http://localhost/stock/addstockitem.php");
      }
          

?>