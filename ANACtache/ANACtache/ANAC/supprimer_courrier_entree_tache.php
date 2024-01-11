

<?php
setlocale(LC_CTYPE, 'fr_FR.UTF-8');

 require("../param_connexion_bdd/connexiobddAJAX.php");

$statreq700 = "SELECT * FROM suivi_tache WHERE numeroodre='$numeroodre'";

$statrep700 = mysqli_query($db, $statreq700) or die (mysqli_error($db));

$stat700 = mysqli_fetch_assoc($statrep700);
 
    if($_REQUEST['numeroodre']){

        $numeroodre=$_REQUEST['numeroodre'];

        $location=$stat700['file_url'];
        

        @unlink($location);
 
    }


 
?>



 





 



