<?php 
  include("classes/functions.php");

  
  //
  //$sqlUpdate="Delete from purchase where purchase_id='".$purchaseid."'";
  
      if($_SERVER["REQUEST_METHOD"] == "POST") 
      {
         $purchaseid=$_POST["purchaseid"];
         $purchasenumber = mysqli_real_escape_string($dbcon,$_POST['purchasenumber']);
         $suppliernumber = mysqli_real_escape_string($dbcon,$_POST['suppliernumber']);
         $itemnumber = mysqli_real_escape_string($dbcon,$_POST['itemnumber']);
         $purchasequantity = mysqli_real_escape_string($dbcon,$_POST['purchasequantity']);
         $purchaseprice = mysqli_real_escape_string($dbcon,$_POST['purchaseprice']);
         $salesprice = mysqli_real_escape_string($dbcon,$_POST['salesprice']);
         $purchasedate = mysqli_real_escape_string($dbcon,$_POST['purchasedate']);
         //$salesprice = mysqli_real_escape_string($dbcon,$_POST['salesprice']);

         $notes = mysqli_real_escape_string($dbcon,$_POST['notes']);
         $totalpayment = mysqli_real_escape_string($dbcon,$_POST['totalpayment']);
         
         

         echo $updatesql="Update purchase set purchase_number='".$purchasenumber."',Supplier_Number=".$suppliernumber.",Item_Number=".$itemnumber.",Purchase_Quantity=".$purchasequantity.",Purchasing_Price=".$purchaseprice.",Sales_Price=".$salesprice.",purchase_date='".$purchasedate."',Total_Payment=".$totalpayment.",notes='".$notes."' where purchase_id=".$purchaseid."";

         
          if(mysqli_query($dbcon, $updatesql))
           {
           
            echo "New record Updated Successfully";
           
           }
          


      } 
  
  /*if(mysqli_query($dbcon, $sqlDelete))
      {

         $purchasenumber = mysqli_real_escape_string($dbcon,$_POST['purchasenumber']);
         $suppliernumber = mysqli_real_escape_string($dbcon,$_POST['suppliernumber']);
         $itemnumber = mysqli_real_escape_string($dbcon,$_POST['itemnumber']);
         $purchasequantity = mysqli_real_escape_string($dbcon,$_POST['purchasequantity']);
         $purchaseprice = mysqli_real_escape_string($dbcon,$_POST['purchaseprice']);
         $salesprice = mysqli_real_escape_string($dbcon,$_POST['salesprice']);
         $purchasedate = mysqli_real_escape_string($dbcon,$_POST['purchasedate']);
         //$salesprice = mysqli_real_escape_string($dbcon,$_POST['salesprice']);

         $notes = mysqli_real_escape_string($dbcon,$_POST['notes']);
         $totalpayment = mysqli_real_escape_string($dbcon,$_POST['totalpayment']);
         

    
         /* Insert Deatisl in Purchase Table */

        /*$sqlinsert="update Purchase set purchase_number='".$purchasenumber."',Item_Number,Item_Name,Purchase_Quantity,Purchasing_Price,Sales_Price,purchase_date,Supplier_Number,notes,Total_Payment) values('".$purchasenumber."','".$itemnumber."','TestItem',".$purchasequantity.",".$purchaseprice.",".$salesprice.",'".$purchasedate."',
        '".$suppliernumber."','".$notes."',".$totalpayment.")";

          if(mysqli_query($dbcon, $sqlinsert))
          {
            echo "New records created Successfully";
          }
          else
          {
           echo "Error:".$sqlinsert."<br>".mysqli_error($dbcon); 
          }

        }*/
       //echo "New records Delted Successfully";

      	//header("location:http://localhost/stock/purchase.php");
      
          

?>