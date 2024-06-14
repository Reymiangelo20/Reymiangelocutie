<?php
    require_once("dbcon.php");
    if(isset($_POST['yes'])){
        $user_id = $_POST['user_id'];

        $delete_accounts = "DELETE FROM accounts WHERE user_id = '$user_id'";
        $query = mysqli_query($conn, $delete_accounts);

        if($query){
            $delete_technician = "DELETE FROM technician_form WHERE user_id = '$user_id'";
            $query2 = mysqli_query($conn, $delete_technician);

            header("Location: adminpage.php");
        }
    }


?>