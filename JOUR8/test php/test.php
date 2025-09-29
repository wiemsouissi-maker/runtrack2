<?php
session_start();

// initialisation de la grille 

if (!isset($_SESSION)["grille"]) || isset($_POST["reset"]) { 
    $_SESSION["grille"] = array_fill(0, 3, array_fill(0, 3, "-"));
$_SESSION["tour"] = "x";
$_SESSION["message"] = ""; 
}



?>