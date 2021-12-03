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
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <style type="text/css">
          form{
              margin: 20px 0;
          }
          form input, button{
              padding: 5px;
          }
          table{
              width: 100%;
              margin-bottom: 20px;
          border-collapse: collapse;
          }
          table, th, td{
              border: 1px solid #cdcdcd;
          }
          table th, table td{
              padding: 10px;
              text-align: left;
          }
      </style>
      <script type="text/javascript">
          $(document).ready(function(){
              $(".add-row").click(function(){
                  var productname = $("#productname").val();
                  var quantity = $("#quantity").val();
                  var rate = $("#rate").val();
                  var total = quantity * rate;
                  var markup = "<tr><td><input type='checkbox' id='record'></td><td>" + productname + "</td><td>" + quantity + "</td><td>" + rate + "</td><td>" + total + "</td></tr>";
                  $("table tbody").append(markup);
                   
                   
                  

              });
              
              // Find and remove selected table rows
              $(".delete-row").click(function(){
                  $("table tbody").find('input[name="record"]').each(function(){
                    if($(this).is(":checked")){
                          $(this).parents("tr").remove();
                      }
                  });
              });
          });

        $(document).ready(function()
             {
                $("#productname").change(function()
                  {
                    var itemnameval=parseInt($("#productname").val());
                    $("#rate").val(itemnameval); 
                  }                 
                 ); 

             } 

          );


      </script>  

  </head>
    <?php
            include("classes/functions.php"); 
        
            $sqlselect="select itemdetails.Item_Name as Item_Name,purchase.Sales_Price as Sales_Price from purchase INNER JOIN itemdetails on itemdetails.Item_Number=purchase.Item_Number";
            $result=mysqli_query($dbcon,$sqlselect);
   

    ?>

  <body>

    <hr>
    <hr>
    <form action="Billing.php" method="post" id="register-form" novalidate="novalidate">
     <div class="container">
       <h2>Billing Details</h2>
       

        <div class="form-group">
         
         <label for="customername">Order Date</label>
         <input type="text" class="form-control" id="orderdate" name="orderdate"> 
       
         
         <label for="customername">Customer Name</label>
         <input type="text" class="form-control" id="customername" name="customername"> 
      
          
         <label for="">Customer Contact</label>
         <input type="text" class="form-control" id="customercontact" name="customercontact">

          <hr> 
          <button type="submit" id="btn1" class="btn btn-primary">Add</button>
        </div> <!--End of Form group-->
        </form>          
      </div><!--End Container-->
      
       <form>
       <div class="container">
             
              <select id="productname" name="productname" style="height:35px;">
               <option value="">Product Name</option>
                <?php 

                  if($result->num_rows >0)
                  while($row = $result->fetch_assoc())
                   {

                  ?>
                  <option value="<?php echo $row["Sales_Price"]?>"><?php echo $row["Item_Name"];?></option>
                  <?php
                    }
                   ?> 
             </select> 
            <input type="text" id="quantity" placeholder="Quantity">
            <input type="text" id="rate" placeholder="Rate">
            
          <input type="button" class="add-row" value="Add Row">
          
          <table>
              <thead>
                  <tr>
                      <th>Select</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Rate</th>
                      <th>Total</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      
                      
                  </tr>
              </tbody>
          </table>
           <button type="button" class="delete-row">Delete Row</button>

      </div><!--End Container--> 
      </form>

      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> 
  </body>
</html>