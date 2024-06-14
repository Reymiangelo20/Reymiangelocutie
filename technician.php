<?php
    require_once("dbcon.php");
    $region = "SELECT * FROM philippine_regions";
    $region_query = mysqli_query($conn, $region);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply as Technician?</title>
    <link rel="stylesheet" href="technician.css">
    <link rel="website icon" href="icon/icon.png" type="png">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" id="container">
        <div class="title">
            <h1>Apply as Technician?</h1>
            <p>Please fill up the form below:</p>
        </div>
        <div class="application_form">
            <form action="technician_signup.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="technician" value="technician">

                <!--- TECHNICIAN FORM INFO -->
                <div class="row">
                    <div class="first_column">
                        <div class="status">
                            <label for="status">Status</label>
                            <select name="status" id="status" required>
                                <option value=""></option>
                                <option value="Freelancer">Freelancer</option>
                                <option value="Business Owner">Business Owner</option>
                            </select>
                        </div>  
                        <div class="position">
                            <label for="technician">Position</label>
                            <select name="technician_position" id="technician" required>
                                <option value=""></option>
                                <option value="Electrician">Electrician</option>
                                <option value="Computer Technician">Computer Technician</option>
                            </select>
                        </div>
                        <div class="firstname">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname"autocomplete="off" required>
                        </div>
                        <div class="middlename">
                            <label for="middlename">Middle Name</label>
                            <input type="text" name="middlename" id="middlename" autocomplete="off" required>
                        </div>
                        <div class="lastname">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" autocomplete="off" required>
                        </div>
                        <div class="suffix">
                            <label for="suffix">Suffix</label>
                            <input type="text" name="suffix" id="suffix" autocomplete="off">
                        </div>
                        <div class="address">
                            <label for="address">St. Address</label>
                            <input type="text" name="address" id="address" autocomplete="off" required>
                        </div>
                        <div class="region">
                            <label for="region">Region</label>
                            <select name="region" id="region" required>
                                <option value="">Select Region</option>
                            <?php
                                while($row_region = mysqli_fetch_assoc($region_query)){
                            ?>
                                <option value="<?php echo $row_region['region_description'] ?>" data-region-code="<?php echo $row_region['region_code'] ?>"><?php echo $row_region['region_description'] ?></option>
                                <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="province">
                            <label for="province">Province</label>
                            <select name="province" id="province" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="second_column">
                    <div class="city">
                            <label for="city">City</label>
                            <select name="city" id="city" required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="barangay">
                            <label for="barangay">Barangay</label>
                            <select name="barangay" id="barangay" required>
                                <option value=""></option>
                            </select>
                        </div>
                        
                        <div class="business_name">
                            <label for="business_name">Business Name</label>
                            <input type="text" name="business_name" id="business_name" autocomplete="off" >
                        </div>
                        <div class="contact">
                            <label for="contact_number">Contact Number</label>
                            <input type="number" name="contact_number" id="contact_number" maxlength="11" placeholder="(09********)" autocomplete="off" required>
                        </div>
                        <div class="social_media">
                            <label for="social_media" id="social_link_label">Social Media Link</label>
                            <input type="text" name="social_media" id="social_media" autocomplete="off" required>
                        </div>
                        <div class="email_row">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="email" placeholder="example@gmail.com"autocomplete="off" required>
                        </div>
                        <div class="username">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="username" autocomplete="off" required>
                        </div>
                        <div class="password_row">
                            <label for="password ">Password</label>
                            <input type="password" name="password" id="password" class="password" autocomplete="off" required>
                        </div>
                        <div class="confirm">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" autocomplete="off" required>
                        </div>  
                    </div>
                </div>
 
                <!----ID FORM---->
                <div class="photos">
                    <div class="profile_photo">
                        <div class="profile_row">
                            <label for="">Profile Picture</label>
                            <input type="file" name="profile" id="profile_input" autocomplete="off" accept="image/png, image/jpeg, image/gif, image/webp, image/svg" required>
                            <label for="profile_input" class="profile"><i class="fa-solid fa-image"></i> Upload Profile</label>
                        </div>
                        <div class="file_name" id="file_name">No Chosen File</div>
                    </div>
                    

                    <div class="valid_id">
                        <div class="valid_row">
                            <label for="">Valid ID</label>
                            <input type="file" name="valid" id="valid" autocomplete="off" accept="image/png, image/jpeg, image/gif, image/webp, image/svg" required>
                            <label for="valid" class="ID"><i class="fa-solid fa-id-card"></i> Upload Valid ID</label>
                        </div>
                        <div class="file_valid" id="file_valid">No Chosen File</div>
                    </div>
                    
                    <div class="business_permit">
                        <div class="business_row">
                            <label for="">Business Permit</label>
                            <input type="file" name="business_permit" id="business_permit" value="Default" accept="image/png, image/jpeg, image/gif, image/webp, image/svg" autocomplete="off">
                            <label for="business_permit" class="business"><i class="fa-solid fa-paperclip"></i> Upload Business Permit</label>
                        </div>
                        <div class="file_business" id="file_business">No Chosen File</div>
                    </div>

                    <div class="curriculum_vitae">
                        <div class="curriculum_row">
                            <label for="">Curriculum Vitae</label>
                            <input type="file" name="resume" id="resume" autocomplete="off" accept=".pdf, .docx" required>
                            <label for="resume" class="upload_cv"><i class="fa-regular fa-file"></i> Upload CV</label>
                        </div>
                        <div class="file_cv" id="file_cv">No Chosen File</div>
                    </div>
                </div>


                <!---- SERVICES---->
                <div class="services">
                    <label for="service">Service Description:</label><br>
                    <textarea name="service" id="service" cols="30" rows="10" autocomplete="off" required></textarea>
                </div>
                <input type="submit" name="submit" value="submit" id="upload_form">
            </form>
            <button class="btnsubmit" onclick="check()">Submit</button>
        </div>
    </div>

    <div class="wrong" id="wrong_pass">
        <h1>Wrong Password</h1>
        <p>Please make sure that the password is same!</p>
        <button class="ok" onclick="remove()">OK</button>
    </div>

    <div class="wrong" id="wrong_email">
        <h1>Invalid Email</h1>
        <p>Please enter a valid email ending with @gmail.com </p>
        <button class="ok" onclick="remove()">OK</button>
    </div>

    <div class="wrong" id="empty">
        <h1>Requirements Missing</h1>
        <p>Please upload the picture and file that we need</p>
        <button class="ok" onclick="remove()">OK</button>
    </div>

    <div class="wrong" id="contact">
        <h1>Invalid Contact Number</h1>
        <p>Please enter a contact number that has 11 digits</p>
        <button class="ok" onclick="remove()">OK</button>
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
<script src="technician.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>
</html>