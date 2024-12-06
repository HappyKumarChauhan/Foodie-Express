<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Feedback = $_POST['feedback'];
    $conn = mysqli_connect('localhost', 'root', '', 'foodie express');
    if ($conn) {
        $query = "INSERT INTO `feedback`(`Name`, `Email`, `Phone`, `Feedback`) VALUES ('$Name','$Email','$Phone','$Feedback')";
        mysqli_query($conn, $query);
        echo '<div id="alert-box" class="success">
        <span><strong>Success! </strong>Your feedback has been received successfully.</span>
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