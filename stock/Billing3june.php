<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> </title>

    

  </head>
  <?php
     include("classes/functions.php");
     include('menutest.php');
     $sqlselect="select Item_Number,Item_Name from itemdetails";

     $result=mysqli_query($dbcon,$sqlselect);


      
   ?>
    <hr>
    <hr>
   <body>

            <div class="container">
               <br>
               <br>
               <div class="form-group">
                  
                      <form name="add_name" id="add_name">
                       <table class="table table-bordered" id="">
                          <tr>
                             <label for="billnumber">Bill Number</label>
                             <input type="text" id="billnumber" name="billnumber" class="form-control name_list">
                          </tr>

                          <tr>
                             <label for="customerdate">Sales Date</label>
                             <input type="text" id="salesdate" name="salesdate" class="form-control name_list">
                          </tr>

                         <tr>
                             <label for="customername">Customer Name</label>
                             <input type="text" class="form-control name_list" id="customername" name="customername" required>
                          </tr>
                          <tr>
                             <label for="customercontact">Customer Contact</label>
                             <input type="text" maxlength="10" class="form-control name_list" id="customercontact" name="customercontact">
                             <span id="mobile"></span>
                          </tr>
                     </table>
                     
                    
                    
                      <table id="TextBoxesGroup">
                       <tr>
                           <td colspan="4"><label for="productname">Product Name</label></td>
                        </tr>
                       <tr>
                           <!--<td><input placeholder="Item Code" name="data[0][0]" class="itmcode" /></td>-->
                            <!--<td><input type="text" name="productname[]" id="productname" placeholder="Product Name" class="form-control name_list" /></td>-->
                            <!--<td><input name="data[0][2]" placeholder="Item Description" /></td>-->
                            <td><select class="form-control" id="productid" name="productid[]">       
                                 <option value="">Product Name</option>
                                  <?php 

                                    if($result->num_rows >0)
                                    while($row = $result->fetch_assoc())
                                     {
                                           
                                    ?>
                              <option value="<?php echo $row["Item_Number"];?>"><?php echo $row["Item_Name"];?></option>
                                    <?php
                                     }
                                   ?> 
                              </select></td>
                            <td><input type="text" data-field="price" name="price[]" id="price" placeholder="Item Amount" class="form-control name_list itmamnt" /></td>
                            <td><input type="text" data-field="quantity" name="quantity[]" id="quantity" placeholder="Item Quantity" class="form-control name_list itmqty" /></td>
                       <td><input type="text" data-field="total" name="mytotal[]" id="mytotal" placeholder="Item Total" class="form-control name_list" /></td>
                       <td><input type="button" class="btn btn-primary" id="addButton" value=" Add Row"/></td>
                        </tr>

                      </table>
                    
                     
                       <!--<h2>Total Cost: &pound;<span id="total">0.00</span></h2>-->     
                        <table class="table table-bordered" id="">
                        <tr colspan="4"><h4>Sub Total: <span id="total" class="total">0.00</span></h4></tr>
                        <!-- <tr>
                             <label for="subtotal">Sub Total</label>-->
                             
                             <!--<input type="text" class="form-control name_list" id="total" name="total">
                          </tr>-->
                         <tr>
                             <label for="tax">Vat Tax</label>
                             <input data-field="tax" type="text" value="0" class="form-control name_list" id="tax" name="tax">
                          </tr>
                          <tr>
                             <label for="totalamount1">Total Amount</label>
                             <input data-field="totalamount1" type="text" class="form-control name_list" id="totalamount1" name="totalamount1">
                          </tr>
                          <tr>
                             <label for="discount">Discount</label>
                            <input type="text" data-field="discount" value="0" class="form-control name_list" id="discount" name="discount">
                          </tr>
                           <tr>
                             <label for="grandtotal">Grand Total</label>
                            <input type="text" data-field="grandtotal" class="form-control name_list" id="grandtotal" name="grandtotal">
                          </tr>
                        </table>
                        <span id="saved" style="display:none;font-size:1em;font-family:lato;font-weight: 600">Yor Record Has Been Saved</span>
                     <input type="button" name="submit" class="btn btn-primary" id="submit" value="Submit">
                     <a  class="btn btn-primary remove_fields" style="float: right" href="http://localhost/stock/orders.php">View Orders</a>

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
              
              $(document).on('keyup', "*[data-field='quantity'],*[data-field='price'],*[data-field='tax'],*[data-field='discount']", function(e){
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
                  var tax = parseFloat($("#tax").val());
                  $("#totalamount1").val((total+(total*tax/100)).toFixed(2));
                  
                  var discount=0; 
                  var discount = parseInt($("#discount").val());
                  $("#grandtotal").val((total+(total*tax/100)-discount).toFixed(2));

                  
              });


              $("#productid").change(function()
                  {
                    var itemnameval=parseInt($("#productid").val());
                    $("#rate").val(itemnameval); 
                  }                 
                 );
             
             

            $('#submit').click(function()
             {
                

                $.ajax({
                  
                   url:"insertBilling.php",
                   method:"POST",
                   data:$('#add_name').serialize(),
                   success:function(data)
                   {
                    
                    //$('#saved').show();
                    alert(data);
                 $('#add_name')[0].reset();
                   }
                });
             });


            $(function() {

               $("#salesdate").datepicker();
         
             });

          });

    </script>


            


     
      
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  