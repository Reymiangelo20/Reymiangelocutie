<?php
    require_once("dbcon.php");
    if($_SERVER["REQUEST_METHOD"]==="GET"){
        $email = $_GET['email'];

        $sql = "SELECT email FROM accounts WHERE email = '$email'";
        $query = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($query);
        $email_data = $row['email'];

        if($email === $email_data){
            echo json_encode(['success' => true]);
        }

        else if($email !== $email_data){
            echo json_encode(['success' => false]);
        }
    }



?>