<?php
include_once("_includes.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();


if(isset($_SESSION['user'])){
    echo "Accès au panel admin !";
    sleep(2);
    header("Location:index.php");
}
else{
    echo "Vous devez êtes connecté !";
    sleep(2);
    header("Location: index.php");
}

?>