<?php
include_once("../_includes.php");
session_start();
session_regenerate_id();

    if($_SESSION['user'] != true){
        header('Location: connexionAdmin.php');
        echo "non connecté";
    }
