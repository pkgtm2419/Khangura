<html>
 
    <head>
    <title>Simple invoice in PHP</title>
        <style type="text/css">
        body {      
            font-family: Verdana;
        }
         
        div.invoice {
        border:1px solid #ccc;
        padding:10px;
        height:740pt;
        width:570pt;
        }
 
        div.company-address {
            border:1px solid #ccc;
            float:left;
            width:740px;
        }
         
        div.billing-details {
            border:1px solid #ccc;
            float:left;
            margin-bottom: 50px;
            margin-top: 20px;
            width:740px;

           
        }
         
        div.invoice-details {
            border:1px solid #ccc;
            float:left;
            margin-bottom:50px;
            margin-top: -5px;
            width:740px;
           }
         
        div.clear-fix {
            float: left;
            margin-top: 40px;
        }
         
        table {
            width:100%;
        }
         
        th {
            text-align: left;
        }
         
        td {
        }
         
        .text-left {
            text-align:left;
        }
         
        .text-center {
            text-align:center;
        }
         
        .text-right {
            text-align:right;
        }
         
        </style>
    </head>
 
    <body>
    <?php
    include("classes/functions.php");

      $sqlselect="Select Customer_Name,Item_Name,Item_Quantity,Sales_price, Tax_Percentage,Discount,Sales_Date,Total_Amount from billing";

      $result=mysqli_query($dbcon,$sqlselect);

    
    ?>
    <div class="invoice">
        <div class="company-address">
            REMIT TO,
            <br>
            Compny Name:Alivent Solutions Pvt.Ltd.
            <br>
            PayPal:support@alivensolutions.com,
            <br>
            BANK NAME : YES BANK
            <br>
            BANK ACCOUNT NO. 009888833883,
            <br>
            IFSC CODE:YESS009765
            <br>
            BANK ADDRESS :SECTOR 2 NOIDA
            <br>
            Office Address:Sector 3 Noida

            <br />
            Invoice # ANS/WEC/0002
            Date:18/5/2017 
            <br />
        </div>
        <br>
        <br>
        <div class="billing-details">
            Bill To: Uppertech solution pvt.ltd.;
            <br />
            Mobile No.:9865432122
        </div>
         
        <div class="invoice-details">
            <table border="1" cellspacing="0">
            <tr>
               <th>Invoice Period</th>
               <th>Project Id</th>
               <th>Payment Terms</th> 
            </tr>
            <tr>
               <td>On-going</td>
               <td>WEC/Content/1</td>
               <td>Due on Receipt</td> 
            </tr>
         
            </table>
        </div>
         
        <div class="clear-fix"></div>
            <table border='1' cellspacing='0'>
                <tr>
                    <th width=50>SNo.</th> 
                    <th width=250>Description</th>
                    <th width=80>Amount</th>
                    <th width=100>Unit price</th>
                    <th width=100>Total price</th>
                </tr>
 
            <?php
            if($result->num_rows >0)
            while($row = $result->fetch_assoc())
             {
                $total=0;
                $totalamount=0;
                $sno=1;
                 $sno++;
                 $quantity=$row["Item_Quantity"];
                 $price=$row["Sales_price"];
                 $total=$quantity*$price;
                  
               ?>
               <tr>
               <td><?php echo $sno;?></td>
               <td><?php echo $row["Item_Name"];?></td>
               <td><?php echo $row["Item_Quantity"];?></td>
               <td><?php echo $row["Sales_price"];?></td>
               <td><?php echo $quantity*$price;?></td>
                </tr>

              <?php   
             }
              ?>
               <tr>
                   <td colspan="4" align="right">Total</td>
                      
                   <td>120000</td>
                <tr>  
            </table>
        </div>
    </body>
 
</html>