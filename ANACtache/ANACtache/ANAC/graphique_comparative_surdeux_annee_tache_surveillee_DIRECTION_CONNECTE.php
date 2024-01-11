<?php
  //jinclu le fichier se session 
   //require_once('identifier.php');
    /* Paramètres de connexion à la base de données */
    require("../param_connexion_bdd/connexiobdd_combine_deux_graphe.php");
   setlocale(LC_CTYPE, 'fr_FR.UTF-8');
//session_start();
 
 $user = $_SESSION['user']['numat'];
 


    $data1 = '';
    $data2 = '';
    $data3 = '';
    $data4 = '';


    //requête pour obtenir des données de la table année encours =YEAR(CURRENT_DATE)
    // cette requete compte le nombre de tache CLOS dans lannéé encours  idstatuttache=5

    
    $sql = "SELECT                      
                                                ( CASE 
                                                        WHEN month( suivi_tache.dateattribution)='1' THEN 'Janvier'
                                                        WHEN month( suivi_tache.dateattribution)='2' THEN 'Fevrier'
                                                        WHEN month( suivi_tache.dateattribution)='3' THEN 'Mars'
                                                        WHEN month( suivi_tache.dateattribution)='4' THEN 'Avril'
                                                        WHEN month( suivi_tache.dateattribution)='5' THEN 'Mai'
                                                        WHEN month( suivi_tache.dateattribution)='6' THEN 'Juin'
                                                        WHEN month( suivi_tache.dateattribution)='7' THEN 'Juillet'
                                                        WHEN month( suivi_tache.dateattribution)='8' THEN 'Août'
                                                        WHEN month( suivi_tache.dateattribution)='9' THEN 'Septembre'
                                                        WHEN month( suivi_tache.dateattribution)='10' THEN 'Octobre'
                                                        WHEN month( suivi_tache.dateattribution)='11' THEN 'Novembre'
                                                        WHEN month( suivi_tache.dateattribution)='12' THEN 'Décembre'
                                                        
                                                ELSE '' END )   AS mois,
                                                        
                                                        
                                                        
                                           
                                                
                                                
                                              
                                                (SUM(IF( suivi_tache.idstatuttache=5, 1, 0)))

                                                AS nbretachesurveiller
                                                
                                                                                        
                                         FROM suivi_tache,emetteur_tache,attributeur_tache,user_anacstat,statut_tache,personnel_anac,service_anac,direction_anac
                                         
                                         
  
  
  WHERE suivi_tache.idemetteur=emetteur_tache.idemetteur
        AND attributeur_tache.idattributeur=suivi_tache.idattributeur
        AND user_anacstat.idattributache=attributeur_tache.idattributeur
        AND statut_tache.idstatuttache=suivi_tache.idstatuttache
                       
        AND  YEAR( suivi_tache.dateattribution)=YEAR(CURRENT_DATE)
        AND suivi_tache.separer_tache_dj_anac='ANAC'
        AND direction_anac.codedirec='$codedirec'
        
        AND personnel_anac.numat=user_anacstat.numat
        AND service_anac.codeserv=personnel_anac.codeserv
        AND direction_anac.codedirec=service_anac.codedirec

          GROUP BY MONTH(suivi_tache.dateattribution),YEAR( suivi_tache.dateattribution)";

 $result = mysqli_query($mysqli, $sql);

    //boucle à travers les données renvoyées
    while ($row = mysqli_fetch_array($result)) {

        $data1 = $data1 . '"'. $row['mois'].'",';
        $data2 = $data2 . '"'. $row['nbretachesurveiller'] .'",';
    }



//requetes l'année antérieur en SQL =  YEAR( DATE_SUB(CURRENT_DATE, INTERVAL 1 YEAR))
// cette requete compte le nombre de tache CLOS dans lannéé encours  idstatuttache=5


     $sql2 = "SELECT                      
                                                ( CASE 
                                                        WHEN month( suivi_tache.dateattribution)='1' THEN 'Janvier'
                                                        WHEN month( suivi_tache.dateattribution)='2' THEN 'Fevrier'
                                                        WHEN month( suivi_tache.dateattribution)='3' THEN 'Mars'
                                                        WHEN month( suivi_tache.dateattribution)='4' THEN 'Avril'
                                                        WHEN month( suivi_tache.dateattribution)='5' THEN 'Mai'
                                                        WHEN month( suivi_tache.dateattribution)='6' THEN 'Juin'
                                                        WHEN month( suivi_tache.dateattribution)='7' THEN 'Juillet'
                                                        WHEN month( suivi_tache.dateattribution)='8' THEN 'Août'
                                                        WHEN month( suivi_tache.dateattribution)='9' THEN 'Septembre'
                                                        WHEN month( suivi_tache.dateattribution)='10' THEN 'Octobre'
                                                        WHEN month( suivi_tache.dateattribution)='11' THEN 'Novembre'
                                                        WHEN month( suivi_tache.dateattribution)='12' THEN 'Décembre'
                                                        
                                                ELSE '' END )   AS mois,
                                                        
                                                        
                                                        
                                           
                                                
                                                
                                              
                                                (SUM(IF( suivi_tache.idstatuttache=5, 1, 0)))

                                                AS nbretachesurveiller
                                                
                                                                                        
                                         FROM suivi_tache,emetteur_tache,attributeur_tache,user_anacstat,statut_tache,personnel_anac,service_anac,direction_anac
                                         
                                         
  
  
  WHERE suivi_tache.idemetteur=emetteur_tache.idemetteur
        AND attributeur_tache.idattributeur=suivi_tache.idattributeur
        AND user_anacstat.idattributache=attributeur_tache.idattributeur
        AND statut_tache.idstatuttache=suivi_tache.idstatuttache
                       
       
          AND  YEAR( suivi_tache.dateattribution)=YEAR( DATE_SUB(CURRENT_DATE, INTERVAL 1 YEAR))
        AND suivi_tache.separer_tache_dj_anac='ANAC'
        AND direction_anac.codedirec='$codedirec'
        
                                         AND personnel_anac.numat=user_anacstat.numat
                                            AND service_anac.codeserv=personnel_anac.codeserv
                                            AND direction_anac.codedirec=service_anac.codedirec

          GROUP BY MONTH(suivi_tache.dateattribution),YEAR( suivi_tache.dateattribution)";


    $result1 = mysqli_query($mysqli, $sql2);

    //boucle à travers les données renvoyées
    while ($row = mysqli_fetch_array($result1)) {

        $data3 = $data3 . '"'. $row['mois'].'",';
        $data4 = $data4 . '"'. $row['nbretachesurveiller'] .'",';
    }



    $data1 = trim($data1,",");
    $data2 = trim($data2,",");
    $data3 = trim($data3,",");
    $data4 = trim($data4,",");


?>