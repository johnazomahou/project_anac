
<?php
//header('Content-Type: text/html; charset=utf-8');
//setlocale(LC_CTYPE, 'fr_FR.UTF-8');

////////////////////// fonction pour enregigrer les type_bon////////////////////////////

function update_motpasse($numat){

// *************declaration des variables**************
   
     $numat=$_POST['numat'];
    
   

//on se connecter la BBD 
include('../param_connexion_bdd/connexiobddAJAX.php');
//on crée la requete
     $modification = "UPDATE user_anacstat set pwd = '81dc9bdb52d04dc20036dbd8313ed055' where numat='$numat'";
  
// on envoie la requete   
   $succes = $db->query($modification);
  if($succes){

        echo "<script> alert('Opération effectuée avec succes,le  mot de passe est 1234')</script>";

    echo "<script  type='text/javascript'>document.location.replace('reinitialiser_mot_passe_user.php');</script>";

    }

    else{

        echo "<script> alert('Echec lors de modification!')</script>";

    }

}

// fonction verifier  SI type_bon EXISTE DEJA

function verifier_numat_user($numat)
      {
           include('../param_connexion_bdd/connexiobddAJAX.php');
          
           //$verifierquantebonalpha='SELECT COUNT(*) AS nbr FROM utilisateur WHERE  numat="'.$numat.'"  ';

           $verifierquantebonalpha='SELECT numat FROM user_anacstat WHERE  numat="'.$numat.'"  ';
         
                                    
           $requ = $db->query($verifierquantebonalpha);

          return (mysqli_num_rows($requ)==0);//si on trouve 0 rien dans la bdd on affiche le message
      }
?>