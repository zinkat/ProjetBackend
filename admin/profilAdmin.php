
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

<h1 class="text-center text-decoration-underline"> BO / Admin - E-commerce</h1>
  <div class=" d-flex flex-row-reverse bd-highlight me-4">
<a href="deconnection.php" class="btn btn-primary">Deconnexion</a>
  </div>
<div class="col-12 container mt-8">
    <h2 class= text-decoration-underline> Gestion des produits</h2>
    <br>
   <ul class="list-unstyled ">
    <li>
        <a href="Afficher_produits.php">
          Liste des produits  
        </a>
    </li>
    <hr>
    <li>
        <a href="ajout_produit.php">
            Ajouter un produit
        </a>
    </li>
    <hr>
    <li>
        <a href="modif_produit.php">
       Modifier un produit
            
        </a>
    </li>
    <hr>
    <li>
        <a href="supprimer_produit.php">
        
           Supprimer un produit 
        </a>
    </li>
    <hr>
    <li>
        <a href="produit_info.php">
        
           détail d'un produit
        </a>
    </li>
    <hr>
    <li>
        <a href="recherche_produit.php">
       Rechercher un produit
        </a>
    </li>
   
    <hr>
   
    <li>
        <a href=" rechercheAjax_produit.php">
       Rechercher un produit AJAX
        </a>
    </li>
</ul> 

<h2 > Gestion des utilisateurs</h2>
<br>
   <ul class="list-unstyled ">
    <li>
        <a href="Afficher_client.php">
          Liste des clients
        </a>
    </li>
    <hr>
    <li>
        <a href="ajout_client.php">
            Ajouter un client
        </a>
    </li>
    <hr>
    <li>
        <a href="modif_client.php">
       Modifier un client
            
        </a>
    </li>
    <hr>
    <li>
        <a href="supprimer_client.php">
        
           Supprimer un client
        </a>
    </li>
    <hr>
    <li>
        <a href="client_info.php">
        
           détail d'un client
        </a>
    </li>
    <hr>
    <li>
        <a href="recherche_client.php">
       Rechercher un client
        </a>
    </li>
   
    <hr>
</ul> 




</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>