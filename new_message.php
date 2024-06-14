<?php
    require_once("dbcon.php");

    if(isset($_POST['send'])){
        $technician_email = $_POST['technician_email'];
        $end_user_email = $_POST['end_user_email'];
        $end_user_message = $_POST['end_user_message'];

        $sql = "INSERT INTO chats (end_user_email, technician_email, technician_message, end_user_message, date_time) VALUES ('$end_user_email','$technician_email','','$end_user_message','')";
        $query = mysqli_query($conn, $sql);

        header("Location: chats.php?email=$end_user_email");

    }

?>