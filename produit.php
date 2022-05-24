<?php
//require_once("bd.php");
include_once("_includes.php");


  $db = new DB();
  $pdo = $db->getDB();
  $stmt = $pdo->prepare("SELECT * 
                          FROM produit 
                         WHERE idproduit= :idproduit");
$stmt->bindParam(':idproduit', $_GET['idproduit']);

$stmt->execute();

 $result=$stmt->fetch();

  

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
<body class=" bg-light container">


<?php include "inc/header.php";?>

<div class="row col-10 mt-4">

<div class="card col-8 offset-2 " >
  <img src='images/produits/<?php echo $result['idproduit'];?>.jpg' class=" m-auto pt-2 " width='450' height='400' alt="..."/>
<div class="card-body">
    <h5 class="card-title text-primary"> Nom: <?php echo $result['nom'];?></h5>
    
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item fst-bold text-primary fs-4"> Prix TTC : <?php echo $result['prix'].' €';?> </li>
    <li class="list-group-item "> Référence produit : <?php echo $result['idproduit'];?> </li>
   
  </ul>
  <div class="card-body">
  <h6>Description de produit</h6>
    <p class="card-text text-Sombre fst-italic fs-6 ">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque perferendis similique eligendi. Ab accusamus omnis error, fugit quisquam aliquid nesciunt rerum molestias, ad quis quas autem? Non necessitatibus ratione provident. </p>
  </div>
</div>
</div>

<div class=" col-2 container mt-2">
    <form action="addtocart.php" method="POST">
      <input type="hidden" value="<?php echo $result['idproduit'];?> " name="produit">
     
      Quantité : <input type="number"  class="form-control" step= "1" value="1" name="quantite">
      <button type=submit name="Add" class=" mt-2 btn btn-primary"><?php echo ucfirst(LANGUE["Ajouter au panier"]); ?></button>
      
    </form>
  
  </div>
  
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