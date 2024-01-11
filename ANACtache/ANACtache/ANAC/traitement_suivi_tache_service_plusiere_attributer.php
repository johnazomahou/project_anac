<?php

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

       (idemetteur,idattributeur,numeroodre,numat,objettache,idstatuttache,dateattribution,
                                              dateprovisiore,typetache,dateheuresaisi,observation_retour,datereponsereltache,observation_attribution,datecloture,numcourier_ref_anac,dateenrgecouranac,idorga,
                                              formutilise,idpersoaero,idaeronef,iddomaine,datereprisecomplema,suividoc,
                                              enregistredans,datereunion,separer_tache_dj_anac,documadelivre) 
  
   VALUES (?, ?, ?, ?, ?,?,?, ?, ?, ?,?, ?, ?, ?, ?,?,?, ?, ?, ?,?, ?, ?, ?, ?,?,?)') or die('Erreur de la requête SQL');;
       
 $insertion_2->execute(array($idemetteur,$idattributeur[$key],$numeroodre,$numat, $objettache,$value,$dateattribution,
                                $dateprovisiore,$typetache,$dateheuresaisi,$observation_retour,$datereponsereltache, 
                                $observation_attribution,$datecloture,$numcourier_ref_anac,$dateenrgecouranac,$idorga,
                                $formutilise,$idpersoaero,$idaeronef,$iddomaine,$datereprisecomplema,$suividoc,
                                $enregistredans,$datereunion,$separer_tache_dj_anac,$documadelivre));



         
       
      if($insertion_2){
    
               echo "<script> alert('Tâche Planifiée  avec succes.Vous pouvez joindre le courrier d\'entrée...')</script>";
    
    echo "<script  type='text/javascript'>document.location.replace('redirection_insertion_tache_simultanem_service.php');</script>";
    
        }
    
        else
        {
    
            echo "<script> alert('Echec lors de l\'enregistrement!')</script>";
             
             echo "<script  type='text/javascript'>document.location.replace('redirection_insertion_tache_simultanem_service.php');</script>";
    
        }
    }
}

?>



 





 


