<?php 
    require_once("dbcon.php");

    if($_SERVER['REQUEST_METHOD'] === "GET"){
        $technician_email = $_GET['technician_email'];
        $date = $_GET['date']; 

        $sql = "SELECT COUNT(*) AS appointment_count FROM ongoing_appointment WHERE technician_email = '$technician_email' AND date = '$date'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        
        if($row['appointment_count'] >= 3){
            echo json_encode(['success' => false]);
        } else {
            echo json_encode(['success' => true]);
        }
    }
?>
