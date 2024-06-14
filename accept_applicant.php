<?php
    require_once("dbcon.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\Exception.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\SMTP.php';
    
    if(isset($_POST['yesbtn'])){
        $yes = $_POST['yes'];
        $email = $_POST['email'];
        $applicant_name = ucwords($_POST['applicant_name']);
        $position = $_POST['position'];

        $accounts = "UPDATE accounts SET approved = '$yes' WHERE email = '$email'";
        $query = mysqli_query($conn, $accounts);

        if($query){
            $technician_form = "UPDATE technician_form SET approved = '$yes' WHERE email = '$email'";
            $approved = mysqli_query($conn, $technician_form);
            
            if($approved){
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail ->Username = 'electroniclocatorservice@gmail.com';
                $mail ->Password = 'bjwlvkfcfkglpgqa';
                $mail ->SMTPSecure='ssl';
                $mail ->Port='465';
                $mail ->setFrom('electroniclocatorservice@gmail.com','Electronic Locator Service');

                $mail->addAddress($_POST['email']);
                $mail->isHTML(true);
                $mail->Subject = "Congratulations!!!";
                $mail->Body = "Dear $applicant_name,<br>

                I wanted to extend my heartfelt congratulations to you for taking the bold step of applying for $position in our page.<br>
                
                Your decision to pursue this opportunity reflects your ambition, resilience, and belief in your abilities. It takes courage to put yourself forward for new challenges, and your willingness to do so speaks volumes about your determination to reach your goals.<br>
                
                By submitting your application, you've demonstrated your commitment to growth and development, and I have no doubt that your talents and dedication will shine through.<br>
                
                As you embark on this journey, remember that every step you take brings you closer to your dreams. Regardless of the outcome, know that you have already achieved something significant by daring to chase your aspirations.<br>
                
                I'm rooting for your success every step of the way and am here to support you in any capacity you may need.<br>
                
                Congratulations once again on this exciting milestone, and may your future be filled with endless opportunities and accomplishments.<br>

                you can now login your account in our page.<br>
                
                Warm regards,<br>
                
                Electronic Locator Services";
            
                $mail->send();

                header("Location: pending_applicants.php");

            }
        }
    }
?>