<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" media="screen and (max-width: 850px)" href="CSS/phone.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <title>FoodieExpress.com/services</title>
</head>

<body>
    <?php include ("navbar.php"); ?>
    <div id="services">
        <h1 class="primaryheading">Our Services</h1>
        <div class="service-container">
            <img src="food.png" alt="">
            <div class="service-description">
                <h2 class="secondaryheading">Food Ordering:</h2>
                <p>You can order food online by using our website. You don't need to wait or stand in queue just come
                    here and order the food of your choice. Give us a chance to add some deliciousness to your food.</p>
            </div>
        </div>
        <div class="service-container left">
            <img src="sweets.png" alt="">
            <div class="service-description">
                <h2 class="secondaryheading">Sweets Ordering:</h2>
                <p>You can also order the sweets online from our website. We deliver best quality sweets to our
                    customers. The good thing is that you will get all types of sweets online on FoodieExpress.com. You
                    can always order your favorite sweets at any time you want.</p>
            </div>
        </div>
        <div class="service-container">
            <img src="homedelivery.png" alt="">
            <div class="service-description">
                <h2 class="secondaryheading">Free Home Delivery:</h2>
                <p>We provide free home delivery on all food items. Customers place the orders through the website and
                    we deliver the order at their door.</p>
            </div>
        </div>
        <div class="service-container   left">
            <img src="easy.png" alt="">
            <div class="service-description">
                <h2 class="secondaryheading">Simple Interface:</h2>
                <p>The interface of our website is user friendly. So everyone can use it to place the order online. It
                    is easy to use for everyone.</p>
            </div>
        </div>
        <div class="service-container">
            <img src="customer-service.png" alt="">
            <div class="service-description">
                <h2 class="secondaryheading">Customer Support:</h2>
                <p> We offer customer support services to address inquiries, concerns, and issues related to orders,
                    payments, or deliveries. Customer can contact us 24X7 through the website or they can mail us on our
                    email for any issue.</p>
            </div>
        </div>
        <div class="service-container  left">
            <img src="feedback.png" alt="">
            <div class="service-description">
                <h2 class="secondaryheading">Feedback:</h2>
                <p>We provide feedback option our website so that customers can give us their feedback and we can
                    improve our services according to customer's feedback.</p>
            </div>
        </div>
    </div>


    <footer>Copyright &copy; FoodieExpress.com All rights reserved.</footer>
    <script>
        var navlink=document.getElementsByClassName('nav-link');
        navlink[2].classList.add("active");
    </script>
</body>

</html>