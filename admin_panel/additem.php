<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foodie express";
    $conn = mysqli_connect($server, $username, $password, $dbname);
    if (!$conn) {
        echo "Failed to connect to database.";
    } else {
        $item_id = $_POST["item-id"];
        $item_name = $_POST["item-name"];
        $item_price = $_POST["item-price"];
        $filename = $_FILES["item-image"]["name"];
        $tempname = $_FILES["item-image"]["tmp_name"];
        $item_image = "item_images/" . $filename;
        move_uploaded_file($tempname, $item_image);
        $sql="SELECT * FROM `items` WHERE item_id='$item_id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> Item already exists with the same item id so you can not add this item.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            $sql = "INSERT INTO `items`(`item_id`, `item_name`, `item_price`, `item_image`) VALUES ('$item_id','$item_name','$item_price','$item_image')";
            $result = mysqli_query($conn, $sql);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> New Item has been added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'; 
        }      
    }

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Add a New Item</h1>
        <form action="additem.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="item-id" class="form-label">Item Id</label>
                <input type="text" class="form-control" id="item-id" name="item-id">
            </div>
            <div class="mb-3">
                <label for="item-name" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="item-name" name="item-name">
            </div>
            <div class="mb-3">
                <label for="item-price" class="form-label">Item Price</label>
                <input type="text" class="form-control" id="item-price" name="item-price">
            </div>
            <div class="mb-3">
                <label for="item-image" class="form-label">Item Image</label>
                <input type="file" class="form-control" id="item-image" name="item-image">
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
    <!-- <div>
        <?php
        $sql = "SELECT * FROM `items`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><img src="<?php echo $row['item_image']; ?>" width="300" alt="" </td>
            <tr>
            <?php } ?>
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>