<?php include ('config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yummy Burger</title>
    <!-- Font Awesome Link Here -->
    <link rel="stylesheet" href="fonts-6.1/css/all.css">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="Login.php" class="btn btn-primary">Log In</a>
                    </li>
                    <li>
                        <a href="Signup.php" class="btn btn-primary">Sign Up</a>
                    </li>
                   
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->


    <!-- Welcome Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <h2 class="text-center" style="color: white;">Welcome to Yummy Burger</h2>
            <h3 class="text-center" style="color: white;">Log in or Sign up to Order</h3>
        </div>
    </section>

    <!-- Welcome Section Ends Here -->
    <?php 
        
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
    
    ?>
    <!-- Advert section starts here -->
    <section class="categories">

        <div class="container">
            <h2 class="text-center">Delicious foods and juicies at your finger tip!</h2>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/category/Food_Category_458.jpg" alt="Pizza" class="img-responsive img-curve">

            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/category/Food_Category_421.jpg" alt="Burger" class="img-responsive img-curve">
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/category/Food_Category_785.jpg" alt="juicies" class="img-responsive img-curve">
            </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section>

    <!-- Advert section starts here -->
    


    <!-- social Section Starts Here -->
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
    <!-- social Section Ends Here -->
    
    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
        <p>Copyright © <a href="#">Yummy Burger.</a> . All Right Reserved. Developed by Admas University Final Year Students.</p>
        </div>
    </section>
    <!-- footer Section Ends Here -->
</head>
