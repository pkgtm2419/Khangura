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
                  
                      
                      
                      

                      <form name="add_name" id="add_name">
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
                     
                    
                    
                      <table id="TextBoxesGroup">
                       <tr>
                           <td colspan="4"><label for="productname">Product Name</label></td>
                        </tr>
                       <tr>
                           <!--<td><input placeholder="Item Code" name="data[0][0]" class="itmcode" /></td>-->
                            <td><input type="text" name="productname[]" id="productname" placeholder="Product Name" class="form-control name_list" /></td>
                            <!--<td><input name="data[0][2]" placeholder="Item Description" /></td>-->
                            <td><input type="text" data-field="price" name="price[]" id="price" placeholder="Item Amount" class="form-control name_list itmamnt" /></td>
                            <td><input type="text" data-field="quantity" name="quantity[]" id="quantity" placeholder="Item Quantity" class="form-control name_list itmqty" /></td>
                       <td><input type="text" data-field="total" name="mytotal[]" id="mytotal" placeholder="Item Total" class="form-control name_list" /></td>
                       <td><input type="button" class="btn btn-primary" id="addButton" value=" Add Row"/></td>
                        </tr>

                      </table>
                    
                     
                       <!--<h2>Total Cost: &pound;<span id="total">0.00</span></h2>-->     
                        <table class="table table-bordered" id="">
                        <tr colspan="4"><h4>Sub Total: <span id="total">0.00</span></h4></tr>
                        <!-- <tr>
                             <label for="subtotal">Sub Total</label>-->
                             
                             <!--<input type="text" class="form-control name_list" id="total" name="total">
                          </tr>-->
                         <tr>
                             <label for="tax">Vat Tax</label>
                             <input data-field="tax" type="text" class="form-control name_list" id="tax" name="tax">
                          </tr>
                          <tr>
                             <label for="totalamount1">Total Amount</label>
                             <input data-field="totalamount1" type="text" class="form-control name_list" id="totalamount1" name="totalamount1">
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
        
          $(document).ready(function(){
              
              var table = $("#TextBoxesGroup");
              var row = table.find("tr").eq(1);
              var count = 0;
              
              $("#addButton").click(function(e){
                  if (table.find("tr").length >= 10){
                      alert("Maximum of 10 rows");
                      return;
                  }
                  var newRow = row.clone();
                  var regex = new RegExp("data\[[0-9]+\]", "g");
                  newRow.html(newRow.html().replace(regex, "data[" + (++count) + "]"));
                  table.append(newRow);
              });
              
              $(document).on('keyup', "*[data-field='quantity'],*[data-field='price']", function(e){
                  var thisRow = $(this).parents("tr:first");
                  var rowTotalField = thisRow.find("*[data-field='total']");
                  var price = parseFloat(thisRow.find("*[data-field='price']").val());
                  var quantity = parseInt(thisRow.find("*[data-field='quantity']").val());
                  rowTotalField.val("" + (!isNaN(price) && !isNaN(quantity) ?
                                 price*quantity : 0).toFixed(2));
                  
                  var total = 0;
                  table.find("*[data-field='total']").each(function(){
                      var t = parseFloat($(this).val().replace("£", ""));
                      total += !isNaN(t) ? t : 0;
                  });

                  var tax=0;
                  $("#total").text(total.toFixed(2));
                  var tax = parseInt($("#tax").val());
                  //alert("rajesh"+tax);
                  //var number = parseInt($(this).find('.number').text(), 10);
                  $("#totalamount1").val((total*tax/100).toFixed(2));
                  
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

          });

    </script>


            


     
      
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  