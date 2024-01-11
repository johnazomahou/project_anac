<?php 


   //jinclu le fichier se session 
   require_once('identifier.php');

   require_once("../param_connexion_bdd/connexiondb.php");

   require_once("../param_connexion_bdd/requetes.php");
      
   
  //POUR INSERER LE FICHIER ENTETE ET LES COURBES DE GRAPHE ET 
   // LA BIBLIOTHEQUE jsgraph

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

      <div class="main-content"  >
        <div class="main-content-inner">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            
            <button title="Changer votre mot de passe" type="button"name="majpwd" id="majpwd" data-toggle="modal" data-target="#add_data_Modal_mdp_forget" style="background-color:#03224c;color:white">Changer Mot de Passe </button></a></li>


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
                
                <B style="color:#03224c;font-weight:bold">ANACtache</B>
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
                              
                                                    echo $nom_jour_fr[$nom_jour].' '.$jour.' '.$mois_fr[$mois].' '.$annee;      //Print("             //il est $heure");
                          
                  
                          ?>  
                    
                  </strong>

              
            </div><!-- /.ace-settings-container -->

            <div class="page-header">
              <h1 style="color:#2060a6;font-weight:bold">
                Statistiques & indicateurs de performances kpi
                
              </h1>



               
                            
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="alert alert-block alert-success">
                  
                     <center><font face="candara" FONT size="5"> <B>NOMBRE DE SUPPORTS /FORMULAIRES UTILISES </B></font></center>
                
                </div>

                                

        



                <div class="row">
                  <div class="col-xs-12">
                    

                    <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
                    

                     <?php 
                                      require_once("../param_connexion_bdd/connexiobddAJAX.php");
                                                           
                                        $requete="SELECT suivi_tache.idtache,formulaire_utilise_anactache.idformutilise,formulaire_utilise_anactache.nomformulaireutilise,

                                                  (COUNT(*)-(SUM(IF(suivi_tache.idstatuttache=5, 1, 0)))) AS tauxexecutionTOTAL,
                                                  (SUM(IF(suivi_tache.idstatuttache=5, 1, 0))) AS tauxexecutioncloture, 
                                                  ROUND(((((SUM(IF(suivi_tache.idstatuttache=5, 1, 0)))) / (COUNT(*)))*100),2) AS tauxexecution,
                                                  COUNT(*) AS nbredetache 


                                          FROM suivi_tache, formulaire_utilise_anactache

                                          WHERE suivi_tache.formutilise=formulaire_utilise_anactache.idformutilise
                                          AND formulaire_utilise_anactache.idformutilise!=''
                                           AND suivi_tache.separer_tache_dj_anac='ANAC'


                                          GROUP BY formulaire_utilise_anactache.idformutilise

                                          ORDER BY formulaire_utilise_anactache.nomformulaireutilise ";

                                        $reponse = mysqli_query($db, $requete) or die (mysqli_error($db));
                                                    
                             ?>

                    <div>
                     
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            
                            <th style="background-color:#03224c;color:white"><center>Formulaires</center></th>
                            <th style="background-color:#03224c;color:white"><center>Total Dossier à Suivre</center></th>
                            <th style="background-color:#03224c;color:white"><center>Total Document Délivrés</center></th>
                            <th style="background-color:#03224c;color:white"><center>Total Formulaire Utilisés</center></th>
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

         <td><center><?php echo  $res['nomformulaireutilise'];?></center></td>

            
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

            echo '<td style="background-color:white;color:black"><a style="color:red;font-weight:bold;color:black" > 
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


              </div>


           
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
            null,null,null,
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

    <!--JE RECUPER LE IDUSER DE LUSER QUI EST CONNECTE-->
    
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






