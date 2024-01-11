<?php

////////////////////// fonction pour enregigrer les utilisateur AgpA ////////////////////////////

function ajouter_user($numat,$pwd,$profil,$pconnexion,$nomag,$prenag,$trigram_user){

// *************declaration des variables**************
    $numat=$_POST['numat'];
   
    $pwd=$_POST['pwd'];
    $profil=$_POST['profil'];
    $pconnexion=$_POST['pconnexion'];
    $nomag=$_POST['nomag'];
    $prenag=$_POST['prenag'];
    $trigram_user=$_POST['trigram_user'];
   
//on se connecter la BBD 

include('connexiobddAJAX.php');
//on crée la requete
  $insertion = 'INSERT INTO user_anacstat 
            VALUES ("'.$numat.'","'.$pwd.'","'.$profil.'","'.$pconnexion.'","'.$nomag.'","'.$prenag.'","'.$trigram_user.'")';
// on envoie la requete   
   $succes = $db->query($insertion);
  if($succes){

        echo "<script> alert('Opération effectuee avec succes,le Mot de passe par defaut est 1234')</script>";
         echo "<script  type='text/javascript'>document.location.replace('gestion_utilisateur.php');</script>";

    }

    else{

        echo "<script> alert('Echec lors de l\'insertion!')</script>";

    }

}
// fonction verifier  SI Le numat EXISTE DEJA
function verifie_numat($numat){
  include('connexiobddAJAX.php');
  
    $verifpersonnel_anac='SELECT numat FROM user_anacstat WHERE  numat="'.$numat.'"';
   
   $requ = $db->query($verifpersonnel_anac);

    return (mysqli_num_rows($requ)==1);
}





////////////////////// fonction pour enregigrer les organismes////////////////////////////


function ajouter_organismes($nomorga,$typeorga,$lieuorga,$adresorga,$telorga,$emailorga,$faxorga,$statutorga,
                            $trigrorganisme,$createur,$datexpire,$siteactivite,$cateoperater){

// *************declaration des variables**************
    $nomorga=$_POST['nomorga']; 
    $typeorga=$_POST['typeorga'];
    $lieuorga=$_POST['lieuorga'];
    $adresorga=$_POST['adresorga'];
    $telorga=$_POST['telorga'];
    $emailorga=$_POST['emailorga'];
    $faxorga=$_POST['faxorga'];
    $statutorga=$_POST['statutorga'];
    $trigrorganisme=$_POST['trigrorganisme'];
    $createur=$_POST['createur']; //POUR MIEUX IDENTIFIER L NOM DES OPERATEUR CELLULE INSPECTION DIFFERENT DES ADNA
    $datexpire=$_POST['datexpire'];
    $siteactivite=$_POST['siteactivite'];
    $cateoperater=$_POST['cateoperater'];
       
//on se connecter la BBD 
include('connexiobddAJAX.php');
//on crée la requete
  $insertion = 'INSERT INTO organisme VALUES (" ","'.$nomorga.'","'.$typeorga.'","'.$lieuorga.'","'.$adresorga.'",
                                                  "'.$telorga.'","'.$emailorga.'","'.$faxorga.'","'.$statutorga.'",
                                                  "'.$trigrorganisme.'","'.$createur.'","'.$datexpire.'",
                                                  "'.$siteactivite.'","'.$cateoperater.'")';
// on envoie la requete    
   $succes = $db->query($insertion);
  if($succes){

        echo "<script> alert('Enrégistrement effectué avec succes.')</script>";
          //POUR RAFRAICHIR LA PAGE AUTOMATIQUEMENT
        echo "<script  type='text/javascript'>document.location.replace('organisme.php');</script>";

    }

    else{

        echo "<script> alert('Echec lors de l\'insertion!')</script>";

    }

}

// fonction verifier  SI Lorganisme EXISTE DEJA

function verifier_organisme($nomorga){
 include('connexiobddAJAX.php');
    $veriorganisme='SELECT nomorga FROM organisme WHERE  nomorga="'.$nomorga.'"';
   // $requ=mysql_query($veriftypeformation);
   $requ = $db->query($veriorganisme);

    return (mysqli_num_rows($requ)==1);
}




////////////////////// fonction pour enregigrer les statut_taches aerienn////////////////////////////

function ajouter_nomstatuttache($nomstatuttache){

// *************declaration des variables**************
    $nomstatuttache=$_POST['nomstatuttache'];
   
//on se connecter la BBD 
include('connexiobddAJAX.php');

//on crée la requete
  $insertion = 'INSERT INTO statut_tache VALUES (" ","'.$nomstatuttache.'")';
// on envoie la requete   
   $succes = $db->query($insertion);

  if($succes){

        echo "<script> alert('Opération effectuee avec succes')</script>";
        //POUR RAFRAICHIR LA PAGE AUTOMATIQUEMENT
        echo "<script  type='text/javascript'>document.location.replace('statut_tache.php');</script>";
    }

    else{

        echo "<script> alert('Echec lors de l\'insertion!')</script>";

    }

}
// fonction verifier  SI LE statut_tache EXISTE DEJA
function verifier_statut_tache($nomstatuttache){
  
  include('connexiobddAJAX.php');
  
    $verifstatut_tache='SELECT nomstatuttache FROM statut_tache WHERE  nomstatuttache="'.$nomstatuttache.'"';
  
   $requ = $db->query($verifstatut_tache);

    return (mysqli_num_rows($requ)==1);
}


?>