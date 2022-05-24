<?php

include_once("../_includes.php");
include_once("check_connect.php");


$db = new DB();
$pdo = $db->getDB();

?>



<?php

 
    if(isset($_GET["idclient"])){
        $stmt = $pdo->prepare("SELECT *
                        FROM client,adresse,role
                        
                        WHERE idclient = :idclient");
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
<body class= bg-light>

<h1 class="text-center text-decoration-underline">Admin - E-commerce</h1>
<h2 class="text-center"> Modifier un produit</h2>
        <form action="Update_client.php" method="GET">
      
            <div class="text-center bg-light mt-4">
                <input type="hidden" id="idclient" name="idclient" value="<?php echo $resultat['idclient']; ?>">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $resultat['nom']; ?>">
            </div>
            <div class="text-center mt-4">
                <label for="prix">email :</label>
                <input type="text" id="email" name="email" value="<?php echo $resultat['email']; ?>">
            </div>
            <div class="text-center mt-4">
                <label for="telephone">Telephone :</label>
                <input type="text" id="telephone" name="telephone" value="<?php echo $resultat['telephone']; ?>">
            </div>

            <div class="text-center mt-4">
                <label for="telephone">Adresse:</label>
                <input type="text" id="adresse" name="adresse" value="<?php echo $resultat['adresse']; ?>">
            </div>

            <div class="text-center mt-4">
                <label for="telephone">Ville :</label>
                <input type="text" id="ville" name="ville" value="<?php echo $resultat['ville']; ?>">
            </div>

            <div class="text-center mt-4">
                <label for="telephone">Pays :</label>
                <input type="text" id="pays" name="pays" value="<?php echo $resultat['pays']; ?>">
            </div>

            <div class="text-center mt-4">
                <label for="role">statue :</label>
                <input type="text" id="libelle" name="libelle" value="<?php echo $resultat['libelle']; ?>">
            </div>
            
            <div class="text-center mt-4">
    <input type="submit" value="Modifier" class="btn btn-primary" />
    </div>
        </form>
        <?php
    }

    else{
        ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<section class= bg-light>
<h2 class="text-center text-decoration-underline">Admin - E-commerce</h2>
<h3 class="text-center"> Modifier un client</h3>
        <form action="modif_client.php" method="GET">
        <div class="text-center mt-4">
                <label for="idclient">idclient :</label>
                <input type="text" id="idclient" name="idclient">
            </div>
            <div class="text-center mt-4">
    <input type="submit" value="Afficher" class="btn btn-primary" />
    </div>
        </form>
        </section>
        <?php
    }
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>