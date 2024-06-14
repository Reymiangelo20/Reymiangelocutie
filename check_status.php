<?php
require_once("dbcon.php");

if($_SERVER["REQUEST_METHOD"]==="GET"){
    $endUser_email = $_GET['endUser_email'];
    $technician_email = $_GET['technician_email'];

    $sql = "SELECT * FROM able_comment WHERE endUser_email = '$endUser_email' AND technician_email = '$technician_email'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $status = $row['status'];
    

    // Return JSON response indicating whether to display the review section
    echo json_encode(["success" => ($status === '1')]);
}
?>
