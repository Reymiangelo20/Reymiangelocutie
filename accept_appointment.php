<?php
require_once("dbcon.php");

if($_SERVER['REQUEST_METHOD']==="POST"){
   
    $endUser_email = $_POST['endUser_email'];
    $endUser_name = $_POST['endUser_name'];
    $technician_email = $_POST['technician_email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $status = "Ongoing";
    $appointmentId = $_POST['appointmentId'];
    $update_endUser_message = $_POST['update_endUser_message'];
    $accepted = $_POST['accepted'];
    $end_user_contact = $_POST['end_user_contact'];
    $type_of_service = $_POST['type_of_service'];

  
    $sql_insert = "INSERT INTO ongoing_appointment VALUES ('','$endUser_email', '$endUser_name','$end_user_contact', '$technician_email', '$date', '$time', '$status','$type_of_service')";
    $sql_insert_query = mysqli_query($conn, $sql_insert);

    if($sql_insert_query){
        $sql_delete = "UPDATE appointment_list SET endUser_message = '$update_endUser_message', `status` = '$accepted' WHERE endUser_email = '$endUser_email'";
        $sql_delete_query = mysqli_query($conn, $sql_delete);

        if($sql_delete_query){
            echo json_encode(['success'=> true]);
        }
    }
          
}
  

?>