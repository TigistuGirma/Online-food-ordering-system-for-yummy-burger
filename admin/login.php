<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Log in - Food Order System</title>
        <!-- Font Awesome Link Here -->
        <link rel="stylesheet" href="../fonts-6.1/css/all.css">
        <link rel="stylesheet" href="../css/admin-login.css">
    </head>

    <body>
        
        <div class="login" id="box">
            <h1 class="text-center">Log In</h1>
            <br>
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
            ?>
            <br><br>

            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center" id="image">
            <div>
                <label for="username" id="text-left">User Name</label>
                <i class="fas fa-user"></i>
                <input type="text" name="username" id="username" placeholder="User Name" 
                pattern="[A-Za-z]{5,}" title="Characters must be atleast 5 or more and don't include numbers" required>
                <div class="error"></div>
            </div>

            <div>
                <label for="password" id="text-left">Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one 
                number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>

            <input type="submit" name="submit" value="Log In" class="button">
            <br><br>
           
           

            <p class="text-center">Created By Admas University Final Year Students.</a></p>
            </form>
            <!-- Login Form Ends HEre -->
        </div>

    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    $count1= 0;
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            foreach($res as $data){
                $user_id = $data['id'];
                $user_full_name = $data['full_name'];
                $user_name = $data['username'];
                $user_role = $data['user_role'];
            }
            $_SESSION['auth_role'] = "$user_role";
            $_SESSION['id'] = "$user_id";
            $_SESSION['auth_user'] = [
                'full_name' => $user_full_name,
                'username' => $user_name,
            ];
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
        


    }

?>