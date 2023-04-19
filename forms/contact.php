<?php

use PHPMailer\PHPMailer\PHPMailer;
require __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form fields and sanitize the input
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // Initialize the PHPMailer object
    $mail = new PHPMailer(true);

    try {
        // Set up SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'wehrlzz77@gmail.com'; // Replace with your own email address
        $mail->Password = 'Lucille77'; // Replace with your own password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set up message data
        $mail->setFrom($email, $name);
        $mail->addAddress('recipient@example.com', 'Recipient Name');
        $mail->addReplyTo($email, $name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send the email
        $mail->send();

        echo "success";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>

// if($_POST) {
//     // $name = "";
//     // $email = "";
//     // $email_subject = "Website Inquiry: General Contact Form!";
//     // $subject = "";
//     // $message = "";
//     // // $recipient = "andrew@downnorthgarlic.com";
//     // $recipient = "andrew.russell19@gmail.com";
//     // $data = [];

//     try {
//         $mail = new PHPMailer();

//         $mail->isSMTP();
//         $mail->SMTPDebug = 4;
//         $mail->Debugoutput = 'html';
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'andrew@downnortdhgarlic.com';
//         $mail->Password = 'Andyrussell1';
//         $mail->SMTPSecure = 'tls';
//         $mail->Port = 25;

//         $mail->setFrom('contact@downnorthgarlic.com', 'Web Contact Form');
//         $mail->addReplyTo('contact@downnorthgarlic.com', 'Web Contact Form');

//         $mail->addAddress('andrew@downnorthgarlic.com');
//         $mail->Subject = 'Website Inquiry: General Contact Form!';
//         $mail->isHTML(true);
//         $mail->Body = 'Test test 123.'

//         $mail->send();
//         echo 'Message has been sent';
//     } catch (\Throwable $th) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
    

//     // $email_body = "<div>";

//     // if(isset($_POST['name'])) {
//     //     $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
//     //     $email_body .= "<div>
//     //                        <label><b>Name:</b></label>&nbsp;<span>".$name."</span>
//     //                     </div>";
//     // }

//     // if(isset($_POST['email'])) {
//     //     $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
//     //     $email = filter_var($email, FILTER_VALIDATE_EMAIL);
//     //     $email_body .= "<div>
//     //                        <label><b>Visitor Email:</b></label>&nbsp;<span>".$email."</span>
//     //                     </div>";
//     // }
     
//     // if(isset($_POST['subject'])) {
//     //     $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
//     //     $email_body .= "<div>
//     //                        <label><b>Subject of message:</b></label>&nbsp;<span>".$subject."</span>
//     //                     </div>";
//     // }
     
//     // if(isset($_POST['message'])) {
//     //     $message = htmlspecialchars($_POST['message']);
//     //     $email_body .= "<div>
//     //                        <label><b>Visitor Message:</b></label>
//     //                        <div>".$message."</div>
//     //                     </div>";
//     // }
     
//     // $email_body .= "</div>";

//     // $mail->Body = $email_body;

//     // $mail->SMTPDebug = 3;

//     // // $headers  = 'MIME-Version: 1.0' . "\r\n"
//     // // .'Content-type: text/html; charset=utf-8' . "\r\n"
//     // // .'From: ' . $email . "\r\n";
//     // echo ("What the fuck");
//     // if(!$mail->send()) {
//     //     $data['success'] = false;
//     //     // $data['message'] = "We are sorry but the email did not go through, please try again";
//     //     $data['message'] = 'Mailer Error: ' . $mail->ErrorInfo;
//     //     echo json_encode($data);
//     // } else {
//     //     $data['success'] = true;
//     //     $data['message'] = "Thank you for contacting us, $name. You will get a reply within 24 hours";
//     //     echo json_encode($data);
//     // }


//     // if(mail($recipient, $email_subject, $email_body, $headers)) {
//     //     $data['success'] = true;
//     //     $data['message'] = "Thank you for contacting us, $name. You will get a reply within 24 hours";
//     //     echo json_encode($data);
//     // } else {
//     //     $data['success'] = false;
//     //     $data['message'] = "We are sorry but the email did not go through, please try again";
//     //     echo json_encode($data);
//     // }
     
// } else {
//     $data['success'] = false;
//     $data['message'] = "Something went wrong";
//     echo json_encode($data);
// }
// ?>