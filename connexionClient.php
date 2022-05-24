<?php

include_once("_includes.php");

session_start();


if(isset($_GET['login']) && isset($_GET['password'])){
    //recupérer la valer de "cle"
    $login = $_GET['login'];
    $db = new DB();
    $pdo = $db->getDB();
    $stmt = $pdo->prepare("SELECT cle 
                            FROM client 
                            WHERE email LIKE '%$login%'");
                      
    $stmt->execute();

    $cle = $stmt->fetch();

    //Hash password
    $passwordHash = sha1("ifocop_diw_2022".sha1($cle["cle"]).$_GET['password']);

    // Test Login/password
    $db = new DB();
    $pdo = $db->getDB();
    $stmt = $pdo->prepare("SELECT email, password
                            FROM client
                            WHERE email = :email");
                           
                            
   $stmt->bindParam(':email', $_GET['login']);
  
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
   
   
        //If $row is FALSE.
        if($user === false){
            echo '<script>alert("invalid username or password")</script>';
         } else{
              
             //Compare passwords.
            
             if(strcmp(strval($user['password']), strval($passwordHash)) == 0){
                 
                 //Provide the user with a login session.
                 $_SESSION['user'] = "1";
                echo "vous êtes connecté";
                header('Location:userconnect.php');
       
                 
                 
             } else{
                 //$validPassword was FALSE. Passwords do not match.
                 echo '<script>alert("invalid username or password")</script>';
             }
         }

}
else{



  include "inc/header.php"
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
<div class= "text-end mt-3 ">
  <a href="admin/connexionAdmin.php" class= "btn btn-danger">Connexion Admin</a>
</div>
 

<div class="col-12 p-5">
    <h1 class="text-center">Connexion</h1>
 <form action="connexionClient.php" method="GET">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" name=login id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text"></div>
    </div>

    

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" name=password class="form-control" id="exampleInputPassword1">
      </div>
    
    <button type="submit" class="btn btn-primary">Connecter</button>

 

  </form>
  <div > 
  <div>
  <h6>Créer un compte</h6>
  <a href="inscription.php" class= "btn btn-primary">S'inscrire</a>
  </div>
  
</div>
</div>


<?php ;} ?>


<!-- footer -->
<div class="bg-dark text-white text-center p-3 mt-2">
        
        <p>Conditions générales</p>
        <p>Mentions légales</p>
        <p>tous les droits sont réservés 2022</p>
       
 

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>