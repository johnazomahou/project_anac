<?php
try {

    $pdo = new PDO("mysql:host=localhost;dbname=si_anac","root", "eth@n@2018");

}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());

    //die('Erreur : impossible de se connecter à la base de donnée');
}

//POUR FORCER l'utf8 LE Problème d'encodage sur LES requête SQL dans ta fonction connectBDD().
//$pdo->query('SET NAMES utf8');
$pdo->exec("SET CHARACTER SET utf8");
?>

