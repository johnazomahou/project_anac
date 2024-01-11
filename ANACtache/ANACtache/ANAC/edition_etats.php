<?php 
//jinclu le fichier se session 
    require_once('identifier.php');

    require_once("../param_connexion_bdd/connexiondb.php");

  require_once("../param_connexion_bdd/requetes.php");

  require_once("../param_connexion_bdd/connexiobddAJAX.php");
    
include('entete.php');

include('menu.php');
?>

        

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
          try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
      </div>

      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            
           

              &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp 
              &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp 
              &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp 
              &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp 
              &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp 
              &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp


                   <B><I style="color:#03224c;font-weight:bold"> 
                    <i class="ace-icon fa fa-home home-icon"></i>  Bienvenue dans
                    <ul class="breadcrumb">
              <li>
                
                <B style="color:#03224c;font-weight:bold">AGAI</B>
              </li>
              
            </ul><!-- /.breadcrumb -->
                      :<?php echo  ' ' .$_SESSION['user']['prenag']?>  
                         <?php echo  ' ' .$_SESSION['user']['nomag']?></I></B>
              
                                

          </div>

          <div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">
              <strong class="#2060a6">
                     <?php                                                 
                          
                          $date = date("d-m-Y");
                          $heure = date("H:i:s");
                          //Print("Nous sommes le $date et il est $heure");
                          
                          
                          
                          
                          //Voici les deux tableaux des jours et des mois traduits en français
                              $nom_jour_fr = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

                              $mois_fr = Array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", 
                                  "Septembre", "Octobre", "Novembre", "Decembre");
                              
                              // on extrait la date du jour
                          list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y"));
                              
                                                    echo $nom_jour_fr[$nom_jour].' '.$jour.' '.$mois_fr[$mois].' '.$annee;      Print("             il est $heure");
                          
                  
                          ?>  
                    
                  </strong>

              
            </div><!-- /.ace-settings-container -->

            <div class="page-header">
              <h1 style="color:#2060a6;font-weight:bold">
                Editions des Etats | Rapports
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                

<!-- 1ER TABLEAU  -->

      <div class="col-xs-6 col-sm-6" style="background-color:#03224c;color:white"><!--COULEUR DE TOUTES LA PAGE EN FOND BLEU-->
                      <div class="widget-box" style="background-color:#03224c;color:white">
                        <div class="widget-header"  >
             
             

<h4 class="widget-title" style="color:#03224c;font-weight:bold">
                          <i class="ace-icon glyphicon glyphicon-user"></i>
                          <i class="ace-icon glyphicon glyphicon-print"></i>
                  Programme de Surveillance Continue par inspecteurs  <?php echo date('Y'); ?>
                
                    </h4>
                          <div class="widget-toolbar" style="background-color:#03224c;color:white">
                            <a href="#" data-action="collapse">
                              <i class="ace-icon fa fa-chevron-up"></i>
                            </a>

                            
                          </div>
                        </div>


                        <div class="widget-body" style="background-color:white;color:white">
                          <div class="widget-main">
                        

            <!-- /.POUR INCLURE LE FICHIER tableau_planing_par_inspecteur.php -->

<?PHP   include_once('tableau_planing_par_inspecteur.php');?>


             
                          </div>
                        </div>

                      </div>
                    </div><!-- FIN DU 1ER BLOC/.span -->




      <div class="col-xs-6 col-sm-6" style="background-color:#03224c;color:white"><!--COULEUR DE TOUTES LA PAGE EN FOND BLEU-->
                      <div class="widget-box" style="background-color:#03224c;color:white">
                        <div class="widget-header"  >
             
             

<h4 class="widget-title" style="color:#03224c;font-weight:bold">
                          <i class="ace-icon glyphicon glyphicon-user"></i>
                          <i class="ace-icon glyphicon glyphicon-print"></i>
                  PSC des inspecteurs par statuts <?php echo date('Y'); ?>
                
                    </h4>
                          <div class="widget-toolbar" style="background-color:#03224c;color:white">
                            <a href="#" data-action="collapse">
                              <i class="ace-icon fa fa-chevron-up"></i>
                            </a>

                            
                          </div>
                        </div>


                        <div class="widget-body" style="background-color:white;color:white">
                          <div class="widget-main">
                        

            <!-- /.POUR INCLURE LE FICHIER tableau_planing_inspecteur_parstatut.php -->

<?PHP   include_once('tableau_planing_inspecteur_parstatut.php');?>


             
                          </div>
                        </div>

                      </div>
                    </div><!-- FIN DU 1ER BLOC/.span -->

                    


                    <!-- 2ER TABLEAU  -->

      <div class="col-xs-6 col-sm-6" style="background-color:#03224c;color:white"><!--COULEUR DE TOUTES LA PAGE EN FOND BLEU-->
                      <div class="widget-box" style="background-color:#03224c;color:white">
                        <div class="widget-header"  >
             
             

<h4 class="widget-title" style="color:#03224c;font-weight:bold">
                          <i class="ace-icon fa fa-bolt bigger-110"></i>
                          <i class="ace-icon glyphicon glyphicon-print"></i>
                    Programme de Surveillance Continue par Type Opérateur <?php echo date('Y'); ?> 
                    </h4>
                          <div class="widget-toolbar" style="background-color:#03224c;color:white">
                            <a href="#" data-action="collapse">
                              <i class="ace-icon fa fa-chevron-up"></i>
                            </a>

                            
                          </div>
                        </div>


                        <div class="widget-body" style="background-color:white;color:white">
                          <div class="widget-main">
                     
                <?php
                  // fichier tableau_psc_par_typeoperateur.php
                  include_once('tableau_psc_par_typeoperateur.php');
                ?>

             
                          </div>
                        </div>

                      </div>
                    </div><!-- FIN DU 1ER BLOC/.span -->


      <div class="col-xs-6 col-sm-6" style="background-color:#03224c;color:white"><!--COULEUR DE TOUTES LA PAGE EN FOND BLEU-->
                      <div class="widget-box" style="background-color:#03224c;color:white">
                        <div class="widget-header"  >
             
             

<h4 class="widget-title" style="color:#03224c;font-weight:bold">
                          <i class="ace-icon fa fa-fighter-jet"></i>
                          <i class="ace-icon glyphicon glyphicon-print"></i>
                       Programme de Surveillance Continue par Opérateurs <?php echo date('Y'); ?>
                    </h4>
                          <div class="widget-toolbar" style="background-color:#03224c;color:white">
                            <a href="#" data-action="collapse">
                              <i class="ace-icon fa fa-chevron-up"></i>
                            </a>

                            
                          </div>
                        </div>


                        <div class="widget-body" style="background-color:white;color:white">
                          <div class="widget-main">
                        


                <?php
                  //tableau_psc_par_operateur.php


                include_once('tableau_psc_par_operateur.php');
                ?>


             
                          </div>
                        </div>

                      </div>
                      
                    </div><!-- FIN DU 1ER BLOC/.span -->



                    <!-- 3EME TABLEAU  -->

      <div class="col-xs-12 col-sm-12" style="background-color:#03224c;color:white"><!--COULEUR DE TOUTES LA PAGE EN FOND BLEU-->
                      <div class="widget-box" style="background-color:#03224c;color:white">
                        <div class="widget-header"  >
             
             

    <h4 class="widget-title" style="color:#03224c;font-weight:bold">
                          <i class="ace-icon glyphicon glyphicon-th"></i>
                          <i class="ace-icon glyphicon glyphicon-print"></i>
                          
                           PSC par Domaines en  <?php
                                    // pour afficher les fnc de lannée derniere
                                   echo date("Y");
                                ?>
                                 <?php
                                    // pour afficher les fnc de lannée derniere
                                   // echo date("Y",strtotime("-1 year"));
                                ?>
                
                    </h4>
                          <div class="widget-toolbar" style="background-color:#03224c;color:white">
                            <a href="#" data-action="collapse">
                              <i class="ace-icon fa fa-chevron-up"></i>
                            </a>

                            
                          </div>
                        </div>


                        <div class="widget-body" style="background-color:white;color:white">
                          <div class="widget-main">
                        

            

        <?PHP   include_once('tableau_psc_domaine.php');?>

             
                          </div>
                        </div>

                      </div>
                    </div><!-- FIN DU 1ER BLOC/.span -->





                

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
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
<script src="../assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

    <!--[if !IE]> -->
    <script type="text/javascript">
      window.jQuery || document.write("<script src='../assets/js/jquery.min.js'>"+"<"+"/script>");
    </script>

    <!-- <![endif]-->

    <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/dataTables.tableTools.min.js"></script>
    <script src="../assets/js/dataTables.colVis.min.js"></script>

    <!-- ace scripts -->
    <script src="../assets/js/ace-elements.min.js"></script>
    <script src="../assets/js/ace.min.js"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
        //initiate dataTables plugin
        var oTable1 = 
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        //POUR AJOUTR D'AUTRES COLONNES
        .dataTable( {
          bAutoWidth: false,
          "aoColumns": [
            { "bSortable": false },
            null,  
            
            { "bSortable": false }
          ],
          "aaSorting": [],
      
          //,
          //"sScrollY": "200px",
          //"bPaginate": false,
      
          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50
          } );
        //oTable1.fnAdjustColumnSizing();
      
      
        //TableTools settings
        TableTools.classes.container = "btn-group btn-overlap";
        TableTools.classes.print = {
          "body": "DTTT_Print",
          "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
          "message": "tableTools-print-navbar"
        }
      
        //initiate TableTools extension
        var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
          "sSwfPath": "../assets/swf/copy_csv_xls_pdf.swf",
          
          "sRowSelector": "td:not(:last-child)",
          "sRowSelect": "multi",
          "fnRowSelected": function(row) {
            //check checkbox when row is selected
            try { $(row).find('input[type=checkbox]').get(0).checked = true }
            catch(e) {}
          },
          "fnRowDeselected": function(row) {
            //uncheck checkbox
            try { $(row).find('input[type=checkbox]').get(0).checked = false }
            catch(e) {}
          },
      
          "sSelectedClass": "success",
              "aButtons": [
            {
              "sExtends": "copy",
              "sToolTip": "Copy to clipboard",
              "sButtonClass": "btn btn-white btn-primary btn-bold",
              "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
              "fnComplete": function() {
                this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
                  <p>Copied '+(oTable1.fnSettings().fnRecordstotal_ht())+' row(s) to the clipboard.</p>',
                  1500
                );
              }
            },
            
            
            
              ]
          } );
        //we put a container before our table and append TableTools element to it
          $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));
        
        //also add tooltips to table tools buttons
        //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
        //so we add tooltips to the "DIV" child after it becomes inserted
        //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
        setTimeout(function() {
          $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
            var div = $(this).find('> div');
            if(div.length > 0) div.tooltip({container: 'body'});
            else $(this).tooltip({container: 'body'});
          });
        }, 200);
        
        
        
        //ColVis extension
        var colvis = new $.fn.dataTable.ColVis( oTable1, {
          "buttonText": "<i class='fa fa-search'></i>",
          "aiExclude": [0, 6],
          "bShowAll": true,
          //"bRestore": true,
          "sAlign": "right",
          "fnLabel": function(i, title, th) {
            return $(th).text();//remove icons, etc
          }
          
        }); 
        
        //style it
        $(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')
        
        //and append it to our table tools btn-group, also add tooltip
        $(colvis.button())
        .prependTo('.tableTools-container .btn-group')
        .attr('title', 'Voir/Cacher Colonnes').tooltip({container: 'body'});
        
        //and make the list, buttons and checkboxed Ace-like
        $(colvis.dom.collection)
        .addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
        .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
        .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');
      
      
        
        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
        
        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) tableTools_obj.fnSelect(row);
            else tableTools_obj.fnDeselect(row);
          });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
          var row = $(this).closest('tr').get(0);
          if(!this.checked) tableTools_obj.fnSelect(row);
          else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
        });
        
      
        
        
          $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
          e.stopImmediatePropagation();
          e.stopPropagation();
          e.preventDefault();
        });
        
        
        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
          });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
          var $row = $(this).closest('tr');
          if(this.checked) $row.addClass(active_class);
          else $row.removeClass(active_class);
        });
      
        
      
        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        
        //tooltip placement on right or left
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest('table')
          var off1 = $parent.offset();
          var w1 = $parent.width();
      
          var off2 = $source.offset();
          //var w2 = $source.width();
      
          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
          return 'left';
        }
      
      })
    </script>
  </body>
</html>

    

<!--FENETRE MODAL POUR CHANGER LE MOT DE PASSER-->

<div id="add_data_Modal_mdp_forget" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><font color="white">Gestion de mot de passe </font></h4>
   </div>
   <div class="modal-body">

    <form id="defaultForm" method="post" class="form-horizontal" action="changer_mot_passe_user.php">

     <?php
  //jinclu le fichier se session ,et requete POUR RECUPERE LE ID D CELUI QUI EST CONNECTER POUR CHANCGER SON MOT DE PASSE
     require_once('identifier.php');

    include_once('../param_connexion_bdd/requetes.php');

  ?>

    <!--JE RECUPER LE numat DE LUSER QUI EST CONNECTE-->
    
           <input type="hidden"   value="<?php echo $stat8['numat']; ?>"   name="numat" >
   

     <label><font color="white">Votre Nouveau Mot de passe:</font></label>
          <input type="password"  class="form-control"  placeholder="Entrez Nouveau mot de passe"  id="pwd1"  name="pwd1"  style="color:#2060a6;background-color:white;font-weight:bold;font-weight:bold" required="required"    class="form-control" >
     <br /> 

     <label><font color="white">Confirmer le  mot de passe:</font></label>
      <input type="password"  class="form-control"  placeholder="Confirmer mot de passe"id="pwd2"  name="pwd2" style="color:#2060a6;background-color:white;font-weight:bold;font-weight:bold" required="required"    class="form-control" >
     <br />  

    
       
             <button type="submit"  id="modif"  value="modifier" class="btn btn-success">
                                                            <i class="ace-icon fa fa-key"></i>
                                                           <span class="glyphicon glyphicon-log-in"></span> Changer</span>
                                                        </button>
      

   
            
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
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
periode = setInterval(clignotement, 800); 
</script>







<!--TEXTE CLIGNOTANT PAR OPACITE QUI DONNE L'IMPRESSION D'UN FONDU--->
<script type="text/javascript">
var signe = -1;
var clignotementFading = function(){
var obj = document.getElementById('LblClignotant');
if (obj.style.opacity >= 0.96){
signe = -1;
}
if (obj.style.opacity <= 0.04){
signe = 1;
}
obj.style.opacity = (obj.style.opacity * 1) + (signe * 0.04);
};

// mise en place de l appel de la fonction toutes les 0.085 secondes
// Pour arrêter le clignotement : clearInterval(periode);
periode = setInterval(clignotementFading, 85 );
</script>

