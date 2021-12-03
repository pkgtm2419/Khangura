<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> </title>
      <style type="text/css">
        tfoot input {
              width: 100%;
              padding: 3px;
              box-sizing: border-box;
              font-size: 12px;
          }
      </style>

    
    <!-- Bootstrap -->
     
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   <?php include("menutest.php");
   
     include("classes/functions.php");

     if($_SERVER["REQUEST_METHOD"] == "POST") 
      {

         
       $suppliernumber = mysqli_real_escape_string($dbcon,$_POST['suppliernumber']);
       $suppliername = mysqli_real_escape_string($dbcon,$_POST['suppliername']);
       $phonenumber = mysqli_real_escape_string($dbcon,$_POST['phonenumber']);
     
        
       $sqlinsert="insert into supplier(Supplier_Number,Supplier_Name,Phone_Number) values(".$suppliernumber.",'".$suppliername."','".$phonenumber."')";

         if(mysqli_query($dbcon, $sqlinsert))
          {
            echo "New records created Successfully";
          }
          else
          {
           echo "You Have Entered Duplicate Value"; 
          }   
     }

     

     $sqlselect="select purchase.Purchase_Number as Purchase_Number,supplier.Supplier_Name as Supplier_Name,supplier.Phone_Number as Phone_Number,purchase.Purchase_Date,purchase.Tax as Tax,purchase.Total_Amount as Total_Amount,purchase.Paid_Amount as Paid_Amount,purchase.Unpaid_Amount as Unpaid_Amount from purchase INNER join supplier on purchase.Supplier_Number=supplier.Supplier_Number";

     $result=mysqli_query($dbcon,$sqlselect);
     

   ?>
  <body ng-app="">
 
    <div class="container" ng-app="">
    <hr>
    <hr>
       <h2>Supplier Details</h2>
       <form action="" method="post" name="supplierform">


          <label for="customernumber">Supplier Number</label>
          <input type="text" class="form-control" id="suppliernumber"  name="suppliernumber" ng-model="supplierinput" required>
  

          <label for="suppliername">Supplier Name</label>
          <input type="text" class="form-control" id="suppliername" name="suppliername" ng-model="suppliername" required>
        
          <label for="phonenumber">Phone Number</label>
          <input type="text" class="form-control" id="phonenumber" name="phonenumber" ng-model="phonenumber" required>
    

          <hr> 
          <button type="submit" class="btn btn-primary">Add</button>

       </form>
    </div> <!--End Container-->


     <div class="container">

       <h2>Supplier Details</h2>
       <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Purchase Number</th>
                <th>Supplier Name</th>
                <th>Supplier Contact</th>
                <th>Tax</th>
                <th>Total Amount</th>
                <th>Paid Amount</th>
                <th>Unpaid Amount</th>
             </tr>
        </thead>
        <tfoot>
             <tr>
                <th>Purchase Number</th>
                <th>Supplier Name</th>
                <th>Supplier Contact</th>
                <th>Tax</th>
                <th>Total Amount</th>
                <th>Paid Amount</th>
                <th>Unpaid Amount</th>
             </tr>
        </tfoot>
        <tbody>
            <?php if($result->num_rows >0)
           while($row = $result->fetch_assoc())
            {
             
            ?>
              <tr id="row"">
                <td><?php echo $row["Purchase_Number"]?></td>
                <td><?php echo $row["Supplier_Name"]?></td>
                <td><?php echo $row["Phone_Number"]?></td>
                <td><?php echo $row["Tax"]?></td>
                <td><?php echo $row["Total_Amount"]?></td>
                <td><?php echo $row["Paid_Amount"]?></td>
                <td><?php echo $row["Unpaid_Amount"]?></td>
              </tr>
             <?php
              } 
             ?>
             
               
        </tbody>
    </table>
 
  </div><!--End Container-->
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
       
  </body>
</html>