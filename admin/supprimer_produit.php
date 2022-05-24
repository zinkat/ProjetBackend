<?php
include_once("../_includes.php");
include_once("check_connect.php");
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
<h2 class="text-center"> Supprimer un produit</h2>
<form action="delete_Produit.php" method="GET">
<div class="row col-3  m-auto">
        <label for="idproduit">id Produit :</label>
        <input type="text" id="idproduit" name="idproduit">
    </div>
    <div class="text-center mt-4">
    <input type="submit" value="Supprimer" class="btn btn-primary" />
    </div>
</form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>