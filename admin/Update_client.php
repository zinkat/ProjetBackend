<?php include_once("../_includes.php");
include_once("check_connect.php");    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class= "bg-light container mt-4">

<h4>Modification enregistrée</h4>
<div>
<a href="profilAdmin.php" value= "retour à la page d'accueil"  class= 'btn btn-info' >Retour</a>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
<?php


$db = new DB();
$pdo = $db->getDB();

$stmtUpdate = $pdo->prepare(" UPDATE client, adresse,role  SET 
                                client.nom = :nom, 
                                client.email = :email,
                                client.telephone = :telephone,
                                adresse.adresse = :adresse,
                                adresse.ville = :ville,
                                adresse.pays = :pays,
                                role.libelle = :libelle
                                WHERE idclient = :idclient" );

$stmtUpdate->bindParam(':nom', $_GET["nom"]);
$stmtUpdate->bindParam(':email', $_GET["email"]);
$stmtUpdate->bindParam(':telephone', $_GET["telephone"]);
$stmtUpdate->bindParam(':idclient', $_GET["idclient"]);
$stmtUpdate->bindParam(':adresse', $_GET["adresse"]);
$stmtUpdate->bindParam(':ville', $_GET["ville"]);
$stmtUpdate->bindParam(':pays', $_GET["pays"]);
$stmtUpdate->bindParam(':libelle', $_GET["libelle"]);

$stmtUpdate->execute();

?>

