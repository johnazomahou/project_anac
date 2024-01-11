<?php
    /* Paramètres de connexion à la base de données */
    require("../param_connexion_bdd/connexiobdd_combine_deux_graphe.php");
 

    $data1 = '';
    $data2 = '';
    $data3 = '';
    $data4 = '';


    //requête pour obtenir des données de la table année encours =YEAR(CURRENT_DATE)
    // cette requete compte le nombre de tache CLOS dans lannéé encours AVEC  idstatuttache=5

    
  

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
                                                
                                               
                                                                                      
                                         FROM  suivi_tache

                                                 WHERE  YEAR( suivi_tache.dateattribution)=YEAR(CURRENT_DATE)
                                                 AND suivi_tache.separer_tache_dj_anac='ANAC'

                                                 GROUP BY month( suivi_tache.dateattribution),
                                                 YEAR( suivi_tache.dateattribution)";

 $result = mysqli_query($mysqli, $sql);

    //boucle à travers les données renvoyées
    while ($row = mysqli_fetch_array($result)) {

        $data1 = $data1 . '"'. $row['mois'].'",';
        $data2 = $data2 . '"'. $row['nbretachesurveiller'] .'",';
    }



//requetes l'année antérieur en SQL =  YEAR( DATE_SUB(CURRENT_DATE, INTERVAL 1 YEAR))
// cette requete compte le nombre de tache CLOS dans lannéé encours AVEC  idstatuttache=5


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
                                                
                                               
                                                                                      
                                         FROM  suivi_tache

                                     WHERE  YEAR( suivi_tache.dateattribution)=YEAR( DATE_SUB(CURRENT_DATE, INTERVAL 1 YEAR))

                                     AND suivi_tache.separer_tache_dj_anac='ANAC'
                                                
                                GROUP BY month( suivi_tache.dateattribution),YEAR( suivi_tache.dateattribution)";


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