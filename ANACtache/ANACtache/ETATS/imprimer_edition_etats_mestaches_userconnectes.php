<?php session_start();
//jappele la fction ki me permet de me connecter a la BDD
require("../param_connexion_bdd/connexiobddAJAX.php");
//pour editer une données  je dois recuperer le code

$idstatuttache=$_GET['idstatuttache'];

$user = $_SESSION['user']['numat'];
 
 $codeserv = $_SESSION['user']['codeserv'];//pour afficher uniquement les taches d1 services

$libserv = $_SESSION['user']['libserv'];//pour afficher le nom du service

$codedirec = $_SESSION['user']['codedirec'];//pour afficher uniquement les taches d1 direction

$annecours=$_GET['annecours'];  //  pour recuperer les taches selectionne de lannee


//je selectionne la donner
$req="SELECT statut_tache.nomstatuttache,statut_tache.idstatuttache
                                              
                                                                                                         
                                                        FROM suivi_tache 

                                                        LEFT JOIN emetteur_tache ON suivi_tache.idemetteur=emetteur_tache.idemetteur
                                                        LEFT JOIN attributeur_tache ON suivi_tache.idattributeur=attributeur_tache.idattributeur 
                                                        LEFT JOIN user_anacstat ON suivi_tache.numat=user_anacstat.numat
                                                        LEFT JOIN statut_tache ON suivi_tache.idstatuttache=statut_tache.idstatuttache 
                                                        
                                                         WHERE  YEAR(suivi_tache.dateattribution)='$annecours'

                                                         AND statut_tache.idstatuttache=$idstatuttache

                                                         AND suivi_tache.separer_tache_dj_anac='ANAC'
                                                        
                                                        GROUP BY suivi_tache.idstatuttache ";
              
//execution de la requete
$result1 = mysqli_query($db, $req);
//je stocker dans la variable ET
$ET=mysqli_fetch_assoc($result1);
$idstatuttache=$ET['idstatuttache'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- The fav icon -->
    <link rel="shortcut icon" href="../assets/img/faviconLOGOANAC.ico" type="image/vnd.microsoft.icon"/>
    <title>ETAT   DES TACHES <?php echo($ET['nomstatuttache'])?></title>
    <script>
        function doit(){
            if (!window.print){
                alert("You need NS4.x to use this print button!")
                return
            }
            window.print()
        }
    </script>
    <style type="text/css">
        h2{
            color:#C03;
            font-size:18px; font-family:"Courier New", Courier, monospace;
        }
        p{ font-family:"Comic Sans MS", cursive;
            font-size:15px; color:#066; text-align:justify;}
        a{
            text-decoration:none;
            font-size:20px; }

    </style>
</head>
<body onload="window.print()">
<body>

<img "alt="Charisma Logo" src="../assets/img/banierenteanac.png" class="hidden-xs"/><br/>






                    <center><h2><b id="LblClignotant" style="color:#03224c;font-weight:bold"><i>
                <font face="Candara" FONT size="6">
                    ETAT  DES TACHES
                    <?php 
                                            if ($idstatuttache=='7'){
                                           echo '<a  style="color:black;font-weight:bold" ><font face="Candara" FONT size="6">EN ATTENTE DE DOCUMENT COMPLEMENTAIRE</FONT></a>';
                                                                } 
                                                
                                               

                                                elseif($idstatuttache=='8'){
                                                                    echo '<a style="color:red;font-weight:bold"><font face="Candara" FONT size="6">OUVERT(ES)</FONT></a>';
                                                                        }


                                                elseif($idstatuttache=='9'){
                                                                    echo '<a style="color:black;font-weight:bold"><font face="Candara" FONT size="6">ACCUSE RECEPTION DE LA TACHE</FONT></a>';
                                                                        }




                                                elseif($idstatuttache=='10'){
                                                                    echo '<a style="color:olive;font-weight:bold"><font face="Candara" FONT size="6">TACHE EFFECTUEE,NON CLOTUREE</FONT></a>';
                                                                        }

                                                
                                                else {
                                                        echo '<a style="color:green;font-weight:bold"><font face="Candara" FONT size="6">CLOS</FONT></a>';}
            ?>



                      EN <?php echo date('Y'); ?> 
                  
            </font></h2></b></i></center>





                 <?php 
                              require_once("../param_connexion_bdd/connexiobddAJAX.php");


$requete="SELECT suivi_tache.idtache,emetteur_tache.idemetteur,emetteur_tache.nomemetteur, attributeur_tache.idattributeur,
                                             attributeur_tache.nomattributeur,suivi_tache.numeroodre,suivi_tache.numat, user_anacstat.prenag,
                                             user_anacstat.nomag,suivi_tache.dateheuresaisi,suivi_tache.objettache, 
                                             date_format(suivi_tache.dateattribution, '%d/%m/%Y') as dateattribution, 
                                             date_format(suivi_tache.dateprovisiore, '%d/%m/%Y') as dateprovisiore, 
                                             date_format(suivi_tache.datereponsereltache, '%d/%m/%Y') as datereponsereltache, 
                                             DATEDIFF(suivi_tache.datereponsereltache,suivi_tache.dateattribution) AS tempsmis, 
                                             suivi_tache.objettache,suivi_tache.observation_attribution,
                                             suivi_tache.observation_retour,suivi_tache.typetache ,statut_tache.nomstatuttache,
                                             suivi_tache.idstatuttache
                                              
                                                    
                                                        









FROM suivi_tache


LEFT JOIN emetteur_tache ON emetteur_tache.idemetteur=suivi_tache.idemetteur
LEFT JOIN attributeur_tache ON attributeur_tache.idattributeur=suivi_tache.idattributeur
LEFT JOIN user_anacstat ON user_anacstat.idattributache=attributeur_tache.idattributeur
LEFT JOIN statut_tache ON statut_tache.idstatuttache=suivi_tache.idstatuttache
LEFT  JOIN organisme ON organisme.idorga=suivi_tache.idorga
LEFT JOIN personnel_aeronautique ON personnel_aeronautique.idpersoaero=suivi_tache.idpersoaero
LEFT JOIN aeronef_adna ON aeronef_adna.idaeronef=suivi_tache.idaeronef
LEFT JOIN domaine ON  domaine.iddomaine=suivi_tache.iddomaine
LEFT JOIN formulaire_utilise_anactache ON formulaire_utilise_anactache.idformutilise=suivi_tache.formutilise
LEFT JOIN document_delivre_anactache ON document_delivre_anactache.iddocdelivre=suivi_tache.documadelivre


LEFT JOIN personnel_anac ON personnel_anac.numat=user_anacstat.numat
LEFT JOIN service_anac ON service_anac.codeserv=personnel_anac.codeserv
LEFT JOIN direction_anac ON direction_anac.codedirec=service_anac.codedirec


                                            
    WHERE user_anacstat.numat='$user'  AND   YEAR(suivi_tache.dateattribution)='$annecours'
    
          AND suivi_tache.separer_tache_dj_anac='ANAC'
           AND statut_tache.idstatuttache='$idstatuttache'
          

             ORDER BY   suivi_tache.idtache DESC

";

$reponse = mysqli_query($db, $requete) or die (mysqli_error($db));
                                            
                ?>

       



<table face="Candara" border="1" cellpadding="10" cellspacing="3" width="100%" bordercolor="black">
    <tr style="background-color:#03224c;color:white">

                            <th style="background-color:#03224c;color:white">ID Opération</th>
                            <th style="background-color:#03224c;color:white">Date Opération </th>
                            <th style="background-color:#03224c;color:white">Date Attribution</th>
                            <th style="background-color:#03224c;color:white">Emetteur Tâche</th>
                            <th style="background-color:#03224c;color:white">Objet Tâche</th>
                            <th style="background-color:#03224c;color:white">Attributaire Tâche</th>
                            <th style="background-color:#03224c;color:white">Observation Origine</th>
                            <th style="background-color:#03224c;color:white">Date Reponse Provi.</th>
                            <th style="background-color:#03224c;color:white">Date Reponse</th>
                            <th style="background-color:#03224c;color:white">Observation Retour</th>
                           
                            
     
       

    </tr>
    <?php
    while($res=mysqli_fetch_assoc($reponse)){
                                                       $idstatuttache=$res['idstatuttache'];
                                                       $tempsmis=$res['tempsmis'];
                                                       $typetache=$res['typetache'];
                                                       $dateprovisiore=$res['dateprovisiore'];
                                                       $datereponsereltache=$res['datereponsereltache'];
        ?>
        <tr>


            
            <!---POUR AFFICHER LES DONNEES-->

                            <td style="color:black"> <?php echo  $res['idtache'];?> </td>

                            <td style="color:black"> Le,<?php echo  $res['dateheuresaisi'];?></td>

                           
                            

                            <td style="color:black"> <?php echo  $res['dateattribution'];?> </td>
                            <td style="color:black"> <?php echo  $res['nomemetteur'];?> </td>
                            <td style="color:black"> <?php echo  $res['objettache'];?> </td>
                            <td style="color:black"> <?php echo  $res['nomattributeur'];?> </td>
                            <td style="color:black"> <?php echo  $res['observation_attribution'];?> </td>
                            <td style="color:black">                      <?php 
                                     //dateprovisiore = 00/00/00 = VIDE ON AFFICHE RIEN
                                                      if ($dateprovisiore=='00/00/0000'){

                          echo ''; } 
                                                          
                                    else {
                                      
                                        echo '<a style="color:black"> '.$dateprovisiore.' </a>';}?>
   </td>  
                            <td style="color:black">                    <?php 
                                     //datereponsereltache = 00/00/00 = VIDE ON AFFICHE RIEN
                                                      if ($datereponsereltache=='00/00/0000'){

                          echo ''; } 
                                                          
                                    else {
                                      
                                        echo '<a style="color:black"> '.$datereponsereltache.' </a>';}?>
 </td>
                            <td style="color:black"> <?php echo  $res['observation_retour'];?> </td>
                           
                          
               
                    
 
            
          
        <?php }?>




            </td>

           
                        </tr>


                        </tbody>
                    </table><br/>

<center>
        <div style="margin-right: -370px; margin-top: 0px;color:black">
             <I>Edité par : <?php echo  ' ' .$_SESSION['user']['prenag']?> 
                                        <?php echo  ' ' .$_SESSION['user']['nomag']?>, le <?php echo $date=date('d/m/Y' );?> à <?php echo  date("H:i", strtotime('now -1 Hour '));?></I>    
                                        <p><?php include('../ANAC/pied.php');?> </p> 
        </div>
</center>
<div align="center">
    <!--<a href="javascript:doit()"><img src="icon-48-print.png" border=0 align="middle"> </a>-->

</div>
</div>
</body>
</html>
