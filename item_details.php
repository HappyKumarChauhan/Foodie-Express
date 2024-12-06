<?php 
session_start();
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['order_now'])){
        $item_id=$_POST['item_id'];
        $conn = mysqli_connect('localhost', 'root', '', 'foodie express');
            $sql = "SELECT * FROM `items` WHERE item_id=$item_id";
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" media="screen and (max-width: 850px)" href="CSS/phone.css">
    <style>
        body {
            font-family: 'Agbalumo';
        }

    </style>
    <title>Item Details</title>
</head>

<body>
    <?php include('navbar.php');?>
    <div class="container p-4 gap-3 mt-5 item-details-container d-flex">
        
        <div class="item-image col-md-7 border rounded center">
            <img width="80%" src="admin_panel/<?php echo $row['item_image']; ?>" alt="">
        </div>
        <div class="item-description col-md-5 border p-4">
            <h1 class="center mb-3">Item Description</h1>
            <h2>Item Name: <?php echo $row['item_name']; ?></h2>
            <h3>Price: </strong>&#8377; <?php echo $row['item_price']; ?></h3>
            <form action="manage_cart.php" method="post">
                <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
            <div class="qty d-flex gap-1">
                <h4>Select Quantity:</h4>
                <input type="number" name="qty" id="" value="1" style="font-size:1.2rem; width:40px;" disabled>
            </div>
            <button class="btn btn-lg btn-outline-success" name="add_to_cart" type="submit">Add to cart</button>
            </form>
        </div>
    </div>
</body>

</html>