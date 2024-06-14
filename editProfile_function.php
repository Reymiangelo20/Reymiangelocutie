<?php
    require_once("dbcon.php");

    if(isset($_POST['save_changes'])){
        $profile_destination =  "profile_picture/";
        $profile_img = $profile_destination . $_FILES["input"]["name"];
        $profile_img_type = strtolower(pathinfo($profile_img,PATHINFO_EXTENSION));

        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $contact_number = $_POST['contact_number'];

        if(move_uploaded_file($_FILES['input']["tmp_name"],$profile_img) ){
            $sql = "UPDATE accounts SET first_name = '$first_name', last_name = '$last_name', username = '$username', contact_number = '$contact_number', profile_picture = '$profile_img' WHERE email = '$email'";
            $query = mysqli_query($conn, $sql);
            
            if($query){
               header("Location:endUser_page.php?email=$email");
            }
        }
    }

?>