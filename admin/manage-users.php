<?php include('partials/menu.php'); ?>

  <!-- Main Content Section Starts Here -->
  <div class="main-content">
        <div class="wrapper">
            <h1>Manage Users</h1>
            <br><br>

            <?php

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['no-user-found']))
            {
                echo $_SESSION['no-user-found'];
                unset($_SESSION['no-user-found']);
            }

            ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_users";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //CHeck whether the Query is Executed of Not
                        if($res==TRUE)
                        {
                            // Count Rows to CHeck whether we have data in database or not
                            $count = mysqli_num_rows($res); // Function to get all the rows in database

                            $sn=1; //Create a Variable and Assign the value

                            //CHeck the num of rows
                            if($count>0)
                            {
                                //WE HAve data in database
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have data in database

                                    //Get individual DAta
                                    $id=$row['id'];
                                    $first_name=$row['first_name'];
                                    $last_name=$row['last_name'];
                                    $active=$row['active'];

                                    //Display the Values in our Table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $first_name; ?></td>
                                        <td><?php echo $last_name; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/activate-user.php?id=<?php echo $id; ?>" class="btn-secondary">Activate User</a>
                                        </td>
                                    </tr>

                                    <?php

                                }
                            }
                            else
                            {
                                //WE do not have data
                                //We'll display the message inside table
                                ?>
    
                                <tr>
                                    <td colspan="6"><div class="error">No Users Added.</div></td>
                                </tr>
    
                                <?php
                            }
                        }
                        
                        ?>
    
                        
    
                        
                    </table>



             <div class="clear-fix"></div>
        </div>
    </div>
    <!-- Main Content Ends Here -->




<?php include('partials/footer.php'); ?>