<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password?</title>
    <link rel="stylesheet" href="forgotpassword_page.css">
    <link rel="website icon" href="icon/icon.png" type="png">
</head>
<body>
    <div class="container" id="main"> 
        <div class="forgot">
            <form action="forgot_password2.php" method="POST">
                <h1>Forgot Password?</h1>
                <p>Please enter your email. We will send you your temporary password.</p>
                <input type="text" name="email" id="email">
                <input type="submit" name="submit" id="form_button" class="submit">
            </form>
        <button class="btnsubmit" onclick="check()">Send</button>
        </div>
    </div>

    <div class="error" id="success_message">
        <h1>Sent Successfully</h1>
        <p>Please check your email, we already send your temporary password</p>
        <button class="ok" onclick="remove_success()">OK</button>
    </div>

    <div class="error" id="error_message">
        <h1>Invalid Email</h1>
        <p>Sorry, the email that you have entered is not registered yet, please sign up first to continue.</p>
        <button class="ok" onclick="remove_delete()">OK</button>
    </div>

<script src="forgotpassword_page.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>
</html>