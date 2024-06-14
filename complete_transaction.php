<?php
require_once("dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $price = $_POST['price'];
    $endUserEmail = $_POST['endUser_email'];
    $endUserName = $_POST['endUser_name'];
    $technicianEmail = $_POST['technician_email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $appointmentId = $_POST['appointmentId'];
    $type_of_service = $_POST['type_of_service'];

    $status = "Complete";

    $sqlInsert = "INSERT INTO successful_transactions (endUser_email, endUser_name, technician_email, type_of_service, date, time, status, cost_of_repair) 
                  VALUES ('$endUserEmail', '$endUserName', '$technicianEmail', '$type_of_service', '$date', '$time', '$status', '$price')";

    if (mysqli_query($conn, $sqlInsert)) {
        $sqlDelete = "DELETE FROM ongoing_appointment WHERE id = '$appointmentId'";
        if (mysqli_query($conn, $sqlDelete)) {
            $sql = "DELETE FROM appointment_list WHERE id = '$appointmentId'";
            if(mysqli_query($conn, $sql)){
                $sqlComment = "INSERT INTO able_comment (endUser_email, technician_email, status) VALUES ('$endUserEmail', '$technicianEmail', '1')";
            if (mysqli_query($conn, $sqlComment)) {
                echo "Transaction completed successfully.";
            } else {
                echo "Error inserting comment: " . mysqli_error($conn);
            }
        } else {
            echo "Error deleting appointment: " . mysqli_error($conn);
        }
    } 
    }else {
        echo "Error inserting transaction data: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}
?>