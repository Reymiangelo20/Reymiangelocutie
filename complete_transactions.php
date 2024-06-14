<?php
    require_once("dbcon.php");
    $email = $_GET['email'];

    $sql = "SELECT * FROM successful_transactions WHERE technician_email = '$email'";
    $query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="website icon" href="icon/icon.png" type="png">
    <link rel="stylesheet" href="complete_transactions.css">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="website icon" href="icon/icon.png" type="png">
    <link rel="stylesheet" href="appointment_list.css">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" id="container">
        <h1>Appointment List <i class="fa-solid fa-calendar-check"></i></h1>
        <div class="header">
            <label for="">Client Name:</label>
            <label for="">Date:</label>
            <label for="">Time:</label>
            <label for="">Service Category:</label>
            <label for="">Cost of Repair:</label>
            <label for="">Action:</label>
        </div>
        <hr>
        <?php
                while($row = mysqli_fetch_assoc($query)){
            ?>
        <div class="info">

            <p><?php echo $row['endUser_name'] ?></p>
            <p><?php echo date("F j, Y", strtotime($row['date'])); ?></p>
            <p><?php echo date('h:i A', strtotime($row['time'])); ?> </p>
            <p><?php echo $row['type_of_service'] ?></p>
            <p><?php echo $row['cost_of_repair'] ?></p>
            <button class="action_btn" onclick="show('message_collapse_<?php echo $row['id']; ?>','icon_<?php echo $row['id']; ?>','<?php echo $row['technician_email'] ?>','<?php echo $email ?>')"><i id="icon_<?php echo $row['id']; ?>" class="fa-solid fa-arrow-down"></i></button>

        </div>
        <div class="message" id="message_collapse_<?php echo $row['id']; ?>">
         
                    <br>
            <div class="contact"> 
                <input type="hidden" id="update_endUser_message" value="Your appointment is accepted, please check your contact info if the technician contact you">
                <input type="hidden" id="accepted" value="accepted">
                <p><i class="fa-solid fa-envelope"></i> <?php echo $row['endUser_email'] ?></p>
                <input type="hidden" id="technician_email" value="<?php echo $row['technician_email'] ?>">
            </div>
            
        </div>
        <hr>
        <?php
            }
        ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="complete_transactions.js"></script>
</body>
</html>