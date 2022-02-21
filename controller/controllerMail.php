<?php

$action = $_GET["action"];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create de l'instance PHPMailer
$envoi_mail = new PHPMailer;

$envoi_mail->Host = 'smtp.gmail.com';
$envoi_mail->Port = 587; // 465;
$envoi_mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_SMTPS;//

$envoi_mail->isSMTP();
$envoi_mail->SMTPAuth = true;

//Mot de Passe et adresse e-mail (Gmail) 
$envoi_mail->Username = $email;

$mdpmail = choixMdp($email);
$envoi_mail->Password = $mdpmail;

$envoi_mail->SMTPDebug = 0;
//$mail->debugoutput = 'html';

$mailExpediteur = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
$objet = trim(filter_input(INPUT_POST, "objet", FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED));
$message = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED));

// Expéditeur
$mailContact = $email;
$envoi_mail->setFrom($mailContact);

// Destinataire(s)
$reqMail = choixMail($_POST["mail"]);

    switch($action){
        case "MdpOublie":
            // Objet du Mail
            $envoi_mail->Subject = 'Réinitialisation de Mot De Passe';

            // Corps du Mail (HTML)
            $envoi_mail->isHTML(true);

            $body = "<b> <font size=\"3\"> Bonjour, ".$res->getNom()." ".$res->getPrenom()." </font> </b>";
            $body .= "<p> <font size=\"2\"> Cliquez ici afin de réinitiailiser votre Mot de passe: </font> </p>";
            $body .= "<hr> ";

            // Corps du Mail (Non HTML)
            $text_body  = "Bonjour, ".$res->getNom()." ".$res->getPrenom()." \n\n";
            $text_body .= "Cliquez ici afin de réinitiailiser votre Mot de passe: \n\n";
            $text_body .= " ";
            break;
        /*case "NotifInscrit":
            // Objet du Mail
            $envoi_mail->Subject = 'Nouvel Inscription';

            // Corps du Mail (HTML)
            $envoi_mail->isHTML(true);

            $body = "<b> <font size=\"3\"> Vous avez un nouvel utilisateur inscrit sur MyFile.com </font> </b>";
            $body .= "<p> <font size=\"2\"> Informations: <hr>".$util->getPrenom()."</font> </p>";
            $body .= "<hr> Cordialement, <br>";
            $body .= "Cliquez Ici afin de gérer le nouveau venu";

            // Corps du Mail (Non HTML)
            $text_body  = "Immeuble 6 Place Jean Giraudoux, 94000 Créteil \n\n";
            $text_body .= "Information: \n\n".$texte." \n\n";
            $text_body .= "Cordialement, \n";
            $text_body .= "Votre ".$nomContact;
            break;*/
        }

    $envoi_mail->Body    = $body;
    $envoi_mail->AltBody = $text_body;
    $envoi_mail->CharSet = "UTF-8";

// Vérification et Envoi du Mail
if ($envoi_mail->send()) {
    $_SESSION['messageclear'] = "Message Envoyé";
} else {    
    $_SESSION['messageerror'] = "Message Non Envoyé";
}

?>