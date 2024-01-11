
                <div class="row">
                  <div class="col-xs-12">
                    

                    
                    

                     <?php 
                                      require("../param_connexion_bdd/connexiobddAJAX.php");
                                                           
    $requete="SELECT suivi_tache.idtache,emetteur_tache.idemetteur,emetteur_tache.nomemetteur, attributeur_tache.idattributeur,
              date_format(suivi_tache.datecloture, '%d/%m/%Y') as datecloture, attributeur_tache.nomattributeur,
              suivi_tache.numeroodre,suivi_tache.numat, user_anacstat.prenag,user_anacstat.nomag,suivi_tache.dateheuresaisi,
              suivi_tache.objettache, date_format(suivi_tache.dateattribution, '%d/%m/%Y') as dateattribution, 
              date_format(suivi_tache.dateprovisiore, '%d/%m/%Y') as dateprovisiore, 
              date_format(suivi_tache.datereponsereltache, '%d/%m/%Y') as datereponsereltache, 
              DATEDIFF(suivi_tache.datecloture,suivi_tache.dateattribution) AS tempsmis, 
              suivi_tache.objettache,suivi_tache.observation_attribution,
              suivi_tache.observation_retour,suivi_tache.typetache ,statut_tache.nomstatuttache,
              suivi_tache.idstatuttache, DATEDIFF(CURRENT_DATE,suivi_tache.dateattribution) AS nbrejourecoule,
              suivi_tache.numcourier_ref_anac,date_format(suivi_tache.dateenrgecouranac, '%d/%m/%Y') as dateenrgecouranac,
              statut_tache.nomstatuttache,organisme.nomorga,suivi_tache.formutilise,
              personnel_aeronautique.nompersoaero,personnel_aeronautique.prenompersoaero,
              aeronef_adna.idaeronef,aeronef_adna.nomaeronef,aeronef_adna.numserie,aeronef_adna.immataeronef,
              domaine.iddomaine,domaine.nomdomaine,
              date_format(suivi_tache.datereprisecomplema, '%d/%m/%Y') AS datereprisecomplema,
              suivi_tache.suividoc,suivi_tache.enregistredans,suivi_tache.documadelivre,suivi_tache.fichier,
              suivi_tache.file_url,suivi_tache.fichier_courrier_entrant,suivi_tache.file_url_courier_entrant,
              formulaire_utilise_anactache.nomformulaireutilise,document_delivre_anactache.nomdocdelivre


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


                                            
    WHERE service_anac.codeserv='$codeserv'  
          AND suivi_tache.separer_tache_dj_anac='ANAC'
          AND (suivi_tache.dateprovisiore=CURDATE()   
           OR suivi_tache.datereponsereltache=CURDATE()
           OR suivi_tache.idstatuttache='0010'
           OR suivi_tache.idstatuttache='0008'
           )
          

               ORDER BY   suivi_tache.idtache DESC";

                                        $reponse = mysqli_query($db, $requete) or die (mysqli_error($db));
                                                    
                             ?>

                    <div>
                    <table class="table table-striped table-bordered ">
          <thead>
            
            <tr>
                    
                       

                            <th style="background-color:#03224c;color:white">Date Opération </th>
                            <th style="background-color:#03224c;color:white">N°Ordre Tâche</th>

                             <th style="background-color:#03224c;color:white">Date Courrier</th>
                        <th style="background-color:#03224c;color:white">Courrier Entré</th>
                           <!--  <th style="background-color:#03224c;color:white">Type Tâche</th> -->
                            <th style="background-color:#03224c;color:white">Emetteur Tâche</th>
                            <th style="background-color:#03224c;color:white">Objet Tâche</th>
                            <th style="background-color:#03224c;color:white">Attributaire Tâche</th>
                            <th style="background-color:#03224c;color:white">Observation Origine</th>
                            <th style="background-color:#03224c;color:white">Date Attribution</th>
                            <th style="background-color:red;color:white">Date Reponse Provi.</th>
                            <th style="background-color:#03224c;color:white">Date Reponse</th>
                            <th style="background-color:#03224c;color:white">Jour(s) deja Ecoulé</th>
                            <th style="background-color:#03224c;color:white">Date Cloture</th>
                            <th style="background-color:#03224c;color:white">Durée Clôture</th>
                            <th style="background-color:#03224c;color:white">Observation Retour</th>
                            <th style="background-color:#03224c;color:white">Statut Tâche</th>
                            
              
                            <th style="background-color:#03224c;color:white">Opérations</th>
                            
                            
                        </tr>
                        </thead>

                        <tbody>
                        <!--FAIRE UNE BOUCLE PHP pour recuperer toutes les données de la table-->
                        <!--recupere une donnée sous forme  d1 tableau associative,ligne/lignes-->
                        <!--apres il va la stockée dans une variable appeler RES-->
                        
                        
                                                <?php 
                                                      while($res=mysqli_fetch_assoc($reponse)){

                                                       $idstatuttache=$res['idstatuttache'];
                                                       $tempsmis=$res['tempsmis'];
                                                       $typetache=$res['typetache'];
                                                       $dateprovisiore=$res['dateprovisiore'];
                                                       $datereponsereltache=$res['datereponsereltache'];
                                                       $datecloture=$res['datecloture'];
                                                       $dateprovisiorevide='';
                                                       $datecloturevide='';
                                                       $tempsmisvide='';
                                                       $datereponsereltachevide='';
                                                       $nbrejourecoule=$res['nbrejourecoule'];
                                            $dateenrgecouranac=$res['dateenrgecouranac'];
                                  $file_url_courier_entrant=$res['file_url_courier_entrant']
                                                ?>
                        <tr>
                          
                            <!---POUR AFFICHER LES DONNEES-->

                            

                            <td style="color:black">  <?php echo  $res['dateheuresaisi'];?></td>

                            <td style="background-color:black;color:white"> <?php echo  $res['numeroodre'];?> </td>

                            <td style="color:black">   
                                <?php 
                                    
                                  if ($dateenrgecouranac=='00/00/0000'){

                                    echo '';} 
                                                          
                                else {
                                  echo '<a style="color:black">'.$dateenrgecouranac.'  </a>';}?>



                            </td>

                            

                            <td><?php 
  
                                      if ($file_url_courier_entrant =='GEDANAC/'){}


                                     

                                               elseif($file_url_courier_entrant==''){} 

                                        
                              else {
                        
                        echo ' <a onclick="return confirm("Etes vous sûr de vouloir consulter ce Document Integré ?");" target=_blank href="'.$res["file_url_courier_entrant"].'"> <img style="width:20px;height:25px; alt="Charisma Logo"  title="Voir le Courrier '.$res["file_url_courier_entrant"].'" src="../assets/img/logopdfautre.png">  </a> '.$res["file_url_courier_entrant"].' '
                                                         ;}?>
                                                           
                            </td>
  <!--POUR MISE EN FORME CONDITIONNELLE GERER COULEUr DE FOND du statut d l tache-->

                       
                    

                            <td style="color:black"> <?php echo  $res['nomemetteur'];?> </td>
                            <td style="color:#03224c"> <?php echo  $res['objettache'];?> </td>
                            <td style="color:black"> <?php echo  $res['nomattributeur'];?> </td>
                            <td style="color:black"> <?php echo  $res['observation_attribution'];?> </td>


                            <td style="color:#03224c"> <?php echo  $res['dateattribution'];?> </td>
                            <td style="color:black">   
                                <?php 
                                     //dateprovisiore = 00/00/00 = VIDE ON AFFICHE RIEN
                                                      if ($dateprovisiore=='00/00/0000'){

                                    echo '<a style="color:#03224c;font-weight:bold" > '.$dateprovisiorevide.'  </a>';

                                                                            } 
                                                          
                                                          else {
                                                               echo '<a style="color:#03224c;font-weight:bold">

                                               '.$dateprovisiore.' 


                                                           </a>';}?>



                             </td>  
                           

                            <td style="color:black">   
                                <?php 
                                     //datereponsereltache = 00/00/00 = VIDE ON AFFICHE RIEN
                                                      if ($datereponsereltache=='00/00/0000'){

                          echo '<a style="color:#03224c;font-weight:bold" > '.$datereponsereltachevide.'  </a>'; } 
                                                          
                                    else {

                                        echo '<a style="color:#03224c;font-weight:bold"> '.$datereponsereltache.' </a>';}?>



                             </td> 

                         

                                     
              <td style="color:#03224c"> <?php echo  $res['nbrejourecoule'];?> </td>




                             <td style="color:black">   
                                <?php 
                                     //datecloture = 00/00/00 = VIDE ON AFFICHE RIEN
                                                      if ($datecloture=='00/00/0000'){

                          echo '<a style="color:#03224c;font-weight:bold" > '.$datecloturevide.'  </a>'; } 
                                                          
                                    else {
                                      
                                        echo '<a style="color:#03224c;font-weight:bold"> '.$datecloture.' </a>';}?>



                             </td>

                               <td style="color:black">   
                                <?php 
                                     //tempsmis = ''=NULL = VIDE ON AFFICHE RIEN
                                                      if ($tempsmis==''){

                          echo '<a style="color:#03224c;font-weight:bold" > '.$tempsmisvide.'  </a>'; } 
                                                          
                                    else {
                                      
                                        echo '<a style="color:#03224c;font-weight:bold"> '.$tempsmis.' Jr(s)</a>';}?>



                             </td>
                             
                            <td style="color:black"> <?php echo  $res['observation_retour'];?> </td>
                           
                          
               

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
                    
 
            

      <!--tableau pour faire le suivi-->
                <td class="center">


             <?php
                                    if ($idstatuttache=='005')//quand la tâche est effectuee , realisee ou cloturé

                                                      {
                                                              
                                         


                     //pour les detailes de la taches cloturer seulema
        echo '<a target=_blank title="Voir detail de la Tâche" href="voir_detaille_tache_cloture.php?idtache='.$res["idtache"].'">
                      
                     <i style="color:#03224c;font-weight:bold" class="ace-icon fa fa-search-plus bigger-130"></i></a>
                     &nbsp&nbsp &nbsp&nbsp &nbsp';

             
                                                      }


             else {//quand la tache est planifie ,ouvert ou autre satui

              

                //pour les detailes de la taches cloturer seulema
        echo '<a  target=_blank title="Voir detail de la Tâche" href="voir_detaille_tache_cloture.php?idtache='.$res["idtache"].'">
                      
                     <i style="color:#03224c;font-weight:bold" class="ace-icon fa fa-search-plus bigger-130"></i></a>
                     &nbsp&nbsp &nbsp&nbsp &nbsp';





                     //pour le suivi de de la tache ou modification 
        echo '<a  title="Suivi de la Tâche" href="execution_tache_user_connecter_attributeur.php?idtache='.$res["idtache"].'">
                      
                     <i style="color:green;font-weight:bold" class="glyphicon glyphicon-edit icon-white"></i></a>';
                                        

                                        }
                                                             ?>

        
                  </td>
          
        <?php }?>




            </td>

           
                        </tr>


                        </tbody>
                    </table>

                    </div>
                  </div>
                </div>