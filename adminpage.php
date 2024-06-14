<?php
    require_once("dbcon.php");
    $sql = "SELECT * FROM accounts WHERE approved = 'yes'";
    $query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="adminpage.css">
    <title>Admin page</title>
    <link rel="website icon" href="icon/icon.png" type="png">
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
                <li class="nav-item"><a class="nav-link" href="#services" style="color: white;">Pending Appointments</a></a></li>
                <li class="nav-item"><a class="nav-link" href="Successful_transaction.php" style="color: white;">Successful Transactions</a></li>
                <li class="nav-item"><a class="nav-link" href="login_page.php" style="color: white;">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="remove_modal" id="remove_modal">
        <div class="modal_info">
            <form action="delete_account.php" method="post">
                <input type="hidden" name="user_id" id="set_value">
                <h1>Are you sure you want to remove this account?</h1>
                <p>This account will delete permanently and the user cannot login this anymore</p>
                <div class="button">
                    <button class="btn-danger btnYes" name="yes">Yes</button>
                    <button type="button" class="btnNo" onclick="no()">No</button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-container" id="container">
        <table class="table" border="2">
            <tr>
                <th>Name</th>
                <th>Account type</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Contact No.</th>
                <th>User ID</th>
                <th>Remove</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
                <td><?php echo $row['account_type'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td class="email"><?php echo $row['email'] ?></td>
                <td>******</td>
                <td>+63<?php echo $row['contact_number'] ?></td>
                <td><?php echo $row['user_id'] ?></td>
                <td><button type="button" class="btn-danger" onclick="remove('<?php echo $row['user_id'] ?>')">Remove</button></td>
            </tr>

            <?php
                }
            ?>
        </table>
    </div>

   






    <script src="adminpage.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>