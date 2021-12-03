<?php
 include("classes/functions.php"); 

          if($_SERVER["REQUEST_METHOD"] == "POST") 
          {
            $employeename = mysqli_real_escape_string($dbcon,$_POST['employeename']);
            $mobilenumber = mysqli_real_escape_string($dbcon,$_POST['mobilenumber']);
            $designation = mysqli_real_escape_string($dbcon,$_POST['designation']);
            $salary = mysqli_real_escape_string($dbcon,$_POST['salary']);
            //$subtotal = mysqli_real_escape_string($dbcon,$_POST['total']);
            $date = mysqli_real_escape_string($dbcon,$_POST['dateofjoining']);
           
            $date = explode('/',$date);
            $string="$date[2]/$date[0]/$date[1]";
            $dateofjoining=date("Y-m-d",strtotime($string));  
            
          echo $sqlinsert="insert into employee(Employee_Name,Mobile_Number,Designation,Salary,Date_Of_Joining) values('".$employeename."','".$mobilenumber."','".$designation."',".$salary.",'".$dateofjoining."')";  
         
            
              if(mysqli_query($dbcon, $sqlinsert))
                {
                
                  echo "New records created Successfully";
                
                }
               
           
           }    
             

  


 

?>