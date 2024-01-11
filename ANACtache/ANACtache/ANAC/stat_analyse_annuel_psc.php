
                <div class="row">
                  <div class="col-xs-12">
                    

                    
                    

                     <?php 
                                      require("../param_connexion_bdd/connexiobddAJAX.php");
                                                           
    $requete="SELECT statut_tache.idstatuttache,statut_tache.nomstatuttache, 
                      COUNT(*) AS totaltache,YEAR(suivi_tache.dateattribution) AS annecours
                                              
                                                                                                         
                                                        FROM suivi_tache 

                                                        LEFT JOIN emetteur_tache ON suivi_tache.idemetteur=emetteur_tache.idemetteur
                                                        LEFT JOIN attributeur_tache ON suivi_tache.idattributeur=attributeur_tache.idattributeur 
                                                        LEFT JOIN user_anacstat ON suivi_tache.numat=user_anacstat.numat
                                                        LEFT JOIN statut_tache ON suivi_tache.idstatuttache=statut_tache.idstatuttache 
                                                        
                                                         WHERE  suivi_tache.separer_tache_dj_anac='ANAC'

                                                         AND  statut_tache.idstatuttache IS NOT NULL
                                                        
                                                        GROUP BY suivi_tache.idstatuttache,YEAR(suivi_tache.dateattribution)";

                                        $reponse = mysqli_query($db, $requete) or die (mysqli_error($db));
                                                    
                             ?>

                    <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        
    <center style="color:#2060a6;font-weight:bold">
     



    
 
  </center>

                    
                        <thead>

                          <tr>

                            
                            
                            <th style="background-color:#03224c;color:white">Année </th>
                            <th style="background-color:#03224c;color:white">Type de Tâches </th>
                            <th style="background-color:#03224c;color:white">Total de Tâches</th>
                           <th style="background-color:#03224c;color:white">Voir détaille </th>
                     
                          </tr>
                        </thead>

                        <tbody>
                            <!--FAIRE UNE BOUCLE PHP pour recuperer toutes les données de la table-->
                                      <!--recupere une donnée sous forme  d1 tableau associative,ligne/lignes-->
                                      <!--apres il va la stockée dans une variable appeler RES-->
                                      
                        
                                                <?php 
                                                            while($res=mysqli_fetch_assoc($reponse)){
                                                               $idstatuttache=$res['idstatuttache'];
                                                              
                                                ?> 
                          <tr>
                            <!---POUR AFFICHER LES DONNEES-->

         <td style="background-color:white;color:black" ><b><?php echo  $res['annecours'];?></b></td>

        

  <!--POUR MISE EN FORME CONDITIONNELLE GERER COULEUr DE FOND du statut d l tache-->

                        <?php 
                        //pour afficher la couler bleu 
                                      if ($idstatuttache== '7')
                                            {
            
                                                // couler jaune
                            echo '<td id="DivClignotanteB" style=visibility:visible;background-color:yellow;color:#03224c"><a style="color:#03224c;font-weight:bold" >En attente document complementaire</a></td></div>';
                                                       
                                                       }

                          //pour afficher la couler rouge
                                                        
                                      elseif ($idstatuttache=='8')

                                            {
            echo '<td style="background-color:red;color:white"><a style="color:red;font-weight:bold;color:white" >Ouvert</a></td>';
                                                       }


                                                        //pour afficher la couler jaune
                                                        
                                      elseif ($idstatuttache=='9')
                                            {
                     echo '<td style="background-color:orange;color:black"><a style="color:red;font-weight:bold;color:black" >Accusé reception de la tâche</a></td>';
                                                       }



                                                         //pour afficher la couler green quand la tache Tâche Effectuée
                                                        
                                      elseif ($idstatuttache=='10')
                                            {
                     echo '<td style="background-color:olive;color:white"><a style="color:red;font-weight:bold;color:white" >Tâche Effectuée,non clôturée</a></td>';
                                                       }


                                                          //pour afficher la 
                                                        
                                      elseif ($idstatuttache=='1')
                                            {
                     echo '<td style="background-color:olive;color:white"><a style="color:red;font-weight:bold;color:white" >Envoyee pour Information</a></td>';
                                                       }


                                                          //pour afficher la 
                                                        
                                      elseif ($idstatuttache=='2')
                                            {
                     echo '<td style="background-color:olive;color:white"><a style="color:red;font-weight:bold;color:white" >
                         En Attente de Traitement</a></td>';
                                                       }


                                                          //pour afficher la 
                                                        
                                      elseif ($idstatuttache=='3')
                                            {
                     echo '<td style="background-color:olive;color:white"><a style="color:red;font-weight:bold;color:white" >Pour Avis</a></td>';
                                                       }


                                                          //pour afficher la 
                                                        
                                      elseif ($idstatuttache=='4')
                                            {
                     echo '<td style="background-color:olive;color:white"><a style="color:red;font-weight:bold;color:white" >TEn Attente de Validation</a></td>';
                                                       }



                //pour afficher la couler vert quan c reamlise=5

                                                             else {
              echo '<td style="background-color:green;color:white"><a style="color:white;font-weight:bold">Clos</a></td>'
                                           ;}?> 
                    

          <td style="background-color:white;color:black;" ><center><b> <?php echo  $res['totaltache'];?></b></center></td>

          <td style="background-color:white;color:black;">

    <a class="green" title="Voir Details  en PDF" onclick="return confirm('Etes vous sur de vouloir consulter les datails de cette ligne ?')"  target=_black
          href="../ETATS/imprimer_tache_a_surveille.php?idstatuttache=<?php echo $res['idstatuttache'] ?> &amp annecours=<?php echo $res['annecours'] ?> ">
                                                              
                                                              <img src="../assets/img/logopdf.JPG" width="20" height="20">
                                                      </a></td>
          
          
                      
                     
                        
                       

                     



                            
                                  
                                     
                                      
                        </td>
                            
                             <?php }?>

                             </tr>


                        </tbody>

                    </table>

                    </div>
                  </div>
                </div>