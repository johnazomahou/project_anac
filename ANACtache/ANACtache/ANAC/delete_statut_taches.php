<?php
    session_start();
        if(isset($_SESSION['user'])){
            
            require_once('../param_connexion_bdd/connexiondb.php');
            $idstatuttache=isset($_GET['idstatuttache'])?$_GET['idstatuttache']:0;

            //ON COMPTE LE NBRE UTILISTER QUI ON LE ID SELECTIONNE, AVANT DE SUPPRIMER
            $requetenbreIDTABLETRANGER="SELECT count(*) countuser FROM suivi_tache WHERE idstatuttache=$idstatuttache";
            
            $resultatnbreIDTABLETRANGER=$pdo->query($requetenbreIDTABLETRANGER);
            $tabcountuser=$resultatnbreIDTABLETRANGER->fetch();
            $nbrStag=$tabcountuser['countuser'];
            

            // SIL N Y AUCUN ID SELECTIONNER DANS LA TABLE ETRANGER ON PEUX PROCEDER A LA SUPPRESSION
            if($nbrStag==0){

                $requete="DELETE FROM statut_tache WHERE idstatuttache=?";

                $params=array($idstatuttache);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:statut_tache.php');

            }else{
               
                echo "<script> alert('Suppression impossible: Vous devez supprimer toutes les tâches planifiées à avec ce statut.')</script>";

                 echo "<script  type='text/javascript'>document.location.replace('statut_tache.php');</script>";
            }
            
         }else {
                header('location:statut_tache.php');
        }
    
    
    
    
?>