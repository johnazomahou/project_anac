<?php
    //jinclu le fichier se session 
            require_once('identifier.php');
          header('Content-Type: text/html; charset=utf-8');
          setlocale(LC_CTYPE, 'fr_FR.UTF-8');
          
          include('entete.php');

          require("../param_connexion_bdd/connexlistemultiple.php");

          include_once('../param_connexion_bdd/requetes.php');





 // fonction pour afficher attributeur  en liste deroulante
 function attributteur($connect)
 { 

   $output = '';
      //CREATION DE LA REQUETE

      $query = " SELECT * FROM  attributeur_tache WHERE nomattributeur!='' GROUP BY nomattributeur  ORDER BY nomattributeur";

      $statement = $connect->prepare($query);
      $statement->execute();
      $resultat = $statement->fetchAll();

      //execution de la requete
      foreach($resultat as $row)
      {
                   $output .= '<option value="'.$row["idattributeur"].'">'.addslashes($row["nomattributeur"]).' </option>';
      }
      return $output;
    }





 // pour selectioner les differents SELECT * FROM `statut_tache de ta^che  en liste deroulante
 
 function statut_tache($connect)
 { 

   $output = '';
      //CREATION DE LA REQUETE

      $query = "SELECT * FROM statut_tache 

 WHERE (idstatuttache=1 OR idstatuttache=2 OR idstatuttache=3 
        OR idstatuttache=4 OR idstatuttache=7 OR idstatuttache=8)
 
 
 ORDER BY statut_tache.idstatuttache DESC";

      $statement = $connect->prepare($query);
      $statement->execute();
      $resultat = $statement->fetchAll();

      //execution de la requete
      foreach($resultat as $row)
      {
                   $output .= '<option value="'.$row["idstatuttache"].'">'.addslashes($row["nomstatuttache"]).' </option>';
      }
      return $output;
    }


?>
        


        <!-- /.INSERTION DU MENU-->

        <?php include('menu.php');?>

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
              try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>

      </div>

      <div class="main-content">
        <div class="main-content-inner">
          
          <div class="page-content">
            

            <div class="page-header">
              <h1 style="color:black;font-weight:bold">
               
               <i>Planification  des tâches pour plusieurs attributeurs</i>
                
              </h1>

<center><i style="color:red;font-weight:bold">Les champs marqués d'un astérisques(*) sont obligatoire </i></center>


            </div><!-- /.page-header -->
            
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->


                                <?PHP   //include_once('tableau_recapt_tache_par_anne.php');?>

      
    <form class="form-horizontal" method="POST" action="traitement_suivi_tache_service_plusiere_attributer.php" enctype="multipart/form-data">

       
    
        
                <!--1er bloc de 3 DIV-->

            <div class="row">

                  <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Expéditeur|Origine du Dossier | Emetteur <i style="color:red;font-weight:bold">*</i>:</h5>

                        </div>

                      <div class="widget-body">
                        <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV Emetteur-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="Emetteur-select-card">
                 
        <select  id ="idemetteur" title="Choissisez Expéditeur/Emetteur dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-danger" class="form-control" name="idemetteur"  data-rel="chosen" required="required">

                <?php
                                                                while ($data2 = mysqli_fetch_assoc($requete_orignemetertache)) {
                                                                    ?>
                                                            <option value="<?php echo $data2['idemetteur'];?>"
                                                                data-idemetteur="<?php $data2['idemetteur'];?>"
                                                                data-nomemetteur="<?php echo $data2['nomemetteur'];?>"
                                                                data-testidag="<?php echo $data2['idemetteur'];?>">
                                                                <?php echo $data2['nomemetteur'];?> </option>
                                                            <?php
                                                                }
                                ?>
                                                                                                                                              
                            </select>
                        </div>
            
            <HR/>

            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer green">
                                    <B><i style="color:white;font-weight:bold"> </i></B> 

                                  <!--BOUTON POUR AJOUTER UN AUTRE EMETEUR-->
                              <button title="Cliquez ici pour Ajouter Expéditeur dans la liste déroulante" type="button"  
                data-toggle="modal" data-target="#fenetre_modale_emetteur" style="background-color:green;color:white">
                                  <i class="glyphicon glyphicon-home"> + </i></button>

                              Etape 1: <b><i>Selectionner|Ajouter un Emetteur</i></b>
            </i>
            
          
      
                        </div>
                      </div>
                    </div>
                  </div>

                 <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Personnel Initiateur:</h5>

                        </div>

                      <div class="widget-body">
                       
                       <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV personnelr-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="personnelr-select-card">
                 
        <select  id ="idpersoaero" title="Choissisez Personnel dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-primary" class="form-control" name="idpersoaero"  data-rel="chosen">

                <?php
                                                   while ($data2 = mysqli_fetch_assoc($requete_personnel_aeronautique)) {
                                                                    ?>
                                                            <option value="<?php echo $data2['idpersoaero'];?>"
                                                                data-idpersoaero="<?php $data2['idpersoaero'];?>"
                                                                data-nompersoaero="<?php echo $data2['nompersoaero'];?>"
                                                                data-testidag="<?php echo $data2['idpersoaero'];?>">
                                                                <?php echo $data2['nompersoaero'];?> 
                                                                <?php echo $data2['prenompersoaero'];?>
                                </option>
                                                            <?php
                                                                }
                                ?>
                                                                                                                                              
                            </select>
                        </div>
            
            <HR/>
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer green">
                                    <B><i style="color:white;font-weight:bold"> </i></B> 

                                  <!--BOUTON POUR AJOUTER UN AUTRE DONNEE QUI NEXISTE PAS EN LISTE DEROULANTE-->
                              <button title="Cliquez ici pour Ajouter Personnel dans la liste déroulante" type="button"  
                data-toggle="modal" data-target="#fenetre_modale_personnel" style="background-color:green;color:white">
                                  <i class="glyphicon glyphicon-user"> + </i></button>

                              Etape 2: <b><i>Selectionner|Ajouter un Personnel</i></b>
            </i>
            
                        
      
                        </div>
            
            

                      </div>
                    </div>
                  </div>


                  <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Responsable Mise en eouvre du Dossier
                          <i style="color:red;font-weight:bold">*</i>:  </h5>

                        </div>

                      <div class="widget-body">
                        
             <div class="widget-main padding-6">

                        
                                <!--ICI ON AFFICHE LE TABLO-->

                                <table class="table table-bordered" id="dynamic_field1">
                                                    <tr style="background-color:#03224c;color:white">
                                                      <th>RMO<i style="color:red;font-weight:bold">*</i></font></th>
                                                      <th>STATUT TACHE<i style="color:red;font-weight:bold">*</i></font></th>



                                                    </tr>


                                                    <!--   A  CE NIVEAU ON COMMENCE AFFICHER LES DONNEES  -->

                                                      <td>
                                                        
                                                                <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

                                                                 <!---creation du DIV ATTRIBUTEUR-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                                                      <div id="ATTRIBUTEUR-select-card">
          
                                                            <select  id ="idattributeur" title="Choissisez Attributeur dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-danger" class="form-control" name="idattributeur[]"  data-rel="chosen">


                                                            

                                                            <?php
                                                                while ($data2 = mysqli_fetch_assoc($requete_attributeurtache)) {
                                                                    ?>
                                                            <option value="<?php echo $data2['idattributeur'];?>"
                                                                data-idattributeur="<?php echo $data2['idattributeur'];?>"
                                                
                                                                data-nomattributeur="<?php echo $data2['nomattributeur'];?>">
                                                                
                                                                <?php echo $data2['nomattributeur'];?>
                                                            </option>
                                                            <?php
                                                                }
                                                                ?>
                                                        </select>

                                                         </div>


                                                    </td>
                                                    

                                                    <td>

            <select  id ="idstatuttache"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Selectionner Statut Tâche" data-live-search="true" data-style="btn-danger" name="idstatuttache[]"  data-rel="chosen" required="required">
                                                         <?php
                                                while ($data2 = mysqli_fetch_assoc($requete_statut_tache_plusiuers_attributer)) {
                                                                    ?>
                                                                      <option value="<?php echo $data2['idstatuttache'];?>"
                                                                            data-idstatuttache="<?php $data2['idstatuttache'];?>"     
                                                                            data-nomstatuttache="<?php echo $data2['nomstatuttache'];?>"
                                                                            data-testidag="<?php echo $data2['idstatuttache'];?>">
                                                                            <?php echo $data2['nomstatuttache'];?>      
                                                                        </option>
                                                                    <?php
                                                                }
                                                          ?> 


                                                          

              </select>
                                                       
                                                             
                                                    </td>

                                                   




                                                    

                                                    





                                    <!--on cree un btn qui permet dajouter une autre ligne pour prendre un autre produt-->
                <td>
                    <button style="color:green;font-weight:bold" type="button"
                                    title="Ajouter une autre ligne" name="add"  id="ajouter_autre_ligne" class="btn btn-yellow">
                                    <i class="ace-icon glyphicon glyphicon-plus"></i>
                    </button>
                </td>

            </table>

                       
            
            <HR/>
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer green">
                                    <B><i style="color:white;font-weight:bold"> </i></B> 

                                  <!--BOUTON POUR AJOUTER UN AUTRE DONNEE QUI NEXISTE PAS EN LISTE DEROULANTE-->
                              <button title="Cliquez ici pour Ajouter Attibuteur dans la liste déroulante" type="button"  
                data-toggle="modal" data-target="#fenetre_modale_ATTRIBUTEUR" style="background-color:green;color:white">
                                  <i class="glyphicon glyphicon-user"> + </i></button>

                              Etape 3: <b><i>Selectionner|Ajouter un Attibuteur</i></b>
            </i>
            
                        
      
                        </div>
            
                      </div>
                    </div>
                  </div>

                </div><!--FIN DE LA 1ERE DIV-->

                <hr/>


                <!--2eme BLOC DIV-->
            
                 <div class="row">

                  <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Organisme a agréer</h5>

                        </div>

                      <div class="widget-body">
                        
             <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV ORGANISME-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="ORGANISME-select-card">
                 
        <select  id ="idorga" title="Choissisez Organisme dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-primary" class="form-control" name="idorga"  data-rel="chosen">

               <?php
                                                                while ($data2 = mysqli_fetch_assoc($req8123_ORGANISME_AGREER)) {
                                                                    ?>
                                                                          <option value="<?php echo $data2['idorga'];?>"
                                                                            data-idorga="<?php $data2['idorga'];?>"
                                                                                               
                                                                            data-nomorga="<?php echo $data2['nomorga'];?>"
                                                                            data-testidag="<?php echo $data2['idorga'];?>">
                                                                            <?php echo $data2['nomorga'];?>      </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                                                                                              
                            </select>
                        </div>
            
            <HR/>
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer green">
                                    <B><i style="color:white;font-weight:bold"> </i></B> 

                                  <!--BOUTON POUR AJOUTER UN AUTRE DONNEE QUI NEXISTE PAS EN LISTE DEROULANTE-->
                              <button title="Cliquez ici pour Ajouter Organisme dans la liste déroulante" type="button"  
                data-toggle="modal" data-target="#fenetre_modale_ORGANISME" style="background-color:green;color:white">
                                  <i class="glyphicon glyphicon-home"> + </i></button>

                              Etape 4: <b><i>Selectionner|Ajouter un Organisme</i></b>
            </i>
            
                        
      
                        </div>
                      </div>
                    </div>
                  </div>


                 <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Type d'Aéronef</h5>

                        </div>

                      <div class="widget-body">
                        <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV TYPEAERONEF-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->
            
                           <div id="TYPEAERONEF-select-card">
                 
        <select  id ="idaeronef" title="Choissisez Type d'Aéronef | Immatriculation dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-primary" class="form-control" name="idaeronef"  data-rel="chosen">

                                      <?php
                                                         //voir le fichier requetes.php
                                                                while ($data2 = mysqli_fetch_assoc($req8_type_aeronef)) {
                                                                    ?>
                                                                          <option value="<?php echo $data2['idaeronef'];?>"
                                                                            data-idaeronef="<?php $data2['idaeronef'];?>"
                                                                            data-nomaeronef="<?php echo $data2['nomaeronef'];?>"   
                                                                             data-numserie="<?php echo $data2['numserie'];?>"                 
                                                                            data-immataeronef="<?php echo $data2['immataeronef'];?>"
                                                                            data-testidag="<?php echo $data2['idaeronef'];?>" style="color:black;font-weight:bold">
                                      <?php echo $data2['nomaeronef'];?> |  <?php echo $data2['immataeronef'];?>      </option>
                                                                    <?php
                                                                }

                                                                ?>
                            </select>
                        </div>
            
            <HR/>
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer green">
                                    <B><i style="color:white;font-weight:bold"> </i></B> 

                                  <!--BOUTON POUR AJOUTER UN AUTRE DONNEE QUI NEXISTE PAS EN LISTE DEROULANTE-->
                              <button title="Cliquez ici pour Ajouter Type d'Aéronef dans la liste déroulante" type="button"  
                data-toggle="modal" data-target="#fenetre_modale_type_aeronef" style="background-color:green;color:white">
                                  <i class="glyphicon glyphicon-plane"> + </i></button>

                              Etape 5: <b><i>Selectionner|Ajouter un Type d'Aéronef</i></b>
            </i>
            
                        
      
                        </div>
            
            
                      </div>
                    </div>
                  </div>


                  <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Domaine  </h5>

                        </div>

                      <div class="widget-body">
                        

                        <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV Domaine-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="Domaine-select-card">
                 
        <select  id ="iddomaine" title="Choissisez Domaine dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-primary" class="form-control" name="iddomaine"  data-rel="chosen">

                <?php
                                                                while ($data2 = mysqli_fetch_assoc($req1domaine)) {
                                                                    ?>
                                                            <option value="<?php echo $data2['iddomaine'];?>"
                                                                data-iddomaine="<?php $data2['iddomaine'];?>"
                                                                data-nomdomaine="<?php echo $data2['nomdomaine'];?>"
                                                                data-testidag="<?php echo $data2['iddomaine'];?>">
                                                               
                                                                <?php echo $data2['nomdomaine'];?> 
                                                                
                                </option>
                                                            <?php

                                                                }
                                ?>
                                                                                                                                              
                            </select>
                        </div>
            
            <HR/>
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer green">
                                    <B><i style="color:white;font-weight:bold"> </i></B> 

                                  <!--BOUTON POUR AJOUTER UN AUTRE donnee-->
                              <button title="Cliquez ici pour Ajouter domaine dans la liste déroulante" type="button"  
                data-toggle="modal" data-target="#fenetre_modale_DOMAINE" style="background-color:green;color:white">
                                  <i class="glyphicon glyphicon-leaf"> + </i></button>

                              Etape 6: <b><i>Selectionner|Ajouter un Domaine</i></b>
            </i>
            
                        
      
                        </div>
                      </div>
                    </div>
                  </div>

                </div><!--FIN DE LA 1ERE DIV-->

             <!--FIN DE LA 2EME-->


             <HR/>


 <!--CREATION DU BLOC POUR AFFICHER LENSEMBLE DU FORMULIRE-->


  
                <div class="widget-box">
                 

 
          <div class="widget-body">
                    <div class="widget-main">
                      <div id="fuelux-wizard-container">
                       

                        &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 
                        &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 
                       

                      

                        <div class="step-content pos-rel">
                          <div class="step-pane active" data-step="1">

                          <!-- debut tout premier formulaire  -->
  <div class="row" style="background-color:#03224c;color:white" ><!--COULEUR DE TOUTES LA PAGE EN FOND BLEU-->

                  
                   <div class="col-xs-12 col-sm-12" style="background-color:#03224c;color:white">
                      <div class="widget-box" style="background-color:#03224c;color:white">
                 <div class="widget-header"  >
              <h4 class="widget-title" ><B style="background-color:#03224c;color:yellow">Identifications des informations sur la tâche </B></h4>

                          <div class="widget-toolbar" style="background-color:#03224c;color:white">
                            <a href="#" data-action="collapse">
                              <i class="ace-icon fa fa-chevron-up"></i>
                            </a>

                            
                          </div>
                        </div>


                        <div class="widget-body" style="background-color:#03224c;color:white">
                          <div class="widget-main">

    <div class="form-group has-success has-feedback">


          <div class="form-group has-success has-feedback">

              <!--DEBUT CREATION DU FORMULAIRE-->
          <label class="col-sm-1 control-label"><font color="white">Date courrier/mail:
                          
                         </label>
              
              <div class="col-sm-3">
              <input type="date" title="Date courrier/mail reçus"   name="dateenrgecouranac"  style="color:black;font-weight:bold" class="form-control">

                        
              </div>
                    

                          <label class="col-sm-1 control-label"><font color="white">Enregistré dans:
                                                <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-3">
                                                                    <div class="radio">
                              <label>
                              <input name="enregistredans" checked="checked" value="Classeur"  type="radio" class="ace" />
                              <span class="lbl" title="Enregistré dans le classeur" style="color:white;font-weight:bold">Classeur</span>
                              </label>

                              <label>
                              <input name="enregistredans" value="Serveur" type="radio" class="ace" />
                              <span class="lbl" title="Enregistré dans le serveur ANAC" style="color:white;font-weight:bold">Serveur</span>
                              </label>


                              <label>
                              <input name="enregistredans" value="Autres" type="radio" class="ace" />
                              <span class="lbl" title="Enregistré dans un autre emplacement,poste Personnel" style="color:white;font-weight:bold">Autres</span>
                              </label>

                            </div>

                                                    </div>

                                                    <label class="col-sm-1 control-label"><font color="white">Date Attribution:
                                                <i style="color:red;font-weight:bold">*</i></font></label>
                                                    
                                                    <div class="col-sm-3">
                                                      
                                                    <input type="date" title="Date Attribution de la tâche" required="required" readonly value="<?php echo $date=date('Y-m-d' );?>"  name="dateattribution"  style="color:black;font-weight:bold" class="form-control">

                                                    </div>


                               

             </div>
                       
                      


            <div class="form-group has-success has-feedback">
                                
                                          <label class="col-sm-1 control-label"><font color="white">Réf.ANAC:
                                                </font></label>
                                                     <div class="col-sm-3">
                                                      
                                                         <input type="text" title="N° courrier ANAC"   name="numcourier_ref_anac" placeholder="4572" onkeypress="return keyPressHandler (event);" maxlength="5" style="color:black;font-weight:bold" class="form-control">

                                                    </div>

                                    <label class="col-sm-1 control-label"><font color="white">Objet Tâche:
                                               <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-3">
                                                    
                                                      
                                                      <textarea name="objettache" required="required"  style="color:#03224c;font-weight:bold" class="form-control rounded-0" placeholder="Pécisez Objet Tâche" rows="3"></textarea>
                                            
                                                    </div>

                                                   <label class="col-sm-1 control-label"><font color="white"> Formulaire:
                                      </font></label>
                                                     <div class="col-sm-3">
                                                      
                                           
                                                       
                                  <!--BOUTON POUR AJOUTER UN AUTRE DONNEE QUI NEXISTE PAS EN LISTE DEROULANTE-->
                              <button title="Cliquez ici pour Ajouter Formulaire utilisé dans la liste déroulante" type="button"  
                               data-toggle="modal" data-target="#fenetre_modale_formulaire_use" style="background-color:green;color:white">
                                  <i class="glyphicon glyphicon-list-alt"> + </i>
                              </button>

                             
                      
                                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV formulaire-utilise-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="formulaire-utilise-select-card">
                 
        <select  id ="idformutilise" title="Choissisez Formulaire utilisé dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-primary" class="form-control" name="formutilise"  data-rel="chosen">

                                  <?php
                                                   while ($data2 = mysqli_fetch_assoc($requete_formulaire_utilise_anactache)) {
                                                                    ?>
                                                            <option value="<?php echo $data2['idformutilise'];?>"
                                                                data-idformutilise="<?php $data2['idformutilise'];?>"
                                                                data-nomformulaireutilise="<?php echo $data2['nomformulaireutilise'];?>"
                                                                data-testidag="<?php echo $data2['idformutilise'];?>">
                                                                <?php echo $data2['nomformulaireutilise'];?> 
                                </option>
                                                            <?php
                                                                }
                                ?>
                                                                                                                                              
                            </select>
                        </div>

                                                    </div>



                                                   

             </div> 
          
                      


            
            







            
            <div class="form-group has-success has-feedback">
                                               

                                        <label class="col-sm-1 control-label"><font color="white">Document délivré:
                                      </font></label>
                                                     <div class="col-sm-3">
                                                      
                                           
                                                         <!--BOUTON POUR AJOUTER UN AUTRE DONNEE QUI NEXISTE PAS EN LISTE DEROULANTE-->
                              <button title="Cliquez ici pour Ajouter document a délivrer dans la liste déroulante" type="button"  
                               data-toggle="modal" data-target="#fenetre_modale_document_delivre" style="background-color:green;color:white">
                                  <i class="glyphicon glyphicon-file"> + </i>
                              </button>

                             
                      
                                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV document_delivre-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="document_delivre-select-card">
                 
        <select  id ="iddocdelivre" title="Choissisez Document a délivrer dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-primary" class="form-control" name="documadelivre"  data-rel="chosen">

                                  <?php
                                                   while ($data2 = mysqli_fetch_assoc($requete_document_delivre_anactache)) {
                                                                    ?>
                                                            <option value="<?php echo $data2['iddocdelivre'];?>"
                                                                data-iddocdelivre="<?php $data2['iddocdelivre'];?>"
                                                                data-nomdocdelivre="<?php echo $data2['nomdocdelivre'];?>"
                                                                data-testidag="<?php echo $data2['iddocdelivre'];?>">
                                                                <?php echo $data2['nomdocdelivre'];?> 
                                </option>
                                                            <?php
                                                                }
                                ?>
                                                                                                                                              
                            </select>
                        </div>

                                                    </div>

                                        <label class="col-sm-1 control-label"><font color="white">Observation:
                                </font></label>
                          <div class="col-sm-3">
                                <textarea name="observation_attribution"  placeholder="Pas Obligatoire"  style="color:#03224c;font-weight:bold" class="form-control rounded-0" id="" rows="3"></textarea>
                          </div>

                           <label class="col-sm-1 control-label"><font color="white">Date Provisionnelle Reponse: <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-3">
                                                      
                                                        <input type="date"  required title="Date Provisionnelle Reponse de la tâche"   name="dateprovisiore"  style="color:black;font-weight:bold" class="form-control">

                                                    </div>



                                                   

             </div> 




                      



             </div>
                      
                
                          </div>
                        </div>
                      </div>
                    </div><!-- /.fin du FORMULAIRE information DE TACHE -->

                  



<!--AUTRE FORMULAIRE POUR ENREGISTRER LES ATTRIBUTAIRE ET LES EMETEURS DE TACHES-->

<div class="col-xs-12 col-sm-12" style="background-color:#03224c;color:white">
                      <div class="widget-box" style="background-color:#03224c;color:white">
                 


                        <div class="widget-body" style="background-color:#03224c;color:white">
                          <div class="widget-main">
                                


                      
                     
         <!--CHAMPS A MAQSUER-->
         <input type="hidden"  name="typetache">
         <input type="hidden"  name="datereprisecomplema">
         <input type="hidden"  name="suividoc">
         <input type="hidden"  name="datereunion">

                  <input type="hidden" value="<?php echo $stat10['numeroodre']+1; ?>" name="numeroodre" size="5">

    <!--POUR SEPARER AVEC LES TACHE QUE DJ INIITEIT ET LANAC EN GENERALE-->
    <input type="hidden"  name="separer_tache_dj_anac"  value="ANAC">

    <!--POUR INSERER LA DATE DU JOUR ET LHEUR DE CREATION, il faut faire moins 1h-->
   <input type="hidden" name="dateheuresaisi" value="<?php echo $date=date('d/m/Y' );?> à <?php echo  date("H:i:s");?>" />


   <!--extraction le numero IDUSER de celui qui se pdoer,qui enregistre dans la bdd-->
                             <input type="hidden"  name="numat"  value="<?php echo $stat8['numat']; ?>">

                <input type="hidden"  name="observation_retour"  >
                <input type="hidden"  name="datereponsereltache"  >
                <input type="hidden"  name="datecloture"  >

                     


                                <CENTER>
          <button style="background-color:green; color: white; height: 40px" type="submit"  name="Enregistrer" value="Enregistrer">
            <span><i class="ace-icon glyphicon glyphicon-ok"></i></span>
           Planifier
        </button>

                      

      </CENTER>


                    
                     
             
                          </div>
                        </div>
                      </div>
                    </div><!-- /.span -->
                  </div>

                  <!-- fin tout premier formulaire  -->

          
                          </div>

                        

                        </div>

                      </div>

                      <hr/>

                       
 


                    </div><!-- /.widget-main -->
                  </div><!-- /.widget-body -->
                </div>

            <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->

            </form>










            </div><!-- /.row -->

          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <?php include('pied.php');?>


      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="../assets/js/jquery.2.1.1.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

    <!--[if !IE]> -->
    <script type="text/javascript">
      window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
    </script>

    <!-- <![endif]-->

    <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <script src="../assets/js/fuelux.wizard.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/additional-methods.min.js"></script>
    <script src="../assets/js/bootbox.min.js"></script>
    <script src="../assets/js/jquery.maskedinput.min.js"></script>
    <script src="../assets/js/select2.min.js"></script>

    <!-- ace scripts -->
    <script src="../assets/js/ace-elements.min.js"></script>
    <script src="../assets/js/ace.min.js"></script>

   <!--  dépendances  pour faire les recherches dans  la liste déroulante -->

      <script src="bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="bootstrap-select/dist/js/i18n/defaults-*.min.js"></script>




<script src="../assets/js/jquery-ui.custom.min.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/js/chosen.jquery.min.js"></script>
<script src="../assets/js/fuelux.spinner.min.js"></script>
<script src="../assets/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/js/bootstrap-timepicker.min.js"></script>
<script src="../assets/js/moment.min.js"></script>
<script src="../assets/js/daterangepicker.min.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="../assets/js/bootstrap-colorpicker.min.js"></script>
<script src="../assets/js/jquery.knob.min.js"></script>
<script src="../assets/js/jquery.autosize.min.js"></script>
<script src="../assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="../assets/js/jquery.maskedinput.min.js"></script>
<script src="../assets/js/bootstrap-tag.min.js"></script>

<!-- ace scripts -->
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>




                         <?php

            //Pour ouvri toutes les fenetre modale au cas ou la donnees nexiste pas en liste deroulant
            //on inser sans rafraichir la page avec ajax
             include('ouvrir_fenetre_modale_insertion_ajax.php');
             
             ?>





<script type="text/javascript">
        function isNumeric (value)
            {
                return (/(^\d+$)|(^\d+\.\d+$)/).test (value);
            }
 
        /*    Gestion du onKeyPress.
            "event" est passé automatiquent par le browser à la fonction (sauf dasn le cas de IE, voir plus bas).
            Dans le cas d'un evenement JavaScript, le fait de retourner false (FAUX) stop le processus lié à celui-ci, ce qui dans notre cas empeche le caractere d'être saisie !
        */
        function keyPressHandler (event)
            {
                event = event || window.event;    // si event n'existe pas, on est sous IE, et pour IE un evenement est global...
                var car = String.fromCharCode (event.charCode || event.keyCode); // charCode pour le standards ou keyCode pour IE
                return isNumeric (car);  // isNumeric renvoit vrai s'il s'agit d'un chiffre, or nous ne voulons pas de chiffres, donc nous inversons le résultat avec un "!".
            }
    </script>





        

<!-- script pour ajouter les element auotmatiqument-->




<script type="text/javascript">
// OU se situe le problème c'est ici à revoir
$(document).ready(function() {

    var i = 1;

    $("#ajouter_autre_ligne").click(function() {

        //valeur maximum d'enregitrement, on fixe par exemple a 20, apres 20 ligne c bloqué 
        var_max = 20;
        if (i <= var_max) {

            var html = '';

            //DECLARATION DES VARIABLES,DES CHAMPS DE LA TABLE
            html += '<tr id="row' + i + '">';


            //DECLARATION DES VARIABLES CHAMPS1,DES CHAMPS A INSERER DANS LA TABLE PRODUIT


  html += `<td><select   class='form-control' name="idattributeur[]"  style='color:black;background-color:white;font-weight:bold' data-size="5"  data-header="Choissisez Attributeur dans la liste" data-live-search="true"  class=" form-control selectpicker show-tick " data-rel='chosen' required='required'><option  >Choisir Autre Attributaire </option><<?php echo attributteur($connect); ?></select></td>`;

     
             //DECLARATION DES VARIABLES CHAMP 2,DES CHAMPS A INSERER DANS LA TABLE PRODUIT
       
html += `<td><select   class='form-control' name="idstatuttache[]"  style='color:black;background-color:white;font-weight:bold' data-rel='chosen' required='required'><option  >Choisir Autre Statut de la tâche</option><?php echo statut_tache($connect); ?></select></td>`;

           

html += "<td><button title='Rétirer cette ligne' type='button' name='remove' id='" + i +
                "' class='btn btn-danger btn_remove'>X</button></td>";


            $('#dynamic_field1').append(html);


            i++;


        }

    });


    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
        --i;
    });

});

</script>


  </body>

</html>


