<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    include '_dbconnect.php';
        $uname=$_POST["username"];
        $pass=$_POST["password"];
        $sql="SELECT * FROM users WHERE Username='$uname' AND Password='$pass'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1){
          $login=true;
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['username']=$uname;
          header("location: welcome.php");
        }else{
          echo "Invalid credentials.";
        }
  }
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1 class="text-center">Log In</h1>
    <form action="/login/login.php" method="post">
        <div class="mb-3">
        <label for="uname" class="form-label">Username</label>
        <input type="text" class="form-control" id="uname" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
        <label for="pass" class="form-label">Password</label>
        <input type="password" class="form-control" id="pass" name="password">
        </div>
        <button type="submit" class="btn btn-primary">login</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>