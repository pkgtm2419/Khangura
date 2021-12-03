<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include("menutest.php");
    include("classes/functions.php");
    
  $sqlpurchase="select supplier.Supplier_Name as Supplier_Name,purchase.Purchase_Date as Purchase_Date,purchase.Tax as Tax,purchase.Total_Amount as Total_Amount,purchase.Paid_Amount as Paid_Amount,purchase.Unpaid_Amount as Unpaid_Amount,purchase.purchase_id as purchase_id from purchase inner join supplier on supplier.Supplier_Number=purchase.Supplier_Number";

    $resultpurchase=mysqli_query($dbcon,$sqlpurchase);

  

      $sqlsales="Select Client_Name,Order_Id, Client_Contact,Tax,Total_Amount,Discount,Grand_Total,Sales_Date from billing_details order by Sales_Date desc";

       $resultsales=mysqli_query($dbcon,$sqlsales); 

     $sqlstock="select itemdetails.Item_Number as Item_Number,itemdetails.Item_Name as Item_Name,sum(stockdetails.Item_Quantity) as Item_Quantity,sum(stockdetails.Purchase_Price) as Purchase_Price,sum(stockdetails.Total_Price) as Total_Price,stockdetails.Date as date from stockdetails inner join itemdetails on itemdetails.Item_Number=stockdetails.Item_Number group by stockdetails.Item_Number";

     $resultstock=mysqli_query($dbcon,$sqlstock); 

 
    ?>
      

      <div class="container">
       <hr>
       <hr>
       <h3>Purchase Details</h3>
         <p></p>            
          <table class="table table-striped">
           <thead>
             <tr>
              <tr>
               <th>Supplier Name</th>
               <th>Tax</th>
               <th>Total Amount</th>
               <th>Paid Amount</th>
               <th>Unpaid Amount</th>
               <th>Purchase Date</th>
              </tr>
            </tr>
            </thead>
            <tbody>
            <?php if($resultpurchase->num_rows >0)
            
            while($rowpurchase = $resultpurchase->fetch_assoc())
            {
             
            ?>
              <tr>
                <td><?php echo $rowpurchase["Supplier_Name"]?></td>
                <td><?php echo $rowpurchase["Tax"]?></td>
                <td><?php echo $rowpurchase["Total_Amount"]?></td>
                <td><?php echo $rowpurchase["Paid_Amount"]?></td>
                <td><?php echo $rowpurchase["Unpaid_Amount"]?></td>
                <td><?php echo $rowpurchase["Purchase_Date"]?></td>
                <td><a class="btn btn-primary" href="http://localhost/stock/purchaseitem.php?purchaseid=<?php echo $rowpurchase["purchase_id"]?>">View Items</a></td>
              </tr>
              <?php
              } 
              ?>
            </tbody>
          </table>
        </div><!--End Container-->
        
     <div class="container">
       <h3>Sales Details</h3>
         <p></p>            
          <table class="table table-striped">
           <thead>
             <tr>
               <th>Client Name</th>
               <th>Client Contact</th>
               <th>Tax</th>
               <th>Total Amount</th>
               <th>Discount</th>
               <th>Grand Total</th>
               <th>Sales Date</th>
              </tr>
            </thead>
            <tbody>
            <?php if($resultsales->num_rows >0)
            
            while($rowsales = $resultsales->fetch_assoc())
            {
             
            ?>
              <tr>
                <td><?php echo $rowsales["Client_Name"]?></td>
                <td><?php echo $rowsales["Client_Contact"]?></td>
                <td><?php echo $rowsales["Tax"]?></td>
                <td><?php echo $rowsales["Total_Amount"]?></td>
                <td><?php echo $rowsales["Discount"]?></td>
                <td><?php echo $rowsales["Grand_Total"]?></td>
                <td><?php echo $rowsales["Sales_Date"]?></td>
                <td><a class="btn btn-primary" href="http://localhost/stock/salesitem.php?salesid=<?php echo $rowsales["Order_Id"]?>">View Items</a></td>
              </tr>
              <?php
              } 
              ?>
            </tbody>
          </table>
        </div><!--End Container-->

     <div class="container">
       <h3>Total Stock</h3>
         <p></p>            
          <table class="table table-striped">
           <thead>
             <tr>
               <th>Item Number</th>
               <th>Item Name</th>
               <th>Item Quantity</th>
               <th>Purchase Price</th>
               <th>Total Price</th>
             </tr>
            </thead>
            <tbody>
            <?php if($resultstock->num_rows >0)
            
            while($rowstock = $resultstock->fetch_assoc())
            {
             
            ?>
              <tr>
                <td><?php echo $rowstock["Item_Number"]?></td>
                <td><?php echo $rowstock["Item_Name"]?></td>
                <td><?php echo $rowstock["Item_Quantity"]?></td>
                <td><?php echo $rowstock["Purchase_Price"]?></td>
                <td><?php echo $rowstock["Total_Price"]?></td>
                  
              </tr>
              <?php
              } 
              ?>
            </tbody>
          </table>
        </div><!--End Container-->
     

    </body>
</html>