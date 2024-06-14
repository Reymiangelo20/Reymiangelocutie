<?php
    require_once("dbcon.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\Exception.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\SMTP.php';

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $resend = mt_rand(100000, 999999);
        $email = $_POST['email'];

        $sql = "UPDATE accounts SET verification_code = '$resend' WHERE email = '$email'";
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

            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Hi! this is E-Locator";
            $mail->Body = "Your new verification code is: $resend";
        
            $mail->send();
        }
        echo json_encode(["success" => true]);
        
    }
?>