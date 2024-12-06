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
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $sql = "SELECT * FROM adminlogin WHERE email='$email' AND Password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $email;
            header("location: admin.php");
        } else {
            echo '<div id="error">Invalid Credentials</div>';
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #error {
            background-color: yellow;
            font-size: 1.1rem;
            color: red;
        }
    </style>
    <title>Admin Login</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Admin Login</h1>
        <form action="login.php" method="post" onsubmit="return validation()">
            <div id="error"></div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <script>
        function validation() {

            var password = document.getElementById('password').value;
            var email = document.getElementById('email').value;
            if (password.trim() === '') {
                document.getElementById('error').innerHTML = 'Password is required';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>