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
    $sql="select * from items where item_id= '$item_id' ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sorry!</strong> Item does not exists so you can not delete the item.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }else{
      $sql="DELETE FROM `items` WHERE item_id='$item_id'";
      $result=mysqli_query($conn,$sql);
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> The item has been deleted successfully.
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
  <title>Delete Item</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container">
      <form action="delitem.php" method="post" enctype="">
        <div class="mb-3">
          <label for="item-id" class="form-label">Item Id</label>
          <input type="text" class="form-control" id="item-id" name="item-id">
        </div>
        <button type="submit" class="btn btn-danger">Delete Item</button>
      </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>