<?php
//require_once("bd.php");
include_once("_includes.php");

try {
  // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db = new DB();
  $pdo = $db->getDB();
  $stmt = $pdo->prepare("SELECT * FROM produit");
  $stmt->execute();

  $produit = $stmt->fetchall();
//print_r($produit);
}
catch(Exception $e) {
  echo 'Exception -> ';
  var_dump($e->getMessage());
}
  
// boutton search

if (isset ($_GET['nom'])){
  $_GET['nom']=ucfirst($_GET['nom']);
    $stmt = $pdo->prepare("SELECT * FROM produit
                           WHERE nom LIKE CONCAT(:nom, '%' )");
    $stmt->bindParam(':nom', $_GET["nom"]);
    $stmt->execute();        

   $produit = $stmt->fetchall();
  
  }
  
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
<body>

<div class="row col-12 mt-4 ms-4">
<?php

include "inc/header.php";

foreach($produit as $p){?>
         
  
  <div class="col-3 ">
  <div class="card" style="width: 18rem;">
  <?php echo "<img src='images/produits/".$p['idproduit'].".jpg' class='card-img-top' style= 'height: 300px' alt='image_produit'>";?>
      
      <div class="card-body">
        <h5 class="card-title">  <?php echo $p['nom'];?></h5>
        <p class="card-text"> <?php echo ucfirst(LANGUE["Prix"]); ?> <?php echo $p['prix'].' €';?> </p>
        <!-- <p class="card-text"> Id: <?php echo $p['idproduit'];?> </p> -->
        <a href="produit.php?idproduit=<?php echo $p['idproduit'];?>  "class="btn btn-primary"><?php echo ucfirst(LANGUE["Afficher"]); ?></a>
      </div>
  </div>
  </div>

<?php ;} ?>

</div>     


<!-- footer -->
    <div class="bg-dark text-white text-center p-3 mt-2">
        
            <p>Conditions générales</p>
            <p>Mentions légales</p>
            <p>tous les droits sont réservés 2022</p>
           
     

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>