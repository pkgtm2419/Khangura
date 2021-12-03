<?php
 include("classes/functions.php"); 
echo  $number=count($_POST["productid"]);

          if($_SERVER["REQUEST_METHOD"] == "POST") 
          {
          $billnumber = mysqli_real_escape_string($dbcon,$_POST['billnumber']);
          $date = mysqli_real_escape_string($dbcon,$_POST['salesdate']);
          $customername = mysqli_real_escape_string($dbcon,$_POST['customername']);
          $customercontact = mysqli_real_escape_string($dbcon,$_POST['customercontact']);
          //$subtotal = mysqli_real_escape_string($dbcon,$_POST['total']);
          $tax = mysqli_real_escape_string($dbcon,$_POST['tax']);
          $totalamount1 = mysqli_real_escape_string($dbcon,$_POST['totalamount1']);
          $discount = mysqli_real_escape_string($dbcon,$_POST['discount']);
          $grandtotal = mysqli_real_escape_string($dbcon,$_POST['grandtotal']); 
        
        $date = explode('/',$date);
        $string="$date[2]/$date[0]/$date[1]";
        $salesdate=date("Y-m-d",strtotime($string));  
        
        $subtotal=10;
        echo $sqlinsert="insert into billing_details(bill_number,Sales_Date,Client_Name,Client_Contact,Tax,Total_Amount,Discount,Grand_Total) values('".$billnumber."','".$salesdate."','".$customername."','".$customercontact."',".$tax.",".$totalamount1.",".$discount.",".$grandtotal.")";  
         
         
               $Orderid=0;
               if(mysqli_query($dbcon, $sqlinsert))
                {
                  
                  $sqlselect="select Order_Id from billing_details";
                  $result=mysqli_query($dbcon,$sqlselect); 
                   
                   if($result->num_rows>0)
                   while($row=$result->fetch_assoc()) 
                    {

                      $Orderid=$row["Order_Id"]; 

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

                                
                            
                        echo $sqlinsert="insert into order_item(Order_Id, Product_Id,Quantity,Rate,Total) values(".$Orderid.",'".$productid."',".$quantity.",".$rate.",'".$Total."')";
                                
                                mysqli_query($dbcon,$sqlinsert);

                          
                 $stockinsert="insert into stockdetails(Item_Number,Item_Quantity,Sales_Price,Total_Price) values('".$productid."',".-$quantity.",".$rate.",".$Total.")";

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