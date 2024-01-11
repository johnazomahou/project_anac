<?php


 include('../param_connexion_bdd/connexiobddAJAX.php');

$numat = mysqli_real_escape_string($db ,$_POST['numat']);
$pwd1 = mysqli_real_escape_string($db ,$_POST['pwd1']);
$pwd2 = mysqli_real_escape_string($db ,$_POST['pwd2']);

if($pwd1==$pwd2){
    $sqlpwd = "UPDATE user_anacstat set pwd = md5('$pwd1')  where numat='$numat'";
    $reqpwd = mysqli_query($db ,$sqlpwd) or die (mysqli_error($db ));

    	echo "<script language='javascript'>alert('Changement de mot de passe effectué avec succès.Connectez-vous,avec le nouveau Mot de passe.')</script>";

    //ON DECONNECTE LE USER
        echo "<script  type='text/javascript'>document.location.replace('../index.php');</script>";


}else{
    	echo "<script> alert('Les deux mots de passe ne sont pas identiques , réessayer.')</script>";

		echo "<script  type='text/javascript'>document.location.replace('back_office.php');</script>";

}

?>