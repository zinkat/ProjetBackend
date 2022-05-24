<?php
//require_once("bd.php");
include_once("_includes.php");
if(isset($_GET['reset'])) {
  session_start();
  unset($_SESSION['shoppingcart']);
  session_destroy();
  sleep(1);
  header('Location: index.php');
}

// Start the session for the rest of the page after destroying it.
session_start();
?>