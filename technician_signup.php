<?php
require_once("dbcon.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Capstone\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\Capstone\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Capstone\PHPMailer\src\SMTP.php';

if(isset($_POST['submit'])){
    $profile_destination =  "profile_picture/";
    $profile_img = $profile_destination . $_FILES["profile"]["name"];
    $profile_img_type = strtolower(pathinfo($profile_img,PATHINFO_EXTENSION));

    $valid_id_destination =  "valid_id/";
    $valid_id = $valid_id_destination . $_FILES["valid"]["name"];
    $valid_id_type = strtolower(pathinfo($valid_id,PATHINFO_EXTENSION));

    $curriculum_vitae_destination =  "curriculum_vitae/";
    $curriculum_vitae = $curriculum_vitae_destination . $_FILES["resume"]["name"];
    $curriculum_vitae_type = strtolower(pathinfo($curriculum_vitae,PATHINFO_EXTENSION));

    $technician = $_POST['technician'];
    $status = $_POST['status'];
    $technician_position = $_POST['technician_position'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $address = $_POST['address'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $business_name = $_POST['business_name'];
    $contact_number = $_POST['contact_number'];
    $social_media = $_POST['social_media'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $service = $_POST['service'];
    $user_id = uniqid("userID-");
    $verification = mt_rand(100000, 999999);

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail ->Username = 'electroniclocatorservice@gmail.com';
    $mail ->Password = 'bjwlvkfcfkglpgqa';
    $mail ->SMTPSecure='ssl';
    $mail ->Port='465';
    $mail ->setFrom('electroniclocatorservice@gmail.com','Electronic Locator Service');

    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Hi! this is E-Locator";
    $mail->Body = "Your verification code is: $verification";

    $mail->send();

    if(isset($_FILES['business_permit']) && $_FILES['business_permit']['error'] !== UPLOAD_ERR_NO_FILE) {
        $business_permit_destination =  "business_permit/";
        $business_permit = $business_permit_destination . $_FILES["business_permit"]["name"]. $_POST['business_permit'];
        $business_permit_type = strtolower(pathinfo($business_permit, PATHINFO_EXTENSION));

        if(move_uploaded_file($_FILES['business_permit']["tmp_name"],$business_permit)) {
            $business_permit_uploaded = true;
        } 
        else {
            $business_permit_uploaded = false;
        }
    } 
    else {
        $business_permit_uploaded = false;
    }

    if(move_uploaded_file($_FILES['profile']["tmp_name"],$profile_img) && move_uploaded_file($_FILES['valid']["tmp_name"],$valid_id) && move_uploaded_file($_FILES['resume']["tmp_name"],$curriculum_vitae)){

        $signup = "INSERT INTO technician_form VALUES ('','$status','$technician_position','$firstname','$middlename','$lastname','$suffix','$address','$region','$province','$city','$barangay','$business_name','$contact_number','$social_media','$email','$username','$password','$profile_img','$valid_id','$business_permit','$curriculum_vitae','$service','$user_id','','','')";
        $query = mysqli_query($conn, $signup);

        if($query){
            $accounts = "INSERT INTO accounts VALUES ('','$technician','$firstname','$lastname','$email','$username','','$contact_number','$password','$verification','','$user_id','','$profile_img')";
            $query2 = mysqli_query($conn, $accounts);

            header("Location: verification_page.php?email=$email");
        }
    }
}
?>
