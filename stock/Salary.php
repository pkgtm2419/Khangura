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

     $sqlselect="select Employee_Id,Employee_Name,Salary from employee";

     $result=mysqli_query($dbcon,$sqlselect);



   ?>
    <hr>
    <hr>
   <body>

            <div class="container">
               <br>
               <br>
                  
                      <form name="add_name" id="add_name">
                       <table class="table table-bordered" id="">
                          <tr>
                             <label for="employeename">Employee Name</label>
                             <select class="form-control" id="employeeid" name="employeeid">       
                                 <option value="">Employee Name</option>
                                  <?php 

                                    if($result->num_rows >0)
                                    while($row = $result->fetch_assoc())
                                     {
                                           
                                    ?>
                              <option value="<?php echo $row["Salary"].",".$row["Employee_Id"];?>"><?php echo $row["Employee_Name"];?></option>
                                    <?php
                                     }
                                   ?> 
                              </select>
                             <!--<label for="employeename">Employee Name</label>
                             <input type="text" id="employeename" name="employeename" class="form-control name_list">-->
                          </tr>
                          <tr>
                             <label for="actualsalary">Actual Salary</label>
                             <input type="text" id="actualsalary" name="actualsalary" value="0" class="form-control name_list">
                          </tr>
                          <tr>
                             <label for="numberofdays">Number Of days</label>
                             <input type="text" id="numberofdays" name="numberofdays" value="0" class="form-control name_list">
                          </tr>
                          <tr>
                             <label for="workingdays">Number Of Working Days</label>
                             <input type="text" id="workingdays" name="workingdays" value="0" class="form-control name_list">
                          </tr>
  
                          
                          <tr>
                             <label for="advance">Advance If Any</label>
                             <input type="text" id="advance" name="advance" value="0" class="form-control name_list">
                          </tr>

                          <tr>
                             <label for="paidsalary">Paid Salary</label>
                             <input type="text" id="paidsalary" name="paidsalary" value="0"class="form-control name_list">
                          </tr>
                          <tr>
                             <label for="salarydate">Date Of Salary</label>
                             <input type="text" id="salarydate" name="salarydate" class="form-control name_list">
                          </tr>


                     </table>
                    
                  <input type="button" name="submit" class="btn btn-primary" id="submit" value="Create Salary">
                  <a  class="btn btn-primary remove_fields" style="float: right" href="http://localhost/stock/SalaryDetails.php">View Salary</a>

                   
                  </form>

               

            </div>
  
        </form>          
  </body>
</html>
   

   <script>
        
         $(document).ready(function(){


             $("#employeeid").change(function()
                  {
                    var empval=parseInt($("#employeeid").val());
                    parseInt($("#actualsalary").val(empval)); 
                  }                 
               );

             $(document).on('keyup', function(e){

                  var actualsalary=parseFloat($("#actualsalary").val());
                  var numberofdays=parseInt($("#numberofdays").val());
                  var workingdays=parseInt($("#workingdays").val());
                  var advance=parseFloat($("#advance").val());
                  var paidsalary=parseFloat($("#paidsalary").val()).toFixed(2);
                  
                   tatsalary=(actualsalary*workingdays)/numberofdays; 
                   paidsalary=tatsalary-advance;
                
                   $("#paidsalary").val((paidsalary).toFixed(2));   

                      


             });
             
              
            $('#submit').click(function()
             {
               $.ajax({
                  
                   url:"insertSalary.php",
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

               $("#salarydate").datepicker();
         
             });

          });

    </script>


            


     
      
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  