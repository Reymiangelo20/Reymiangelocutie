<?php
    require_once("dbcon.php");

    $sql = "SELECT * FROM successful_transactions";
    $query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Successful_transaction.css">
    <title>Pending Appointments</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background: rgb(82, 72, 72); color: white;">
        <a class="navbar-brand" href="#"><img src="logo.png" alt="Logo" class="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="adminpage.php" style="color: white;">Accounts</a></li>
                <li class="nav-item"><a class="nav-link" href="pending_applicants.php" style="color: white;">Pending Applicants</a></li>
                <li class="nav-item"><a class="nav-link" href="pending_appointments.php" style="color: white;">Pending Appointments</a></a></li>
                <li class="nav-item"><a class="nav-link" href="Successful_transaction.php" style="color: white;">Successful Transactions</a></li>
                <li class="nav-item"><a class="nav-link" href="login_page.php" style="color: white;">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="table-container" id="container">
        <table class="table" border="2">
            <tr>
                <th>Client Name:</th>
                <th>Email:</th>
                <th>Type of service:</th>
                <th>Cost of Repair</th>
                <th>Service</th>
                <th>Technician email:</th>
                <th>Date</th>
                <th>Time</th>
                
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td> <?php echo $row['endUser_name'] ?></td>
                <td><?php echo $row['endUser_email'] ?></td>
                <td><?php echo $row['type_of_service'] ?></td>
                <td class="email"><?php echo $row['cost_of_repair'] ?></td>
                <td><?php echo $row['service'] ?> </td>
                <td><?php echo $row['technician_email'] ?></td>
                <td><?php echo $row['date'] ?></td></td>
                <td><?php echo $row['time'] ?></td></td>
            
              
            </tr>

            <?php
                }
            ?>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>