<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="login_page.css">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
    <link rel="website icon" href="icon/icon.png" type="png">
</head>
<body>
    <div class="container" id="main">
        <div class="sign-in">
            <form action="login.php" method="POST">
                <div class="welcome">
                    <h1>Welcome to E-Locator</h1>
                    <p>Please Sign In to Continue</p>
                </div>
                <div class="email_not_verified" id="email_not_verified">
                    <p>The account you enter is not Verified <span class="icon"><i class="fa-solid fa-circle-exclamation"></i></span>
                        <span class="tooltip">Please verify your account, try to sign up again!</span>
                    </p>
                </div>
                <div class="wait_for_admin" id="wait_for_admin">
                    <p>This Account is reviewing , Please wait to approved by admin!</p>
                </div>
                <div class="wrong" id="wrong">
                    <p>Invalid Email or Password!</p>
                </div>
                <div class="account-login">
                    <input type="text" name="email" autocomplete="off" required>
                    <label for="email">Email</label> 
                </div>
                <div class="account-login">
                    <input type="password" name="password" autocomplete="off" required>
                    <label for="email">Password</label> 
                </div>
                <a href="forgotpassword_page.php" class="forgot">Forgot Password?</a>
                <button class="login_button" name="submit">Login</button>
                <a href="technician.php" class="technician"><i class="fa-solid fa-user"></i> Apply as Technician? </a>
            </form>
        </div>

        <div class="sign-up">
            <form action="add_accounts.php" method = "POST">
                <h1>Sign up</h1>
                <input type="hidden" name="account_type" value="end_user">
                <div class="account-signup">
                    <input type="text" name="email" id="email" autocomplete="off" required>
                    <label for="email">Email(example@gmail.com)</label>
                </div>

                <div class="account-signup">
                    <input type="text" name="first_name" autocomplete="off" required>
                    <label for="first_name">First Name</label>
                </div>

                <div class="account-signup">
                    <input type="text" name="last_name" autocomplete="off" required>
                    <label for="last_name">Last Name</label>
                </div>

                <div class="account-signup">
                    <input type="text" name="username" autocomplete="off" required>
                    <label for="username">Username</label>
                </div>

                <div class="account-signup">
                    <input type="text" name="address" autocomplete="off" required>
                    <label for="address">Adress (Complete address)</label>
                </div>

                <div class="account-signup">
                    <input type="text" name="contact_number" autocomplete="off" id="contact_number" required >
                    <label for="contact_number">Contact Number(09----)</label>
                </div>

                <div class="account-signup">
                    <input type="password" name="password" id="password" min="6" autocomplete="off" required>
                    <label for="password">Password</label>
                </div>

                <div class="account-signup">
                    <input type="password" id="confirm_password" name="confirm_password" autocomplete="off" required>
                    <label for="confirm_password">Confirm Password</label>
                </div>
                <input type="submit" class="form_button" id="form_button" name="submit">
                
            </form>
            <button class="create_account" onclick = "create_account()">Create Account</button>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-left">
                    <h1>Already have Account?</h1>
                    <p>Click Sign In Button to Connect Us Together! </p>
                    <button id="signIn">Sign In</button>
                </div>
                <div class="overlay-right">
                    <h1>Don't have Account?</h1>
                    <p>Click the Sign Up Button and Create Account! </p>
                    <button id="signUp">Sign up</button>
                </div>
            </div>
        </div>
    </div>


    <div class="popup-password" id="popup">
        <h1>Wrong Password</h1>
        <p>Please Make Sure that your password is correct</p>
        <button class = "ok" onclick = "popup_close()">OK</button>
    </div>

    <div class="valid-email" id="valid">
        <h1>Invalid Email</h1>
        <p>Please enter a valid email ending with @gmail.com</p>
        <button class = "ok" onclick = "valid_close()">OK</button>
    </div>

    <div class="contact_number-length" id="contact_length">
        <h1>Invalid Contact Number</h1>
        <p>Please enter a contact number that has 11 digits</p>
        <button class = "ok" onclick = "contact_close()">OK</button>
    </div>

    <div class="already_account" id="already_account">
        <h1>Already Have Account!</h1>
        <p>The email you enter is already exist</p>
        <button class = "ok" onclick = "already_close()">OK</button>
    </div>

    <div class="password_length" id="password_length">
        <h1>Password too short</h1>
        <p>Create password atleast 6 characters</p>
        <button class = "ok" onclick = "password_close()">OK</button>
    </div>


<script src="login_page.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>
</html>