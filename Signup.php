<?php
include('config/constants.php');

$fname = "";
$lname = "";
$email = "";
$pass1   = "";
$pass2   = "";
$err= array(); 
$congra="";



if(isset($_POST['SIGNUP'])){
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass1= mysqli_real_escape_string($conn, md5($_POST['pass1']));   //Password Encryption using MD5
  $pass2 = mysqli_real_escape_string($conn, md5($_POST['pass2']));  //Password Encryption using MD5  



  //validation

    $user_check_query = "SELECT * FROM tbl_users WHERE first_name='$fname' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
      
    if ($user) { // if user exists
      if ($user['first_name'] === $fname) {
        array_push($err, "user name already exists!");
       
      }
  
     else if ($user['email'] === $email) {
       array_push($err, "Email already exists!");
      
      }}

      else if ($pass1 != $pass2) {
    
        array_push($err, "Passwords do not match");
    }

      if(isset($_SESSION['create']))
      {
          echo $_SESSION['create'];
          unset($_SESSION['create']);
      }


    
  
     // Finally, register user if there are no errors in the form
  if (count($err) == 0) {
      $query = "INSERT INTO tbl_users ( first_name, last_name, email, password) 
            VALUES('$fname', '$lname', '$email',  '$pass1')";
      mysqli_query($conn, $query);
         //Query Executed and Category Added
         $_SESSION['create'] = "<div class='success'>User account created successfully! Login please</div>";
         //Redirect to Manage Category Page
         header('location:'.SITEURL.'Login.php');
}}
?>
 
        
       




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup_style.css">
    <!-- Font Awesome Link Here -->
    <link rel="stylesheet" href="fonts-6.1/css/all.css">
    <title>Sign up</title>
</head>
<body>
    <div class="container">

        <div class="content">
            <div class="logo">
                <img src="" alt="">
            </div>
            <div class="image"></div>
            <div class="text">
                Yummy Burger <br>
                Taste the Difference!
            </div>
        </div>
        <form action="signup.php" method="post" autocomplete="off">
            <div class="social">
                <div class="title">Sign Up</div>
                <div class="question">Have an account already?<br>
                <a href="Login.php">Log In</a>
                <div class="err">
                    <?php include('err.php'); 
                    ?>
                    </div>
                    <?php
                    echo $congra;
                    ?>
                </div>
            </div>
            
            <!-- /** 
              * !  Username Firstname Input Here 
            **/ -->
            <div>
                <label for="fname">First Name</label>
                <i class="fas fa-user"></i>
                <input type="text" name="fname" placeholder="First Name" 
                pattern="[A-Za-z]{5,}" title="Characters must be at least 5 or more and don't include numbers" required>
                <div class="error"></div>
            </div>
            <!-- /** 
                * !  Username Lastname Input Here 
            **/ -->
            <div>
                <label for="lname">Last Name</label>
                <i class="fas fa-user"></i>
                <input type="text" name="lname" placeholder="Last Name" 
                pattern="[A-Za-z]{5,}" title="Characters must be at least 5 or more and don't include numbers" required>
                <div class="error"></div>
            </div>
            <!-- /** 
                * !  Email Input Here 
            **/ -->
            <div>
                <label for="email">Email</label>
                <i class="far fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" 
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                <div class="error"></div>
            </div>

            <!-- /** 
                * !  Password Input Here 
            **/ -->
            <div>
                <label for="password">Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" name="pass1" placeholder="Password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                <div class="error"></div>
            </div>

            <!-- /** 
                * !  Confirm Password Input Here 
            **/ -->
            <div>
                <label for="confirm-password"> Confirm Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" name="pass2" placeholder="Confirm Password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                <div class="confirmError"></div>
            </div>
            

            <input type="submit" name="SIGNUP" value="Sign Up" class="button"> </type>

        </form>
        
    </div>

</body>
</html>