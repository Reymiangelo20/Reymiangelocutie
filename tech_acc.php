<?php
    require_once("dbcon.php");
    $email = $_GET['email'];

  
    $sql = "SELECT * FROM technician_form WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);

   
    if ($query) {

        $row = mysqli_fetch_assoc($query);
        
        
        $user_id = $row['user_id'];
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $username = $row['username'];
        $contact = $row['contact_number'];
        $address = $row['address'];
        $time_availability = $row['time_availability'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-DHSKfqZk5y3YSyP2KN3x1yVvQRnwBM2SA8xl6fJP5xLWIkC3mE+BmMC5LBJxyCZ4NRC0JcD8d4yh7xRzpZt8ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="tech_acc.css">
    <title>User Page</title>
</head>
<body>
<div class="container">
        <div class="sidebar">
       
            <a href="#"><i class="fas fa-user-circle" title="Profile"></i></a>
            <a href="appointment_list.php?email=<?php echo urlencode($email); ?>"><i class="fas fa-calendar-alt fa-lg" title="Appointment Lists"></i></a>
            <a href="ongoing_appointment.php?email=<?php echo urlencode($email); ?>"><i class="fas fa-clock fa-lg" title="Ongoing Appointments"></i></a>
            <a href="complete_transactions.php?email=<?php echo urlencode($email); ?>"><i class="fas fa-check-circle"title="Successful Transactions"></i></a>
            <a href="edit_technician.php?user_id=<?php echo $user_id; ?>"><i class="fas fa-cog" title="Account Settings"></i></a>
            <a href="login_page.php"><i class="fas fa-sign-out-alt"title="Logout"></i></a>
        </div>
        <div class="main-content">
            <h1>Technician Account</h1>
            <hr>
            <img class="info" src="<?php echo $row['profile_picture'] ?>" alt="">
            <div class="data">
            <h3><?php echo $firstname . " " . $lastname; ?></h3>
                <h3>Username: <?php echo $username; ?></h3>
                <h3>Email: <?php echo $email; ?></h3>
                <h3>Contact Number: <?php echo $contact; ?></h3>
                <h3>Address: <?php echo $address; ?></h3>
                <h3>Time Availability: <?php echo $time_availability; ?></h3>
            </div>
        </div>
    </div>
    <script src="tech_acc.js"></script>
</body>
</html>