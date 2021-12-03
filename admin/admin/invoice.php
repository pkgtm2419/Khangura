<?php
include("classes/functions.php");

?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simple invoice</title>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="css/style2.css" type="text/css"/>
<script src="js/jquery-3.1.1.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
   <script type="text/javascript">
        var doc = new jsPDF();
        var specialElementHandlers = {
        '#editor': function (element, renderer) {
        return true;
        }
        };

        $(document).ready(function() {
        $('#btn').click(function () {
        doc.fromHTML($('#table2').html(), 40, 40, {
        'width': 600,
        'elementHandlers': specialElementHandlers
        });
        doc.save('sample-content.pdf');
        });
        });
    </script>
        
</head>
<?php 
    	
    $orderid=$_GET["OrderId"]; 
    $select="select bill_number, Sales_Date,Client_Name,Client_Contact,Tax,Total_Amount,Discount,Grand_Total from billing_details where Order_Id='".$orderid."'";

	$query=mysqli_query($dbcon,$select);

	
	
	while($row=mysqli_fetch_assoc($query))
	{
	 $salesdate=$row["Sales_Date"];
	 $billnumber=$row["bill_number"];
	 $clientname=$row["Client_Name"];
	 $clientcontact=$row["Client_Contact"];
	 $tax=$row["Tax"];
	 $totalamount=$row["Total_Amount"];
	 $discount=$row["Discount"];
	 $grandtotal=$row["Grand_Total"];
	}
	
	?>
<body>

<div id="container">
	<div id="men">
	<div id="detail">
	<h4>REMIT TO,</h4> 
	<i id="i">Compny Name:UpperTech Solutions Pvt.Ltd. <br/>
	PayPal:support@uppertechsolutions.com, <br/>
	BANK NAME : YES BANK <br/>
	BANK ACCOUNT NO. 009888833883,<br/> 
	IFSC CODE:YESS009765 <br/>
	BANK ADDRESS :SECTOR 2 NOIDA <br/> 
	Office Address:Sector 3 Noida <br/>
	Invoice # <?php echo $billnumber;?> Date:<?php echo $salesdate?> <br/>

	</div>
	<div id="detail2">
	Bill To: <?php echo $clientname;?> <br/>
	Mobile No.:<?php echo $clientcontact;?> <br/>
	</i>
	</div>
<div class="col-md-7">
<!--<table id="table" class="table table-hover">
	<tr>
		<th>Invoice Period</th>
		<th>Project Id</th>
		<th>Project Id</th>
	</tr>
	<tr>
		<td>On-going</td>
		<td>WEC/Content/1</td>
		<td>WEC/Content/1</td>
	</tr>
</table>-->
</div>
		 <div class="col-md-5"></div>

		   <div class="col-md-7">

			<table id="table2" class="table table-bordered">
				<tr>
					<th>SNo.</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Unit price</th>
					<th>Total price</th>
				</tr>
				
				<?php
				
				
				 $select="select Item_Name,Quantity,Rate from order_item inner join itemdetails on order_item.Product_Id=itemdetails.Item_Number where Order_Id='".$orderid."'";
				$query=mysqli_query($dbcon,$select);

				$sumTotal="select sum(Total) as Total from order_item where Order_Id='".$orderid."'";;
				$queryTotal=mysqli_query($dbcon,$sumTotal);
				
				
				
				$i=0;
				while($row=mysqli_fetch_assoc($query))
				{
				$quantity=$row["Quantity"];
				$price=$row["Rate"];
				$totalprice=$quantity*$price;
				 $i++;
				
				?>	
				<tr>
					<td><?php echo $i ;?></td>
					<td><?php echo $row["Item_Name"];?></td>
					<td><?php echo $row["Quantity"];?></td>
					<td><?php echo $row["Rate"];?></td>
					<td><?php echo $totalprice; ?></td>
				</tr>
				<?php
				}
				?>
				<?php
				$subtotal="";
				if($rowSum=mysqli_fetch_assoc($queryTotal))
				{
				  $subtotal=$rowSum["Total"]; 	
				} 
			    ?>
				
				<tr>
					<td colspan="4" style="text-align:right;font-weight:700">Sub Total</td>
					<td><?php echo $subtotal;?></td>
				</tr>
			    
			    <tr>
					<td colspan="4" style="text-align:right;font-weight:700">Tax</td>
					<td><?php echo $tax;?> %</td>
				</tr>
				<tr>
					<td colspan="4" style="text-align:right;font-weight:700">Total Amount</td>
					<td><?php echo $totalamount;?></td>
				</tr>
			    <tr>
					<td colspan="4" style="text-align:right;font-weight:700">Discount</td>
					<td><?php echo $discount;?></td>
				</tr>
			    <tr>
					<td colspan="4" style="text-align:right;font-weight:700">Grand Total</td>
					<td><?php echo $grandtotal;?></td>
				</tr>
			     	
			</table>

			</div>
</div>
	<!--<div class="col-md-5"><button id="btn">Generate PDF</button></div>-->

	</div>

<?php
mysqli_close($dbcon);
?>
</body>
</html>