<?php
    require_once("dbcon.php");
    if(isset($_POST['submit'])){
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $sql = "UPDATE accounts SET password = '$password' WHERE user_id = '$user_id'";
        $query = mysqli_query($conn, $sql);

        if($query){
            header("Location:endUser_page.php?email=$email");
        }
    }

?>