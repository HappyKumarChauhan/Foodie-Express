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
    <title>FoodieExpress.com/home</title>
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php include("feedback.php"); ?>
    <section id="home">
        <div>
            <h1 class="primaryheading">Welcome to FoodieExpress.com</h1>
        </div>
        <p class="center">
            Say goodbye to long waits and busy restaurant lines – with our online food ordering website, you can enjoy a hassle-free dining experience delivered right to your doorstep.
        </p>
        <p class="center">
            So sit back, relax, and let us take care of your cravings.
        </p>
        <button class="btn" onclick="window.location.href='menu.php'">Order Now</button>
    </section>
    <section id="partners">
        <h1 class="primaryheading">Our Delivery Partners</h1>
        <div id="delivery-partners">
            <div class="box"><img src="swiggy.png" alt=""></div>
            <div class="box"><img src="ubereats.png" alt=""></div>
            <div class="box"><img src="zomato.png" alt=""></div>
        </div>
    </section>
    <section id="feedback">
        <h1 class="primaryheading">Feedback</h1>
        <div id="feedbackbox">
            <form action="foodieexpress.php" method="post" onsubmit="return validation()">
                <div id="error"></div>
                <div class="formgroup">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your Name">
                </div>
                <div class="formgroup">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your Email Address">
                </div>
                <div class="formgroup">
                    <label for="phone">Phone Number:</label>
                    <input type="phone" id="phone" name="phone" placeholder="Enter your Phone number">
                </div>
                <div class="formgroup">
                    <label for="feedback">Feedback:</label>
                    <textarea name="feedback" id="feedback" cols="30" rows="7" placeholder="Write your feedback here"></textarea>   
                </div>
                <div>
                    <input class="btn" type="submit" value="Submit Now">
                </div>
            </form>
        </div>
    </section>
    <footer>Copyright &copy; FoodieExpress.com All rights reserved.
    </footer>
    <script>
        var navlink=document.getElementsByClassName('nav-link');
        navlink[0].classList.add("active");
    </script>
    <script src="foodieexpress.js"></script>
</body>
</html>