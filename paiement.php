
<?php include_once("_includes.php");
include_once("check_connect.php");
include "inc/header.php";
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
<body class=container>

<br>
<div>
<div class="col-12 ms-4">
  <h3 class="text-center text-decoration-underline">Livraison </h3>
  <h6>Pays de livraison : France métropolitaine</h6>
  <h5>Adresse de livraison :</h5>
  <p> Lorem ipsum dolor sit amet 78280 Guyancourt.</p> 
  <a href="#" class="text-dark">Modifier cette adresse</a>
</div>
  <hr>

    <div class="form-check col-12 ms-4 ">
    <h3 class="text-center text-decoration-underline">Emballage cadeau </h3>
        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
        <label class="form-check-label" for="flexCheckIndeterminate">
        Ajoutez un emballage cadeau offert
         </label>
     </div>
     <hr>
     <div class="form-check  col-12 ms-4 ">
     <h3 class="text-center text-decoration-underline" >Paiement</h3>
    
     <div class=d-flex>
     
     <div class="form-check "  >
       <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
       <label class="form-check-label " for="flexRadioDefault1">
       Paypal: Paiement en 1 ou 4 fois sans frais
        </label>
        
     </div>
     <div class="m-auto">
        <img src="inc/paypal.png" alt="paypal" width= "80">
        </div>
     </div>
    

     <div class=d-flex>
  
      <div class="form-check ">
        <input class="form-check-input"   type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">

        Carte bancaire
        </label>
         
      </div>
      <div class=" m-auto">
        <img src="inc/cb.png" alt="carte bancaire" width= "40" >
        </div>
      
      </div>
   
     </div>
     </div>
     </div>
     <hr>

     <h5  class="text-center text-decoration-underline">Récapitulatif de panier</h5>

<?php
if(isset($_SESSION['shoppingcart']) && count($_SESSION['shoppingcart']) != 0) {
  $list = $_SESSION['shoppingcart'];
  $total=0;
  $TTC =0;
  foreach($list as $item) {
    $id = $item['id'];
    $quantite = $item['quantite'];
  
  $db = new DB();
  $pdo = $db->getDB();
  $stmt = $pdo->prepare("SELECT * 
                          FROM produit 
                      WHERE idproduit= '$id'");

  $stmt->execute();

  $result=$stmt->fetch();

        $idproduit = $result['idproduit'];
        $name = $result['nom'];
        $price = $result['prix'];
        $finalprice = $price*$quantite;
        $global = ($finalprice*0.2)+$finalprice;
        $total += $price*$quantite;
        $TTC=($total*0.2)+$total;

   print (
            " 
     
          <div class=  text center>
          <div>
          <img src='images/produits/$idproduit.jpg' width='50' height='50'  class=' mt-4' />
          </div>
          <div class=d-flex m-4>
              <h5>Nom Produit : $name</h5>
              </div>
          <div class= m-4>   
              <h6>Quantité: $quantite</h6>
              <h6 class='m-2'> Prix TTC:    $global  €</h6>
          </div>
          ");
         
    }
  } 
  print (
    " <hr>
    <div>
    <h4> Montant à payer</h4>
    </div>
    <div class=' me-4 '>
        <h6> Prix HT : $total €</h6>
        <h6> Prix TTC : $TTC  €</h6>
        <input type='hidden' name='action' value='commander' />   
    </div>
    </div>
    ");


?>
<hr>
<div class=text-center >
      <a href="#" value= "retour à la page d'accueil"  class= 'btn btn-primary' >Acheter</a>
     </div>


<!-- footer -->
<div class="bg-dark text-white col-12 text-center p-3 mt-2">
        
        <p>Conditions générales</p>
        <p>Mentions légales</p>
        <p>tous les droits sont réservés 2022</p>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>


