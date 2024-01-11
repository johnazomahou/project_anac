<?php
include('../param_connexion_bdd/connexlistemultiple.php');
/*/ *************declaration des variables************/
include('../mail/index.php');
 if(isset($_POST)) {
    $idemetteur=$_POST['idemetteur'];
    $numat=$_POST['numat'];
    $objettache=$_POST['objettache'];
    $numeroodre=$_POST['numeroodre'];
    $idattributeur=$_POST['idattributeur'];
    $idstatuttache=$_POST['idstatuttache'];
    $dateattribution=$_POST['dateattribution'];
    $dateprovisiore=$_POST['dateprovisiore'];
    $datereponsereltache=$_POST['datereponsereltache'];
    $observation_attribution=$_POST['observation_attribution'];
    $observation_retour=$_POST['observation_retour'];
    $typetache=$_POST['typetache'];
    $datecloture=$_POST['datecloture'];
    $numcourier_ref_anac=$_POST['numcourier_ref_anac'];
    $dateenrgecouranac=$_POST['dateenrgecouranac'];
    $idpersoaero=$_POST['idpersoaero'];
    $idaeronef=$_POST['idaeronef'];
    $formutilise=$_POST['formutilise'];
    $idorga=$_POST['idorga'];
    $iddomaine=$_POST['iddomaine'];
    $datereprisecomplema=$_POST['datereprisecomplema'];
    $suividoc=$_POST['suividoc'];
    $documadelivre=$_POST['documadelivre'];
    $enregistredans=$_POST['enregistredans'];
    $datereunion=$_POST['datereunion'];
    $dateheuresaisi=$_POST['dateheuresaisi'];
    $separer_tache_dj_anac=$_POST['separer_tache_dj_anac'];  
          

    // nom du fichier téléchargé
    $filename = $_FILES['fichier_courrier_entrant']['name'];
            
   // destination du fichier sur le serveu
    $destination = 'GEDANAC/' . $filename;

    // récupérer l'extension du fichier
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    
// le fichier physique sur un répertoire d'uploads temporaire sur le serveur
    $file = $_FILES['fichier_courrier_entrant']['tmp_name'];


  // déplace le fichier téléchargé (temporaire) vers la destination spécifiée
        move_uploaded_file($file, $destination);



//on crée la requete pour insertion
   $insertion=$connect->prepare('INSERT INTO suivi_tache 

(idemetteur,idattributeur,numeroodre,numat,objettache,idstatuttache,
dateattribution,dateprovisiore,typetache,dateheuresaisi,observation_retour,
datereponsereltache,observation_attribution,datecloture,
numcourier_ref_anac,dateenrgecouranac,idorga,formutilise,
idpersoaero,idaeronef,iddomaine,datereprisecomplema,suividoc,
enregistredans,datereunion,separer_tache_dj_anac,documadelivre,
fichier_courrier_entrant,file_url_courier_entrant) 

VALUES (?, ?, ?, ?, ?,?,?, ?, ?, ?,?, ?, ?, ?, ?,?,?,
        ?, ?, ?,?, ?, ?, ?, ?,?,?, ?,?)') or die('Erreur de la requête SQL');;


// on envoie la requete  
$insertion->execute(array($idemetteur,$idattributeur,$numeroodre,$numat,
$objettache,$idstatuttache,$dateattribution,$dateprovisiore,$typetache,
 $dateheuresaisi,$observation_retour,$datereponsereltache,
 $observation_attribution,$datecloture,$numcourier_ref_anac,
 $dateenrgecouranac,$idorga,$formutilise,$idpersoaero,$idaeronef,$iddomaine,
 $datereprisecomplema,$suividoc,$enregistredans,$datereunion,
 $separer_tache_dj_anac,$documadelivre,$filename,$destination));

   // on envoie la requete   


  if($insertion)
  {
    
        
        $sql_select_attributeur= $connect->prepare("SELECT * FROM attributeur_tache WHERE idattributeur = :idattributeur");
        $sql_select_attributeur->execute(array(
                'idattributeur' => $idattributeur
        ));
        $donnees_attributeur = $sql_select_attributeur->fetchAll(PDO::FETCH_ASSOC);
        // $message="
        //         <!DOCTYPE html>
        //         <html lang='fr'>
        //         <head>
        //         <meta charset='UTF-8'>
        //         <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        //         <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        //         <title>Message de siganac.anacgabon pour  {$donnees_attributeur[0]["nomattributeur"]}</title>
        //         </head>
        //         <body>
        //         <div style='width:390px;margin: auto;'>
        //                 <div style='font-weight: 700;
        //                 margin: auto;
        //                 padding: 10px;
        //                 background: #1977cc;
        //                                 border-radius: 4px;
        //                 color: #fff;'>
        //                 <p style='justify-content: left;'>
        //                   Monsieur /Madame ,{$donnees_attributeur[0]["nomattributeur"]} une tâche vous a été attribuée par   ,<br>dont l'objet porte sur : <br>{$objettache}.
        //                   <br>
        //                   Cette tâche doit être réalisée au plus tard le {$datereponsereltache}.<br>
        //                 Merci de vous connectez au logiciel ANACTACHE pour Le suivi.<br>
        //                 Ceci est un email automatique,n'est pas répondre<br>
        //                 Cordialement .             
                        
        //                 </p>
        //                 </div>        
        //         </div>
        //         </body>
        //         </html>";
        




                $message_text_brut="Monsieur /Madame ,{$donnees_attributeur[0]["nomattributeur"]} une tâche vous a été attribuée par   ,dont l'objet porte sur :
                {$objettache}.
                Cette tâche doit être réalisée au plus tard le {$datereponsereltache}.
                Merci de vous connectez au logiciel ANACTACHE pour Le suivi.
                Ceci est un email automatique,n'est pas répondre
                 Cordialement .             
                     ";



                     if (empty($filename)) {
                        # code...
                        envoie_mail($donnees_attributeur[0]["nomattributeur"],$donnees_attributeur[0]["emailanac"],$objettache,$message_text_brut,"");
                     }else{
                        envoie_mail($donnees_attributeur[0]["nomattributeur"],$donnees_attributeur[0]["emailanac"],$objettache,$message_text_brut,$destination);
                     }
               
        
                echo "<script> alert('Planification de la tâche effectuée avec succes.')</script>";
       
                //POUR RAFRAICHIR LA PAGE AUTOMATIQUEMENT APRES INSERTION


        echo "<script  type='text/javascript'>document.location.replace('consulter_tache.php');</script>";



 }

 else{


  echo "<script> alert(Echec lors de l\'insertion!')</script>";
  
  

 }

 

}

?>



 





 


