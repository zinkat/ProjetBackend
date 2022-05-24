<?php 
include_once("_includes.php");
include_once("check_connect.php");
include "inc/header.php";

?>

<h1 class= 'text-center'> Mon panier </h1>
<form action="removesession.php" method="GET">
	<label for="reset"></label>
	<input type="submit" value="<?php echo ucfirst(LANGUE["Réinitialisation le panier"]); ?>" class=" mb-2 btn btn-danger" name="reset"  />
</form>
<hr>
<?php


$status = '';

//deletion
if (isset($_POST['action']) && $_POST['action']=="remove"){
    if(!empty($_SESSION["shoppingcart"])) {
        foreach($_SESSION["shoppingcart"] as $key => $value) {
          if($_POST["idproduit"] == $value['id']){
          unset($_SESSION["shoppingcart"][$key]);
          $status = "<div class='box' style='color:red;'>
          Product is removed from your cart!</div>";
          }
          if(empty($_SESSION["shoppingcart"]))
          unset($_SESSION["shoppingcart"]);
          }		
    }
    }

$total=0;
$TTC =0;
if(isset($_SESSION['shoppingcart']) && count($_SESSION['shoppingcart']) != 0) {
    $list = $_SESSION['shoppingcart'];
  
   

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
    //echo $result;
  
      // If only on item in the database has this id then proceed
      //if(mysqli_num_rows($result) == 1) {
       // $row = mysqli_fetch_array($result);
       
       

        $idproduit = $result['idproduit'];
        $name = $result['nom'];
        $price = $result['prix'];
        $finalprice = $price*$quantite;
        $global = ($finalprice*0.2)+$finalprice;
        $total += $price*$quantite;
        $TTC=($total*0.2)+$total;
        
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

<body class=" bg-light container col-10">

<?php
      print (
          "
          <div class='d-flex flex-row bd-highlight m-2'>
          <div>
          <img src='images/produits/$idproduit.jpg' width='50' height='50'  class=' mt-4' />
          </div>
          <div class= m-4>
              <h5>$name</h5>
              <h6>Prix unité : $price €</h6>
              <h6>Quantité: $quantite</h6>
              <h6 class='m-2'> Prix global: $finalprice €</h6>
              <h6 class='m-2'> Prix TTC:    $global  €</h6>
          </div>
          </div>
          <div class='text-end col-10 me-4'>
          <form  action='' method=POST>
          <input type='hidden' name='idproduit' value='$idproduit'/>
          <input type='hidden' name='action' value='remove' />
          <button type=submit class='btn btn-primary'>Supprimer</button>
          </div>
          </form>
          <hr>
          
          ");
    }
  } 
  else {

    print(
    "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Ecommerce</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    </head>

    
    <body class=' bg-light'>

    <h2 class= text-center> Votre panier est vide.</h2>
    <br>
    </body>
    </html>
    ");
  }

  print (
    "<div class='text-center me-4 '>

        <h5> Prix HT : $total €</h5>
        <h5> Prix TTC : $TTC  €</h5>
        <input type='hidden' name='action' value='commander' />
     
    </div>
    ");
  
      
?>


<hr>
<br>
<div class='text-center'>
<a href="paiement.php  "class="btn btn-primary">Valider mon panier</a>
</div>
<br>
<!-- footer -->
<div class="bg-dark text-white text-center p-3 mt-2">
        
        <p>Conditions générales</p>
        <p>Mentions légales</p>
        <p>tous les droits sont réservés 2022</p>
       
 

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

