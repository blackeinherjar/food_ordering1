<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;      
    require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
           
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = "d3c6bc0a20a305";                 // SMTP username
                $mail->Password = "b51368779d539a";                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 2525;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('nardnardfoorstore@gmail.com', 'Mailer');
                $mail->addAddress($email, $last_name);     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');

                
                $body = "
                <center><h3>Thank you for register as a member of nard nard food house</h3></center>
                <center><p><h6>Kindly click the button below to complete the register verification</h6></p></center>
                <center><h2>Click Here To Verify Register</h2><button type='button'>Verify</button></center>
                
                ";
                
                
                

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = $body;
                $mail->AltBody = strip_tags($body);

                $mail->send();
              


?>