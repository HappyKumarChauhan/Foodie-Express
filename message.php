<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Message = $_POST['message'];
    $conn = mysqli_connect('localhost', 'root', '', 'foodie express');
    if ($conn) {
        $query = "INSERT INTO `message`(`Name`, `Email`, `Message`) VALUES ('$Name','$Email','$Message')";
        mysqli_query($conn, $query);
        echo '<div id="alert-box" class="success">
        <span><strong>Thank You! </strong>Your response has been recorded successfully. We will contact you on your email.</span>
        <button onclick="dismiss()"><img src="close.png" alt=""></button>
    </div>';
    } else {
        echo '<div id="alert-box" class="danger">
        <span><strong>Sorry! </strong>Some error occured please try again after some time.</span>
        <button onclick="dismiss()"><img src="close.png" alt=""></button>
    </div>';
    }
}
?>