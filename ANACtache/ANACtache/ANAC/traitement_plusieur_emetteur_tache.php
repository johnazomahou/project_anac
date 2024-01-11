

<?php



 if(isset($_POST)) {

    include('../param_connexion_bdd/connexiobddAJAX.php');
/*/ *************declaration des variables************/
// *************declaration des variables**************
      
     
     $numat=$_POST['numat'];
     $dateheuresaisi=$_POST['dateheuresaisi'];
     $nomemetteur=$_POST['nomemetteur'];
    
       
    //on se connecter la BBD 
    include('../param_connexion_bdd/connexiobddAJAX.php');
    //on crée la requete
      // boucle pour inserer les variables dans la base de données selon le nombre d'entré 
foreach ($nomemetteur as $key => $value) {

  $insertion='INSERT INTO emetteur_tache (numat,dateheuresaisi,nomemetteur)
 
 VALUES ("'.$numat.'","'.$dateheuresaisi.'","'.$value.'")';

      // on envoie la requete   
       $succes = $db->query($insertion);
       
       
      if($succes){
    
            echo "<script> alert('Emetteur enregistré avec succes!')</script>";
    
           echo "<script  type='text/javascript'>document.location.replace('suivi_taches.php');</script>";
    
        }
    
        else{
    
            echo "<script> alert('Echec lors de l\'enregistrement !')</script>";
            echo "<script  type='text/javascript'>document.location.replace('suivi_taches.php');</script>";
    
        }}
}

?>



 





 


