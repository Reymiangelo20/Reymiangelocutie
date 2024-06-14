<?php
require_once("dbcon.php");
$email = $_GET['email'];

$sql = "SELECT * FROM ongoing_appointment WHERE technician_email = '$email'";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ongoing Appointment</title>
    <link rel="website icon" href="icon/icon.png" type="png">
    <link rel="stylesheet" href="ongoing_appointment.css">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" id="container">
        <h1>Ongoing Appointment <i class="fa-solid fa-calendar-check"></i></h1>
        <div class="header">
            <label for="">Client Name:</label>
            <label for="">Date:</label>
            <label for="">Time:</label>
            <label for="">Status:</label>
            <label for="">Type of Service:</label>
            <label for="">Action:</label>
        </div>
        <hr>
        <?php
        while($row = mysqli_fetch_assoc($query)){
        ?>
        <div class="info">
            <p><?php echo $row['endUser_name'] ?></p>
            <p><?php echo date("F j, Y", strtotime($row['date'])); ?></p>
            <p><?php echo $row['time'] ?> </p>
            <p><?php echo $row['status'] ?></p>
            <p><?php echo $row['type_of_service']?></p>
            <button class="action_btn" onclick="show('message_collapse_<?php echo $row['id']; ?>','icon_<?php echo $row['id']; ?>','<?php echo $row['technician_email'] ?>','<?php echo $email ?>')"><i id="icon_<?php echo $row['id']; ?>" class="fa-solid fa-arrow-down"></i></button>
        </div>
        <div class="message" id="message_collapse_<?php echo $row['id']; ?>">
            <div class="contact">
                <p><i class="fa-solid fa-envelope"></i> <?php echo $row['endUser_email'] ?></p>
                <p><i class="fa-solid fa-phone"></i> +63<?php echo $row['endUser_contact'] ?></p>
                <input type="number" id="priceInput" name="price" placeholder="Enter price" style="display: none;" required>
                <button class="acceptBtn"id="accept" onclick="accept('<?php echo $row['type_of_service']; ?>','<?php echo $row['endUser_email']; ?>', '<?php echo $row['endUser_name']; ?>', '<?php echo $row['technician_email']; ?>', '<?php echo $row['date']; ?>', '<?php echo $row['time']; ?>', '<?php echo $row['id']; ?>')">Complete</button>
                <input type="hidden" id="technician_email" value="<?php echo $row['technician_email'] ?>">
                <input type="hidden" id="date_today" value="">
                <input type="hidden" id="apppoint_date" value="<?php echo $row['date']?>">
            </div>
        </div>
        <hr>
        <?php
        }
        ?>
    </div>
</div>
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeConfirmModal()">&times;</span>
        <p id="confirmModalMessage">Please input your transaction amount?</p>
        <input type="text" id="confirmAmountInput" placeholder="Enter amount" required>
        <button id="confirmOkBtn" onclick="completeTransaction()">OK</button>
    </div>
</div>
<div id="priceModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closePriceModal()">&times;</span>
        <p>Please input your transaction amount?</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="ongoing_appointment.js"></script>
</body>
</html>


<input type="hidden" id="type_of_service" value="">
<input type="hidden" id="endUser_email" value="">
<input type="hidden" id="endUser_name" value="">
<input type="hidden" id="technician_email" value="">
<input type="hidden" id="date" value="">
<input type="hidden" id="time" value="">
<input type="hidden" id="appointmentId" value="">