<?php
    session_start();

    require_once('../param_connexion_bdd/connexiondb.php');
    
    
    $numat=isset($_POST['numat'])?$_POST['numat']:"";
    
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

    //$codedirec=isset($_POST['pwd'])?$_POST['codedirec']:"";

$requete="SELECT user_anacstat.numat,user_anacstat.pwd,user_anacstat.profil,
                    user_anacstat.pconnexion,user_anacstat.prenag,user_anacstat.nomag,
                    user_anacstat.trigram_user,user_anacstat.idattributache,
                    direction_anac.codedirec,direction_anac.libdirec,
                     direction_anac.codedirec,service_anac.codeserv,service_anac.libserv


                    FROM user_anacstat,personnel_anac,service_anac,direction_anac

                    WHERE user_anacstat.numat=personnel_anac.numat
                    AND service_anac.codeserv=personnel_anac.codeserv
                    AND direction_anac.codedirec=service_anac.codedirec
                    AND user_anacstat.numat='$numat' 
                    
                    AND user_anacstat.pwd=MD5('$pwd')";

     $resultat=$pdo->query($requete);

    if($user=$resultat->fetch()){ 
       
        if($user['pconnexion']==1){
            
            $_SESSION['user']=$user;
               // si la connexion est bonne on affiche la session d lutilisateur
            header('location:back_office.php');
            
        }else{
            
          $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Votre compte est désactivé.<br> Veuillez contacter l'administrateur";
            header('location:../index.php');
        }

    }else{

    $_SESSION['erreurLogin']="<strong>Erreur!!</strong> N°Matricule ou mot de passe incorrect!!!";
    
        header('location:../index.php');
    }

?>