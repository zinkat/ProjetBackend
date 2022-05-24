<?php
include_once("check_connect.php");
session_start();
// Check if the add to cart button was clicked or someone just wants to load this page. This POST method `add` is from the id of the add to cart button on the detail page.
if(isset($_POST['Add']) && isset($_POST['produit'])) {
    $id = $_POST['produit'];
    $quantite = $_POST['quantite'];
    $item = [
      "id"       => $id,
      "quantite" => $quantite
    ];
    // Check if there is a session for the cart set already, if not then set one.
    if(!isset($_SESSION['shoppingcart'])) {
      $_SESSION['shoppingcart'] = [];

      array_push($_SESSION['shoppingcart'], $item);
  
    // Once added let's take the user to the cart page
    header("Location: cart.php");
    }else{
      {  
        $array_keys = array_column($_SESSION["shoppingcart"],'id');
         if(!in_array($id,$array_keys))  
         {  
              $count = count($_SESSION["shoppingcart"]);  
               $item = [
                 "id"       => $id,
                 "quantite" => $quantite
               ];  
              $_SESSION["shoppingcart"][$count] = $item; 
  
            // Once added let's take the user to the cart page
            header("Location: cart.php");
         }  
         else  
         {  
              //echo '<script>alert("Item Already Added")</script>';  
              //echo '<script>window.location="index.php"</script>';
              $list = $_SESSION['shoppingcart'];
                foreach($list as $key => $value) {
                $idexist = $value['id'];
                $quantiteexist = $value['quantite'];
                   if($id==$idexist){
                     $newquantite = $quantiteexist + $quantite;
                     unset($_SESSION["shoppingcart"][$key]);
                     //$count = count($_SESSION["shoppingcart"]);
                     $newitem = [
                      "id"       => $id,
                      "quantite" => $newquantite
                    ];
                     //$_SESSION["shoppingcart"][$count] = $newitem;
                     //$_SESSION["shoppingcart"] = array_merge($_SESSION["shoppingcart"],$newitem);
                     array_push($_SESSION['shoppingcart'], $newitem);
                     header("Location: cart.php");

                   }


                }
         }  
    }

    }
    
  } else {
    // If the add to cart button was not clicked then go back to the products page.
    header("Location: produit.php");
  }
?>