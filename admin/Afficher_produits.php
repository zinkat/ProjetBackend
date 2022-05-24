<?php

include_once("../_includes.php");
include_once("check_connect.php");





if(!isset($_GET["limit"])){
    $_GET["limit"] = 0;
}

$db = new DB();
$pdo = $db->getDB();
$stmt = $pdo->prepare("SELECT * 
                        FROM produit 
                        ORDER BY  prix ASC
                        LIMIT :limit_min, 25");
$stmt->bindParam(':limit_min', $_GET["limit"]);
$stmt->execute();


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
    <div class="d-flex justify-content-start ms-2"> 
    <a href="profilAdmin.php" value= "retour à la page d'accueil"  class= 'btn btn-info ' >Retour</a>
    </div>
<h2 class= text-center>Liste Produit</h2>


<div class="row col-8  m-auto">
<?php

    $tableau = "<table  class= table table-primary >";
    $tableau.= "<tr>";
    $tableau.= "<th>Détail produit</th>";
    $tableau.= "<th>id Produit</th>";
    $tableau.= "<th>nom</th>";
    $tableau.= "<th>prix</th>";
    $tableau.= "<th>modifier</th>";
    $tableau.= "<th>supprimer</th>";
    $tableau.= "</tr>";

    foreach($stmt->fetchAll() as $row){
        $tableau.= "<tr>";
        $tableau.= "<td>";
        $tableau.= "<a  class= 'btn btn-secondary' href='produit_detail.php?idproduit=".$row["idproduit"]." ' > Detail";
        $tableau.= "</a>";
        
        $tableau.= "</td>";

        $tableau.= "<td>".$row["idproduit"]."</td>";
            
        
      
        
        //$tableau.= "<td>".$row["idproduit"]."</td>";
        
        $tableau.= "<td>".$row["nom"]."</td>";
        
        $tableau.= "<td>".$row["prix"]."</td>";

        $tableau.= "<td>";
        $tableau.= "<a class= 'btn btn-primary' href='modif_produit.php?idproduit=".$row["idproduit"]." '>";
        $tableau.= ucfirst("modifier");
        $tableau.= "</a>";
        $tableau.= "</td>";
        
        $tableau.= "<td>";
        $tableau.= "<a class= 'btn btn-danger' href='supprimer_produit.php?idproduit=".$row["idproduit"]."'>";
        $tableau.= ucfirst("supprimer");
        $tableau.= "</a>";
        $tableau.= "</td>";
        $tableau.= "</tr>";
    }
    $tableau.= "</table>";
    
    echo $tableau;
    
    // Pagination
    $stmtPagination = $pdo->prepare("SELECT count(*) as nb FROM produit");
    $stmtPagination->execute();
    $resultat = $stmtPagination->fetch();

    $limitMin = $_GET["limit"]-25;
    $limitMax = $_GET["limit"]+25;

    if($limitMin < 0){
        $limitMin = 0;
    }
    if($limitMax >= $resultat['nb']){
        $limitMax = $resultat['nb']-1;
    }
?>

</div>
<hr>
<div class="text-center">
<a href='Afficher_produits.php?limit=<?php echo $limitMin; ?>' class="btn btn-primary">page précédente</a>  <a href='Afficher_produits.php?limit=<?php echo $limitMax; ?>' class="btn btn-primary">page suivante</a>
</div>

<br>
<hr>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>