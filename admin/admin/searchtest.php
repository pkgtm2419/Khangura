<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  



  </head>
  <body>
    <?php include("menu.php");
    include("classes/functions.php");

    $keyword=$_POST['get_option'];
    
  $sqlselect="select supplier.Supplier_Name as Supplier_Name,itemdetails.Item_Name as Item_Name,sum(stockdetails.Item_Quantity) as Item_Quantity,stockdetails.Purchase_Price as Purchase_Price,stockdetails.Sales_Price as Sales_Price,customer.Customer_Name as customer_Name from stockdetails left join supplier on supplier.Supplier_Number=stockdetails.Supplier_Number left join customer on customer.Customer_Number=stockdetails.Customer_Number left join itemdetails on stockdetails.Item_Number=itemdetails.Item_Number where supplier.Supplier_Name Like '%".$keyword."%' Or customer.Customer_Name Like'%".$keyword."%' or supplier.Phone_Number Like '%".$keyword."%'";

  $result=mysqli_query($dbcon,$sqlselect);



   
      ?>
      
      <div class="container" id="txtHint">
       <hr>
       <hr>
       <h2>Search Details</h2>
         <p></p>            
          <table class="table table-striped">
           <thead>
             <tr>
               <th>Supplier Name</th>
               <th>Item Name</th>
               <th>Item Quantity</th>
               <th>Purchase Price</th>
               <th>Seles Price</th>
              </tr>
            </thead>
            <tbody>
            <?php if($result->num_rows >0)
            
            while($row = $result->fetch_assoc())
            {
             
            ?>
              <tr>
                <td><?php echo $row["Supplier_Name"]?></td>
                <td><?php echo $row["Item_Name"]?></td>
                <td><?php echo $row["Item_Quantity"]?></td>
                <td><?php echo $row["Purchase_Price"]?></td>
                <td><?php echo $row["Sales_Price"]?></td>
                
              </tr>
              <?php
              } 
              ?>
            </tbody>
          </table>
        </div><!--End Container-->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>