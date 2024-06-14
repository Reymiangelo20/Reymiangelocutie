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
    <title>Verify</title>
    <link rel="stylesheet" href="verification_page.css">
    <link rel="website icon" href="icon/icon.png" type="png">

</head>
<body>
    <div class="container" id="container">
        <div class="verify">
            <form action="verification.php" method="post">
                <input type="hidden" id="email" name="email" value="<?php echo $email ?>">
                <input type="hidden" id="verification_code" value="<?php echo $row['verification_code']; ?>">
                <input type="hidden" id="technician" value="<?php echo $row['account_type'] ?>"> 
                <h1>Verification Code Sent!</h1>
                <p>Please enter the verification code that we sent to your email!</p>
                <input type="text" class="verification_code" name="user_input" id="user_input" autocomplete="off"><br>
                <input type="submit" class="form_button" name="submit">
            </form>
            <button class="submit" onclick="submit()">Submit</button>
            <button class="resend" id="resend" onclick="newverification()">Resend Code?</button>
            <p class="sending" id="sending">Sending...</p>
            <div class="timer" id="timer">30s</div>
        </div>
    </div>
    <div class="modal" id="modal">
        <h1>Wrong Verification Code!</h1>
        <p>Please enter a correct verification code</p>
        <button class="ok" onclick="remove()">OK</button>
    </div>

    <div class="success" id="success">
        <div class="success_done">
            <h1>Account Successfully Created</h1>
            <p>You can now login to our page.</p>
            <button class="ok" onclick="remove_success()">OK</button>
        </div>
    </div>

    <div class="success_technician" id="technician_modal">
        <div class="success_done">
            <h1>Account Successfully Created</h1>
            <p>Your registration is pending. You will receive an email notification once your account has been approved.</p>
            <button class="ok" onclick="remove_success()">OK</button>
        </div>
    </div>


    

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="verification_page.js"></script>
</body>
</html>