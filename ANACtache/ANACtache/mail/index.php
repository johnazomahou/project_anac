<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions

function envoie_mail($desti_name,$desti_email,$subject,$message,$uploaded_file_path){
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPSecure = 'ssl';
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;     

   
    

    $mail->Username   = 'siganac.anacgabon@gmail.com';                     //SMTP username
    $mail->Password   = 'iqnfcmamqxkuvcon';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;
    $mail->setFrom('siganac.anacgabon@gmail.com','SIGANAC');
    $mail->CharSet = 'UTF-8'; // Spécifiez l'encodage du texte du message
    $mail->Encoding = 'base64'; // Spécifiez l'encodage du sujet du courriel
    
    //c'est a vous de fournir l'addresse mail de destination

    //si on veut on peut faire add addresse  n  fois pour ajouter les informations
    $mail->addAddress($desti_email,$desti_name);
    $mail->isHTML(false);                                 
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->setLanguage('fr', '/optional/path/to/language/directory/');

    if (!empty($uploaded_file_path)) {
       
        $mail->addAttachment($uploaded_file_path);
    }
    if (!$mail->Send()) {
        return false;
    }
    else {
        return true;
    }
}
