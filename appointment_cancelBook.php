<?php
    require_once("dbcon.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\Exception.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\SMTP.php';

    if(isset($_POST['submit'])){
        $techa = $_POST['techa'];
        $endUser_email = $_POST['endUser_email'];
        $reason_cancel = $_POST['reason_cancel'];
        $endUser_name = $_POST['endUser_name'];

        $delete = "DELETE FROM appointment_list WHERE technician_email = '$techa'";
        $delete_query = mysqli_query($conn, $delete);

        if($delete_query){
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail ->Username = 'electroniclocatorservice@gmail.com';
            $mail ->Password = 'bjwlvkfcfkglpgqa';
            $mail ->SMTPSecure='ssl';
            $mail ->Port='465';
            $mail ->setFrom('electroniclocatorservice@gmail.com','Electronic Locator Service');
            
            $mail->addAddress($_POST['techa']);
            $mail->isHTML(true);
            $mail->Subject = "Hi! this is E-Locator";
            $mail->Body = "Your appointment with". ucwords($endUser_name) . " has been cancel <br> The reason is: $reason_cancel";
            
            $mail->send();
            header("Location: appointment.php?email=$endUser_email");
        }

    }
?>
