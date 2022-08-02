<?php include('partials-front/menu.php'); ?>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .about{
        width: 100%;
        padding: 78px 0px;
        background-color: #E74C3C;
    }
    .about img{
        height: auto;
        width: 420px;
    }
    .about-text{
        width: 550px;
    }
    .main{
        width: 1130px;
        max-width: 95%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    .about-text h1{
        color: white;
        font-size: 60px;
        text-transform: capitalize;
        margin-bottom: 10px;

    }
    .about-text h5{
        color: white;
        font-size: 25px;
        text-transform: capitalize;
        margin-bottom: 25px;
        letter-spacing: 2px;
        
    }
    .about-text p{
        color: #fcfc;
        letter-spacing: 1px;
        line-height: 28px;
        font-size: 18px;
        margin-bottom: 45px;
    }
    @media only screen and (max-width:768px){
        .img{
            height: 110vh;
            position:absolute;
            margin-top: 4%;
        }
        .about-text{
            margin-top: 90%;
            text-align: center;
            justify-content: space-around;
        }
    }
</style>
<!-- About Us Section Starts -->
<section class="about">
    <div class="main">
        <div class="img">
            <img src="images/About Us.JPG" alt="about-us">
        </div>
    
        <div class="about-text">
        <h1>About Us</h1>
        <h5>Yummy Burger</h5>
        <p>Yummy Burger is a healthy fast-food restaurant focusing on providing organic and delicious foods to the local community.
           We have two branches around the city. One is located near the city administration office and the other is located infront 
           of Eyasu Meda. We are on bussiness for over five years and have increased our quality of service. We are best known all around
           the city by our delicious Burger and Pizza.
        </p>
        </div>
    </div>


</section>




















<!-- About Us Section Ends -->



<?php include('partials-front/footer.php'); ?>