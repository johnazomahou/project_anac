<?php
	
////////////////////// fonction pour enregigrer les utilisateur AgpA ////////////////////////////

function ajouter_user_attributaire($numat,$pwd,$profil,$pconnexion,$nomag,$prenag,$trigram_user,$idattributache){

// *************declaration des variables**************
    $numat=$_POST['numat'];
   
    $pwd=$_POST['pwd'];
    $profil=$_POST['profil'];
    $pconnexion=$_POST['pconnexion'];
    $nomag=$_POST['nomag'];
    $prenag=$_POST['prenag'];
    $trigram_user=$_POST['trigram_user'];
    $idattributache=$_POST['idattributache'];
   
//on se connecter la BBD 

include('connexiobddAJAX.php');

//on crée la requete

  $insertion = 'INSERT INTO user_anacstat 
    VALUES ("'.$numat.'","'.$pwd.'","'.$profil.'","'.$pconnexion.'","'.$nomag.'","'.$prenag.'","'.$trigram_user.'","'.$idattributache.'")';

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
function verifie_numat_attributaire(&$numat, &$idattributache){
  include('connexiobddAJAX.php');
  
    $verifpersonnel_anac='SELECT numat,idattributache 
  
                      FROM user_anacstat 
            
                           WHERE  numat="'.$numat.'"  AND idattributache="'.$idattributache.'" ';
   
   $requ = $db->query($verifpersonnel_anac);

    return (mysqli_num_rows($requ)==1);
}



?>
