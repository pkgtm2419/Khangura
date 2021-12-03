<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.validate.min.js"></script> 
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
      
      
      <script type="text/javascript" language="javascript">
        


        $(document).ready(function()
        {
            $("#totalamount").click(function(){
                var quantityval=parseInt($("#itemquantity").val());
                var priceval=parseInt($("#salesprice").val());
                var taxper=parseInt($("#taxpercentage").val());
                
                $("#totalamount").val((quantityval * priceval)+(quantityval * priceval*taxper/100));
            });
        });


         $(document).ready(function()
             {
                $("#itemname").change(function()
                  {
                    var itemnameval=parseInt($("#itemname").val());
                    $("#salesprice").val(itemnameval); 
                  }
                  
                  ); 

             } 

          );

 </script>



  
  </head>
  <body>
  <?php 
     //include("menu.php");
   
     include("classes/functions.php");

      

     $sqlprice ="SELECT purchase.Sales_Price as Sales_Price,itemdetails.Item_Name as Item_Name,
     purchase.Item_Number as Item_Number from itemdetails inner JOIN purchase on purchase.Item_Number=itemdetails.Item_Number group by Item_Number";

     $resultprice=mysqli_query($dbcon,$sqlprice);   
     
      

      if($_SERVER["REQUEST_METHOD"] == "POST") 
      {

         
         $customername = mysqli_real_escape_string($dbcon,$_POST['customername']);
          $itemname='Item1';
         //$itemname = mysqli_real_escape_string($dbcon,$_POST['itemname']);
         $itemquantity = mysqli_real_escape_string($dbcon,$_POST['itemquantity']);
         $salesprice = mysqli_real_escape_string($dbcon,$_POST['salesprice']);
         $taxpercentage = mysqli_real_escape_string($dbcon,$_POST['taxpercentage']);
         $salesdate = mysqli_real_escape_string($dbcon,$_POST['salesdate']);
         $totalamount = mysqli_real_escape_string($dbcon,$_POST['totalamount']);
         $discount = mysqli_real_escape_string($dbcon,$_POST['discount']);
         
         
    
        /* Insert details in sales Table*/

         echo $sqlinsert="insert into billing(Customer_Name,Item_Name,Item_Quantity,Sales_Price,Tax_Percentage,Discount,Sales_Date,Total_Amount) values('".$customername."','".$itemname."',".$itemquantity.",".$salesprice.",".$taxpercentage.",".$discount.",".$salesdate.",".$totalamount.")";
         
         

         if(mysqli_query($dbcon, $sqlinsert))
          {
            echo "New records created Successfully";
          }
          else
          {
           echo "Error:".$sqlinsert."<br>".mysqli_error($dbcon); 
          }
       }

       $sqlselect="Select Customer_Name,Item_Name,Item_Quantity,Sales_price,Tax_Percentage,Discount,Sales_Date,Total_Amount from billing";

       $result=mysqli_query($dbcon,$sqlselect);

  ?>

    <hr>
    <hr>
    <form action="Billing.php" method="post" id="register-form" novalidate="novalidate">
     <div class="container">
       <h2>Billing Details</h2>
       

        <div class="form-group">
          
          <label for="customername">Customer Name</label>
         <input type="text" class="form-control" id="customername" name="customername"> 
      
          <label for="itemnumber">Item Name</label>
           <select class="form-control" id="itemname" name="itemname">
           
           <option value="">Price & Item Name</option>
            <?php 

              if($resultprice->num_rows >0)
              while($rowprice = $resultprice->fetch_assoc())
               {

                     
              ?>
              <option value="<?php echo $rowprice["Sales_Price"];?>"><?php echo $rowprice["Sales_Price"];echo"-"; echo $rowprice["Item_Name"]; ?></option>
              <?php
                }
             ?> 
           </select>
         
         <label for="itemquantity">Item Quantity</label>
          <input type="text" class="form-control" id="itemquantity" name="itemquantity">

          <label for="salesprice">Sales Price</label>
             <input type="text" class="form-control" id="salesprice" name="salesprice">
            
         <label for="taxpercentage">Tax Percentage</label>
          <input type="text" class="form-control" id="taxpercentage"  name="taxpercentage" > 
           
          <label for="taxpercentage">Discount</label>
          <input type="text" class="form-control" id="discount"  name="discount" > 
        
          

          <label for="salesdate">Sales Date</label>
          <input type="text" class="form-control" id="salesdate" name="salesdate">
  

          <label for="totalamount">Total Amount</label>
          <input type="text" class="form-control" id="totalamount" name="totalamount">
          
          <hr> 
          <button type="submit" id="btn1" class="btn btn-primary">Add</button>
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
             <?php 
            if($result->num_rows >0)
            while($row = $result->fetch_assoc())
             {
             
            ?>
              <tr>
                <td><?php echo $row["Customer_Name"]?></td>
                <td><?php echo $row["Item_Name"]?></td>
                <td><?php echo $row["Item_Quantity"]?></td>
                <td><?php echo $row["Sales_price"]?></td>
                <td><?php echo $row["Sales_Date"]?></td>
                <td><?php echo $row["Total_Amount"]?></td>
                <td><button type="Submit" class="btn btn-primary">Edit</button></td>
                <td><button type="Submit" class="btn btn-primary">Delete</button></td>
                
              </tr>
             <?php
              }
             ?>
            <tbody>
             </tbody>
          </table>
        </div><!--End Container-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> 
  </body>
</html>