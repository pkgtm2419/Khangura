<?php
 include("classes/functions.php");

 if($_SERVER["REQUEST_METHOD"] == "POST") 
      {

         
       $itemnumber = mysqli_real_escape_string($dbcon,$_POST['itemnumber']);
       $itemname = mysqli_real_escape_string($dbcon,$_POST['itemname']);
       $quantity = mysqli_real_escape_string($dbcon,$_POST['quantity']);
       $purchaseprice = mysqli_real_escape_string($dbcon,$_POST['purchaseprice']);
       $salesprice = mysqli_real_escape_string($dbcon,$_POST['salesprice']);

       $totalprice = mysqli_real_escape_string($dbcon,$_POST['totalprice']);
       $date = mysqli_real_escape_string($dbcon,$_POST['date']);
       
        $date = explode('/',$date);
        $string="$date[2]/$date[0]/$date[1]";
        $addstockdate=date("Y-m-d",strtotime($string));  
        
       
     
        
       echo $sqlinsert="insert into itemdetails(Item_Number,Item_Name,Item_Quantity,Purchase_Price,Sales_Price,Total_Price,Date) values('".$itemnumber."','".$itemname."',".$quantity.",".$purchaseprice.",".$salesprice.",".$totalprice.",'".$addstockdate."')";

         if(mysqli_query($dbcon, $sqlinsert))
          {
            echo "New records created Successfully";
          }
          else
          {
           echo "You Have Entered Duplicate Value"; 
          }

      
      /* Insert Item details in stockdetails Table*/
     

        

        $stockinsert="insert into stockdetails(Item_Number,Item_Quantity,Purchase_Price,Total_Price,Stock_Type,Date) values(".$itemnumber.",".$quantity.",".$purchaseprice.",".$totalprice.",'Old','".$addstockdate."')";

         if(mysqli_query($dbcon, $stockinsert))
          {
            echo "New records created Successfully";
          }
 
     }

    ?>  