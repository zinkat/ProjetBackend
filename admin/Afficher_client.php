<?php

include_once("../_includes.php");
include_once("check_connect.php");





if(!isset($_GET["limit"])){
    $_GET["limit"] = 0;
}

$db = new DB();
$pdo = $db->getDB();
$stmt = $pdo->prepare("SELECT idclient, nom, email,telephone,adresse, ville, pays,libelle FROM client 
                        INNER JOIN adresse on client.idadresse=adresse.idadresse
                        INNER JOIN role on client.idrole=role.idrole
                        ORDER BY idclient
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
<h2 class= text-center>Liste Client</h2>


<div class="row col-12  m-auto">
<?php

    $tableau = "<table  class= table table-primary >";
    $tableau.= "<tr>";
    $tableau.= "<th>Détail Client</th>";
    $tableau.= "<th>id Client</th>";
    $tableau.= "<th>Nom</th>";
    $tableau.= "<th>Email</th>";
    $tableau.= "<th>Telephone</th>";
    $tableau.= "<th>Adresse</th>";
    $tableau.= "<th>Ville</th>";
    $tableau.= "<th>Pays</th>";
    $tableau.= "<th>Type client</th>";
    $tableau.= "<th>modifier</th>";
    $tableau.= "<th>supprimer</th>";
    $tableau.= "</tr>";

    foreach($stmt->fetchAll() as $row){
        $tableau.= "<tr>";
        $tableau.= "<td>";
        $tableau.= "<a  class= 'btn btn-secondary' href='client_detail.php?idclient=".$row["idclient"]." ' > Detail";
        $tableau.= "</a>";
        $tableau.= "</td>";

        $tableau.= "<td>" .$row["idclient"]."</td>";
        
        
        //$tableau.= "<td>".$row["idproduit"]."</td>";idclient, nom, email,telephone,adresse, ville, pays,libelle
        
        $tableau.= "<td>".$row["nom"]."</td>";
        $tableau.= "<td>".$row["email"]."</td>";
        $tableau.= "<td>".$row["telephone"]."</td>";
        $tableau.= "<td>".$row["adresse"]."</td>";
        $tableau.= "<td>".$row["ville"]."</td>";
        $tableau.= "<td>".$row["pays"]."</td>";
        $tableau.= "<td>".$row["libelle"]."</td>";




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
    
    echo $tableau;
    
    // Pagination
    $stmtPagination = $pdo->prepare("SELECT count(*) as nb FROM client");
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
<a href='Afficher_client.php?limit=<?php echo $limitMin; ?>' class="btn btn-primary">page précédente</a>  <a href='Afficher_client.php?limit=<?php echo $limitMax; ?>' class="btn btn-primary">page suivante</a>
</div>

<br>
<hr>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>