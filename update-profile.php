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
        <h1>Update User</h1>

        <br><br>

        <?php 
            //1. Get the first_name of user
            $id = $_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_users WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    $row=mysqli_fetch_assoc($res);

                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $email = $row['email'];
                }
                else
                {
                    //Redirect to Manage Profile PAge
                    header('location:'.SITEURL.'profile.php');
                }
            }
        
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>First Name: </td>
                    <td>
                        <input type="text" name="first_name" value="<?php echo $first_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Last Name: </td>
                    <td>
                        <input type="text" name="last_name" value="<?php echo $last_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update user" class="btn-secondary">
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

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];

        //Create a SQL Query to Update user
        $sql = "UPDATE tbl_users SET
        first_name = '$first_name',
        last_name = '$last_name',
        email = '$email'
        WHERE id='$id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and user Updated
            $_SESSION['update'] = "<div class='success'>User Updated Successfully.</div>";
            //Redirect to Manage Profile Page
            header('location:'.SITEURL.'profile.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'profile.php');
        }
    }

?>
