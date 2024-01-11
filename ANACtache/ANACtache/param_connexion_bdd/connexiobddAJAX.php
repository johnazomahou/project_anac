<?php

$db = mysqli_connect('127.0.0.1', 'root', 'eth@n@2018','si_anac');

//POUR FORCER l'utf8 LE Problème d'encodage sur LES requête SQL dans ta fonction connectBDD().
$db->query('SET NAMES utf8'); 
?>





