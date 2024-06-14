<?php
    require_once("dbcon.php");

    if(isset($_POST['sendBtn'])){
        $endUser_email = $_POST['endUser_email'];
        $username = $_POST['username'];
        $technician_email = $_POST['technician_email'];
        $rate = $_POST['rate'];
        $comments = $_POST['comments'];
        $user_id = $_POST['user_id'];

        $sql = "INSERT INTO review VALUES('$endUser_email','$username','$comments','$technician_email','$rate','','$user_id')";
        $query = mysqli_query($conn, $sql);

        if($query){
            $update = "UPDATE technician_form SET ratings = '$rate' WHERE email = '$technician_email'";
            $update_query = mysqli_query($conn, $update);

            header("Location: endUser_page.php?email=$endUser_email");
        }
    }

?>