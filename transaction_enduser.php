<?php
    require_once("dbcon.php");
    $email = $_GET['email'];

    $sql = "SELECT * FROM successful_transactions WHERE endUser_email = '$email'";
    $query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="website icon" href="icon/icon.png" type="png">
    <link rel="stylesheet" href="transaction_enduser.css">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" id="container">
        <h1>Successful Transactions <i class="fa-solid fa-calendar-check"></i></h1>
        <div class="header">
            <label for="">Technician Name:</label>
            <label for="">Date:</label>
            <label for="">Time:</label>
            <label for="">Status:</label>
            <label for="">Price:</label>
        </div>
        <hr>
        <?php
                while($row = mysqli_fetch_assoc($query)){
            ?>
        <div class="info">

            <p><?php echo $row['technician_email'] ?></p>
            <p><?php echo date("F j, Y", strtotime($row['date'])); ?></p>
            <p><?php echo date('h:i A', strtotime($row['time'])); ?> </p>
            <p><?php echo $row['status'] ?></p>
            <p>P<?php echo $row['cost_of_repair']?></p>
        </div>
        <div class="message" id="message_collapse_<?php echo $row['id']; ?>">
           
    
            
        </div>
        <hr>
        <?php
            }
        ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="transaction_enduser.js"></script>
</body>
</html>