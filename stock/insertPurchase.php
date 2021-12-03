<?php
 include("classes/functions.php"); 
echo  $number=count($_POST["productid"]);

          if($_SERVER["REQUEST_METHOD"] == "POST") 
          {
          $purchasenumber = mysqli_real_escape_string($dbcon,$_POST['purchasenumber']);
          $suppliernumber = mysqli_real_escape_string($dbcon,$_POST['suppliernumber']);
          $date = mysqli_real_escape_string($dbcon,$_POST['purchasedate']);
          //$subtotal = mysqli_real_escape_string($dbcon,$_POST['total']);
          $tax = mysqli_real_escape_string($dbcon,$_POST['tax']);
          $totalamount1 = mysqli_real_escape_string($dbcon,$_POST['totalamount1']);
          $paidamount = mysqli_real_escape_string($dbcon,$_POST['paidamount']);
          $unpaidamount = mysqli_real_escape_string($dbcon,$_POST['unpaidamount']); 
        
        $date = explode('/',$date);
        $string="$date[2]/$date[0]/$date[1]";
        $purchasedate=date("Y-m-d",strtotime($string));  
        
        $subtotal=10;
        echo $sqlinsert="insert into purchase(Purchase_Number,Supplier_Number,Purchase_Date,Tax,Total_Amount,Paid_Amount,Unpaid_Amount) values('".$purchasenumber."','".$suppliernumber."','".$purchasedate."',".$tax.",".$totalamount1.",".$paidamount.",".$unpaidamount.")";  
         
         
               $purchaseid=0;
               if(mysqli_query($dbcon, $sqlinsert))
                {
                  
                  $sqlselect="select purchase_id from purchase";
                  $result=mysqli_query($dbcon,$sqlselect); 
                   
                   if($result->num_rows>0)
                   while($row=$result->fetch_assoc()) 
                    {

                      $purchaseid=$row["purchase_id"]; 

                    }


                 }
                


                if($number > 0)
                 {
                      for($i=0 ; $i < $number; $i++)
                       {
                            if(trim($_POST["productid"][$i])!='')
                               {
                                
                              
                              $productid = mysqli_real_escape_string($dbcon,$_POST['productid'][$i]);
                              $quantity = mysqli_real_escape_string($dbcon,$_POST['quantity'][$i]);
                              $rate = mysqli_real_escape_string($dbcon,$_POST['price'][$i]);
                             $Total = mysqli_real_escape_string($dbcon,$_POST['mytotal'][$i]);
                             $sdate = mysqli_real_escape_string($dbcon,$_POST['purchasedate'][$i]);

                                
                            
                        echo $sqlinsert="insert into purchase_items(Purchase_Id, Product_Id,Quantity,Rate,Total) values(".$purchaseid.",'".$productid."',".$quantity.",".$rate.",'".$Total."')";
                                
                                mysqli_query($dbcon,$sqlinsert);

                             //$sdate = explode('/',$sdate);
                            // $strdate="$sdate[2]/$sdate[0]/$sdate[1]";
                             $stockdate=date("Y-m-d",strtotime($string));  
                                     
                  

                 echo $stockinsert="insert into stockdetails(Item_Number,Item_Quantity,Purchase_Price,Total_Price,Date) values('".$productid."',".$quantity.",".$rate.",".$Total.",'".$stockdate."')";  

                            if(mysqli_query($dbcon, $stockinsert))
                            {
                              echo "New records created Successfully";
                            }
                            
                         }    
                       }
                         echo "Data Inserted";  
                      }
                  else
                  {
                        echo "Enter Product Name";    
                  }
             }    
             

  


 

?>