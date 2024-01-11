<?php
include('../param_connexion_bdd/connexlistemultiple.php');


/*/ *************declaration des variables************/

//  if(isset($_POST)) {


//     $idemetteur=$_POST['idemetteur'];
//     $numat=$_POST['numat'];
//     $objettache=$_POST['objettache'];
//     $numeroodre=$_POST['numeroodre'];
//     $idattributeur=$_POST['idattributeur'];
//     $idstatuttache=$_POST['idstatuttache'];
//     $dateattribution=$_POST['dateattribution'];
//     $dateprovisiore=$_POST['dateprovisiore'];
//     $datereponsereltache=$_POST['datereponsereltache'];
//     $observation_attribution=$_POST['observation_attribution'];
//     $observation_retour=$_POST['observation_retour'];
//     $typetache=$_POST['typetache'];
//     $datecloture=$_POST['datecloture'];
//     $numcourier_ref_anac=$_POST['numcourier_ref_anac'];
//     $dateenrgecouranac=$_POST['dateenrgecouranac'];
//     $idpersoaero=$_POST['idpersoaero'];
//     $idaeronef=$_POST['idaeronef'];
//     $formutilise=$_POST['formutilise'];
//     $idorga=$_POST['idorga'];
//     $iddomaine=$_POST['iddomaine'];
//     $datereprisecomplema=$_POST['datereprisecomplema'];
//     $suividoc=$_POST['suividoc'];
//     $documadelivre=$_POST['documadelivre'];
//     $enregistredans=$_POST['enregistredans'];
//     $datereunion=$_POST['datereunion'];
//     $dateheuresaisi=$_POST['dateheuresaisi'];
//     $separer_tache_dj_anac=$_POST['separer_tache_dj_anac'];  
          





//     // nom du fichier téléchargé
//     $filename = $_FILES['fichier_courrier_entrant']['name'];
            
//    // destination du fichier sur le serveu
//     $destination = 'GEDANAC/' . $filename;

//     // récupérer l'extension du fichier
//     $extension = pathinfo($filename, PATHINFO_EXTENSION);

    
// // le fichier physique sur un répertoire d'uploads temporaire sur le serveur
//     $file = $_FILES['fichier_courrier_entrant']['tmp_name'];


//   // déplace le fichier téléchargé (temporaire) vers la destination spécifiée
//         move_uploaded_file($file, $destination);



// //on crée la requete
//    $insertion=$connect->prepare('INSERT INTO suivi_tache 

//                             (idemetteur,idattributeur,numeroodre,numat,objettache,idstatuttache,dateattribution,
//                                               dateprovisiore,typetache,dateheuresaisi,observation_retour,datereponsereltache,observation_attribution,datecloture,numcourier_ref_anac,dateenrgecouranac,idorga,
//                                               formutilise,idpersoaero,idaeronef,iddomaine,datereprisecomplema,suividoc,
//                                               enregistredans,datereunion,separer_tache_dj_anac,documadelivre,
//                                               fichier_courrier_entrant,file_url_courier_entrant) 


//                                   VALUES (?, ?, ?, ?, ?,?,?, ?, ?, ?,?, ?, ?, ?, ?,?,?, ?, ?, ?,?, ?, ?, ?, ?,?,?, ?,?)') or die('Erreur de la requête SQL');;


// // on envoie la requete  
// $insertion->execute(array($idemetteur,$idattributeur,$numeroodre,$numat, $objettache,$idstatuttache,$dateattribution,
//                                 $dateprovisiore,$typetache,$dateheuresaisi,$observation_retour,$datereponsereltache, 
//                                 $observation_attribution,$datecloture,$numcourier_ref_anac,$dateenrgecouranac,$idorga,
//                                 $formutilise,$idpersoaero,$idaeronef,$iddomaine,$datereprisecomplema,$suividoc,
//                                 $enregistredans,$datereunion,$separer_tache_dj_anac,$documadelivre,$filename,$destination));
//    // on envoie la requete   


//   if($insertion)

//   {
    
    
//    echo "<script> alert('Planification de la tâche effectuée avec succes.')</script>";
//         //POUR RAFRAICHIR LA PAGE AUTOMATIQUEMENT
//  echo "<script  type='text/javascript'>document.location.replace('consulter_tache_service.php');</script>";



//  }

//  else{


//   echo "<script> alert(Echec lors de l\'insertion!')</script>";
  
  

//  }

 

// }

?>



 





 


