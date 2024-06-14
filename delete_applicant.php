<?php
    require_once("dbcon.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\Exception.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Capstone\PHPMailer\src\SMTP.php';
    
    if(isset($_POST['declined_btnYes'])){
        $email = $_POST['email'];
        $applicant_name = ucwords($_POST['applicant_name']);
        $position = $_POST['position'];
        $profile_picture = $_POST['profile_picture'];
        $valid_id = $_POST['valid_id'];
        $business_permit = $_POST['business_permit'];
        $resume = $_POST['resume'];

        $profile_path = $profile_picture;
        $valid_path = $valid_id;
        $business_path = $business_permit;
        $cv_path = $resume;

        $delete_accounts = "DELETE FROM accounts WHERE email = '$email'";
        $delete_query = mysqli_query($conn, $delete_accounts);

        if($delete_query){
            $delete_technician = "DELETE FROM technician_form WHERE email = '$email'";
            $technician_query = mysqli_query($conn, $delete_technician);

            if($technician_query){
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
                $mail->Subject = "Update on Your Application";
                $mail->Body = "Dear $applicant_name,<br>

                I hope this message finds you well.<br>
                
                Thank you very much for taking the time to apply for the position of $position with us and for your interest in joining our team. We truly appreciate the effort and enthusiasm you've shown throughout the application process.<br>
                
                After careful consideration of all applicants, we regret to inform you that we have decided not to move forward with your application at this time.<br>
                
                Please know that this decision was not made lightly, and it doesn't reflect on your qualifications or potential. We received a high volume of applications, and while your credentials are impressive, we had to make difficult decisions based on our specific needs and criteria.<br>
                
                We sincerely appreciate the time and effort you invested in your application. Your skills and experiences are valuable, and we encourage you to continue pursuing opportunities that align with your career goals and aspirations.<br>
                
                We will keep your resume on file for future openings that match your profile. If you would like feedback on your application or have any questions, please feel free to reach out to us.<br>
                
                Thank you once again for considering E-Locator Services. We wish you all the best in your future endeavors and continued success in your career journey.<br>
                
                Warm regards,<br>
                
                Electronic Locatior Services";
            
                $mail->send();
                
                
                if(file_exists($profile_path)){
                    unlink($profile_path);
                    if(file_exists($valid_path)){
                        unlink($valid_path);
                        if(file_exists($business_path)){
                            unlink($business_path);
                            if(file_exists($cv_path)){
                                unlink($cv_path);
                                
                            }
                        }
                    }
                }
                header("Location: pending_applicants.php");
            } 
        }
    }
?>
