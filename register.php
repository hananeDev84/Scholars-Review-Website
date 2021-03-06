<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel ="stylesheet" href="CSS/credentials-style.css">
<link href="https://fonts.googleapis.com/css?family=Bitter|Poppins&display=swap" rel="stylesheet">
</head>
<body>

 <div id = "main-wrapper">
     <center>
       <h2> Register </h2>
       <img src="pic/avatar.png" alt="https://flyclipart.com/download-png#avatar-my-profile-profile-user-user-profile-icon-196366.png"class= "avatar"/>
    </center>

<form class= "myform" action"register.php" method="post">
<label><b> Firstname</b></label><br>
      <input name="firstname" type="text" class="inputvalue" placeholder="Enter your firstname" required/><br>
      <label><b> Lastname</b></label><br>
      <input name="lastname" type="text" class="inputvalue" placeholder="Enter your lastname" required/><br>
     
      <label><b> Gender</b></label><br>
      <input name="gender" type="radio" class="radiobtns" value= "male" checked required>Male
      <input name="gender" type="radio" class="radiobtns" value= "female" required>Female
      <input name="gender" type="radio" class="radiobtns" value= "other" required>Other<br>
      <br><label><b>Level of Ed.</b></label>
        <select class="qualification" name="qualification">
           <option value="Associate">Associate</option>
           <option value="Bachelor">Bachelor</option>
           <option value="Master">Master</option>
           <option value="Phd">Phd</option>
         </select><br>
     <label><b>Choose an username</b></label><br>
      <input name="username" type="text" class="inputvalue" placeholder="Enter username" required/><br>
      <label><b>Choose a Password</b></label><br>
      <input name="password" type="password" class="inputvalue" placeholder="Enter password" required/><br>
      <label><b> Confirm the Password</b></label><br>
      <input name="cpassword" type="password" class="inputvalue" placeholder="Confirm password"required/><br>
      <input name="submit-btn" type="submit" id="signup-btn" value ="Register"/><br>
      <a href= "login.php"><input type="button" id="back-btn" value ="Back"/></a>
      
</form>
<?php
   if(isset($_POST['submit-btn']))
   {
      // echo '<script type = "text/javascript"> alert("sign Up button clicked")</script>';
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $qualification = $_POST['qualification'];
        $username = $_POST['username'];
        $password= $_POST['password'];
        $cpassword= $_POST['cpassword'];
        $hashedpsw=password_hash($password,PASSWORD_DEFAULT);
        $role = "member";

     if($password==$cpassword)
     {
         $query= "SELECT * FROM logindb WHERE username='$username'";
         $query_run= mysqli_query($con,$query);

         if(mysqli_num_rows($query_run)>0)
         {
           echo '<script type = "text/javascript"> alert("User already exist: try another username")</script>'; 
         }
         else
         {
            $query= "insert into logindb (username,password,firstname,lastname,gender,qualification,role) values('$username','$hashedpsw','$firstname','$lastname','$gender','$qualification','$role')";
            $query_run = mysqli_query($con,$query);
            
             if($query_run)
             {
               echo"<script> 
               alert('Registration successful: Return to login Page');
               window.location.href='login.php';
               </script>";   
            }
             else
             {
                echo '<script type = "text/javascript"> alert("Error 404: Registration failed")</script>';
             }
         }
      }
      else
      {
        echo '<script type = "text/javascript"> alert("Password did not match")</script>';
      }
  
    }
    
?>
</div>
</body>
</html>