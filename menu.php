<?php
session_start();
?>
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
    <style>
        .cart_button {
            background-color: orange;
            border: 2px solid black;
            border-radius: 40px;
            padding: 5px;
            width: 70px;
            position: fixed;
            right: 10px;
            bottom: 50px;
        }
    </style>

</head>

<body>
    <?php include ("navbar.php"); ?>
    <section id="menu">
        <div class="cart_button"><a href="cart.php"><img src="cart_icon.png" alt="" width="50"></a></div>
        <h1 class="primaryheading">Food Menu</h1>
        <div class="menu-container">
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'foodie express');
            $sql = "SELECT * FROM `items`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <div class="menu-item">
                    <img src="admin_panel/<?php echo $row['item_image']; ?>" alt="">
                    <h2 class="secondaryheading""><?php echo $row['item_name']; ?></h2>
                <p><strong>Price: </strong>&#8377; <?php echo $row['item_price']; ?></p>
                <div class=" container">
                        <form action="item_details.php" method="post">
                            <input type="hidden" class="form-control" name="item_id"
                                value="<?php echo $row['item_id']; ?>">
                            <button type="submit" class="btn" name="order_now"
                                style="border:2px solid green; color:green; margin-bottom:5px;">Order</button>
                        </form>
                </div>

            </div>
        <?php } ?>

    </section>
    <footer>Copyright &copy; FoodieExpress.com All rights reserved.</footer>
    <script>
        var navlink=document.getElementsByClassName('nav-link');
        navlink[1].classList.add("active");
        
    </script>
    <script src="foodieexpress.js"></script>
</body>

</html>