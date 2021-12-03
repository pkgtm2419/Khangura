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

          

      $sqlselect="Select Employee_Name,Mobile_Number,Designation,Salary,Date_Of_Joining from employee";

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
                <th>Mobile Number</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>Date Of Joining</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Employee Name</th>
                <th>Mobile Number</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>Date Of Joining</th>
            </tr>
        </tfoot>
        <tbody>
            <?php if($result->num_rows >0)
           while($row = $result->fetch_assoc())
            {
             
            ?>
              <tr id="row"">
                <td><?php echo $row["Employee_Name"]?></td>
                <td><?php echo $row["Mobile_Number"]?></td>
                <td><?php echo $row["Designation"]?></td>
                <td><?php echo $row["Salary"]?></td>
                <td><?php echo $row["Date_Of_Joining"]?></td>
                <!--<td><a class="btn btn-primary" href="http://localhost/stock/deleteOrder.php?OrderId=<?php echo $row["Order_Id"]?>">Delete</a></td>
                <td><a class="btn btn-primary" href="http://localhost/stock/invoice.php?OrderId=<?php echo $row["Order_Id"]?>">Generate Invoice</a></td>-->
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