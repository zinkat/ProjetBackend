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
    
    <h1 class=text-center>Recherche Produit AJAX</h1>

    <hr>
    <div class="d-flex justify-content-center me-4">
        <a href="profilAdmin.php" value= "retour à la page d'accueil"  class= 'btn btn-info' >Retour</a>
    </div>
<hr>
    <h2>Nom de produit recherche</h2>
    

    <form action="produit_rechercheAjax.php" method='GET'>
    <div>
        <label for="recherche">Nom Produit :</label>
        <input type="text" id="recherche" name="recherche" oninput="functionAjax()">
    </div>
</form>
<div id="resultats"></div>



</body>
<script type="text/javascript">
    function functionAjax(){
        var recherche = document.getElementById("recherche").value;
        
        if (recherche.length < 3 ) {
            document.getElementById("resultats").innerHTML = "Saisir au moins trois caractères.";
        } else {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'produit_rechercheAjax.php?recherche='+recherche);
            xhr.onreadystatechange = function () {
                const DONE = 4;
                const OK = 200;
                if (xhr.readyState === DONE) {
                    if (xhr.status === OK) {
                        document.getElementById("resultats").innerHTML = xhr.responseText;
                    }
                    else{
                        document.getElementById("resultats").innerHTML = xhr.status;
                    }
                }
            };
            xhr.send();   
        }
    }
</script>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</html>


