<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> </title>
 </head>
   <?php include("menutest.php");
   
     include("classes/functions.php");

          
      $salesid=$_GET["salesid"];
      $sqlselect="select itemdetails.Item_Name as Item_Name,order_item.Quantity as Quantity,order_item.Rate as Rate,order_item.Total as Total from order_item INNER join itemdetails on itemdetails.Item_Number=order_item.Product_Id where Order_Id='".$salesid."'";

       $result=mysqli_query($dbcon,$sqlselect);

   ?>
  <body>
     <div class="container">
      <h2>Item List</h2>
       <table class="table table-striped">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
             </tr>
        </thead>
        
            <?php if($result->num_rows >0)
           while($row = $result->fetch_assoc())
            {
             
            ?>
              <tr id="row"">
                <td><?php echo $row["Item_Name"]?></td>
                <td><?php echo $row["Quantity"]?></td>
                <td><?php echo $row["Rate"]?></td>
                <td><?php echo $row["Total"]?></td>
              </tr>
             <?php
              } 
             ?>
        
    </table>
   </div>
  </body>
  
</html>