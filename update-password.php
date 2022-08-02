<?php include('partials-front/menu.php'); ?>
<style>
    .wrapper{
        padding: 1%;
        width: 80%;
        margin: 0 auto;

    }
    .main-content{
        background-color: #D3D3D3;
        padding: 3% 0;
        color: black;
        height: 350px;

    }
    .tbl-full{
        width: 100%;
    }
    table tr th{
        border-bottom: 1px solid black;
        padding: 1%;
        text-align: left;
    }

    table tr td{
        padding: 1%;
        white-space: nowrap;
    }
    .btn-primary1{
        background-color: #00A8E6;
        padding: 1%;
        color: white;
        text-decoration: none;
        font-weight: bold;
    }
    .btn-primary1:hover{
        background-color: #0c98bb;
        color: white;
    }
    .btn-secondary{
        background-color: #27cf05 ;
        padding: 1%;
        color: white;
        text-decoration: none;
        font-weight: bold;
        border: none;
    }
    .btn-secondary:hover{
        background-color: #2db128;
        color: white;
    }
    .btn-danger{
        background-color: #eb0a0a;
        padding: 1%;
        color: white;
        text-decoration: none;
        font-weight: bold;
    }
    .btn-danger:hover{
        background-color: #D9314B;
        color: white;
    }
    .footer{
        position:fixed;
        bottom:0;
        width: 100%;
    }


</style>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>
<section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-instagram fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-telegram fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa-brands fa-tiktok fa-2x"></i></a>
                </li>
            </ul>
        </div>
    </section>
<section class="footer">
        <div class="container text-center">
        <p>Copyright © <a href="#">Yummy Burger.</a> . All Right Reserved. Developed by Admas University Final Year Students.</p>
        </div>
</section>

<?php 

            //Check whether the Submit Button is Clicked on Not
            if(isset($_POST['submit']))
            {

                //1. Get the Data from Form
                $id=$_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);


                //2. Check whether the user with current ID and Current Password Exists or Not
                $sql = "SELECT * FROM tbl_users WHERE id=$id AND password='$current_password'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    //CHeck whether data is available or not
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //User Exists and Password Can be CHanged


                        //Check whether the new password and confirm match or not
                        if($new_password==$confirm_password)
                        {
                            //Update the Password
                            $sql2 = "UPDATE tbl_users SET 
                                password='$new_password' 
                                WHERE id=$id
                            ";

                            //Execute the Query
                            $res2 = mysqli_query($conn, $sql2);

                            //CHeck whether the query exeuted or not
                            if($res2==true)
                            {
                                //Display Succes Message
                                //REdirect to Manage Admin Page with Success Message
                                $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
                                //Redirect the User
                                header('location:'.SITEURL.'profile.php');
                            }
                            else
                            {
                                //Display Error Message
                                //REdirect to Manage Admin Page with Error Message
                                $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password. </div>";
                                //Redirect the User
                                header('location:'.SITEURL.'profile.php');
                            }
                        }
                        else
                        {
                            //REdirect to Manage Admin Page with Error Message
                            $_SESSION['pwd-not-match'] = "<div class='error'>Password Did not Match. </div>";
                            //Redirect the User
                            header('location:'.SITEURL.'profile.php');

                        }
                    }
                    else
                    {
                        //User Does not Exist Set Message and REdirect
                        $_SESSION['user-not-found'] = "<div class='error'>User Not Found. </div>";
                        //Redirect the User
                        header('location:'.SITEURL.'profile.php');
                    }
                }

                //3. CHeck Whether the New Password and Confirm Password Match or not

                //4. Change PAssword if all above is true
            }

?>