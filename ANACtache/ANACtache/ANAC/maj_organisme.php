<?php
    session_start();
    require("../param_connexion_bdd/connexiondb.php");

   //RECUPERATION DES  variables PROPRE DE LA TABLE A MODIFIER
    $idorga=isset($_POST['idorga'])?$_POST['idorga']:0;

    $telorga=isset($_POST['telorga'])?$_POST['telorga']:""; 
    $emailorga=isset($_POST['emailorga'])?$_POST['emailorga']:"";
    $faxorga=isset($_POST['faxorga'])?$_POST['faxorga']:"";
    $nomorga=isset($_POST['nomorga'])?$_POST['nomorga']:"";
    $adresorga=isset($_POST['adresorga'])?$_POST['adresorga']:"";
    $lieuorga=isset($_POST['lieuorga'])?$_POST['lieuorga']:"";
    $trigrorganisme=isset($_POST['trigrorganisme'])?$_POST['trigrorganisme']:"";
    $datexpire=isset($_POST['datexpire'])?$_POST['datexpire']:"";
    $statutorga=isset($_POST['statutorga'])?$_POST['statutorga']:"";
    $cateoperater=isset($_POST['cateoperater'])?$_POST['cateoperater']:"";
    $siteactivite=isset($_POST['siteactivite'])?$_POST['siteactivite']:"";
    $typeorga=isset($_POST['typeorga'])?$_POST['typeorga']:"";

  
   
    
  //RECUPERATION DES VARIABLES DE LA TABLE ETRANGER, EN //LISTE DEROULANTE
    $createur=isset($_POST['createur'])?$_POST['createur']:1;
   
//CREATION DE LA REQUETE DE MAJ

     $requete="UPDATE  organisme

               SET createur=?,nomorga=?,lieuorga=?,adresorga=?,telorga=?,
                   emailorga=?,faxorga=?,trigrorganisme=?,datexpire=?,
                   siteactivite=?,cateoperater=?,statutorga=?,typeorga=?
          
                     WHERE idorga=?";
                  
  //ON EXECUTE LA REQUETE DANS LORDRE DE DECLARATION DES VARIABLES
    $params=array($createur,$nomorga,$lieuorga,$adresorga,$telorga,$emailorga,
                  $faxorga,$trigrorganisme,$datexpire,$siteactivite,$cateoperater,$statutorga,$typeorga,$idorga);


    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
  echo "<script> alert('Modification effectuée avec succes.')</script>";
  
   echo "<script type='text/javascript'>document.location.replace('organisme.php');</script>";


?>
