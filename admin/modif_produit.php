<?php

include_once("../_includes.php");
include_once("check_connect.php");


$db = new DB();
$pdo = $db->getDB();

?>



<?php

 
    if(isset($_GET["idproduit"])){
        $stmt = $pdo->prepare("SELECT *
                        FROM produit
                        
                        WHERE idproduit = :idproduit");
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
<body class= bg-light>

<h1 class="text-center text-decoration-underline">Admin - E-commerce</h1>
<h2 class="text-center"> Modifier un produit</h2>
        <form action="Update_produit.php" method="GET">
      
            <div class="text-center bg-light mt-4">
                <input type="hidden" id="idproduit" name="idproduit" value="<?php echo $resultat['idproduit']; ?>">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $resultat['nom']; ?>">
            </div>
            <div class="text-center mt-4">
                <label for="prix">Prix :</label>
                <input type="text" id="prix" name="prix" value="<?php echo $resultat['prix']; ?>">
            </div>
            <div>
           
                
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
<h3 class="text-center"> Modifier un produit</h3>
        <form action="modif_produit.php" method="GET">
        <div class="text-center mt-4">
                <label for="idproduit">idproduit :</label>
                <input type="text" id="idproduit" name="idproduit">
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