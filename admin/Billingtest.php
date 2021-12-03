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
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
     </script>
     

      <script>
           $(document).ready(function(){
            var i=1;
             
             
                 $("#add_row").click(function(){
                  
                  
                  $('#addr').html("<td>"+ (i+1) +"</td><td><input name='productname"+i+"' id='productname"+i+"' type='text' placeholder='Product Name' class='form-control input-md'/> </td><td><input  name='quantity"+i+"' type='text' placeholder='Quantity'  class='form-control input-md'></td><td><input  name='rate"+i+"' type='text' placeholder='Rate'  class='form-control input-md'></td><td><input  name='rate"+i+"' type='text' placeholder='Rate'  class='form-control input-md'></td>");
             
                  $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
                  i++; 
               });
         
            
             $("#delete_row").click(function(){
               if(i>1){
             $("#addr"+(i-1)).html('');
             i--;
             }
           });

        });

        
        
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
            <div class="container">
              <div class="row clearfix">
              <div class="col-md-12 column">
                <table class="table table-bordered table-hover" id="tab_logic">
                  <thead>
                    <tr >
                      <th class="text-center">
                        S.No.
                      </th>
                      <th class="text-center">
                        Product Name
                      </th>
                      <th class="text-center">
                        Quantity
                      </th>
                      <th class="text-center">
                        Rate
                      </th>
                      <th class="text-center">
                        Total
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id='addr0'>
                      <td>
                      1
                      </td>
                      <td>
                      <input type="text" name='productname0'  placeholder='Product Name' class="form-control"/>
                      </td>
                      <td>
                      <input type="text" name='quantity0' placeholder='quantity' class="form-control"/>
                      </td>
                      <td>
                      <input type="text" name='rate0' placeholder='Rate' class="form-control"/>
                      </td>
                      <td>
                      <input type="text" name='total' placeholder='Total' class="form-control"/>
                      </td>
                    </tr>
                              <tr id='addr1'></tr>
                  </tbody>
                </table>
              </div>
            </div>
            <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
          </div>
 
        </form>          
      
      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> 
  </body>
</html>