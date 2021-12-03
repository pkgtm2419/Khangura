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
  <body>
  <?php include 'menutest.php'?>
   <?php
   
   include("classes/functions.php");
      
       /* Query for showing purchase detail*/
       $sqlselect="Select bill_number, Client_Name,Order_Id, Client_Contact,Tax,Total_Amount,Discount,Grand_Total,Sales_Date from billing_details order by Sales_Date desc";

       $result=mysqli_query($dbcon,$sqlselect);

          
   ?>
  
 <hr>
  <div class="container">
   <form action="" method="post" name="purchaseform">

      <div class="container">
      <hr>
       <h2>Order Details</h2>
         <p></p>            
          <table class="table table-striped">
           <thead>
             <tr>
               
               <th>Bill Number</th>
               <th>Client Name</th>
               <th>Client Contact</th>
               <th>Tax</th>
               <th>Total Amount</th>
               <th>Discount</th>
               <th>Grand Total</th>
               <th>Sales Date</th>
             </tr>
            </thead>
            <tbody>
            <?php if($result->num_rows >0)
           while($row = $result->fetch_assoc())
            {
             
            ?>
              <tr id="row"">
                <td><?php echo $row["bill_number"]?></td>
                <td><?php echo $row["Client_Name"]?></td>
                <td><?php echo $row["Client_Contact"]?></td>
                <td><?php echo $row["Tax"]?></td>
                <td><?php echo $row["Total_Amount"]?></td>
                <td><?php echo $row["Discount"]?></td>
                <td><?php echo $row["Grand_Total"]?></td>
                <td><?php echo $row["Sales_Date"]?></td>
 
                <td><a class="btn btn-primary remove_fields" href="http://localhost/stock/deleteOrder.php?OrderId=<?php echo $row["Order_Id"]?>">Delete</a></td>
                <td><a class="btn btn-primary remove_fields" href="http://localhost/stock/invoice.php?OrderId=<?php echo $row["Order_Id"]?>">Generate Invoice</a></td>
              </tr>
              <?php
              } 
              ?>
            
            </tbody>
          </table>
        </div><!--End Container-->

   
    

        <script>

             //$("#purchasedate").datetimepicker();
             //alert("Rajesh");
                
       </script>

  </body>
</html>