<?php
include_once("_includes.php");

// Ici, nous n'avons que la langue à modifier, donc on ne crée pas de panel comme pour BO.php


// Si $_GET["langue"] a une valeur, on rentre dans le if
if(isset($_GET["langue"])){
    // on crée le cookie
    if($_GET["langue"] == "EN"){
        setcookie("LANGUE", "EN", time()+3600);
    }
    else{
        setcookie("LANGUE", "FR", time()+3600);
    }
    header('Location: index.php');
}
// S'il n'y a pas de GET langue, on affiche le formulaire
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class= bg-dark>
<form action="reglages.php" method="GET">

<br>
    <div class="text-center text-white">
        <p> Saisissez FR pour le francais <br>
            Enter EN for English </p>
        <label for="langue">Langue :(  FR / EN )</label>
        <br>
        <input type="text" id="langue" name="langue"> 
    </div>
    <br>
    <div class="text-center">
    <input type="submit" value="valider" class="btn btn-danger" />
    </div>
</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
<?php
}