<?php
    require_once("dbcon.php");
    $email = $_GET['email'];
    $user = "SELECT * FROM accounts WHERE email = '$email'";
    $user_query = mysqli_query($conn, $user);

    $row2 = mysqli_fetch_assoc($user_query);

    $sql = "SELECT * FROM technician_form WHERE approved = 'yes'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);
    

    $barangay = "SELECT DISTINCT barangay FROM technician_form  ORDER BY barangay ASC ";
    $barangay_result = mysqli_query($conn, $barangay);

    $province = "SELECT DISTINCT province FROM technician_form ORDER BY province ASC";
    $province_result = mysqli_query($conn, $province);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Locator Services</title>
    <link rel="stylesheet" href="endUser_page.css">
    <link rel="website icon" href="icon/icon.png" type="png">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body>
    <div class="container" id="container">
        <div class="header">
            <img src="icon/icon.png" alt="" srcset="" height="50" width="100">
            <i class="fa-solid fa-magnifying-glass"></i><input type="search" id="searchbar"  placeholder="Search" autocomplete="off">
            <button id="profile" onclick="profile()"><?php echo $row2['username'] ?> </button>
            <img src="<?php echo $row2['profile_picture'] ?>" alt="" id="profile_picture" class="profile_picture">
        </div>
        <div class="profile_modal" id="profile_modal">
            <div class="profile_items">
                <div class="username_image">
                    <h3><?php echo $row2['first_name'] ?> <?php echo $row2['last_name'] ?></h3>
                    <img src="<?php echo $row2['profile_picture'] ?>" alt="" id="" class="profile_picture2">
                </div>
                <hr>
                <div class="profile_settings">
                    <a href="edit_profile.php?email=<?php echo $email?>"><span><i class="fa-solid fa-user"></i> Edit Profile</span> </a>
                    <a href="appointment.php?email=<?php echo $email ?>"><span><i class="fa-solid fa-calendar-days"></i> Appointment</span></a>
                    <a href="transaction_enduser.php?email=<?php echo $email ?>"><span><i class="fa-solid fa-handshake"></i> Transaction</span></a>
                    <!--<a href="chats.php?email=<?php echo $email ?>"><span><i class="fa-solid fa-comment"></i> Chats</span></a>-->
                    <a href="change_password.php?email=<?php echo $email?>"><span><i class="fa-solid fa-key"></i> Change Password</span></a>
                    <a href="login_page.php"><span><i class="fa-solid fa-right-from-bracket"></i> Logout</span></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="title">
            <h1>Welcome to E-Locator Services</h1>
            <p>Please free to browse our website and book for our technician</p>
        </div>
        <div class="filter_card">
            <!-- FILTER -->
            <div class="filter">
                <h2>Filter <i class="fa-solid fa-filter"></i></h2>
                <div class="filter_info">
                    <br>
                    <h3>Technician:</h3>
                    <input type="checkbox" id="electrician" value="electrician">
                    <label for="electrician">Electrician</label><br>
                    <input type="checkbox" id="computer_technician" value="computer_technician">
                    <label for="computer_technician">Computer Technician</label>
                    <br>
                    <br>
                    <h3>Location:</h3>
                    <label for="barangay" class="barangay">Barangay:</label>
                    <select name="barangay" id="barangay">
                        <option value=""></option>
                        <?php
                            while($row_barangay = mysqli_fetch_assoc($barangay_result)){
                        ?>
                        <option value="<?php echo $row_barangay['barangay'] ?>"><?php echo $row_barangay['barangay'] ?></option>
                        <?php
                            }
                        ?>
                    </select>

                    <label for="province" >Province:</label>
                    <select name="province" id="province">
                        <option value=""></option>
                        <?php
                            while($row_province = mysqli_fetch_assoc($province_result)){
                        ?>
                        <option value="<?php echo $row_province['province'] ?>"><?php echo $row_province['province'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>




            <!-- CARD -->
            <div class="technician-container" id="technician-container">
                <div class="technician">
                    <?php
                        mysqli_data_seek($query, 0);
                        while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <div class="card">
                        <img src="<?php echo $row['profile_picture'] ?>" height="200" width="200">
                        <h3><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></h3>
                        <label><?php echo $row['position'] ?></label>
                        <div class="loc">
                            <p><span id="loc_brgy"><?php echo $row['barangay'] ?></span>, <span id="loc_province"><?php echo $row['province'] ?></span></p>
                        </div>
                        <div class="rate">
                            <p>Ratings:</p> <span class="rateYo" data-rating="<?php echo $row['ratings'] ?>"></span>
                        </div>
                        <input type="hidden" value="<?php echo $row['user_id'] ?>">
                        <button class="book" onclick="book('<?php echo $row['user_id'] ?>')">Book Now</button>
                    </div>
                        <?php
                        }
                        ?>
                </div>
            </div>

            <!-- BOOK NOW MODAL -->
            <div class="book-now" id="book_now">
                <div class="modal_info">
                    <div class="grid">
                        <div class="img">
                            <img src="icon/icon.png" alt="" srcset="" id="book_profile">
                        </div>
                        <div class="name">
                            <h2 id="firstname">First Name Last Name</h2>
                            <h3 id="technician_position">Electrician</h3>
                            <h3 id="location">Location</h3>
                            <p style="font-weight: bold" id="time_available">Time Availability: ---</p>
                            <div class="descriptions">
                                <p>Service Description:</p>
                                <p id="service_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat neque maxime illum excepturi, distinctio ad! Totam, corrupti alias soluta quod ab rerum repellat dolor odio vero a animi delectus eos!</p>
                            </div>
                            <button class="seeLocation" onclick="seeLocation()">See Location <i class="fa-solid fa-location-dot"></i></button>
                            <input type="hidden" id="technician_location">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="" id="user_id_hidden">
                <input type="hidden" name="endUser_email" value="<?php echo $email ?>">
                <!--<div class="review_comments">
                    <div class="review">
                        <form action="insert_comment.php" method="post">
                            <input type="hidden" name="endUser_email" value="<?php echo $email ?>">
                            <input type="hidden" name="username" value="<?php echo $row2['username'] ?>">
                            <input type="hidden" name="user_id" value="<?php echo $row2['user_id'] ?>">
                            <input type="hidden" value="" name="technician_email" id="tech">
                            <input type="hidden" id="rating" name="rate">
                            <h2 class="title_review">Review:</h2>
                            <p class="comment_rate">Rate: <span id="rateYo"></span></p>
                            <textarea name="comments" id="comment_area" cols="30" rows="10" placeholder="Write Comment"></textarea>
                            <button class="sendBtn" name="sendBtn"><i class="fa-solid fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <div class="comments">
                        <h2>Comments:</h2>
                        
                        <?php
                            $review = "SELECT * FROM review";
                            $review_query = mysqli_query($conn, $review);
                            while ($row3 = mysqli_fetch_assoc($review_query)){
                        ?>
                        <div class="comment_section" id="comment_section">
                            <div class="usename_ratings">
                               
                                <p id="review_rate"><?php echo $row3['username'] ?></p> <p id="data_rating" class="rateYo" data-rating="<?php echo $row3['ratings']?>" ></p>
                            </div>
                            <input type="text" value="<?php echo $row3['comments']?>" class="customer_comment" id="customer_comment" disabled>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>-->
                <button class="see_comment"onclick="see_comment()">See Comments</button>
                <div class="footer">
                    <hr>
                    <button class="bookBtn" onclick="booking()">Book Now</button>
                </div>
                <span class="close_book" onclick="close_book()"><i class="fa-solid fa-xmark"></i></span>
            </div>  
        </div>  
        <hr>
        <div class="footer_page">
            <div class="capstone_contact">
                <h1>Contact Us!</h1>
                <div class="contact">
                    <p><i class="fa-solid fa-phone"></i> +639485905921</p>
                    <p><i class="fa-solid fa-envelope"></i> electroniclocatorservice@gmail.com</p>
                </div>
                <div class="social">
                    <a href=""><i class="fa-brands fa-facebook"></i> Facebook</a>
                    <a href=""><i class="fa-brands fa-x-twitter"></i> Twitter</a>
                    <a href=""><i class="fa-brands fa-telegram"></i> Telegram</a>
                    <a href=""><i class="fa-brands fa-discord"></i> Discord</a>
                    <a href=""><i class="fa-brands fa-linkedin"></i> LinkedIn</a>
                </div>
                <h1>Group Members:</h1>
                <div class="capstone_members">
                    <a href="">Ivan Policarpio</a>
                    <a href="">Angelo Capa</a>
                    <a href="">Reymi Angelo Dela Cruz</a>
                    <a href="">Dianne Castillo</a>
                    <a href="">Felecita Lamela</a>
                </div>
                <p class="copyright"><i class="fa-regular fa-copyright"></i>E-Locator Services2024. All right reserved</p>
            </div>
        </div>
    </div>
    <div class="success_booking" id="success_modal">
        <div class="success_info">
            <form action="book_appointment.php" method="post">
                <!-----DATA----->
                <input type="hidden" value="" name="technician_contact" id="technician_contact"> 
                <input type="hidden" name="endUser_address" value="<?php echo $row2['address'] ?>">
                <input type="hidden" name="endUser_contact" value="<?php echo $row2['contact_number'] ?>">
                <input type="hidden" value="" name="technician_social" id="technician_social"> 
                <input type="hidden" value="" name="position" id="position"> 
                <input type="hidden" value="" name="technician_name" id="technician_name"> 
                <input type="hidden" value="<?php echo $row2['first_name'] ?> <?php echo $row2['last_name'] ?>" name="endUser_name" id="endUser_name"> 
                <input type="hidden" value="Pending..." name="pending" id="pending">
                <input type="hidden" id="endUser_email" name="endUser_email" value="<?php echo $row2['email'] ?> ">
                <input type="hidden"id="endUser_message" name="endUser_message" value="Please wait to technician to accept your appointment">
                <input type="hidden" value="" name="technician_email" id="tech">
                <input type="hidden" id="technician_message" name="technician_message" value="Hi i have a problem can you help me to fix my: ">
                <input type="hidden" id="current_date" value="<?php echo date('Y-m-d'); ?>">
                <!------>
                <h1>Set your Appointment</h1>
                <div class="info">
                    <div class="problem_type">
                        <label for="">Problem type?</label>
                        <select name="" id="position_select">
                            <option value="Computer">Computer </option>
                            <option value="Electric">Electric</option>
                        </select>
                    </div>
                    <div class="date">
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" required>
                    </div>
                    <div class="time">
                        <label for="time">Time:</label>
                        <input type="time" id="time" name="time" required>
                    </div>
                    <div class="home_service">
                        <label for="service_category">Service Category:</label>
                        <select name="service_category" id="service_category" required>
                            <option value=""></option>
                            <option value="Walk In">Walk In</option>
                            <option value="Home Service">Home Service</option>
                        </select>
                    </div>
                    <div class="service">
                        <label for="ipapagawa">Service Request:</label>
                        <select name="ipapagawa" id="ipapagawa">
                            <option value=""></option>
                            <option value="Hardware Installation/Upgrades">Hardware Installation/Upgrades</option>
                            <option value="Software Installation/Configuration">Software Installation/Configuration</option>
                            <option value="Virus/Malware Removal">Virus/Malware Removal</option>
                            <option value="Data Backup/Recovery">Data Backup/Recovery</option>
                            <option value="Network Setup/Configuration">Network Setup/Configuration</option>
                            <option value="Printer/Peripheral Setup">Printer/Peripheral Setup</option>
                            <option value="System Performance Optimization">System Performance Optimization</option>
                            <option value="Hardware Diagnostics/Repair">Hardware Diagnostics/Repair</option>
                            <option value="Password Recovery/Reset">Password Recovery/Reset</option>
                            <option value="Email/Communication Setup">Email/Communication Setup</option>
                            <option value="Security Audits/Assessment">Security Audits/Assessment</option>
                            <option value="Remote Desktop Support">Remote Desktop Support</option>
                            <option value="Training and Consultation">Training and Consultation</option>
                            <option value="System Updates/Patching">System Updates/Patching</option>
                            <option value="General Technical Support">General Technical Support</option>
                            <option value="Others">Others</option>
                        </select>
                        <select name="ipapagawa2" id="ipapagawa2">
                            <option value=""></option>
                            <option value="Electrical Installation">Electrical Installation</option>
                            <option value="Electrical Repairs">Electrical Repairs</option>
                            <option value="Electrical Upgrades">Electrical Upgrades</option>
                            <option value="Appliance Installation">Appliance Installation</option>
                            <option value="Lighting Installation/Repair">Lighting Installation/Repair</option>
                            <option value="Electrical Safety Inspections">Electrical Safety Inspections</option>
                            <option value="Generator Installation/Repair">Generator Installation/Repair</option>
                            <option value="Security System Wiring">Security System Wiring</option>
                            <option value="Data and Communication Wiring">Data and Communication Wiring</option>
                            <option value="Electrical Troubleshooting">Electrical Troubleshooting</option>
                            <option value="Electrical Panel Upgrades">Electrical Panel Upgrades</option>
                            <option value="Electrical Code Compliance">Electrical Code Compliance</option>
                            <option value="Emergency Electrical Services">Emergency Electrical Services</option>
                            <option value="Tenant Improvements">Tenant Improvements</option>
                            <option value="Home Automation Installation">Home Automation Installation</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
              
                    
          
                    <input type="text" id="others" name="ipapagawa3" class="others" placeholder="Type your service request" autocomplete="off">
                </div>
                <div class="buttons">
                    <input type="submit" name="submit" id="submit">
                    <button type="button" class="appoint_now" onclick="appoint()">Book Now</button>
                    <button type="button" class="close" onclick="close_booking()"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="future_date" id="future_date">
        <div class="future_date_info">
            <h1>Please select a future date</h1>
            <p>Invalid date selected</p>
            <button class="ok" onclick="close_future()">OK</button>
        </div>
    </div>
    <div class="fully_book" id="fully_book">
        <div class="fully_book_info">
            <h1>The Technician is fully booked</h1>
            <p>Please select another technician</p>
            <button class="ok" onclick="close_future()">OK</button>
        </div>
    </div>
    <div class="success_book" id="success_book">
        <div class="success_book_info">
            <h1>Success Booking</h1>
            <p>Please go to appoinment page to see the response of technician. You can see it in the profile menu bar</p>
            <button class="ok" onclick="close_success()">OK</button>
        </div>
    </div>
    <div class="fill_service" id="fill_service">
        <div class="fill_service_info">
            <h1>Service Missing</h1>
            <p>Please don't forget to fill up service</p>
            <button class="ok" onclick="close_fill()">OK</button>
        </div>
    </div>
    <div class="time_modal" id="time_modal">
        <div class="time_modal_info">
            <h1>Select Time</h1>
            <p>Please don't forget to select time</p>
            <button class="ok" onclick="close_time()">OK</button>
        </div>
    </div>
    <div class="home_modal" id="home_modal">
        <div class="home_modal_info">
            <h1>Select Service Category</h1>
            <p>Please don't forget to select service category</p>
            <button class="ok" onclick="close_home()">OK</button>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="endUser_page.js"></script>
</body>
</html>
