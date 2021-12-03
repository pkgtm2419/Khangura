<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> </title>

    <!-- Bootstrap -->
     
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
       
 
  </head>
  <body>
  <?php include 'menutest.php'?>
   <?php
   
   include("classes/functions.php");

     if($_SERVER["REQUEST_METHOD"] == "POST") 
      {

         
         $purchasenumber = mysqli_real_escape_string($dbcon,$_POST['purchasenumber']);
         $suppliernumber = mysqli_real_escape_string($dbcon,$_POST['suppliernumber']);
         $itemnumber = mysqli_real_escape_string($dbcon,$_POST['itemnumber']);
         $purchasequantity = mysqli_real_escape_string($dbcon,$_POST['purchasequantity']);
         $purchaseprice = mysqli_real_escape_string($dbcon,$_POST['purchaseprice']);
         $salesprice = mysqli_real_escape_string($dbcon,$_POST['salesprice']);
         $date = mysqli_real_escape_string($dbcon,$_POST['purchasedate']);
         //$salesprice = mysqli_real_escape_string($dbcon,$_POST['salesprice']);

         $notes = mysqli_real_escape_string($dbcon,$_POST['notes']);
         $totalpayment = mysqli_real_escape_string($dbcon,$_POST['totalpayment']);
         

        $date = explode('/',$date);
        $string="$date[2]/$date[0]/$date[1]";
        $purchasedate=date("Y-m-d",strtotime($string));  
        
    
         
         /* Insert Deatisl in Purchase Table */

        $sqlinsert="insert into Purchase(purchase_number,Item_Number,Item_Name,Purchase_Quantity,Purchasing_Price,Sales_Price,purchase_date,Supplier_Number,notes,Total_Payment) values('".$purchasenumber."','".$itemnumber."','TestItem',".$purchasequantity.",".$purchaseprice.",".$salesprice.",'".$purchasedate."',
        '".$suppliernumber."','".$notes."',".$totalpayment.")";

          if(mysqli_query($dbcon, $sqlinsert))
          {
            echo "New records created Successfully";
          }
          else
          {
           echo "Error:".$sqlinsert."<br>".mysqli_error($dbcon); 
          }
        


       

       /* Insert Item details in stockdetails Table*/

    $stockinsert="insert into stockdetails(Item_Number,Item_Quantity,Purchase_Price,Sales_Price,Total_Price,Stock_type,Date) values(".$itemnumber.",".$purchasequantity.",".$purchaseprice.",".$salesprice.",".$totalpayment.",'New','".$purchasedate."')";

         if(mysqli_query($dbcon, $stockinsert))
          {
            echo "New records created Successfully";
          }
          else
          {
           echo "Error:".$stockinsert."<br>".mysqli_error($dbcon); 
          }
        
        } 
      
       /* Query for showing purchase detail*/
       $sqlselect="select itemdetails.Item_Name as Item_Name,purchase.Purchase_Quantity as Purchase_Quantity,purchase.purchase_id as purchase_id,purchase.Purchasing_Price as Purchasing_Price,purchase.Sales_Price as Sales_Price,purchase.purchase_number as purchase_number,purchase.purchase_date as purchase_date,purchase.Supplier_Number as Supplier_Number,purchase.notes as notes,purchase.Total_Payment as Total_Payment,supplier.Supplier_Name from itemdetails Inner join purchase on purchase.Item_Number=itemdetails.Item_Number INNER join supplier on purchase.Supplier_Number=supplier.Supplier_Number";

       $result=mysqli_query($dbcon,$sqlselect);

       
        /* Query for Totals*/
       $sqlTotal="SELECT sum(Purchase_Quantity) as Total_Quantity,sum(Purchasing_Price) as Total_Purchase_Price,sum(Sales_Price) as Total_Sales_Price from purchase";

        $toatlresult=mysqli_query($dbcon,$sqlTotal);


        /* Query for item details*/
        $sqlItem="select Item_Number,Item_Name from itemdetails";
        $resultitem=mysqli_query($dbcon,$sqlItem);


        /* Query for Supplier details*/
        $sqlsupplier="select Supplier_Number,Supplier_Name from supplier";
        $resultsupplier=mysqli_query($dbcon,$sqlsupplier);
      
   ?>
  

     <hr>
     <div class="container">
       <h2>Purchase details</h2>
       <form action="" method="post" name="purchaseform">
          <div class="form-group">
          <label for="purchasenumber">Purchase Number</label>
          <input type="text" class="form-control" name="purchasenumber" id="purchasenumber" placeholder="purchase-00000">
          


          <label for="itemname">Item Name</label>
          
          <!--<input type="text" class="form-control" name="itemname" id="itemname" placeholder="Item Name" ng-model="iteminput" required>-->
           
           <select class="form-control" id="itemnumber" name="itemnumber">
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
       
          <label for="purchasequantity">Purchase Quantity</label>
          <input type="text" class="form-control" name="purchasequantity" id="purchasequantity" placeholder="Number of Items">


          <label for="purchaseprice">Purchase Price</label>
         <input type="text" class="form-control" name="purchaseprice" id="purchaseprice" placeholder="">


         <label for="purchasenumber">Sales Price</label>
        <input type="text" class="form-control" name="salesprice" id="purchasequantity" placeholder="" >

          
          <label for="purchasedate">Purchase Date</label>
      <input type="text" name="purchasedate" id="purchasedate" class="form-control">
          
         
          <label for="suppliername">Supllier Name</label>
          <!--<input type="text" class="form-control" name="suppliername" id="suppliername" placeholder="Third Supplier" ng-model="supplierinput" required>-->

          
        <select class="form-control" id="suppliernumber" name="suppliernumber">
             <option value="">--Select Supplier--</option>
            <?php 

            if($resultsupplier->num_rows >0)
            while($rowsupplier = $resultsupplier->fetch_assoc())
             {
          
            ?>
            <option value="<?php echo $rowsupplier["Supplier_Number"]?>"><?php echo $rowsupplier["Supplier_Name"]?></option>
            <?php
              
              }

             ?> 
           </select>



          <label for="purchasenumber">Notes</label>
        <input type="text" class="form-control" name="notes" id="notes" placeholder="Just another Note">

          <label for="purchasenumber">Total Payment</label>
          <input type="text" value="" class="form-control" name="totalpayment" id="totalpayment">
          <hr> 
          <button type="Submit" class="btn btn-primary">Add</button>
        </div> <!--End of Form group-->
        </form>
          
      </div><!--End Container-->

      <div class="container">
      <hr>
       <h2>Purchase Item Details</h2>
         <p></p>            
          <table class="table table-striped">
           <thead>
             <tr>
               <th>Supplier Name</th>
               <th>Item Name</th>
               <th>Purchase Quantity</th>
               <th>Purchasing Price</th>
               <th>Selling Price</th>
               <th>Purchase Date</th>
               <th>Total Payment</th>
             </tr>
            </thead>
            <tbody>
            <?php if($result->num_rows >0)
            while($row = $result->fetch_assoc())
            {
             
            ?>
              <tr id="row"<?php echo $row['purchase_id'];?>">
                <td><?php echo $row["Supplier_Name"]?></td>
                <td><?php echo $row["Item_Name"]?></td>
                <td><?php echo $row["Purchase_Quantity"]?></td>
                <td><?php echo $row["Purchasing_Price"]?></td>
                <td><?php echo $row["Sales_Price"]?></td>
                <td><?php echo $row["purchase_date"]?></td>
                <td><?php echo $row["Total_Payment"]?></td>
                <td><a class="btn btn-primary remove_fields" href="http://localhost/stock/purchaseEdit.php?purchaseid=<?php echo $row["purchase_id"]?>">Edit</a></td>
                <td><a class="btn btn-primary remove_fields" href="http://localhost/stock/purchaseDelete.php?purchaseid=<?php echo $row["purchase_id"]?>">Delete</a></td>
              </tr>
              <?php
              } 
              ?>
            <?php if($toatlresult->num_rows >0)
            while($totalrow = $toatlresult->fetch_assoc())
            {
             
            ?>
              <tr>
                <th>Total</th>
                <td></td>
                <td><?php echo $totalrow["Total_Quantity"]?></td>
                <td><?php echo $totalrow["Total_Purchase_Price"]?></td>
                <td><?php echo $totalrow["Total_Sales_Price"]?></td>
               </tr>
              <?php
              } 
              ?>
             </tbody>
          </table>
        </div><!--End Container-->

  </body>
  <script>
         $(function() {

            $( "#purchasedate" ).datepicker();
         
         });

  </script>
</html>