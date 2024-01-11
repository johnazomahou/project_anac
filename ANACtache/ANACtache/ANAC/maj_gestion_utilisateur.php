<?php
    session_start();
    require("../param_connexion_bdd/connexiondb.php");

   //RECUPERATION DES  variables PROPRE DE LA TABLE A MODIFIER
    $numat=isset($_POST['numat'])?$_POST['numat']:0;
    $nomag=isset($_POST['nomag'])?$_POST['nomag']:""; 
    $prenag=isset($_POST['prenag'])?$_POST['prenag']:"";
    $trigram_user=isset($_POST['trigram_user'])?$_POST['trigram_user']:"";
    $profil=isset($_POST['profil'])?$_POST['profil']:"";
    $pconnexion=isset($_POST['pconnexion'])?$_POST['pconnexion']:"1";    
  
   
    

  
    
//CREATION DE LA REQUETE DE MAJ

     $requete="UPDATE user_anacstat

                       SET trigram_user=?,profil=?,pconnexion=?,nomag=?,prenag=?
          
                         WHERE numat=?";
                   
  //ON EXECUTE LA REQUETE DANS LORDRE DE DECLARATION DES VARIABLES
    $params=array($trigram_user,$profil,$pconnexion,$nomag,$prenag,$numat);


    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
  echo "<script> alert('Modification effectuée avec succes')</script>";
   echo "<script type='text/javascript'>document.location.replace('gestion_utilisateur.php');</script>";


?>
