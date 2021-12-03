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
                             <input type="text" id="employeename" name="employeename" class="form-control name_list">
                          </tr>
                          <tr>
                             <label for="mobilenumber">Mobile Number</label>
                             <input type="text" id="mobilenumber" name="mobilenumber" maxlength="10" class="form-control name_list">
                          </tr>
                          <tr>
                             <label for="designation">Designation</label>
                             <input type="text" id="designation" name="designation" class="form-control name_list">
                          </tr>
                          <tr>
                             <label for="salary">Salary</label>
                             <input type="text" id="salary" name="salary" class="form-control name_list">
                          </tr>
  
                          
                          <tr>
                             <label for="dateofjoining">Date Of Joining</label>
                             <input type="text" id="dateofjoining" name="dateofjoining" class="form-control name_list">
                          </tr>

                     </table>
                    
                  <input type="button" name="submit" class="btn btn-primary" id="submit" value="Add Employee">
                  <a  class="btn btn-primary remove_fields" style="float: right" href="http://localhost/stock/EmployeeDetails.php">View Employees</a>

                   
                  </form>

               

            </div>
  
        </form>          
  </body>
</html>
   

   <script>
        
         $(document).ready(function(){
              
            $('#submit').click(function()
             {
               $.ajax({
                  
                   url:"insertEmployee.php",
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

               $("#dateofjoining").datepicker();
         
             });

          });

    </script>


            


     
      
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  