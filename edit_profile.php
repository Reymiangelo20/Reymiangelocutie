<?php
    require_once("dbcon.php");
    $email = $_GET['email'];

    $sql = "SELECT * FROM accounts WHERE email = '$email'";
    $user = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="website icon" href="icon/icon.png" type="png">
    <link rel="stylesheet" href="edit_profile.css">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="icon/icon.png" alt="" width="120" onclick="back('<?php echo $email ?>')">
        </div>
        <form action="editProfile_function.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="email" value="<?php echo $email ?>">
            <h1>Edit Profile</h1>
            <div class="info">
                <div class="edit-profile">
                    <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name'] ?>" autocomplete="off" required>
                    <label for="first_name">First Name</label>
                </div>
            
                <div class="edit-profile">
                    <input type="text" id="last_name" name="last_name" autocomplete="off" value="<?php echo $row['last_name'] ?>" required>
                    <label for="last_name">Last Name</label>
                </div>

                <div class="edit-profile">
                    <input type="text" id="username" name="username" autocomplete="off" value="<?php echo $row['username'] ?>" required>
                    <label for="username">Username</label>
                </div>

                <div class="edit-profile">
                    <input type="text" id="contact_number" name="contact_number" value="0<?php echo $row['contact_number'] ?>" autocomplete="off" required>
                    <label for="contact_number">Contact Number</label>
                </div>

                <div class="profile">
                    <div class="profile_pic">
                        <img src="icon/icon.png" alt="" id="image">
                    </div>
                    <div class="uploadbtn">
                        <label for="input"><i class="fa-solid fa-upload"></i> Upload Picture</label>
                        <input type="file" id="input" name="input" accept="image/png, image/jpeg, image/gif, image/webp, image/svg"> 
                    </div>
                </div>
            </div>
            <button class="savebtn" name="save_changes">Save Changes</button>
        </form>
    </div>
<script src="edit_profile.js"></script>
</body>
</html>