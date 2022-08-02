<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Activate User</h1>
        <br><br>


        <?php 
        
            //Check whether the id is set or not
            if(isset($_GET['id']))
            {
                //Get the ID and all other details
                $id = $_GET['id'];
                //Create SQL Query to get all other details
                $sql = "SELECT * FROM tbl_users WHERE id=$id";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count the Rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row = mysqli_fetch_assoc($res);
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $active = $row['active'];
                }
                else
                {
                    //redirect to manage users with session message
                    $_SESSION['no-user-found'] = "<div class='error'>User not Found.</div>";
                    header('location:'.SITEURL.'admin/manage-users.php');
                }

            }
            else
            {
                //redirect to Manage CAtegory
                header('location:'.SITEURL.'admin/manage-users.php');
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
                    <td>Active: </td>
                        <td>
                            <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes 

                            <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No 
                        </td>
                    </tr>

                    <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update User" class="btn-secondary">
                    </td>
                </tr>

                </table>

                <?php 
        
            if(isset($_POST['submit']))
            {
                // Get all the values from our form
                $id = $_POST['id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $active = $_POST['active'];

                // Update the Database
                $sql2 = "UPDATE tbl_users SET
                    first_name = '$first_name',
                    last_name = '$last_name',
                    active = '$active' 
                    WHERE id=$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether executed or not
                if($res2==true)
                {
                    //Category Updated
                    $_SESSION['update'] = "<div class='success'>User Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-users.php');
                }
                else
                {
                    //failed to update category
                    $_SESSION['update'] = "<div class='error'>Failed to Update User.</div>";
                    header('location:'.SITEURL.'admin/manage-users.php');
                }

            }
        
        ?>


            </form>

    </div>









<?php include('partials/footer.php'); ?>