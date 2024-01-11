

<?php

//$pdo = new PDO('mysql:host=localhost; dbname=si_anac','root', 'eth@n@2018'); 


         require("../param_connexion_bdd/connexiondb.php"); 

//DECLARATION DES VARIABLE A MODIFIER
$numeroodre=$_REQUEST['numeroodre'];


    
    $numat=$_POST['numat'];
    $dateheuresaisi=$_POST['dateheuresaisi'];
    
  

//DECLARATION VARIABLE GESTION DU fichier_courrier_entrant
$file_url_courier_entrant=$_POST['file_url_courier_entrant'];

$filename = $_FILES['fichier_courrier_entrant']['name'];     
 $destination = 'GEDANAC/' . $filename;

   if (move_uploaded_file($_FILES["fichier_courrier_entrant"]["tmp_name"],"GEDANAC/" . $_FILES["fichier_courrier_entrant"]["name"])) {
  
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


     require_once('supprimer_courrier_entree_tache.php');

$sql = "UPDATE suivi_tache 
             
             SET numat='$numat',dateheuresaisi='$dateheuresaisi',

                  fichier_courrier_entrant='$filename',file_url_courier_entrant ='$destination'

               WHERE numeroodre = '$numeroodre' ";

$pdo->exec($sql);

 echo "<script> alert('Intégration du courrier effectuée avec succes.')</script>";

                  echo "<script  type='text/javascript'>document.location.replace('consulter_tache_service.php');</script>";

        }

        else  {


$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE suivi_tache 

              SET numat='$numat',dateheuresaisi='$dateheuresaisi',
                 file_url_courier_entrant ='$file_url_courier_entrant'  

                WHERE numeroodre = '$numeroodre' ";

$pdo->exec($sql);

echo "<script> alert('Intégration du courrier effectuée avec succes')</script>";

                   echo "<script  type='text/javascript'>document.location.replace('consulter_tache_service.php');</script>";

        }




?>