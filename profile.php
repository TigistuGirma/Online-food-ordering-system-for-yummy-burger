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
        border-spacing: 1em 0;
    }
    table tr th{
        border-bottom: 1px solid black;
        padding: 1%;
        text-align: left;
    }

    table tr td{
        padding: 1%;
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
        <h1>Manage Profile</h1>
        <br>
        <?php 
        
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['change-pwd']))
            {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }

            if(isset($_SESSION['pwd-not-match']))
            {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
            }

            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
    
       ?>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
                
            </tr>

       

        <?php

                //Query to Get all Admin
                $first_name = $_SESSION['user'];
                $sql = "SELECT * FROM tbl_users WHERE first_name= '$first_name'";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                                
                if($res==TRUE)
                {
                    // Count Rows to CHeck whether we have data in database or not
                    $count = mysqli_num_rows($res); // Function to get all the rows in database
                    
                    $sn=1; //Create a Variable and Assign the value
                    
                    //CHeck the num of rows
                    if($count>0)
                    {
                        //WE HAve data in database
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //Using While loop to get all the data from database.
                            //And while loop will run as long as we have data in database

                            //Get individual DAta
                            $id=$rows['id'];
                            $first_name=$rows['first_name'];
                            $last_name=$rows['last_name'];
                            $email=$rows['email']

                            //Display the Values in our Table
                            ?>
                            
                            <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td><?php echo $first_name; ?></td>
                                <td><?php echo $last_name; ?></td>
                                <td><?php echo $email; ?></td>

                                <td>
                                    <a href="<?php echo SITEURL; ?>update-password.php?id=<?php echo $id; ?>" class="btn-primary1">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>update-profile.php?id=<?php echo $id; ?>" class="btn-secondary">Update Profile</a>
                                    <a href="<?php echo SITEURL; ?>delete-profile.php?id=<?php echo $id; ?>" class="btn-danger">Delete Profile</a>
                                </td>
                            </tr>

                            <?php

                        }
                    }
                    else
                    {
                        //We Do not Have Data in Database
                    }
                }

            ?>
           

            
        </table>
                
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


