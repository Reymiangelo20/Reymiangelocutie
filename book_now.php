<?php
    require_once("dbcon.php");

    if($_SERVER["REQUEST_METHOD"]==="GET"){
        $user_id = $_GET['user_id'];

        $sql = "SELECT * FROM technician_form WHERE user_id = '$user_id'";
        $query = mysqli_query($conn, $sql);

        if($query){
            $tech = mysqli_fetch_assoc($query);
            echo json_encode(["success" => true, "data" => $tech]);
        }
    }
    
?>
