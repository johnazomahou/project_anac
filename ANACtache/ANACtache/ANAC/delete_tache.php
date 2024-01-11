<?php
    session_start();
        if(isset($_SESSION['user'])){

            
            
            require_once('../param_connexion_bdd/connexiondb.php');
            $idtache=isset($_GET['idtache'])?$_GET['idtache']:0;

           

            // SIL N Y AUCUN ID SELECTIONNER DANS LA TABLE ETRANGER ON PEUX PROCEDER A LA SUPPRESSION
          

                $requete="DELETE FROM  suivi_tache  WHERE idtache=?";
                
                $params=array($idtache);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                
                 echo "<script> alert('Suppression effectuée avec succès.')</script>";

                 echo "<script  type='text/javascript'>document.location.replace('consulter_tache.php');</script>";


           

                 
            }
            
         
    
    
?>