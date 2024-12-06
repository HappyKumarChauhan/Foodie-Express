<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="d-grid gap-2">
 <h1 class="text-center my-5">Admin Panel</h1>
  <button class="btn btn-success col-md-8 mx-auto" type="button" onclick="window.location.href='additem.php'">Add a New Product</button>
  <button class="btn btn-danger col-md-8 mx-auto" type="button" onclick="window.location.href='delitem.php'">Delete a Product</button>
  <button class="btn btn-secondary col-md-8 mx-auto" type="button" onclick="window.location.href='logouot.php'">Log Out</button>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>