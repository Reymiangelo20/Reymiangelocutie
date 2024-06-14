<?php
require_once("dbcon.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $appointmentId = $_POST['appointmentId'];

    $sql = "DELETE FROM appointment_list WHERE id = '$appointmentId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => mysqli_error($conn)]);
    }
}
?>