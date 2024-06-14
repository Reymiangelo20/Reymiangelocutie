<?php
    require_once("dbcon.php");
    $user_id = $_GET['user_id'];
    $email = $_GET['email'];
    $technician_email = $_GET['technician_email'];
    $sql = "SELECT * FROM technician_form WHERE user_id = '$user_id'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);

    $user = "SELECT * FROM accounts WHERE email = '$email'";
    $user_query = mysqli_query($conn, $user);

    $row2 = mysqli_fetch_assoc($user_query);

    $comment = "SELECT * FROM able_comment WHERE technician_email = '$technician_email' AND endUser_email = '$email'";
    $comment_query = mysqli_query($conn, $comment);

    $asd = mysqli_fetch_assoc($comment_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="review.css">
    <link rel="website icon" href="icon/icon.png" type="png">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body>
     <!-- BOOK NOW MODAL -->
     <div class="book-now" id="book_now">
                <div class="modal_info">
                    <div class="grid">
                        <div class="img">
                            <img src="<?php echo $row['profile_picture']?>" alt="" srcset="" id="book_profile">
                        </div>
                        <div class="name">
                            <h2 id="firstname"><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></h2>
                            <h3 id="technician_position"><?php echo $row['position'] ?></h3>
                            <h3 id="location"><?php echo $row['barangay'] ?>, <?php echo $row['province'] ?></h3>
                            <p style="font-weight: bold" id="time_available">Time Availability: <?php echo $row['time_availability'] ?></p>
                            <div class="descriptions">
                                <p>Service Description:</p>
                                <p id="service_description"><?php echo $row['service_description'] ?></p>
                            </div>
                            <button class="seeLocation" onclick="seeLocation()">See Location <i class="fa-solid fa-location-dot"></i></button>
                            <input type="hidden" value="<?php echo $row['address'] ?> <?php echo $row['barangay'] ?> <?php echo $row['city'] ?> <?php echo $row['province'] ?>"id="technician_location">
                        </div>
                    </div>
                </div>
                <div class="review_comments">
                    <div class="review" id="review">
                        <form action="insert_comment.php" method="post">
                            <input type="hidden" name="endUser_email" value="<?php echo $email ?>">
                            <input type="hidden" name="username" value="<?php echo $row2['username'] ?>">
                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $row['user_id'] ?>">
                            <input type="hidden" value="<?php echo $row['email'] ?>" name="technician_email" id="tech">
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
                            $review = "SELECT * FROM review WHERE user_id = '$user_id'";
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
                        <input type="hidden" id="status" value="<?php echo $asd['status'] ?>">
                    </div>
                </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="review.js"></script>
</body>
</html>