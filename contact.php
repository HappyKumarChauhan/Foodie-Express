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
    <title>FoodieExpress.com/contact</title>
</head>

<body>
    <?php include ("navbar.php"); ?>
    <?php include ("message.php"); ?>
    <section id="contact">
        <h1 class="primaryheading">Contact Us</h1>
        <div class="contact-container">
            <div class="contact-address">
                <div>
                    <img src="locationicon.png" alt="">
                    <h2 class="secondaryheading">Location</h2>
                    <p>Uttaranchal School of Computing Sciences, Chakrata Road, Prem Nagar, Dehradun, Uttarakhand
                        Pin-Code No. 248007</p>
                </div>
                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3443.3573664287305!2d77.94911527417396!3d30.340792004471577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3908d57b0db88cbf%3A0xaa4af6278f309f5b!2sUttaranchal%20School%20of%20Computing%20Sciences!5e0!3m2!1sen!2sin!4v1700926104729!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div>
                    <img src="emailicon.jpg" alt="">
                    <h2 class="secondaryheading">Email</h2>
                    <p>kumarhappy42000@gmail.com</p>
                </div>
                <div>
                    <img src="callicon.png" alt="">
                    <h2 class="secondaryheading">Phone No.</h2>
                    <p>6398012742</p>
                </div>
            </div>
            <div class="contact-form">
                <form action="contact.php" method="post" onsubmit="return messagevalidation()">
                    <h2 class="center secondaryheading">Message Us</h2>
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
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" cols="30" rows="7"
                            placeholder="Write your message here"></textarea>
                    </div>
                    <div>
                        <input class="btn" type="submit" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        var navlink=document.getElementsByClassName('nav-link');
        navlink[3].classList.add("active");
        function messagevalidation() {

            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            if (name.trim() === '') {
                document.getElementById('error').innerHTML = 'Name is required';
                return false;
            }

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('error').innerHTML = 'Invalid email address';
                return false;
            }

            return true;
        }
    </script>
    <footer>Copyright &copy; FoodieExpress.com All rights reserved.</footer>
    <script src="foodieexpress.js"></script>
</body>

</html>