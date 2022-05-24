
<?php
include_once("../_includes.php");
session_start(); 
unset($_SESSION['user']); 
session_destroy(); 
header("Location: connexionAdmin.php"); 
