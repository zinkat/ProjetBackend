<?php
include_once("../_includes.php");
include_once("check_connect.php");


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
<body class= bg-light>

<h1 class="text-center text-decoration-underline">ajouter des clients - E-commerce</h1>
<h2 class="text-center"> ajout_client</h2>

<?php

//  $db = new DB();
//  $pdo = $db->getDB();
// $stmt = $pdo->prepare("SELECT * FROM role WHERE  idrole IN (2 , 3)");
//       $stmt->execute();

 //$stmt->bindParam(':idrole', $_GET["idrole"]);

if( isset($_GET["email"]) && isset($_GET["nom"]) &&  isset($_GET["telephone"])&& isset($_GET["password"])){
    $db = new DB();
    $pdo = $db->getDB();
  
    $_GET["password"] = sha1("ifocop_diw_2022".$_GET['password']);
  
    
    $stmt = $pdo->prepare("INSERT INTO client ( email, nom, telephone, password) VALUES (:email, :nom, :telephone, :password)");
  
    $stmt->bindParam(':email', $_GET["email"]);
    $stmt->bindParam(':nom', $_GET["nom"]);
    $stmt->bindParam(':telephone', $_GET["telephone"]);
    $stmt->bindParam(':password', $_GET["password"]);
  
    
    $stmt->execute( );
  }


        
?>
<form class="col-2 p-5" action="ajout_client.php" method="GET">
     <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nom : </label>
        <input type="text" id="nom" name="nom" >
    </div>
    <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">email : </label>
        <input type="text"  id="email" name="email" >
        </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Telephone : </label>
        <input type="text"  id="telephone" name="telephone" >
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    
    <input type="submit" class="btn btn-primary m-auto" value="Ajouter" />
</form>
<div class="d-flex justify-content-center"> 
<a href="profilAdmin.php" value= "retour à la page d'accueil"  class= 'btn btn-info ' >Retour</a>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
