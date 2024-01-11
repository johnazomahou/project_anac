
                <div class="row">
                  <div class="col-xs-12">
                    

                    
                    

                     <?php 
                                      require("../param_connexion_bdd/connexiobddAJAX.php");
                                                           
    $requete="SELECT 

                                             ( CASE 
                                                        WHEN month(programmation_suivie.dateprevue)='1' THEN 'Janvier'
                                                        WHEN month(programmation_suivie.dateprevue)='2' THEN 'Fevrier'
                                                        WHEN month(programmation_suivie.dateprevue)='3' THEN 'Mars'
                                                        WHEN month(programmation_suivie.dateprevue)='4' THEN 'Avril'
                                                        WHEN month(programmation_suivie.dateprevue)='5' THEN 'Mai'
                                                        WHEN month(programmation_suivie.dateprevue)='6' THEN 'Juin'
                                                        WHEN month(programmation_suivie.dateprevue)='7' THEN 'Juillet'
                                                        WHEN month(programmation_suivie.dateprevue)='8' THEN 'Août'
                                                        WHEN month(programmation_suivie.dateprevue)='9' THEN 'Septembre'
                                                        WHEN month(programmation_suivie.dateprevue)='10' THEN 'Octobre'
                                                        WHEN month(programmation_suivie.dateprevue)='11' THEN 'Novembre'
                                                        WHEN month(programmation_suivie.dateprevue)='12' THEN 'Décembre'
                                                        ELSE '' END )
                                                 AS mois,
                                                        
                                                        
                                                        
                                             
                                                SUM(IF(programmation_suivie.etat_progrm=1, 1, 0)) AS nbretacheplanifier ,
                                                SUM(IF(programmation_suivie.etat_progrm=2, 1, 0)) AS nbretachereporter,
                                                SUM(IF(programmation_suivie.etat_progrm=3, 1, 0)) AS nbretacherealiser,
                                                SUM(IF(programmation_suivie.etat_progrm=4, 1, 0)) AS nbretacheannuler,
                                                Count(*) AS NBRETACHE
                                               
                                              
                                                                                      
                                         FROM programmation_suivie
                                         
                                        GROUP BY month(programmation_suivie.dateprevue),YEAR(programmation_suivie.dateprevue)";

                                        $reponse = mysqli_query($db, $requete) or die (mysqli_error($db));
                                                    
                             ?>

                    <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        
    <center style="color:#2060a6;font-weight:bold">
     



    <!--POUR EXTRAIRE LE TABLO O FORMAT EXCEL-->
               
  <a target=_black title="Extraction des données" onclick="return confirm('Etes vous sûr de vouloir Extraire ce tableau  ?');"  href="../ETATS/#">

                                <i style="color:green;font-weight:bold" class="ace-icon fa fa-download"></i>
                                                 <B><i style="color:green;font-weight:bold">Extraire tous le tableau</i></B> 
                                                   <i><img  src="../assets/img/logoexcle.png"></i>
                </a>
 
  </center>

                    
                        <thead>

                          <tr>

                            
                            <th> </th>
                            <th style="background-color:#03224c;color:white">Total tâches</th>
                            <th style="background-color:#03224c;color:white">Tâches non executées</th>
                            <th style="background-color:#03224c;color:white">Tâches suspendues</th>
                            <th style="background-color:#03224c;color:white">Tâches effectuées</th>
                            <th style="background-color:#03224c;color:white">Total tâches surveillées</th>
                            <th style="background-color:#03224c;color:white">Total tâches restantes à surveiller</th>
                           <th style="background-color:#03224c;color:white">Etat d'exécution du programme</th>
                     
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

          <td style="color:black;font-weight:bold" ><?php echo  $res['mois'];?></td>
          <td style="background-color:black;color:white" > <?php echo  $res['NBRETACHE'];?></td>
          <td style="background-color:#BD8D46;color:white"><?php echo  $res['nbretachereporter'];?></td>
          <td style="background-color:red;color:white"><?php echo  $res['nbretacheannuler'];?></td>
          <td style="background-color:green;color:white"><?php echo  $res['nbretacherealiser'];?></td>
          <td style="background-color:teal;color:white"><?php echo $res['nbretachereporter']+$res['nbretacheannuler']
                                                                            +$res['nbretacherealiser']; ?></td>
                                                
                                <!--statistique  de l'administrateur pour  compter le  nombre de tache planifier-->
          <td style="background-color:navy;color:white"><?php echo $res['nbretacheplanifier']; ?></td>
                                 
                                 <td style="background-color:FUCHSIA;color:white">
                                    

                                    <?php
                                            if ($res['NBRETACHE']=='0')//ON TEST SI LA VALEUR EST ZERO

                                                      {
                                                        echo '<b style="color:green;font-weight:bold"> 0 %</b><br/>';
                                                       }
                                                        //total des tache surveillée / total des tâches
                                              else {
                                                         /*echo '<b style="color:FUCHSIA;font-weight:bold">
                                                            '.($stat24['nbretacheplanifier']/$stat240TACHES['NBRETACHE']*100).' % </b><br/>';*/

                                                            echo number_format( ((($res['nbretachereporter']+$res['nbretacheannuler']+
                                                                        $res['nbretacherealiser'])/($res['NBRETACHE']))*100),2)."%"; 
                                                                   

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