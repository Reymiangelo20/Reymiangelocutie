<?php
    require_once("dbcon.php");
    if(isset($_GET['email'])){
        $email = $_GET['email'];

        $sql = "SELECT email FROM accounts WHERE email = '$email'";
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) > 0){
            echo json_encode(['exist' => true]);
        }
        else{
            echo json_encode(['exist' => false]);
        }
    }

?>