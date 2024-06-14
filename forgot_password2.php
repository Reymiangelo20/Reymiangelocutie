<?php
    require_once("dbcon.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\Exception.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\SMTP.php';

    if(isset($_POST['submit'])){
        $new_password = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
        $email = $_POST['email'];

        $sql = "UPDATE accounts SET `password` = '$new_password' WHERE email = '$email'";
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
            $mail->Body = "Your new password is: $new_password";
        
            $mail->send();
        }

        header("Location: login_page.php");
    }
?>