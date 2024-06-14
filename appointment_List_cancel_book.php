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
        $endUser_name = $_POST['endUser_name'];
        $transaction = $_POST['transaction'];
        $technician_name = $_POST['tech_name'];

        $reason_cancel = array($_POST['reason_cancel'], $_POST['others']);

        // Remove "Others" if present
        $reason_cancel = array_filter($reason_cancel, function($value) {
            return $value !== "Others";
        });

        // Implode the remaining values
        $reason = implode($reason_cancel);

        $delete = "DELETE FROM appointment_list WHERE transaction_number = '$transaction'";
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
            
            $mail->addAddress($_POST['endUser_email']);
            $mail->isHTML(true);
            $mail->Subject = "Hi! this is E-Locator";
            $mail->Body = "Your appointment with " . ucwords($technician_name) . " has been cancel <br> The reason is:<strong>  $reason  </strong>";
            
            $mail->send();
            header("Location: appointment_list.php?email=$techa");
        }

    }
?>
