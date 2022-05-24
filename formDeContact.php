<?php
include_once("check_connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "mail/vendor/autoload.php";

$email="client@exemple.com";
$nom="";
$objet="";
$message="";
$telephone="";

 if(!empty($_POST) && $_SERVER['HTTP_HOST'] == '127.0.0.1'){


  $email = htmlspecialchars($_POST['email']);
  $nom = htmlspecialchars($_POST['nom']);
  $telephone = htmlspecialchars($_POST['telephone']);
  $objet= htmlspecialchars($_POST['objet']);

  $msg = strip_tags($_POST['message']);
  $message = nl2br($msg);
  $sp="\n\r";
  $message .= nl2br($sp);
  $message .= nl2br($sp);
  $message .= nl2br($sp);
  $message .= nl2br($nom);
  $message .= nl2br($sp);
  $message .= nl2br($telephone);

  $erreur = NULL;


  if (!isset($_POST['email']) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erreur .= '<div> L\'email n\'est pas valide.</div>';
  }

  if (!isset($_POST['nom']) || strlen($nom) < 2) {
      $erreur .= '<div> Le nom doit contenir au minimum 2 caractères.</div>';
  }

  if (!isset($_POST['telephone']) || strlen($telephone) < 2) {
    $erreur .= '<div> Le numero doit contenir au minimum 10 caractères.</div>';
}

if (!isset($_POST['objet']) || strlen($objet) < 2) {
  $erreur .= '<div> L\'objet doit contenir au minimum 4 caractères.</div>';
}


  if (!isset($_POST['message']) || strlen($message) < 1) {
      $erreur .= '<div> Le message doit contenir ne doit pas être vide.</div>';
  }}


  if (!isset($erreur)) {
  $mail = new PHPMailer(true);

  
      try {
          //Server settings
          //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
          $mail->SMTPDebug = false;
          $mail->do_debug = 0;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'formationdiw2@gmail.com';                     //SMTP username
          $mail->Password   = 'Zineb1982+';                               //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
          $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      
          //Recipients

          $mail->setFrom('formationdiw2@gmail.com', 'E-commerce');
          $mail->addReplyTo($email, $nom); // Option pour avoir le reply
          $mail->addAddress('formationdiw2@gmail.com');
          
      
          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = $objet;
          $mail->Body    = $message;
      
         if( $mail->send()){
          echo '<script>alert("Mail envoyé ! Merci pour votre interêt")</script>';
          //echo '<div>Mail envoyé ! Merci pour votre interêt.</div>';
        
        }else{
          $erreur = '<div>Echec dans l\'envoi du mail</div>';
        }
      } catch (Exception $e) {
          $erreur = $e; 
          $mail->ErrorInfo;
      }    }


?>
<!-- <?= isset($erreur) ? $erreur : '' ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php

include "inc/header.php"
?>
<div class="col-8 p-5">
    <h1 class="text-center">Contact</h1>
 <form action="#" method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address: </label>
      <input type="email" required name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
      <label for= "text" class="form-label">Nom : </label>
      <input type="text" required name="nom" class="form-control"  id="exampleInputPassword1">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">telephone :</label>
        <input type="tel" required name= "telephone" class="form-control" id="exampleInputPassword1">
         </div>
    <div class="form-floating mb-3 col-4" > Objet :
      <label for="exampleInputPassword1" class="form-label"> </label>
      <input type="text" required name= "objet" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-floating mb-3 col-8" >
         <textarea class="form-control " style="height: 200px;" required placeholder="saisissez votre message       ici" id="floatingTextarea" name= "message"></textarea>
          <label for="floatingTextarea" >Message: saisissez votre message ici </label>
    </div>
      
         <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
</div>     
<!-- footer -->
    <div class="bg-dark text-white text-center p-3 mt-2">
        
            <p>Conditions générales</p>
            <p>Mentions légales</p>
            <p>tous les droits sont réservés 2022</p>
           
     

    </div>

  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>