<?php

    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception; 
    
    // Include PHPMailer library files 
    require 'PHPMailer/Exception.php'; 
    require 'PHPMailer/PHPMailer.php'; 
    require 'PHPMailer/SMTP.php'; 
 
    function enviar($correos){
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'email@miemail.com';
        $mail->Password = '__mipass__';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('email@miemail.com', 'Hello world');

        for ($i=0; $i < count($correos); $i++) {
            $mail->addAddress(strtolower($correos[$i]));
        }

        $mail->Subject = "This is my subject"; 

        $mail->isHTML(true);
    
        $message = '
                <html>
                <head>
                <title>title.</title>
                </head>
                <body>
                <h1>Sub title.</h1>
                    <h2>other ttitle</h2>
                    <p>lorem ipsum..</p>
                    <p><strong>Here:</strong> NY <br> 24 Feb 2022</p>
                    <h3> 3PM - 6PM </h3>

                    <p>More read <a href="#">www.web.com</a></p>
                </body>
                </html>
                ';
        $mail->Body = $message;

        if(!$mail->send()){
            echo "error";
        }else{
            echo "ok";
        }
    }
    
    $correos = array(
        "miemail1@hotmail.com",
        "miemail2@gmail.com",
        "....");

    
    $correossplit = array_chunk($correos,20);

    for ($i=0; $i < count($correossplit); $i++) {
        enviar($correossplit[$i]);
    }

    
?>