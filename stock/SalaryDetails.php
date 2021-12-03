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
<style type="text/css">
  tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>>
 </head>
   <?php include("menutest.php");
   
     include("classes/functions.php");

          

      $sqlselect="select employee.Employee_Name as Employee_Name,salary.Actual_Salary as Actual_Salary,salary.Number_Of_Days as Number_Of_Days,salary.Working_Days as Working_Days,salary.Advance as Advance,salary.Paid_Salary as Paid_Salary,salary.Salary_Created_Date as Salary_Created_Date from salary INNER join employee on employee.Employee_Id=salary.Employee_ID";

       $result=mysqli_query($dbcon,$sqlselect);

   ?>
  <body>
     <br>
     <br>
     <br>
      <div class="container">
       <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Actual Salary</th>
                <th>Number Of Days</th>
                <th>Working Days</th>
                <th>Advance</th>
                <th>Paid Salary</th>
                <th>Created Date</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Employee Name</th>
                <th>Actual Salary</th>
                <th>Number Of Days</th>
                <th>Working Days</th>
                <th>Advance</th>
                <th>Paid Salary</th>
                <th>Created Date</th>
            </tr>
        </tfoot>
        <tbody>
            <?php if($result->num_rows >0)
           while($row = $result->fetch_assoc())
            {
             
            ?>
              <tr id="row"">
                <td><?php echo $row["Employee_Name"]?></td>
                <td><?php echo $row["Actual_Salary"]?></td>
                <td><?php echo $row["Number_Of_Days"]?></td>
                <td><?php echo $row["Working_Days"]?></td>
                <td><?php echo $row["Advance"]?></td>
                <td><?php echo $row["Paid_Salary"]?></td>
                <td><?php echo $row["Salary_Created_Date"]?></td>
                  
                <!--<td><a  href="http://localhost/stock/deleteOrder.php?OrderId=<?php echo $row["Order_Id"]?>">Delete</a></td>
                <<td><a class="btn btn-primary" href="http://localhost/stock/invoice.php?OrderId=<?php echo $row["Order_Id"]?>">Generate Invoice</a></td>-->
              </tr>
             <?php
              } 
             ?>
             
               
        </tbody>
    </table>
   </div> 
  </body>
    <script>
        $(document).ready(function() {
            

      
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );
         
            // DataTable
            var table = $('#example').DataTable();
         
            // Apply the search
            table.columns().every( function () {
                var that = this;
         
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        } );
    </script>
     

  
</html>