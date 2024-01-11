<?php
    //jinclu le fichier se session 
            require_once('identifier.php');
          header('Content-Type: text/html; charset=utf-8');
          setlocale(LC_CTYPE, 'fr_FR.UTF-8');
          
          include('entete.php');

         require("../param_connexion_bdd/connexiondb.php");  
          include_once('../param_connexion_bdd/requetes.php');


 


//ON RECUPERE LE ID POUR LA MAJ
    $numeroodre=isset($_GET['numeroodre'])?$_GET['numeroodre']:0;
    
    //CREATION DE LA REQUETTE POUR RECUPERER LES DONNNEES A MODIFIER
  $requeteS="SELECT suivi_tache.numeroodre,suivi_tache.file_url_courier_entrant,suivi_tache.fichier_courrier_entrant,
                date_format(suivi_tache.dateattribution, '%d/%m/%Y') as dateattribution, suivi_tache.objettache
            
            FROM suivi_tache

                  WHERE suivi_tache.numeroodre='$numeroodre'
                   GROUP BY suivi_tache.numeroodre";

    //EXECUTION DE LA REQUETTE
    $resultatS=$pdo->query($requeteS);
    $listedonneeMAJ=$resultatS->fetch();
    $dateattribution=$listedonneeMAJ['dateattribution'];
    $objettache=$listedonneeMAJ['objettache'];

      $file_url_courier_entrant=$listedonneeMAJ['file_url_courier_entrant'];//POUR CONSULTER LE DOCUMENT JOINT
      
 

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
            
 &nbsp; &nbsp; &nbsp;
                       <a href="redirection_insertion_tache_simultanem_service.php" >
                                                   <button type="button"  class="btn btn-primary btn-label-left">
                                                        <span class="glyphicon glyphicon-backward"></span>
                                                       Retour
                                                    </button> </a>
            <div class="page-header">
              
              <h1 style="color:green;font-weight:bold">
            Intégration du courrier d'entrée pour le suivi de l'éxecution de la tâche N°:<?php echo  $numeroodre?> du:  <?php echo  $dateattribution?> 
             <i>  
              pour <?php echo  $objettache?> 
              

            </i>
                
              </h1><br/>


            </div><!-- /.page-header -->
            
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->


                    

      <form  method="POST" class="form-horizontal" action="update_execution_tache_joindre_courier_entree_service.php" role="form" enctype="multipart/form-data">




                           <input type="hidden" name="numeroodre" class="form-control" value="<?php echo $numeroodre ?>"/><br/>

            

                          <!-- debut tout premier formulaire  -->
  <div class="row" style="background-color:#03224c;color:white" ><!--COULEUR DE TOUTES LA PAGE EN FOND BLEU-->

                  
                   <div class="col-xs-12 col-sm-12" style="background-color:#03224c;color:white">
                      <div class="widget-box" style="background-color:#03224c;color:white">
                 <div class="widget-header"  >
              <h4 class="widget-title" ><B style="background-color:#03224c;color:yellow">Identifications du Courrier </B></h4>

                          <div class="widget-toolbar" style="background-color:#03224c;color:white">
                            <a href="#" data-action="collapse">
                              <i class="ace-icon fa fa-chevron-up"></i>
                            </a>

                            
                          </div>
                        </div>


                        <div class="widget-body" style="background-color:#03224c;color:white">
                          <div class="widget-main">

                          <div class="form-group has-success has-feedback">


      

               <label class="col-sm-3 control-label"><font color="white">Courrier Entré:</font></label>
                                                     <div class="col-sm-3">
                                                       <input type="file"  name="fichier_courrier_entrant"  accept="application/PDF" value="GEDANAC/<?php echo($listedonneeMAJ['file_url_courier_entrant'])?>"  style="color:#2060a6;background-color:white;font-weight:bold"   class="form-control" >

                                                    </div><br/>


 <!--on recupere URL du fichier a modifier en le masquant-->
                <!--ON RECUPERE LA VARIABLE file_url DU FICHIER L LIEN POUR LA MAJ-->

               
    <input type="hidden"  name="file_url_courier_entrant"  accept="application/PDF" value="<?php echo($listedonneeMAJ['file_url_courier_entrant'])?>" >
               


            <!--CHAMPS A MAQSUER-->
                                  

                     <!--extraction le numero IDUSER de celui qui se pdoer,qui enregistre dans la bdd-->
                             <input type="hidden"  name="numat"  value="<?php echo $stat8['numat']; ?>">

    <!--POUR INSERER LA DATE DU JOUR ET LHEUR DE CREATION, il faut faire moins 1h-->
   <input type="hidden" name="dateheuresaisi" value="<?php echo $date=date('d/m/Y' );?> à <?php echo  date("H:i:s");?>" />








                                                     <CENTER>
          
                             
                  <div class="clearfix form-actions" style="color:yellow;background-color:#03224c">
                    <div class="col-md-offset-3 col-md-9">
                        <button name="envoyer" type="submit"  class="btn btn-success">
                                                                    <span class="glyphicon glyphicon-edit icon-white"></span>
                                                                    Valider
                                                                </button> 

                      &nbsp; &nbsp; &nbsp;
                       <a href="redirection_insertion_tache_simultanem_service.php" >
                                                   <button type="button"  class="btn btn-primary btn-label-left">
                                                        <span class="glyphicon glyphicon-backward"></span>
                                                       Retour
                                                    </button> </a>
                    </div>
                  </div>

                      

      </CENTER>
                         



                                                   

             </div> 





                      



             </div>
                      
                
                          </div>
                        </div>
                      </div>
                    </div><!-- /.fin du FORMULAIRE information DE TACHE -->

                  



                  </div>

                  <!-- fin tout premier formulaire  -->

          
                          </div>

                        

                        </div>

                      </div>

                     

                       
 


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





        

<!-- fin action sur formulaire wizard



  </body>

</html>


