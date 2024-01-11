<?php
include('../mail/index.php');
 if(isset($_POST)) {
 
/*/ *************declaration des variables************/
    
    $idemetteur=$_POST['idemetteur'];
    $numat=$_POST['numat'];
    $objettache=$_POST['objettache'];
    $numeroodre=$_POST['numeroodre'];
    $idattributeur=$_POST['idattributeur'];// inserer plusueire donnees
    $idstatuttache=$_POST['idstatuttache'];// inserer plusueire donnees
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
  
        
        

    
       //on crée la requete
// boucle pour inserer les variables dans la base de données selon le nombre d'entré 

foreach ($idstatuttache as $key => $value) {


    $db = new PDO('mysql:host=127.0.0.1;dbname=si_anac','root','eth@n@2018');
    
    //on crée la requete
    $insertion_2=$db->prepare('INSERT INTO suivi_tache 

(idemetteur,idattributeur,numeroodre,numat,objettache,idstatuttache,dateattribution,dateprovisiore,typetache,dateheuresaisi,observation_retour,datereponsereltache,observation_attribution,datecloture,numcourier_ref_anac,dateenrgecouranac,idorga,formutilise,idpersoaero,idaeronef,iddomaine,datereprisecomplema,suividoc,enregistredans,datereunion,separer_tache_dj_anac,documadelivre) 
  
   VALUES (?, ?, ?, ?, ?,?,?, ?, ?, ?,?, ?, ?, ?, ?,?,?, 
           ?, ?, ?,?, ?, ?, ?, ?,?,?)') or die('Erreur de la requête SQL');;
       
 $insertion_2->execute(array($idemetteur,$idattributeur[$key],$numeroodre,
    $numat, $objettache,$value,$dateattribution,$dateprovisiore,$typetache,$dateheuresaisi,$observation_retour,$datereponsereltache,$observation_attribution,$datecloture,$numcourier_ref_anac,$dateenrgecouranac,$idorga,$formutilise,$idpersoaero,$idaeronef,
        $iddomaine,$datereprisecomplema,$suividoc,$enregistredans,$datereunion,$separer_tache_dj_anac,$documadelivre));
         
       
      if($insertion_2){

        $sql_select_attributeur= $connect->prepare("SELECT * FROM attributeur_tache WHERE idattributeur = :idattributeur");
        $sql_select_attributeur->execute(array(
                'idattributeur' => $idattributeur[$key]
        ));
        $donnees_attributeur = $sql_select_attributeur->fetchAll(PDO::FETCH_ASSOC);
        $message="
                <!DOCTYPE html>
                <html lang='fr'>
                <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Message de siganac.anacgabon pour  {$donnees_attributeur[0]["nomattributeur"]}</title>
                </head>
                <body>
                <div style='width:390px;margin: auto;'>
                        <div style='font-weight: 700;
                        margin: auto;
                        padding: 10px;
                        background: #1977cc;
                                        border-radius: 4px;
                        color: #fff;'>
                        <p style='justify-content: left;'>
                          Monsieur /Madame ,{$donnees_attributeur[0]["nomattributeur"]} une tâche vous a été attribuée par  {$_SESSION['user']['nomag']} ,<br>dont l'objet porte sur : <br>{$objettache}.
                          <br>
                          Cette tâche doit être réalisée au plus tard le {$datereponsereltache}.<br>
                        Merci de vous connectez au logiciel ANACTACHE pour Le suivi.<br>
                        Ceci est un email automatique,n'est pas répondre<br>
                        Cordialement .             
                        
                        </p>
                        </div>        
                </div>
                </body>
                </html>";

                $message_text_brut="Monsieur /Madame ,{$donnees_attributeur[0]["nomattributeur"]} une tâche vous a été attribuée par  {$_SESSION['user']['nomag']} ,dont l'objet porte sur :
                {$objettache}.
                Cette tâche doit être réalisée au plus tard le {$datereponsereltache}.
                Merci de vous connectez au logiciel ANACTACHE pour Le suivi.
                Ceci est un email automatique,n'est pas répondre
                 Cordialement .             
                     ";
                     
                envoie_mail($donnees_attributeur[0]["nomattributeur"],$donnees_attributeur[0]["emailanac"],"Envoi de tâche",$message,$destination);
        








    
               echo "<script> alert('Tâche Planifiée  avec succes.Vous pouvez joindre le courrier d\'entrée...')</script>";
    
   
               echo "<script  type='text/javascript'>document.location.replace('redirection_insertion_tache_simultanement_joindre_courrier_entree.php');</script>";
    
        }
    
        else
        {
    
            echo "<script> alert('Echec lors de l\'enregistrement!')</script>";
             
             echo "<script  type='text/javascript'>document.location.replace('redirection_insertion_tache_simultanement_joindre_courrier_entree.php');</script>";
    
        }
    }
}

?>



 





 


