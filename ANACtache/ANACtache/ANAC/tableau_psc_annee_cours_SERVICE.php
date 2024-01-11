
                <div class="row">
                  <div class="col-xs-12">
                    

                    
                    

                     <?php 
                                      require("../param_connexion_bdd/connexiobddAJAX.php");
                                                           
    $requete="SELECT 

                                             ( CASE 
                                                        WHEN month(suivi_tache.dateattribution)='1' THEN 'Janvier'
                                                        WHEN month(suivi_tache.dateattribution)='2' THEN 'Fevrier'
                                                        WHEN month(suivi_tache.dateattribution)='3' THEN 'Mars'
                                                        WHEN month(suivi_tache.dateattribution)='4' THEN 'Avril'
                                                        WHEN month(suivi_tache.dateattribution)='5' THEN 'Mai'
                                                        WHEN month(suivi_tache.dateattribution)='6' THEN 'Juin'
                                                        WHEN month(suivi_tache.dateattribution)='7' THEN 'Juillet'
                                                        WHEN month(suivi_tache.dateattribution)='8' THEN 'Août'
                                                        WHEN month(suivi_tache.dateattribution)='9' THEN 'Septembre'
                                                        WHEN month(suivi_tache.dateattribution)='10' THEN 'Octobre'
                                                        WHEN month(suivi_tache.dateattribution)='11' THEN 'Novembre'
                                                        WHEN month(suivi_tache.dateattribution)='12' THEN 'Décembre'
                                                        ELSE '' END )
                                                 AS mois,
                                                        
                                                        
                                                        
                                             
                         SUM(IF(suivi_tache.idstatuttache=8, 1, 0)) AS ouvert ,
                        SUM(IF(suivi_tache.idstatuttache=7, 1, 0)) AS EntetedocCOMPLEMANTER,
                        SUM(IF(suivi_tache.idstatuttache=5, 1, 0)) AS Cloture,
                      SUM(IF(suivi_tache.idstatuttache=9, 1, 0)) AS accuserecep,
                      SUM(IF(suivi_tache.idstatuttache=10, 1, 0)) AS tacheffectue,
                                                                                  
                        (SUM(IF(suivi_tache.idstatuttache=8, 1, 0))+
                         SUM(IF(suivi_tache.idstatuttache=7, 1, 0))+
                         SUM(IF(suivi_tache.idstatuttache=5, 1, 0))+
             SUM(IF(suivi_tache.idstatuttache=9, 1, 0))+
             SUM(IF(suivi_tache.idstatuttache=10, 1, 0))
             
             
             
                                                ) AS NBRETACHE
                                               
                         FROM suivi_tache,emetteur_tache,attributeur_tache,user_anacstat,statut_tache,personnel_anac,service_anac,direction_anac
  
  
  WHERE suivi_tache.idemetteur=emetteur_tache.idemetteur
  AND attributeur_tache.idattributeur=suivi_tache.idattributeur
  AND user_anacstat.idattributache=attributeur_tache.idattributeur
  AND statut_tache.idstatuttache=suivi_tache.idstatuttache
   AND suivi_tache.separer_tache_dj_anac='ANAC'
   
   AND personnel_anac.numat=user_anacstat.numat
AND service_anac.codeserv=personnel_anac.codeserv
AND direction_anac.codedirec=service_anac.codedirec

  AND service_anac.codeserv='$codeserv' 
                         
                                                AND YEAR(suivi_tache.dateattribution)=YEAR(CURRENT_DATE)
                                         
                                        GROUP BY month(suivi_tache.dateattribution),YEAR(suivi_tache.dateattribution)";

                                        $reponse = mysqli_query($db, $requete) or die (mysqli_error($db));
                                                    
                             ?>

                    <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        
    <center style="color:#2060a6;font-weight:bold">
     



    <!--POUR EXTRAIRE LE TABLO O FORMAT EXCEL-->
 
 
  </center>

                    
                        <thead>

                          <tr>

                            
                             <th style="background-color:#03224c;color:white"></th>
                            <th style="background-color:#03224c;color:white"><center>Ouvert</center></th>
                         <th style="background-color:#03224c;color:white"><center>En attente document complementaire</center></th>
                            <th style="background-color:#03224c;color:white"><center>Tâches Cloturées</center></th>

                             
                             <th style="background-color:#03224c;color:white"><center>Total Tâches Accusé reception</center></th>

                             <th style="background-color:#03224c;color:white"><center>Total Tâches effectuées,non cloturées</center></th>
                             <th style="background-color:#03224c;color:white"><center>Tâches Total</center></th>
                            <th style="background-color:#03224c;color:white"><center>Taux éxecution Suivi</center></th>
                            
                           
                     
                          </tr>
                        </thead>

                        <tbody>
                            <!--FAIRE UNE BOUCLE PHP pour recuperer toutes les données de la table-->
                                      <!--recupere une donnée sous forme  d1 tableau associative,ligne/lignes-->
                                      <!--apres il va la stockée dans une variable appeler RES-->
                                      
                        
                                                <?php 
                                                            while($res=mysqli_fetch_assoc($reponse)){
                                                              
                                                              
                                                ?> 
                          <tr>
                            <!---POUR AFFICHER LES DONNEES-->

          <td style="color:black;font-weight:bold" ><?php echo  $res['mois'];?> <?php echo date('Y'); ?></td>
          <td style="background-color:red;color:white" > <center><b><?php echo  $res['ouvert'];?></b></center></td>
          <td style="background-color:yellow;color:black"><center><b><?php echo  $res['EntetedocCOMPLEMANTER'];?></b></center></td>
          <td style="background-color:green;color:white"><center><?php echo  $res['Cloture'];?></center></td>

           <td style="background-color:olive;color:white"><center><b><?php echo $res['accuserecep'];?></b></center></td>
           <td style="background-color:greenyellow;color:red"><center><b><?php echo $res['tacheffectue'];?></b></center></td>
         

           <td style="background-color:teal;color:white"><center><b><?php echo $res['NBRETACHE'];?></b></center></td>
         

          
                                                
                                <!--statistique  de l'administrateur pour  compter le  nombre de tache planifier-->
          <td style="background-color:SlateBlue;color:white">
            
             <?php
                                            if ($res['Cloture']=='0')//ON TEST SI LA VALEUR EST ZERO

                                                      {
                                                        echo '<b style="color:navy;font-weight:bold"> 0 %</b><br/>';
                                                       }
                                                        //total des tache surveillée=cloturer / total des tâches
                                              else {
                                                         

                                                echo number_format( ((($res['Cloture'])/($res['NBRETACHE']))*100),2) . " % "; 
                                                                   

                                                    }
                                                             
                                    ?>
          </td>
                                 

                      
                     
                        
                       

                     



                            
                                  
                                     
                                      
                        </td>
                            
                             <?php }?>

                             </tr>


                        </tbody>

                    </table>

                    </div>
                  </div>
                </div>