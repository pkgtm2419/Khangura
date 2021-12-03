<?php
 include("classes/functions.php"); 

          if($_SERVER["REQUEST_METHOD"] == "POST") 
          {
            $employeeid = mysqli_real_escape_string($dbcon,$_POST['employeeid']);
            
            $id=explode(',',$employeeid);
            $empid=$id[1];
           
            $actualsalary = mysqli_real_escape_string($dbcon,$_POST['actualsalary']);
            $numberofdays = mysqli_real_escape_string($dbcon,$_POST['numberofdays']);
            $workingdays = mysqli_real_escape_string($dbcon,$_POST['workingdays']);
            //$subtotal = mysqli_real_escape_string($dbcon,$_POST['total']);
            $advance = mysqli_real_escape_string($dbcon,$_POST['advance']);
            $paidsalary = mysqli_real_escape_string($dbcon,$_POST['paidsalary']);
            $date = mysqli_real_escape_string($dbcon,$_POST['salarydate']);
           
            $date = explode('/',$date);
            $string="$date[2]/$date[0]/$date[1]";
            $salarydate=date("Y-m-d",strtotime($string));  
            
          echo $sqlinsert="insert into salary(Employee_ID,Actual_Salary,Number_Of_Days,Working_Days,Advance,Paid_Salary,Salary_Created_Date) values(".$empid.",".$actualsalary.",".$numberofdays.",".$workingdays.",".$advance.",".$paidsalary.",'".$salarydate."')";  
         
          
              if(mysqli_query($dbcon, $sqlinsert))
                {
                
                  echo "New records created Successfully";
                
                }
               
           
           }    
             

  


 

?>