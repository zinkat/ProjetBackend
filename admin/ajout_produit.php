<?php
include_once("../_includes.php");
include_once("check_connect.php");
$db = new DB();
$pdo = $db->getDB();

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

<h1 class="text-center text-decoration-underline">Ajouter des produits - E-commerce</h1>
<h2 class="text-center"> ajout_produit</h2>

<?php

if(isset($_GET["nom"]) && isset($_GET["prix"])){
  
    $stmt = $pdo->prepare("INSERT INTO produit (nom, prix) VALUES (:nom, :prix)");
    $stmt->bindParam(':nom', $_GET["nom"]);
    $stmt->bindParam(':prix', $_GET["prix"]);


    $stmt->execute();
}

?>
<form class="col-12 p-5" action="ajout_produit.php" method="GET">
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom : </label>
        <input type="text" id="nom" name="nom" >
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix : </label>
        <input type="text"  id="prix" name="prix" >
    </div>
    
    <input type="submit" class="btn btn-primary m-auto" value="Ajouter" />
</form>
<div class="d-flex justify-content-center"> 
<a href="profilAdmin.php" value= "retour à la page d'accueil"  class= 'btn btn-info ' >Retour</a>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>