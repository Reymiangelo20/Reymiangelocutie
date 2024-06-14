<?php
    require_once("dbcon.php");
    $email = $_GET['email'];

    $sql = "SELECT * FROM appointment_list WHERE endUser_email = '$email'";
    $query = mysqli_query($conn, $sql);

    if($query){
        $select = "SELECT * FROM appointment_list WHERE endUser_email = '$email'";
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
    <link rel="stylesheet" href="appointment.css">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" id="container">
        <div class="header_container">
            <img src="icon/icon.png" alt="" width="120" onclick="back('<?php echo $email ?>')">
        </div>
        <h1>Your Appointment <i class="fa-solid fa-calendar-check"></i></h1>
        <div class="header">
            <label for="">Technician Name:</label>
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
            <p><?php echo $row['technician_name'] ?></p>
            <p><?php echo date("F j, Y", strtotime($row['date'])); ?></p>
            <p><?php echo date('h:i A', strtotime($row['time'])); ?></p>
            <p id="status"><?php echo $row['status'] ?></p>
            <p><?php echo $row['type_of_service'] ?></p>
            <button class="action_btn" onclick="show('message_collapse_<?php echo $row['id']; ?>','icon_<?php echo $row['id']; ?>','<?php echo $row['technician_email'] ?>','<?php echo $email ?>')"><i id="icon_<?php echo $row['id']; ?>" class="fa-solid fa-arrow-down"></i></button>
        </div>
        <div class="message" id="message_collapse_<?php echo $row['id']; ?>">
            <p><?php echo $row['endUser_message'] ?> </p>
            <h3>Contact Technician Via:</h3>
            <div class="contact">
                <p><i class="fa-solid fa-phone"></i> +63<?php echo $row['technician_contact'] ?></p>
                <p><i class="fa-solid fa-envelope"></i> <?php echo $row['technician_email'] ?></p>
                <a href="<?php echo $row['technician_social'] ?>">Social Media Link Here</a>
                <!------<button class="chatBtn" onclick="chats('<?php echo $row['endUser_email'] ?>')">Chats</button>------->
                <button class="cancelBtn" id="cancel_btn" onclick="cancelbook()">Cancel Book</button>
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
            <form action="appointment_cancelBook.php" method="post">
                <input type="hidden" name="techa" id="techa" value="">
                <input type="hidden" name="endUser_email" id="endUser_email" value="<?php echo $email ?>">
                <input type="hidden" name="endUser_name" id="endUser_name"  value="">
                <select name="reason_cancel" id="reason_select">
                    <option value=""></option>
                    <option value="Schedule conflicts">Schedule conflicts</option>
                    <option value="Illness or health issues">Illness or health issues</option>
                    <option value="Financial constraints">Financial constraints</option>
                    <option value="Change in priorities">Change in priorities</option>
                    <option value="Lack of perceived value">Lack of perceived value</option>
                    <option value="Communication issues">Communication issues</option>
                    <option value="Unsatisfactory past experiences">Unsatisfactory past experiences</option>
                    <option value="Logistical challenges">Logistical challenges</option>
                    <option value="Personal reasons">Personal reasons</option>
                    <option value="Rescheduling">Rescheduling</option>
                </select><br>
                <button type="submit" name="submit" class="cancel">Cancel Book</button>
                <button type="button" class="close" onclick="close_reason()">Close</button>
            </form>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="appointment.js"></script>
</body>
</html>