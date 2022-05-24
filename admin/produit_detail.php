<?php
include_once("../_includes.php");
include_once("check_connect.php");


$db = new DB();
$pdo = $db->getDB();
$stmt = $pdo->prepare("SELECT *
                        FROM produit 
                        INNER JOIN produit_commande ON produit_commande.idproduit = produit.idproduit
                        WHERE produit.idproduit= :idproduit");
$stmt->bindParam(':idproduit', $_GET["idproduit"]);

$stmt->execute();
$resultat = $stmt->fetch();

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
<body class= "container bg-light">

<h1 class="text-center text-decoration-underline">Admin - E-commerce</h1>
<h2 class=text-center>Détail Produit</h2>
<div class=" d-flex justify-content-end ms-4">
<a href="profilAdmin.php" value= "retour à la page d'accueil"  class= 'btn btn-info' >Retour</a>
</div>


<?php

    echo "<img src='../images/produits/".$resultat["idproduit"].".jpg'  width='150' height='150'/>";
    echo "<br/>";
    echo "<b>idproduit</b>"." ".$resultat["idproduit"];
    echo "<br/>";
    echo "<b>nom</b> ".$resultat["nom"];
    echo "<br/>";
    echo "<b>prix</b> ".$resultat["prix"];
    echo "<br/>";
    echo "<br/>";

    echo "<b>" ."produit / commande". "</b>";
    echo "<br/>";
    echo "<b>"."qantité commandée"."</b> ".$resultat["qte"];
 
    
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>