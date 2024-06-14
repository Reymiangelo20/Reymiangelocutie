<?php
    require_once("dbcon.php");
    $email = $_GET['email'];

    $sql = "SELECT * FROM appointment_list WHERE technician_email = '$email'";
    $query = mysqli_query($conn, $sql);
   
    if($query){
        $select = "SELECT * FROM appointment_list WHERE technician_email = '$email'";
        $select_query = mysqli_query($conn, $select);

        $row2 = mysqli_fetch_assoc($select_query);
    }
    
?>

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
            <label for="">Status:</label>
            <label for="">Service Category:</label>
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
            <p id="status"><?php echo $row['status'] ?></p>
            <p><?php echo $row['type_of_service'] ?></p>
            <button class="action_btn" onclick="show('message_collapse_<?php echo $row['id']; ?>','icon_<?php echo $row['id']; ?>','<?php echo $row['technician_email'] ?>','<?php echo $email ?>','<?php echo $row['transaction_number'] ?>')"><i id="icon_<?php echo $row['id']; ?>" class="fa-solid fa-arrow-down"></i></button>
        </div>
        <div class="message" id="message_collapse_<?php echo $row['id']; ?>">
            <p><?php echo $row['technician_message'] ?> <?php echo $row['service'] ?></p>
                    <br>
            <div class="contact"> 
                <input type="hidden" id="update_endUser_message" value="Your appointment is accepted, please check your contact info if the technician contact you">
                <input type="hidden" id="accepted" value="accepted">
                <p><i class="fa-solid fa-phone"></i> +63<?php echo $row['end_user_contact'] ?></p>
                <p><i class="fa-solid fa-envelope"></i> <?php echo $row['endUser_email'] ?></p>
                <button class="seeLocation" onclick="seeLocation('<?php echo $row['endUser_address']?>')">See Location <i class="fa-solid fa-location-dot"></i></button>
                <!--<button class="chatBtn" onclick="chats('<?php echo $row['endUser_email'] ?>')">Chat</button>-->
                <button class="acceptBtn" id="acceptBtn" onclick="accept('<?php echo $row['type_of_service']; ?>','<?php echo $row['end_user_contact']; ?>','<?php echo $row['endUser_email']; ?>', '<?php echo $row['endUser_name']; ?>', '<?php echo $row['technician_email']; ?>', '<?php echo $row['date']; ?>', '<?php echo $row['time']; ?>', '<?php echo $row['id']; ?>')">Accept</button>
                <button class="cancelBtn" onclick="cancelbook()">Declined</button>
                <input type="hidden" id="technician_email" value="<?php echo $row['technician_email'] ?>">
            </div>
            
        </div>
        <hr>
        <?php
            }
        ?>
    </div>
    <div class="cancel_modal" id="cancel_modal">
        <h1>Are you sure you want to cancel your book?</h1>
        <div class="modal_button">
            <button type="button" class="btnYes" onclick="delete_book()">Yes</button>
            <button class="btnNo" type="button" onclick="close_modal()">No</button>
    
        </div>
    </div>
    <div class="reason" id="reason">
        <div class="reason_info">
            <h1>Reason why you cancel your book?</h1>
            <form action="appointment_List_cancel_book.php" method="post">
                <input type="hidden" name="techa" id="techa" value="">
                <input type="hidden" name="transaction" id="transaction" value=""> 
                <input type="hidden" name="endUser_email" id="endUser_email" value="">
                <input type="hidden" name="endUser_name" id="endUser_name" value="">
                <input type="hidden" name="tech_name" id="tech_name" value="">
                <select name="reason_cancel" id="reason_select">
                    <option value=""></option>
                    <option value="Personal Emergency">Personal Emergency</option>
                    <option value="Health Issue">Health Issue</option>
                    <option value="Transportation Problem">Transportation Problem</option>
                    <option value="Overbooking">Overbooking</option>
                    <option value="Inclement Weather">Inclement Weather</option>
                    <option value="Communication issues">Communication issues</option>
                    <option value="Technical Malfunction">Technical Malfunction</option>
                    <option value="Distance Constraints">Distance Constraints</option>
                    <option value="Personal reasons">Personal reasons</option>
                    <option value="Rescheduling">Rescheduling</option>
                    <option value="Others">Others</option>
                </select>
                <br>
                <input type="text" name="others" id="others" placeholder="Type your reason" autocomplete="off">
                <button type="submit" name="submit" class="cancel">Cancel Book</button>
                <button type="button" class="close" onclick="close_reason()">Close</button>
            </form>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="appointment_list.js"></script>
</body>
</html>