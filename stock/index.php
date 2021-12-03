<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> </title>

    <!-- Bootstrap -->
   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src="js/bootstrap.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <?php
   include("classes/functions.php");

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($dbcon,$_POST['username']);
      $mypassword = mysqli_real_escape_string($dbcon,$_POST['password']); 
      
      $sql = "SELECT username,password FROM login WHERE username = '$myusername' and password = '$mypassword'";

      
           
      $result = mysqli_query($dbcon,$sql);
      $row = mysqli_fetch_array($result);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    

      
      if($count >= 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         //echo "Rajesh";
         header("location: Billing.php");
         
      }else {
         $error = "Your Login Name or Password is invalid";
      }
    }


  ?>

  <body>
     <form action="" method="post"> 
      <div class="container">
            <div class="row">
                <div class="form_bg">
                    
                         <h2 class="text-center">Login Page</h2>
                        <br/>
                        <div class="form-group">
                            <input type="text" name="username"class="form-control" id="username" placeholder="User id">
                        </div>
                        <div class="form-group">
                         <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        
                            </div>
                            <br/>
                           <div class="align-center">
                        <button type="submit" class="btn btn-primary" id="login">Login</button>
                       </div>
                    
                </div>
            </div>
        </div>
      </form>  

      </body>
</html>