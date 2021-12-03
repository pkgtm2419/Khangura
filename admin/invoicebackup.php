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
            Bill To: Uppertech solution pvt.ltd.
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
            $total = 0;
            $vat = 21;
            $sno=1; 
            $articles = array(
                        array("Motherboard","Case","RAM","Hard Disk","Monitor", "Installation" ),
                        array(1,1,2,2,1,1),
                        array(65,80,70,125,210,30)
            );
 
            for($a=0;$a<5;$a++) {
                    $description = $articles[0][$a];
                    $amount = $articles[1][$a];
                    $unit_price = number_format( $articles[2][$a], 2);
                    $total_price = number_format( $amount * $unit_price, 2);
                    $total += $total_price;
                    echo("<tr>");
                    echo("<td>$sno</td>");
                    echo("<td>$description</td>");
                    echo("<td class='text-center'>$amount</td>");
                    echo("<td class='text-right'>€$unit_price</td>");
                    echo("<td class='text-right'>€$total_price</td>");
                    echo("</tr>");
            }
             
            echo("<tr>");
            echo("<td colspan='3' class='text-right'>Sub total</td>");
            echo("<td class='text-right'>€" . number_format($total,2) . "</td>");
            echo("</tr>");
            echo("<tr>");
            echo("<td colspan='3' class='text-right'>VAT</td>");
            echo("<td class='text-right'>€" . number_format(($total*$vat)/100,2) . "</td>");
            echo("</tr>");
            echo("<tr>");
            echo("<td colspan='3' class='text-right'><b>TOTAL</b></td>");
            echo("<td class='text-right'><b>€" . number_format(((($total*$vat)/100)+$total),2) . "</b></td>");
            echo("</tr>");
            ?>
            </table>
        </div>
    </body>
 
</html>