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
   <?php include("menu.php");
   
     include("classes/functions.php");


     $sqlselect="select Item_Id,Item_Number,Item_Name,Item_Quantity,Purchase_Price,Sales_Price,Total_Price,Date from Itemdetails";

     $result=mysqli_query($dbcon,$sqlselect);
    

   ?>
  <body>
 
    <div class="container">
          <br>
          <br>
          <br>
          <br>
         <h2>Item Details</h2>

       <form action="" method="post" id="stockform" name="stockform">

          <label for="itemnumber">Item Number</label>
          <input type="text" class="form-control" id="itemnumber"  name="itemnumber">
  

          <label for="itemname">Item Name</label>
          <input type="text" class="form-control" id="itemname" name="itemname">
           
          <label for="quantity">Item Quantity</label>
          <input type="text" class="form-control" id="quantity" value="0.00"  name="quantity">
  

          <label for="purchaseprice">Purchase Price</label>
          <input type="text" class="form-control" id="purchaseprice" value="0.00" name="purchaseprice">
          
          <label for="salesprice">Sales Price</label>
          <input type="text" class="form-control" id="salesprice" value="0.00" name="salesprice">
  
          
          <label for="totalprice">Total Price</label>
          <input type="text" class="form-control" id="totalprice" name="totalprice">
           
          <label for="date">Date</label>
          <input type="text" class="form-control" id="date" name="date">
   
          <hr> 
          <button type="button" id="submit" name="submit" class="btn btn-primary">Add</button>

       </form>
    </div> <!--End Container-->


     <div class="container">

       <h2>Item List</h2>
         <p></p>            
          <table class="table table-striped">
           <thead>
            <tr>
               <th>Item Number</th>
               <th>Item Name</th>
               <th>Quantity</th>
               <th>Purchase Price</th>
               <th>Sales Price</th>
               <th>Total_Price</th>
               <th>Date</th>
             </tr>
            </thead>
            <tbody>
           <?php if($result->num_rows >0)
            
            while($row = $result->fetch_assoc())
            {
           ?>
              <tr>
                <td><?php echo $row["Item_Number"];?></td>
                <td><?php echo  $row["Item_Name"];?></td>
                <td><?php echo  $row["Item_Quantity"];?></td>
                <td><?php echo  $row["Purchase_Price"];?></td>
                <td><?php echo  $row["Sales_Price"];?></td>
                <td><?php echo  $row["Total_Price"];?></td>
                <td><?php echo  $row["Date"];?></td>
                <td><a class="btn btn-primary remove_fields" href="http://localhost/stock/deleteStockItem.php?itemid=<?php echo $row["Item_Id"]?>">Delete</a></td>
              </tr>
              <?php
               } 
              ?>
             </tbody>
          </table>
        </div><!--End Container-->
     
     <script>
        
        $(document).ready(function(){ 
             

          $('#submit').click(function()
             {
               
                $.ajax({
                          
                   url:"insertStock.php",
                   method:"POST",
                   data:$('#stockform').serialize(),
                   success:function(data)
                   {
                    
                    //$('#saved').show();
                    alert(data);
                 $('#stockform')[0].reset();
                   }
                });
             });
             
            $(document).on('keyup',function(e)
             {
               var price=parseInt($("#purchaseprice").val());
               var quantity=parseInt($("#quantity").val());
               var total=price*quantity;
               //alert(total);
               $("#totalprice").val(total).toFixed(2);
             });

            
            });

         $(function() {

            $( "#date" ).datepicker();
         
         });

  </script>


     </script>>     

     




    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <!-- Include all compiled plugins (below), or include individual files as needed 
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
       
       
       
  </body>
</html>