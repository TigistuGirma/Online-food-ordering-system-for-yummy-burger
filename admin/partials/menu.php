<?php 

    include('../config/constants.php'); 
    include('login-check.php');
    ob_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yummy Burger - Home Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- Menu Section Starts Here -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><?php if($_SESSION['auth_role'] == 'super_admin') :?><a href="manage-admin.php">Admin</a><?Php endif; ?></li>
                <li><?php if($_SESSION['auth_role'] == 'admin') :?><a href="profile.php">Profile</a><?Php endif; ?></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="manage-users.php">Users</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </div>

    </div>
    <!-- Menu Section Ends Here -->