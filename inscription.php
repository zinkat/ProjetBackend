<?php
include_once("_includes.php");


if( isset($_POST["email"]) && isset($_POST["nom"]) &&  isset($_POST["telephone"])&& isset($_POST["password"])){
  $db = new DB();
  $pdo = $db->getDB();

  $_POST["password"] = sha1("ifocop_diw_2022".$_POST['password']);

  
  $stmt = $pdo->prepare("INSERT INTO client ( email, nom, telephone, password) VALUES (:email, :nom, :telephone, :password)");

  $stmt->bindParam(':email', $_POST["email"]);
  $stmt->bindParam(':nom', $_POST["nom"]);
  $stmt->bindParam(':telephone', $_POST["telephone"]);
  $stmt->bindParam(':password', $_POST["password"]);

  
  $stmt->execute( );
}
?>

<!-- PHP MAILER -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "mail/vendor/autoload.php";

$email="";
$nom="";
$telephone="";


 if(!empty($_POST) && $_SERVER['HTTP_HOST'] == '127.0.0.1'){


  $email = htmlspecialchars($_POST['email']);
  $nom = htmlspecialchars($_POST['nom']);
  $telephone = htmlspecialchars($_POST['telephone']);





  if (!isset($_POST['email']) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erreur .= '<div> L\'email n\'est pas valide.</div>';
  }

  if (!isset($_POST['nom']) || strlen($nom) < 2) {
      $erreur .= '<div> Le nom doit contenir au minimum 2 caractères.</div>';
  }

  if (!isset($_POST['telephone']) || strlen($telephone) < 2) {
    $erreur .= '<div> Le numero doit contenir au minimum 10 caractères.</div>';
}


}


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
          $mail->Subject = "confirmation d'inscription";
          $mail->Body    = "Bienvenue $nom  <br> Merci d'avoir rejoint la communauté Ecommerce. <br>
          veuillez completer votre inscription"; 
      
         if( $mail->send()){
          echo '<script>alert("Un mail de confirmation est envoyé! Merci pour votre interêt ")</script>';
          //echo '<div>Mail envoyé ! Merci pour votre interêt.</div>';
        
        }else{
          $erreur = '<div>Echec dans l\'envoi du mail</div>';
        }
      } catch (Exception $e) {
          $erreur = $e; 
          $mail->ErrorInfo;
      }    }

?>



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
<div class="col-12 p-5">
    <h1 class="text-center">Inscription</h1>
 <form action="#" method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address: </label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Nom : </label>
      <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">telephone :</label>
        <input type="tel"  name= "telephone" class="form-control" id="exampleInputPassword1">
      </div>
 
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
    
    <button type="submit" class="btn btn-primary">Enregistrer</button>
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