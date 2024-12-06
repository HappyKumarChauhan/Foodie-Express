<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = mysqli_connect('localhost', 'root', '', 'foodie express');
        if ($conn) {
                if (isset($_POST['purchase'])) {
                        $Full_name = $_POST['full_name'];
                        $Phone = $_POST['phone'];
                        $Address = $_POST['address'];
                        $Payment_method = $_POST['payment_method'];
                        $sql1 = "INSERT INTO `orders`(`Full_name`, `Phone`, `Address`, `Payment_method`) VALUES ('$Full_name','$Phone','$Address','$Payment_method')";
                        $result = mysqli_query($conn, $sql1);
                        $order_id = mysqli_insert_id($conn);
                        if ($result) {
                                foreach ($_SESSION['cart'] as $key => $values) {
                                        $item_name = $values['item_name'];
                                        $item_price = $values['item_price'];
                                        $quantity = $values['qty'];
                                        $sql2 = "INSERT INTO `order_detail`(`Order_id`, `Item_name`, `Price`, `Quantity`) VALUES ('$order_id','$item_name','$item_price','$quantity')";
                                        $result = mysqli_query($conn, $sql2);
                                        echo '<script>alert("Order Placed.");
                                        window.location.href="foodieexpress.php";
                                        </script>'; 
                                        unset($_SESSION['cart']);
                                }
                        } else {
                                echo '<script>alert("Failed to place the order.");
                                        window.location.href="cart.php";
                                        </script>';
                        }

                }
        } else {
                echo '<script>alert("Connection failed.");
        window.location.href="cart.php";
        </script>';
        }
}
?>