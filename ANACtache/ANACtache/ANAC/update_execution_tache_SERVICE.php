

<?php

$conn = new PDO('mysql:host=localhost; dbname=si_anac','root', 'eth@n@2018'); 

//DECLARATION DES VARIABLE A MODIFIER
$idtache=$_REQUEST['idtache'];


    $idemetteur=$_POST['idemetteur'];
    $numat=$_POST['numat'];
    $objettache=$_POST['objettache'];
    //$numeroodre=$_POST['numeroodre'];
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
  


$file_url=$_POST['file_url'];
$filename = $_FILES['fichier']['name'];     
 $destination = 'GEDANAC/' . $filename;

   if (move_uploaded_file($_FILES["fichier"]["tmp_name"],"GEDANAC/" . $_FILES["fichier"]["name"])) {
  
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


     require_once('supprimer_document_joint_tache.php');

$sql = "UPDATE suivi_tache 
             
             SET idemetteur='$idemetteur',idattributeur='$idattributeur',numat='$numat',objettache='$objettache',
                 idstatuttache='$idstatuttache',dateattribution='$dateattribution', dateprovisiore='$dateprovisiore',
                 typetache='$typetache',dateheuresaisi='$dateheuresaisi',observation_retour='$observation_retour',
                 datereponsereltache='$datereponsereltache',observation_attribution='$observation_attribution',
                 datecloture='$datecloture',numcourier_ref_anac='$numcourier_ref_anac',dateenrgecouranac='$dateenrgecouranac',
                 idorga='$idorga',formutilise='$formutilise',idpersoaero='$idpersoaero',idaeronef='$idaeronef',
                 iddomaine='$iddomaine',datereprisecomplema='$datereprisecomplema',suividoc='$suividoc',
                 enregistredans='$enregistredans',datereunion='$datereunion',documadelivre='$documadelivre',

                  fichier='$filename',file_url ='$destination'

               WHERE idtache = '$idtache' ";

$conn->exec($sql);

 echo "<script> alert('Validation effectuée avec succes.')</script>";

                  echo "<script  type='text/javascript'>document.location.replace('consulter_tache_service.php');</script>";

        }

        else  {


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE suivi_tache 

              SET idemetteur='$idemetteur',idattributeur='$idattributeur',numat='$numat',objettache='$objettache',
                 idstatuttache='$idstatuttache',dateattribution='$dateattribution', dateprovisiore='$dateprovisiore',
                 typetache='$typetache',dateheuresaisi='$dateheuresaisi',observation_retour='$observation_retour',
                 datereponsereltache='$datereponsereltache',observation_attribution='$observation_attribution',
                 datecloture='$datecloture',numcourier_ref_anac='$numcourier_ref_anac',dateenrgecouranac='$dateenrgecouranac',
                 idorga='$idorga',formutilise='$formutilise',idpersoaero='$idpersoaero',idaeronef='$idaeronef',
                 iddomaine='$iddomaine',datereprisecomplema='$datereprisecomplema',suividoc='$suividoc',
                 enregistredans='$enregistredans',datereunion='$datereunion',documadelivre='$documadelivre',

                 file_url ='$file_url'  

                WHERE idtache = '$idtache' ";

$conn->exec($sql);

echo "<script> alert('Validation effectuée avec succes. document joint Conservé')</script>";

                   echo "<script  type='text/javascript'>document.location.replace('consulter_tache_service.php');</script>";

        }




?>