<?php

$connecttypeactivite = new PDO("mysql:host=localhost;dbname=si_anac", "root", "eth@n@2018");

//POUR FORCER l'utf8 LE Problème d'encodage sur LES requête SQL dans ta fonction connectBDD().
//$pdo->query('SET NAMES utf8');
$connecttypeactivite->exec("SET CHARACTER SET utf8");
?>