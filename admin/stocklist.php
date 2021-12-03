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

          

      $sqlselect="select Item_Id,Item_Number,Item_Name,Item_Quantity,Purchase_Price,Sales_Price,Total_Price,Date from Itemdetails";

       $result=mysqli_query($dbcon,$sqlselect);

   ?>
  <body>
       <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Item Number</th>
                <th>Item Name</th>
                <th>Item Quantity</th>
                <th>Purchase Price</th>
                <th>Sales Price</th>
                <th>Total Price</th>
                <th>Date</th>
             </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Item Number</th>
                <th>Item Name</th>
                <th>Item Quantity</th>
                <th>Purchase Price</th>
                <th>Sales Price</th>
                <th>Total Price</th>
                <th>Date</th>
            </tr>
        </tfoot>
        <tbody>
            <?php if($result->num_rows >0)
           while($row = $result->fetch_assoc())
            {
             
            ?>
              <tr id="row"">
                <td><?php echo $row["Item_Number"]?></td>
                <td><?php echo $row["Item_Name"]?></td>
                <td><?php echo $row["Item_Quantity"]?></td>
                <td><?php echo $row["Purchase_Price"]?></td>
                <td><?php echo $row["Sales_Price"]?></td>
                <td><?php echo $row["Total_Price"]?></td>
                <td><?php echo $row["Date"]?></td>
              </tr>
             <?php
              } 
             ?>
             
               
        </tbody>
    </table>
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