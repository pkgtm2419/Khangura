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
    <link href="css/jquery.datetimepicker.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.datetimepicker.full.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
  </head>
    
  <body>
  <?php
     include("classes/functions.php");
     
     $sqlselect="select purchase.Sales_Price,itemdetails.Item_Name,itemdetails.Item_Number from purchase INNER join itemdetails on purchase.Item_Number=itemdetails.Item_Number";

      $result=mysqli_query($dbcon,$sqlselect);      

   ?>
 
            <div class="container">
               <br>
               <br>
               <div class="form-group">
                  <form name="add_name" id="add_name" method="POST">
                      
                       <table class="table table-bordered" id="">
                          <tr>
                             <label for="customerdate">Sales Date</label>
                             <input type="text" id="salesdate" name="salesdate" class="form-control name_list">
                          </tr>

                         <tr>
                             <label for="customername">Customer Name</label>
                             <input type="text" class="form-control name_list" id="customername" name="customername">
                          </tr>
                          <tr>
                             <label for="customercontact">Customer Contact</label>
                             <input type="text" class="form-control name_list" id="customercontact" name="customercontact">
                          </tr>
                        </table>
                      <table class="table table-bordered" id="dynamic_field">
                          
                          <tr>
                             <label for="customercontact">Enter Product</label>
                             <!--<td><input type="text" name="productname[]" id="productname" placeholder="Enter Name" class="form-control name_list"></td>-->
                             <td>
                               <select class="form-control" id="productname[]" name="productname[]">       
                                 <option value="">Price & Item Name</option>
                                  <?php 

                                    if($result->num_rows >0)
                                    while($row = $result->fetch_assoc())
                                     {
                                           
                                    ?>
                                    <option value="<?php echo $row["Sales_Price"];?>"><?php echo $row["Sales_Price"]; echo"-"; echo $row["Item_Name"];?></option>
                                    <?php
                                      }
                                   ?> 
                                 </select>

                             </td>
                             <td><input type="text" name="quantity[]" id="quantity" placeholder="Enter quantity" class="form-control name_list"></td>
                             <td><input type="text" name="rate[]" id="rate" placeholder="Enter Rate" class="form-control name_list"></td>
                             <td><input type="text" name="total[]" id="total" placeholder="Total" class="form-control name_list"></td>
                           
                             <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>
                          </tr>
                      </table>
                       <table class="table table-bordered" id="">
                         <tr>
                             <label for="subtotal">Sub Total</label>
                             <input type="text" class="form-control name_list" id="subtotal" name="subtotal">
                          </tr>
                         <tr>
                             <label for="tax">Vat Tax</label>
                             <input type="text" class="form-control name_list" id="tax" name="tax">
                          </tr>
                          <tr>
                             <label for="totalamount">Total Amount</label>
                             <input type="text" class="form-control name_list" id="totalamount1" name="totalamount1">
                          </tr>
                          <tr>
                             <label for="discount">Discount</label>
                            <input type="text" class="form-control name_list" id="discount" name="discount">
                          </tr>
                           <tr>
                             <label for="grandtotal">Grand Total</label>
                            <input type="text" class="form-control name_list" id="grandtotal" name="grandtotal">
                          </tr>
                        </table>

                     <input type="button" name="submit" id="submit" value="Submit">
                  </form>

               </div>

            </div>
            
          
 
        </form>          
  </body>
</html>
    <script>

  
     /*Startt Script for add rows */ 
       
      $(document).ready(function()
        {
         
   
    html="<select class='form-control' id='productname[]' name='productname[]'>option value=''>Price & Item Name</option>";
    alert(html);         
          var i = 0;
          var mytotal=0;
          $('#add').click(function()
            {
               i++;
               $('#dynamic_field').append('<tr id="row'+ i +'"><td><input type="text" name="productname[]" id="productname" class="form-control name_list"></td><td><input type="text" name="quantity[]" id="cquantity" class="form-control name_list"></td><td><input type="text" name="rate[]" id="crate" class="form-control name_list"></td><td><input type="text" name="total[]" value='+ mytotal+' id="ctotal" class="form-control name_list "></td><td><button name="remove" id="'+ i +'" class="btn btn-danger" btn_remove">X</button></td></tr>');
            });
           $(document).on('click','.btn_remove',function()
           {
             var button_id = $(this).attr("id");
             $('#row' + button_id + '').remove();
           });
            
           $('#submit').click(function()
             {
                $.ajax({
                  
                   url:"insertBilling.php",
                   method:"POST",
                   data:$('#add_name').serialize(),
                   success:function(data)
                   {
                    alert(data);
                    $('#add_name')[0].reset();
                   }
                });
             });


            $(document).on('keyup', "*[data-field='quantity'],*[data-field='price']", function(e){
                  var thisRow = $(this).parents("tr:first");
                  var rowTotalField = thisRow.find("*[data-field='total']");
                  var price = parseFloat(thisRow.find("*[data-field='price']").val());
                  var quantity = parseInt(thisRow.find("*[data-field='quantity']").val());
                  rowTotalField.val("\u00A3" + (!isNaN(price) && !isNaN(quantity) ?
                                 price*quantity : 0).toFixed(2));
                  
                  var total = 0;
                  table.find("*[data-field='total']").each(function(){
                      var t = parseFloat($(this).val().replace("£", ""));
                      total += !isNaN(t) ? t : 0;
                  });
                  $("#total").text(total.toFixed(2));
                  
              });


         
        });

  /*End Script for add rows */ 
    

    </script>

      
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  