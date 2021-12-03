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
     
  
  </head>
  <body>
  
  <?php include("menu.php");
   
     include("classes/functions.php");

     if($_SERVER["REQUEST_METHOD"] == "POST") 
      {

         
         $customernumber = mysqli_real_escape_string($dbcon,$_POST['customernumber']);
         $itemnumber = mysqli_real_escape_string($dbcon,$_POST['itemnumber']);
         $itemquantity = mysqli_real_escape_string($dbcon,$_POST['itemquantity']);
         $salesprice = mysqli_real_escape_string($dbcon,$_POST['salesprice']);
         $salesdate = mysqli_real_escape_string($dbcon,$_POST['salesdate']);
         $totalamount = mysqli_real_escape_string($dbcon,$_POST['totalamount']);
         $taxpercentage = mysqli_real_escape_string($dbcon,$_POST['taxpercentage']);
         
         
    
        /* Insert details in sales Table*/

        $sqlinsert="insert into sales(Customer_Number,Item_Number,Item_Quantity,Sales_Price,Sales_Date,Total_Amount,Tax_Percentage) values('".$customernumber."',".$itemnumber.",".$itemquantity.",".$salesprice.",'".$salesdate."',".$totalamount.",".$taxpercentage.")";

         echo $sqlinsert;
         if(mysqli_query($dbcon, $sqlinsert))
          {
            echo "New records created Successfully";
          }
          else
          {
           echo "Error:".$sqlinsert."<br>".mysqli_error($dbcon); 
          }
        


        /* Insert Item details in stockdetails Table*/

          
          $suppliernumber=0;

          $purchaseprice=0;
            
            $stockinsert="insert into stockdetails(Supplier_Number,Customer_Number,Item_Name,Item_Number, Item_Quantity,Purchase_Price,Sales_Price) values(".$suppliernumber.",".$customernumber.",'TestItem',".$itemnumber.",".-$itemquantity.",".$purchaseprice.",".$salesprice.")";

              if(mysqli_query($dbcon, $stockinsert))
              {
                echo "New records created Successfully";
              }
              else
              {
               echo "Error:".$stockinsert."<br>".mysqli_error($dbcon); 
              }
              
           echo $stockinsert;  
        
        } 
     
      /* Query for list of sales items*/
     $sqlselect="select customer.Customer_Name as Customer_Name,itemdetails.Item_Name,sales.Item_Quantity,sales.Sales_Price,sales.Sales_Date,sales.Total_Amount,customer.Customer_Name from itemdetails inner join sales on sales.Item_Number=itemdetails.Item_Number INNER JOIN customer on sales.Customer_Number=customer.Customer_Number";

     $result=mysqli_query($dbcon,$sqlselect);

     
     /*Query for list of Items  from Itemdetails Table */ 

     $sqlItem="select Item_Number,Item_Name from itemdetails";
     $resultitem=mysqli_query($dbcon,$sqlItem);

     
     /* Query for Sales Price*/

     $sqlprice ="SELECT purchase.Sales_Price as Sales_Price,itemdetails.Item_Name as Item_Name,
     purchase.Item_Number as Item_Number from itemdetails inner JOIN purchase on purchase.Item_Number=itemdetails.Item_Number group by Item_Number";

     $resultprice=mysqli_query($dbcon,$sqlprice);   
     

     /*Query for list of Items  from Itemdetails Table */ 

     $sqlCustomer="select Customer_Number,Customer_Name from customer";
     $resultcustomer=mysqli_query($dbcon,$sqlCustomer);
 
  
  ?> 
    <hr>
     <div class="container" ng-app="" ng-controller="ctrlDate">
       <h2>Sales Details</h2>
       <form action="sales.php" method="post" name="salesform">

        <div class="form-group">
          
          <label for="customername">Customer Name</label>
          <!--<input type="text" class="form-control" id="customername" name="customername" ng-model="customerinput" required>

           <label for="salesprice">Sales Price</label>-->
          <!--<input type="number" value="" class="form-control" id="salesprice"  name="salesprice" ng-model="priceinput" required>-->

           
           <select class="form-control" id="customernumber" name="customernumber" ng-model="customerinput" ng-model="customerinput" required>
             <option value="">Customer Name</option>
            <?php 

            if($resultcustomer->num_rows >0)
            while($rowcustomer = $resultcustomer->fetch_assoc())
             {

            ?>
            <option value="<?php echo $rowcustomer["Customer_Number"]?>"><?php echo $rowcustomer["Customer_Name"];?></option>
            <?php
              }
             ?> 
           </select> 
          
          <label for="itemnumber">Item Name</label>
           <select class="form-control" id="itemnumber" name="itemnumber" ng-model="iteminput" requiredid="itemnumber" name="itemnumber" ng-model="iteminput" required>
             <option value="">--Select Items--</option>
            <?php 

            if($resultitem->num_rows >0)
            while($rowitem = $resultitem->fetch_assoc())
             {
                   
            ?>
            <option value="<?php echo $rowitem["Item_Number"]?>"><?php echo $rowitem["Item_Name"]?></option>
            <?php
              }
             ?> 
           </select>
         <label for="itemquantity">Item Quantity</label>
          <input type="decimal" class="form-control" id="itemquantity" name="itemquantity"  ng-model="quantityinput" required>

          <label for="salesprice">Sales Price</label>
          <!--<input type="number" value="" class="form-control" id="salesprice"  name="salesprice" ng-model="priceinput" required>-->

           <select class="form-control" id="salesprice" name="salesprice" ng-model="priceinput"   ng-model="priceinput" required>
             <option value="">Price & Item Name</option>
            <?php 

            if($resultprice->num_rows >0)
            while($rowprice = $resultprice->fetch_assoc())
             {

                   
            ?>
            <option value="<?php echo $rowprice["Sales_Price"]?>"><?php echo $rowprice["Sales_Price"];echo"-"; echo $rowprice["Item_Name"]; ?></option>
            <?php
              }
             ?> 
           </select>
            
            <label for="taxpercentage">Tax Percentage</label>
          <input type="number" class="form-control" id="taxpercentage"  name="taxpercentage" ng-model="taxinput" required> 
            


           <label for="salesdate">Sales Date</label>
          <input type="text" class="form-control" id="salesdate" value=""  name="salesdate" ng-model="salesdate" date-format="YYYY-MM-DD">
  

          <label for="totalamount">Total Amount</label>
          <input type="number" value="{{ (quantityinput * priceinput) + (quantityinput * priceinput * taxinput/100) }}"class="form-control" id="totalamount" name="totalamount" ng-model="amountinput" required>
          
          <hr> 
          <button type="submit" class="btn btn-primary">Add</button>
        </div> <!--End of Form group-->
        </form>          
      </div><!--End Container-->

      <div class="container">
       <h2>Sales Item Detail</h2>
         <p></p>            
          <table class="table table-striped">
           <thead>
             <tr>
               <th>Customer Name</th>
               <th>Item Name</th>
               <th>Item Quantity</th>
               <th>Sales Price</th>
               <th>Date Of Sale</th>
               <th>Total Amount</th>
             </tr>
            </thead>
            <tbody>
            <?php 
            if($result->num_rows >0)
            while($row = $result->fetch_assoc())
             {
             
            ?>
              <tr>
                <td><?php echo $row["Customer_Name"]?></td>
                <td><?php echo $row["Item_Name"]?></td>
                <td><?php echo $row["Item_Quantity"]?></td>
                <td><?php echo $row["Sales_Price"]?></td>
                <td><?php echo $row["Sales_Date"]?></td>
                <td><?php echo $row["Total_Amount"]?></td>
                <td><button type="Submit" class="btn btn-primary">Edit</button></td>
                <td><button type="Submit" class="btn btn-primary">Delete</button></td>
             
                
              </tr>
             <?php
              }
             ?> 
             </tbody>
          </table>
        </div><!--End Container-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> 
  </body>
</html>