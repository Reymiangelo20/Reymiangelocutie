<?php
    require_once("dbcon.php");

    if (isset($_GET['user_id'])) {
        $userId = $_GET['user_id'];
    
        // Query to fetch reviews for the specified user_id
        $reviewQuery = "SELECT * FROM review WHERE user_id = '$userId'";
        $reviewResult = mysqli_query($conn, $reviewQuery);
    
        // Fetch and return reviews as JSON
        $reviews = [];
        while ($row = mysqli_fetch_assoc($reviewResult)) {
            $reviews[] = $row;
        }
    
        echo json_encode($reviews);
    } else {
        echo "User ID not provided.";
    }
?>