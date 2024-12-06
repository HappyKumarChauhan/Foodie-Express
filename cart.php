<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: users/login.php");
        exit;
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" media="screen and (max-width: 850px)" href="CSS/phone.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Agbalumo';
        }

        form {
            width: 100%;
        }
    </style>
    <title>Cart</title>
</head>

<body>
    <?php include ("navbar.php"); ?>

    <div class="container mx-auto px-0">
        <h1 class="text-center my-5 pb-2 rounded" style="background-color:#dcdbdb;">My Cart</h1>
        <div class="border rounded my-2">
            <table class="table mx-0 px-0">
                <thead class="text-center">
                <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $sr = 0;
                        $conn = mysqli_connect('localhost', 'root', '', 'foodie express');
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $item_id=$value["item_id"];
                            $sql = "SELECT * FROM `items` WHERE item_id=$item_id";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $sr++;
                            echo '<tr>
                            <td>' . $sr . '</td>
                            <td>' . $row["item_name"] . '</td>
                            <td>' . $row["item_price"] . '<input type="hidden" class="iprice" value="' . $row["item_price"] . '" </td>
                            <td >
                            <form action="manage_cart.php" method="post">
                            <input type="hidden" value="' . $row["item_id"] . '" name="item_id">
                            <input style="width:5vw" type="number" name="modify_qty" id="" value="' . $value["qty"] . '" class="iqty text-center" onchange="this.form.submit()"></td>
                            </form>
                            <td class="itotal"></td>
                            <td> 
                            <form action="manage_cart.php" method="post">
                            <input type="hidden" value="' . $row["item_id"] . '" name="item_id">
                            <button class="btn btn-sm btn-outline-danger" name="remove_item" type="submit">Remove</button>
                            </form>
                            </td>
                        </tr> ';
                        }
                    }
                    $sr = 0;

                    ?>
                </tbody>
            </table>
        </div>
        <div class="container border rounded mb-3" style="background-color:#dcdbdb;">
            <div class="card my-3">
                <div class="card-body">
                    <span style="font-size:1.5rem; font-weight:bolder;" class="card-title">Grand Total:</span>
                    <span style="font-size:1.5rem; font-weight:bolder;" class="card-text" id="gtotal">0</span>
                </div>
            </div>
            <?php
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                ?>
                <form class="mb-2" onsubmit="return validation()" action="purchase.php" method="post">
                    <div id="error"></div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="name" name="full_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        Payment Method: &nbsp;
                        <input class="form-check-input" type="radio" name="payment_method" id="p-method" value="cod"
                            checked>
                        <label class="form-check-label" for="p-method">Cash On Delivery</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success" name="purchase">Place Order</button>
                    </div>
                </form>
                <?php
            }
            ?>

        </div>

    </div>
    <script>

        function validation() {
            var name = document.getElementById('name').value;
            var phoneNumber = document.getElementById('phone').value;
            if (name.trim() === '') {
                document.getElementById('error').innerHTML = 'Name is required';
                return false;
            }
            var phoneNumberRegex = /^\d{10}$/; // Assumes a 10-digit phone number
            if (!phoneNumberRegex.test(phoneNumber)) {
                document.getElementById('error').innerHTML = 'Invalid phone number';
                return false;
            }
            return true;
        }

        var iprice = document.getElementsByClassName('iprice');
        var iqty = document.getElementsByClassName('iqty');
        var itotal = document.getElementsByClassName('itotal');
        var gt = 0;
        console.log(iprice, iqty, itotal);
        function updateTotal() {
            gt = 0;
            for (let i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value) * (iqty[i].value);
                gt += (iprice[i].value) * (iqty[i].value);
            }
            document.getElementById('gtotal').innerText = gt;
        }
        updateTotal();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>