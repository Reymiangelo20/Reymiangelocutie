<?php
    require_once("dbcon.php");
    $email = $_GET['email'];
    
    $sql = "SELECT * FROM technician_form WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);

    if($query){
        $fetch_img = "SELECT * FROM technician_form WHERE email = '$email'";
        $fetch = mysqli_query($conn, $fetch_img);

        $row_img = mysqli_fetch_assoc($fetch);
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Form</title>
    <link rel="website icon" href="icon/icon.png" type="png">
    <link rel="stylesheet" href="applicants.css">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" id="container">
        <h1>Applicant Information</h1>
        <form action="" method="POST">
            <?php
                while($row = mysqli_fetch_assoc($query)){
            ?>
            <div class="applicant_info">
                <p>First Name: <span><?php echo $row['first_name'] ?></span></p>
                <p>Last Name: <span><?php echo $row['last_name'] ?></span></p>
                <p>Applying as: <span><?php echo $row['position'] ?></span></p>
                <p>Email: <strong class="email"><?php echo $row['email'] ?></strong></p>
                <p>Username: <span><?php echo $row['username'] ?></span></p>
                <p>Contact Number: <span>+63<?php echo $row['contact_number'] ?></span></p>
                <p>Business Name: <span><?php echo $row['business_name'] ?></span></p>
                <p>Social Media/Business Link: <span><?php echo $row['social_media'] ?></span></p>
                <p>Address: <span class="address"><?php echo $row['address'] ?> <?php echo $row['barangay'] ?> <?php echo $row['city'] ?> <?php echo $row['province'] ?></span></p>
            </div>
            <div class="applicant_images">
                <div class="profile_image">
                    <label for="profile">Profile Picture:</label>
                    <img src="<?php echo $row['profile_picture'] ?>" id='profile' alt="" srcset="" onclick="open_img()">
                </div>
                <div class="valid_id">
                    <label for="valid">Valid ID:</label>
                    <img src="<?php echo $row['valid_id'] ?>" id='valid' alt="" srcset="" onclick="valid_img()">
                </div>
                <div class="business_permit">
                    <label for="valid">Business Permit:</label>
                    <img src="<?php echo $row['business_permit'] ?>" id='valid' alt="" srcset="" onclick="business_img()">
                </div>
                <div class="resume">
                    <label for="cv">Curriculum Vitae:</label>
                    <a href="<?php echo $row['curriculum_vitae'] ?>" download>Download CV</a>
                </div>
            </div>
            <?php
                }
            ?>
        </form>
        <div class="button">
            <button class="accept" onclick="accept()">Accept</button>
            <button class="declined" onclick="declined()">Declined</button>
        </div>
    </div>

    <!---ACCEPT MODAL--->
    <div class="accept_modal" id="accept_modal">
        <div class="modal_info">
            <h1>Are you sure?</h1>
            <p>are you sure that this applicant is qualified?</p>
            <div class="modal_button">
                <form action="accept_applicant.php" method="post">
                    <input type="hidden" class="applicant_name" name="applicant_name" value="<?php echo $row_img['first_name'] ?> <?php echo $row_img['last_name'] ?>">
                    <input type="hidden" name="position" value="<?php echo $row_img['position'] ?>">
                    <input type="hidden" name="yes" value="yes">
                    <input type="hidden" name="email" value="<?php echo $email ?>">
                    <button class="btnYes" name="yesbtn">Yes</button> 
                    <button type="button" class="btnNo" onclick="accept_no()">No</button>
                </form>
            </div>
        </div>
    </div>

    <!---DECLINED MODAL--->
    <div class="declined_modal" id="declined_modal">
        <div class="modal_info">
            <h1>Are you sure you?</h1>
            <p>This applicant will delete permanently</p>
            <div class="modal_button">
                <form action="delete_applicant.php" method="post">
                    <input type="hidden" class="applicant_name" name="applicant_name" value="<?php echo $row_img['first_name'] ?> <?php echo $row_img['last_name'] ?>">
                    <input type="hidden" name="position" value="<?php echo $row_img['position'] ?>">
                    <input type="hidden" name="email" value="<?php echo $email ?>">
                    <input type="hidden" name="profile_picture" value="<?php echo $row_img['profile_picture'] ?>">
                    <input type="hidden" name="valid_id" value="<?php echo $row_img['valid_id'] ?>">
                    <input type="hidden" name="business_permit" value="<?php echo $row_img['business_permit'] ?>">
                    <input type="hidden" name="resume" value="<?php echo $row_img['curriculum_vitae'] ?>">
                    <button class="declined_btnYes" name="declined_btnYes">Yes</button> 
                    <button type="button" class="btnNo" onclick="declined_no()">No</button>
                </form>
            </div>
        </div>
    </div>

    <!---PROFILE PIC MODAL -->
    <div class="profilepic_modal" id="profilepic_modal">
        <div class="modal_image">
            <img src="<?php echo $row_img['profile_picture'] ?>" alt="">
            <button class="closeProfile_modal" onclick="close_profile()"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>

    <!---VALID ID MODAL ---->
    <div class="profilepic_modal" id="validID_modal">
        <div class="modal_image">
            <img src="<?php echo $row_img['valid_id'] ?>" alt="">
            <button class="closeProfile_modal" onclick="close_profile()"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>

    <!----BUSINESS PERMIT MODAL ---->
    <div class="profilepic_modal" id="businessPermit_modal">
        <div class="modal_image">
            <img src="<?php echo $row_img['business_permit'] ?>" alt="">
            <button class="closeProfile_modal" onclick="close_profile()"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
<script src="applicant.js"></script>
</body>
</html>