<?php

    //Include constants.php file here
    include('partials-front/menu.php'); 

    // 1. get the first name of user  to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete user
    $sql = "DELETE FROM tbl_users WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>User Deleted Successfully.</div>";
        //Redirect to landing Page
        header('location:'.SITEURL.'landing.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error text-center'>Failed to Delete User. Try Again Later.</div>";
        header('location:'.SITEURL.'profile.php');
    }

?>
