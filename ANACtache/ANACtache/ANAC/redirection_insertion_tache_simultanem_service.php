<?php
    //jinclu le fichier se session 
            require_once('identifier.php');
          header('Content-Type: text/html; charset=utf-8');
          setlocale(LC_CTYPE, 'fr_FR.UTF-8');
          
          include('entete.php');

          require("../param_connexion_bdd/connexlistemultiple.php");

          include_once('../param_connexion_bdd/requetes.php');


 

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
            

        <!-- /.POUR INCLURE LE FICHIER REPARTITION DES Analyses Statistiques ANNE EN COURS et precendete pour avoir le taxu dexcution ,suivi -->

                  <?PHP   include_once('tableau_recapt_tache_anne_encours_service.php');?>

            
              <h1 style="color:red;font-weight:bold">
               
             <center><i> JOINDRE COURRIER D'ENTREE DE LA TACHE QUI VIENT D'ETRE PLANIFIEE...</i></center>
                
              </h1><br/>


             <center> 

                  <a href="consulter_tache_service.php">
                     <b>Quitter cette Page</b> <button title="Cliquer ici pour Quitter" style="background-color:RED;color:white;width: 50px; height:50px" type="button" >X</button>
                  </a>

              

        &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 

         <a title="Pour Afficher le tableau Suivi des tache" class="btn btn-warning btn" href="suivi_taches_service_affecter_plusieur_user.php">
                                                     <i class="glyphicon glyphicon-plus"> 
                                                      <B style="color:black">Ajouter une nouvelle tâche à plusieurs RMO</B>
                                                      </i>

                                                      <i class="glyphicon glyphicon-user"> </i>
                                                                                                              
                                </a>

        


                                  &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 

                                <a title="Pour attribuer une tâche à plusieurs RMO" class="btn btn-success" href="suivi_taches_service.php">
                                                <i class="glyphicon glyphicon-plus"> 
                                                  <B style="color:black"><i>Ajouter une nouvelle tâche à 1 seul RMO</i></B>
                                                </i>
                                                                                                              
                                </a>


       
</center>


           
            
              <div class="col-xs-12">
              
                     
                           <?php 
                                      require_once("../param_connexion_bdd/connexiobddAJAX.php");
                                                           
                                        $requete="SELECT MAX(suivi_tache.numeroodre) AS numeroodre,
                                                        suivi_tache.dateheuresaisi,user_anacstat.nomag,
                                                        user_anacstat.prenag,suivi_tache.fichier_courrier_entrant,
                                                        suivi_tache.file_url_courier_entrant
                                                                            

                                                              FROM suivi_tache,user_anacstat


                                                              WHERE user_anacstat.numat=suivi_tache.numat
                                                              AND suivi_tache.separer_tache_dj_anac='ANAC' ";

                                        $reponse = mysqli_query($db, $requete) or die (mysqli_error($db));
                                                    
                             ?>

                    <div><br/>
                      
                
              </h5></i></center>
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            
                             <th style="background-color:#03224c;color:white">N°#ID</th>
                            <th style="background-color:#03224c;color:white">Agent Opération</th>
                        
                            
                            <th style="background-color:#03224c;color:white">Joindre Courrier...</th>
                            
                                
                            
                          </tr>
                        </thead>

                        <tbody>
                          <!--FAIRE UNE BOUCLE PHP pour recuperer toutes les données de la table-->
                                      <!--recupere une donnée sous forme  d1 tableau associative,ligne/lignes-->
                                      <!--apres il va la stockée dans une variable appeler RES-->
                                      
                        
                                                <?php 
                                                            while($res=mysqli_fetch_assoc($reponse)){
                                                              //$etat=$res['etat'];
                                                ?> 
                          <tr>
                            <!---POUR AFFICHER LES DONNEES-->

                            <td style="color:black"> <CENTER><?php echo  $res['numeroodre'];?></CENTER></td> 
                            <td style="color:black"> <CENTER><?php echo  $res['prenag'];?> <?php echo  $res['nomag'];?><br/> le <?php echo  $res['dateheuresaisi'];?></CENTER> </td>
                            
              
                          
                           
                            <td style="color:black">
                                <!--BTN POUR SUPPRIMER LA DONNE SI ELLE N PAS DEJA UTILISE, SINON PAS D SUPPRESSION-->

                  <center><a class="green" title="Joindre Courrier d'entrée..." onclick="return confirm('Etes vous sur de vouloir Joindre le Courrier entrée?')"
                    href="joindre_courrier_service.php?numeroodre=<?php echo $res['numeroodre'] ?>">
                                                              <I>Cliquez ici pour joindre Courrier..</I><span class="ace-icon fa fa-cloud-upload bigger-200"></span>

                                                      </a></center>
                              
                             </td>

                              




  
        
                        
                             <?php }?>
                          </tr>
                          
                        </tbody>
                      </table>

                
               
           








            </div><!-- /.row -->

          </div><!-- /.page-content -->
      
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


  </body>

</html>


