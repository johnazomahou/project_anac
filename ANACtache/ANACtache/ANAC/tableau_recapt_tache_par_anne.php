
                <div class="row">
                  <div class="col-xs-12">
                    
                     <?php 
                                      require("../param_connexion_bdd/connexiobddAJAX.php");
                                                           
    $requete="SELECT CONCAT(  'ANNÉE'  ,  ' ' ,       YEAR(suivi_tache.dateattribution) ) as anneexcution,

              (COUNT(*)-(SUM(IF(suivi_tache.idstatuttache=5, 1, 0)))) AS tauxexecutionTOTAL,
           
                 (SUM(IF(suivi_tache.idstatuttache=5, 1, 0))) AS tauxexecutioncloture,
                        
                        ROUND(((((SUM(IF(suivi_tache.idstatuttache=5, 1, 0)))) / (COUNT(*)))*100),2) AS tauxexecution,
            
                        COUNT(*) AS nbredetache
                                               
                                FROM  suivi_tache
                                       
                                        WHERE YEAR(suivi_tache.dateattribution)=YEAR(CURRENT_DATE)

                                        AND suivi_tache.separer_tache_dj_anac='ANAC'
                    
                                         
                                         OR YEAR(suivi_tache.dateattribution)=YEAR( DATE_SUB(CURRENT_DATE, INTERVAL 1 YEAR))
                     
                                        GROUP BY  YEAR(suivi_tache.dateattribution)";

                                        $reponse = mysqli_query($db, $requete) or die (mysqli_error($db));
                                                    
                             ?>

                    <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        
    <center style="color:#2060a6;font-weight:bold">
     



    
 
  </center>

                    
                        <thead>

                          <tr>

                            
                            
                            <th style="background-color:#03224c;color:white"></th>
                            <th style="background-color:#03224c;color:white"><center>Total Tâches à executer</center></th>
                            <th style="background-color:#03224c;color:white"><center>Total tâches Clôturées</center></th>
                            <th style="background-color:#03224c;color:white"><center>Total Tâches Enregistrées</center></th>
                            <th style="background-color:#03224c;color:white"><center>Taux d'éxecution de Suivi </center></th>
                     
                          </tr>
                          
                        </thead>

                        <tbody>
                            <!--FAIRE UNE BOUCLE PHP pour recuperer toutes les données de la table-->
                                      <!--recupere une donnée sous forme  d1 tableau associative,ligne/lignes-->
                                      <!--apres il va la stockée dans une variable appeler RES-->
                                      
                        
                                                <?php 
                                                            while($res=mysqli_fetch_assoc($reponse)){
                                                             
                                                              $tauxexecution=$res['tauxexecution'];
                                                              $tauxexecutionTOTAL=$res['tauxexecutionTOTAL'];
                                                              $tauxexecutioncloture=$res['tauxexecutioncloture'];
                                                              
                                                              
                                                ?> 
                          <tr>
                            <!---POUR AFFICHER LES DONNEES-->

         <td style="background-color:LightSlateGray;color:white" ><center><?php echo  $res['anneexcution'];?></center></td>

            
                        <?php 
                        //pour afficher la couler rouge quand c expiré nbremois inferieure ou egal à 1
                                      if ($tauxexecutionTOTAL <= 0)

                                            {

            echo '<td style="background-color:white;color:black"><a style="color:red;font-weight:bold;color:black" ><center> '.$tauxexecutionTOTAL.' </center> </a></td>';
                                                       
                                            }



               //pour afficher la couler rouge  quand le tauxexecutionTOTAL est superieur à 0

                                                             else {
                            
        echo '<td id="DivClignotante" style=visibility:visible;background-color:RED;color:white"><a style="color:white;font-weight:bold" ><center>'.$tauxexecutionTOTAL.' </center> </a></td></div>';
         
                            
                      ;}?> 

    
             
                        <?php 
                        //pour afficher la couler blache quand <=0
                                      if ($tauxexecutioncloture <= 0)

                                            {

            echo '<td style="background-color:white;color:black"><a style="color:red;font-weight:bold;color:white" > 
                            <center>'.$tauxexecutioncloture.'</center> </a></td>';
                                                       
                                            }



               //pour afficher la couler verte  quand le tauxexecutioncloture est superieur à 0

                                                             else {
                            
        echo '<td  style=visibility:visible;background-color:green;color:white"><a style="color:white;font-weight:bold" > <center>'.$tauxexecutioncloture.'</center></a></td></div>';
         
                            
                      ;}?> 

          <td  > <center><b><i><?php echo  $res['nbredetache'];?></i></b></center></td>
          
                                 <td style="background-color:SlateBlue;color:white">
                                    

                                    <?php
                                            if ($res['tauxexecution']=='0')//ON TEST SI LA VALEUR EST ZERO

                                                      {
                                                echo '<b style="color:white;font-weight:bold"> 0 %</b>';
                                                       }
                                                        //total des tache surveillée=cloturer / total des tâches
                                              else {
                                                         

                                     //echo  ($res['tauxexecution'])  ;

                                 echo '<center><b>  '.$tauxexecution.' % </center></b>'; 


                                                                   

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



<!--POUR FAIRE CLIGNOTER DU TEXTE CLIGNOTANT PAR VISIBILITE.-->

<script type="text/javascript"> 
var clignotement = function(){ 
   if (document.getElementById('DivClignotante').style.visibility=='visible'){ 
      document.getElementById('DivClignotante').style.visibility='hidden'; 
   } 
   else{ 
   document.getElementById('DivClignotante').style.visibility='visible'; 
   } 
}; 
// mise en place de l appel de la fonction toutes les 0.8 secondes 
// Pour arrêter le clignotement : clearInterval(periode); 
periode = setInterval(clignotement, 900); 
</script>