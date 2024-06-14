<?php
    require_once("dbcon.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\Exception.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\SMTP.php';

    if(isset($_POST['submit'])){
        $endUser_email = $_POST['endUser_email'];
        $endUser_name = $_POST['endUser_name'];
        $endUser_address = $_POST['endUser_address'];
        $endUser_message = $_POST['endUser_message'];
        $technician_email = $_POST['technician_email'];
        $technician_name = $_POST['technician_name'];
        $technician_message = $_POST['technician_message'];
        $technician_contact = $_POST['technician_contact'];
        $technician_social = $_POST['technician_social'];
        $time = $_POST['time'];
        $date = $_POST['date'];

        // Collect service values into an array
        $service_values = array($_POST['ipapagawa'], $_POST['ipapagawa2'], $_POST['ipapagawa3']);

        // Remove "Others" if present
        $service_values = array_filter($service_values, function($value) {
            return $value !== "Others";
        });

        // Implode the remaining values
        $service = implode($service_values);

        $pending = $_POST['pending'];
        $service_category = $_POST['service_category'];
        $endUser_contact = $_POST['endUser_contact'];
        
        $transaction_number = 'TR-' . substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5) . rand(10000, 99999);

        $sql = "INSERT INTO appointment_list VALUES('','$endUser_email','$endUser_name','$endUser_address','$endUser_message','$endUser_contact','$technician_email','$technician_name','$technician_message','$technician_contact','$technician_social','$time','$date','$service','$pending','$service_category','$transaction_number')";
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

            $mail->addAddress($_POST['technician_email']);
            $mail->isHTML(true);
            $mail->Subject = "You have new appointment";
            $mail->Body = "APPOINTMENT REMINDER! <br><br> CUSTOMER NAME:" .ucwords($endUser_name)."<br> SERVICE REQUEST:". $service. "<br> TYPE OF SERVICE:".$service_category. "<br><br> Open your account and go to appointment page to accept this request";
        
            $mail->send();
            
            header("Location:endUser_page.php?email=$endUser_email");
        }

    }

?>
