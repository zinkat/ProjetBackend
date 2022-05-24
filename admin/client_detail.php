<?php
include_once("../_includes.php");
include_once("check_connect.php");


$db = new DB();
$pdo = $db->getDB();

$stmt = $pdo->prepare("SELECT client.idclient,produit.nom as 'Nomp', client.nom as 'Nomc', telephone, email,  qte, prix,date,adresse, ville, pays, role.libelle as 'statut', etat.libelle 'etat'
                        FROM client 
                        INNER JOIN commande ON commande.idclient = client.idclient
                        INNER JOIN adresse on client.idadresse=adresse.idadresse
                        INNER JOIN role on client.idrole=role.idrole
                        INNER JOIN produit_commande ON commande.idcommande = produit_commande.idcommande
                        INNER JOIN etat ON commande.idetat = commande.idetat
                        INNER JOIN produit ON produit_commande.idproduit = produit.idproduit 
                        WHERE client.idclient= :idclient ");
$stmt->bindParam(':idclient', $_GET["idclient"]);


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
<h2 class=text-center>Détail Client</h2>

    <div class=" d-flex justify-content-end ms-4">
<a href="profilAdmin.php" value= "retour à la page d'accueil"  class= 'btn btn-info' >Retour</a>
</div>


<?php
//client.nom, telephone, email, produit.nom, qte, prix,date,adresse, ville, pays, libelle
 
    echo "<img src='../images/clients/".$resultat["idclient"].".jpg'  width='150' height='150'/>";
    echo "<div class= container>";
    echo " <h5 >Détail client</h5>" ;
    echo "<br/>";
    echo "<b>idclient</b>"." ".$resultat["idclient"];
    echo "<br/>";
    echo "<b>nom</b> ".$resultat["Nomc"];
    echo "<br/>";
    echo "<b>telephone</b> ".$resultat["telephone"];
    echo "<br/>";
    echo "<b>email</b> ".$resultat["email"];
    echo "<br/>";
    echo "<b>Statut</b> ".$resultat["statut"];
    echo "<br/>";
    echo "<br/>";

    echo "<b>" ."Adresse". "</b>";
    echo "<br/>";
    echo "<b>"."adresse"."</b> ".$resultat["adresse"];
    echo "<br/>";
    echo "<b>"."ville"."</b> ".$resultat["ville"];
    echo "<br/>";
    echo "<b>"."pays"."</b> ".$resultat["pays"];
    echo "<br/>";
    echo "<br/>";
    
    echo " <h5>Détail produit commandé </h5>" ;
    echo "<br/>";
    echo "<b>Dernier produit commandé</b> ".$resultat["Nomp"];
    echo "<br/>";
    echo "<b>quantite</b> ".$resultat["qte"];
    echo "<br/>";
    echo "<b>prix</b> ".$resultat["prix"];
    echo "<br/>";
    echo "<b>Date de dernière commande</b> ".$resultat["date"];
    echo "<br/>";
    echo "<b>Etat commande</b> ".$resultat["etat"];
    echo "<br/>";
    "</div>";
   
 
    
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>