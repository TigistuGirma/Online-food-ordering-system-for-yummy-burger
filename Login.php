<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signin_style.css">
    <!-- Font Awesome Link Here -->
    <link rel="stylesheet" href="fonts-6.1/css/all.css">
    <title>Log In</title>
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
        <form  id="form" action="" method="post" autocomplete="off">
            <div class="social">
                <div class="title">Log In</div>
                <div class="question">New to Yummmy Burger?<br>
                <a href="Signup.php">Sign Up</a>
                <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                } 
        
                if(isset($_SESSION['create']))
                {
                    echo $_SESSION['create'];
                    unset($_SESSION['create']);
                }
            ?>
                </div>
            </div>
            
            <!-- /** 
              * !  Username Input Here 
            **/ -->
            <div>
                <label for="username">First Name</label>
                <i class="fas fa-user"></i>
                <input type="text" name="fname" id="username" placeholder="User Name" 
                pattern="[A-Za-z]{5,}" title="Characters must be atleast 5 or more and don't include numbers" required>
                <div class="error"></div>
            </div>

            <!-- /** 
                * !  Password Input Here 
            **/ -->
            <div>
                <label for="password">Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one 
                number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                <div class="error"></div>
            </div>
            
            <input type="submit" value="Log In" name="LOGIN" class="button">

        </form>
        
    </div>

</body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['LOGIN']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = mysqli_real_escape_string($conn, $_POST['fname']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_users WHERE first_name='$username' AND password='$password' AND active='Yes'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['login']; 
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'index.php');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match OR <br>  Your Account is not Active Yet.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'Login.php');
        }
     


    }

?>

