<?php
    require_once("dbcon.php");

    if($_SERVER["REQUEST_METHOD"]==="GET"){
        $transaction_number = $_GET['transaction_number'];
    

        $sql = "SELECT * FROM appointment_list WHERE transaction_number = '$transaction_number'";
        $query = mysqli_query($conn, $sql);

        if($query){
            $tech = mysqli_fetch_assoc($query);
            echo json_encode(["success" => true, "data" => $tech]);
        }
    }
    
?>
