<?php
    require_once("dbcon.php");

    if(isset($_POST["submit"])){
        $user_input = $_POST['user_input'];
        $email = $_POST['email'];

        $sql = "UPDATE accounts SET verification_complete = '$user_input' WHERE email = '$email'";
        $query = mysqli_query($conn, $sql);

    }
    header("Location: login_page.php");
?>