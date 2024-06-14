<?php
    require_once("dbcon.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\Exception.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\SMTP.php';

    if(isset($_POST["submit"])){
        $account_type = $_POST['account_type'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $password = $_POST['password'];
        $verification = mt_rand(100000, 999999);
        $user_id = uniqid("userID-");
        $default_picture = 'icon/icon.png';
        $approved = 'yes';

        $sql = "INSERT INTO accounts VALUES('','$account_type','$first_name','$last_name','$email','$username','$address','$contact_number','$password','$verification','','$user_id','$approved','$default_picture')";
        $query = mysqli_query($conn, $sql);

        if($query){
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail ->Username = 'electroniclocatorservice@gmail.com';
            $mail ->Password = 'bjwlvkfcfkglpgqa';
            $mail ->SMTPSecure='ssl';
            $mail ->Port='465';
            $mail ->setFrom('electroniclocatorservice@gmail.com','Electronic Locator Service');

            $mail->addAddress($_POST["email"]);
            $mail->isHTML(true);
            $mail->Subject = "Hi! this is E-Locator";
            $mail->Body = "Your verification code is: $verification";
        
            $mail->send();

        }
        
        header("location: verification_page.php?email=$email");

    }
?>