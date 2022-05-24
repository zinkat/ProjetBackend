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



<h1 class="text-center text-decoration-underline">Admin - E-commerce</h1>
<h2 class="text-center"> Rechercher un Client</h2>
<div class="d-flex justify-content-end me-4">
<a href="profilAdmin.php" value= "retour à la page d'accueil"  class= 'btn btn-info' >Retour</a>
</div>
<form action="recherche_client.php" method="GET">
    <div class="row col-3  m-auto">
        <label for="nom"> Nom client:</label>
        <input type="text" id="nom" name="nom">
    </div>
    
    <div class="text-center mt-4">
    <input type="submit" value="Rechercher" class="btn btn-primary" />
    </div>
</form>
 
<br>


</body>
<hr>

<?php

if(isset($_GET['nom'])){
    $_GET['nom']=ucfirst($_GET['nom']);
    $db = new DB();
    $pdo = $db->getDB();
    $stmt = $pdo->prepare("SELECT *
                            FROM client
                            
                            WHERE  nom LIKE CONCAT('%', :nom, '%')  ");
    $stmt->bindParam(':nom', $_GET["nom"]);
 
    $stmt->execute();

 

    $tableau="<table class= table table-primary >";
    foreach($stmt->fetchAll() as $row){
        
        $tableau.= "<tr>";
        $tableau.= "<td>";
        $tableau.= "<a  class= 'btn btn-secondary' href='client_detail.php?idclient=".$row["idclient"]." ' > Detail";
        $tableau.= "</a>";
        $tableau.= "</td>";

        $tableau.= "<td>";
        $tableau.= "<a href='client_detail.php?idclient=".$row["idclient"]."'> ";
            $tableau.= $row["idclient"]; 
        $tableau.= "</a>";
        $tableau.= "</td>";

        $tableau.= "<td>".$row["nom"]."</td>";
        $tableau.= "<td>".$row["email"]."</td>";
        $tableau.= "<td>".$row["telephone"]."</td>";
        
        $tableau.= "<td>";
        $tableau.= "<a class= 'btn btn-primary' href='modif_client.php?idclient=".$row["idclient"]." '>";
        $tableau.= ucfirst("modifier");
        $tableau.= "</a>";
        $tableau.= "</td>";
        
        $tableau.= "<td>";
        $tableau.= "<a class= 'btn btn-danger' href='delete_client.php?idclient=".$row["idclient"]."'>";
        $tableau.= ucfirst("supprimer");
        $tableau.= "</a>";
        $tableau.= "</td>";

        
         $tableau.= "</tr>";
    }
    $tableau.= "</table>";
    
    echo $tableau ;

}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>