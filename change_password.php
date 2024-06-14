<?php
    require_once("dbcon.php");
    $email = $_GET['email'];

    $sql = "SELECT * FROM accounts WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="website icon" href="icon/icon.png" type="png">
    <link rel="stylesheet" href="change_password.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="icon/icon.png" alt="" width="120" onclick="back('<?php echo $email ?>')">
        </div>
        <form action="change_pass.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <input type="hidden" name="email" value=<?php echo $row['email'] ?>>
            <h1>Change Password</h1>
            <!-- ALERT MESSAGE -->
            <div class="alert_current" id="alert_current">
                <p>Wrong Current Password!</p>
            </div>
            <div class="alert_invalid" id="alert_invalid">
                <p>The new password you enter is not match!</p>
            </div>

            <div class="change_pass">
                <input type="password" id="current_pass_input" required>
                <label for="current_pass_input">Current Password:</label>
            </div>
            <div class="change_pass">
                <input type="password" name="password" id="new_pass" required>
                <label for="new_pass">New Password:</label>
            </div>
            <div class="change_pass">
                <input type="password" id="confirm_pass" required>
                <label for="confirm_pass">Confirm Password:</label>
            </div>
            <input type="submit" name="submit" id="submit" value="submit" class="submit">
        </form>
        <input type="hidden" id="current_pass" value=<?php echo $row['password'] ?>>
        <button class="changeBtn" onclick="changepass()">Change Password</button>
    </div>

<script src="change_password.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>
</html>