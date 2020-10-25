<?php
   include("config.php");
   session_start();

   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      } else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Admin Login</title>
      <?php include "parts/head.html" ?>
      
   </head>
   
   <body>
      



         <div class= "login-img" style="background-image: url(imgs/login-1.jpg); ">
         <br>
         <br>
            <br>
               <br>
                  <br>
                  <br>
               <br>
                  <br>
                  <br>
               <br>
                  <br>
             <div class="login-info">
                 <div class="login-text"><b>Login</b></div>
                 <br>
                 <br>

				          <div class="login-form ">
                         <div class="form-group">
                            <form action = "http://zoeroom.com/aau/wnm608/m15/addProductpage.php" method = "post">
                             <label class="label11">UserName</label><br><input type = "text" name = "username" class = "box1">
                             <label class="label11">Password</label><input type = "password" name = "password" class = "box1" >
                         <div><?php echo $error ?></div>
                        </div>
                 
                     <div class="input-group">
                       <input type = "submit" value = " Submit" class="input1"><br/>
                     <a href="main.php">
                     <input type="button" value="Homepage" class="input1"></a>
                       </form>
                  </div>
          
         </div>	





   </body>
</html>