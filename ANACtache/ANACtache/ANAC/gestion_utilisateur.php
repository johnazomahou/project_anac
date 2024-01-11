<?php
//jinclu le fichier se session 
    require_once('identifier.php');

	header('Content-Type: text/html; charset=utf-8');
	setlocale(LC_CTYPE, 'fr_FR.UTF-8');
	include('entete.php');
	require("../param_connexion_bdd/connexiobddAJAX.php");

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
						

						<div class="page-header">
							<h1 style="color:#2060a6;font-weight:bold">
								Gestion des Utilisateurs
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								
								 
 <!--LES Super_Utilisateur NOONT  DROIT A c enus  -->
                 <?php if ($_SESSION['user']['profil']!=='Super_Utilisateur' && $_SESSION['user']['profil']!=='Utilisateur_Power') {?>

<!--POUR LINSTANT ONT MASUQE C MENU PAS USE-->

								<!-- <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer white"></i>
									  <B><i style="color:green;font-weight:bold">Ajouter Utilisateur Suivre Tâche  </i></B> 
			                        <button title="Ajouter utilisateur Suivre Tâche" type="button" name="agdemandeur" id="agdemandeur" data-toggle="modal" data-target="#add_data_Modal_ajouter_donnees" style="background-color:green;color:white">
			                            <i class="glyphicon glyphicon-user"> + </i></button> -->

			                  <?php }?>          	




			                            <!--BTN POUR GERER La creation compte attributaire comme user cote CONSULTNTA DJ-->
               
                             


                             <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer white"></i>
                    <B><i style="color:green;font-weight:bold">Ajouter   Utilisateur pour suivi  des tâches  </i></B> 
                              <button title="Ajouter   Utilisateur pour suivi  des tâches" type="button" name="agdemandeur" id="agdemandeur" data-toggle="modal" data-target="#add_data_Modal" style="background-color:green;color:white">
                               
                                <i class="glyphicon glyphicon-user"> + </i>
                             </button>
			         	


								<div class="row">
									<div class="col-xs-12">
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header" style="background-color:#03224c;color:white">
											Tableau Synoptique des Utilisateurs
										</div>

										 <?php 
				                              require_once("../param_connexion_bdd/connexiobddAJAX.php");
				                                                   
				                                $requete="SELECT * FROM user_anacstat
				                                WHERE numat!='0000'

																		 ORDER BY nomag  ";

				                                $reponse = mysqli_query($db, $requete) or die (mysqli_error($db));
				                                            
                						 ?>

										<div>
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														 
														<th style="background-color:#03224c;color:white">Utilisateur</th>
														<th style="background-color:#03224c;color:white">Trigramme</th>
														<th style="background-color:#03224c;color:white">Login</th>
														<th style="background-color:#03224c;color:white">Profil</th>
														<th style="background-color:#03224c;color:white">Statut</th>
														
														<th style="background-color:#03224c;color:white">Modifier</th>
													</tr>
												</thead>

												<tbody>
													  <!--FAIRE UNE BOUCLE PHP pour recuperer toutes les données de la table-->
							                        <!--recupere une donnée sous forme  d1 tableau associative,ligne/lignes-->
							                        <!--apres il va la stockée dans une variable appeler RES-->
							                        
                        
                                                <?php 
                                                            while($res=mysqli_fetch_assoc($reponse)){
                                                            	$pconnexion=$res['pconnexion'];
                                                            	$profil=$res['profil'];
                                                            	$numat=$res['numat'];
                                                ?> 
													<tr>
														<!---POUR AFFICHER LES DONNEES-->

														
														<td style="color:black"> <?php echo  $res['prenag'];?> 
														                         <?php echo  $res['nomag'];?>
														</td> 
														<td style="color:black"> <?php echo  $res['trigram_user'];?></td> 
														<td style="color:black"> <?php echo  $res['numat'];?></td> 
														

																										<td style="color:black"> 
															<?php 

			                            				if ($profil=='Administrateur'){
			                                    
			                  echo '<a style="color:black;font-weight:bold" >Directeurs | Assitante Direction</a>';

			                                                                } 





			                                              elseif($profil=='Super_Utilisateur'){
			                                    
			               echo '<a style="color:black;font-weight:bold" >Chefs de Services|Bureaux</a>'; }


			               elseif($profil=='Utilisateur_Power'){
			                                    
			               echo '<a style="color:black;font-weight:bold" >Autre personnel</a>'; }





			                                               				 else {
			               echo '<a style="color:black;font-weight:bold"> Consultant</a>'
	                                                       ;}?> 

                                                    	</td> 
														
														<td style="color:black"> 
															<?php 
			                            							 if ($pconnexion=='0'){
			                                                          echo '<a style="color:red;font-weight:bold" >
			                                                                Compte Temporairement Désactivé</a>';
			                                                                } 
			                                               				 else {
			                                                        echo '<a style="color:green;font-weight:bold">
	                                                              Compte Activé</a>'
	                                                       ;}?> 
                                                    	</td> 
														

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																


																<!--BTN POUR MODIFIER LA DONNE SELECTIONNEE-->

					                                         


					                                        

															    <a class="green" title="Modifier" onclick="return confirm('Etes vous sur de vouloir modifier cette ligne ?')"
					                                        href="update_utilisateur.php?numat=<?php echo $res['numat'] ?>">
					                                                    <span class="ace-icon fa fa-pencil bigger-130"></span>
					                                            </a>
					                                            
																
																

																

															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		
																		<li>
																			<!--BTN POUR MODIFIER LA DONNE SELECTIONNEE-->
															   					
															   	<!--SEUL LES ADMIN ET LES SUPERADMIN  PEUVENT MODIFIER-->
																
															    <a class="green" title="Modifier" onclick="return confirm('Etes vous sur de vouloir modifier cette ligne ?')"
					                                        href="update_utilisateur.php?numat=<?php echo $res['numat'] ?>">
					                                                    <span class="ace-icon fa fa-pencil bigger-130"></span>
					                                            </a>
					                                             

					                                            


																		</li>

																		<li>
																


																		</li>
																	</ul>
																</div>
															</div>
														</td>

														 <?php }?>
													</tr>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>




<!--FENETRE MODAL ajouter etudiant utilislater-->
      <?php
          include('fenetre_modale_creation_user_attributaire.php');
                 
      ?>



<!--FENETRE MODAL POUR enregistrer les utilisateur ki ne sont pas des attributaires de taches-->

<div id="add_data_Modal_ajouter_donnees" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
   <div class="modal-header" style="background-color:#03224c;color:white">
    <div class="modal-header no-padding">
	<div class="table-header" style="background-color:#03224c;color:white">
		
			Fiche de création des Utilisateurs
	</div>
	</div>

   </div>
   <div class="modal-body">

      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

     <label style="color:white;font-weight:bold">Nom :</label>
  			<input type="text"  name="nomag" placeholder="Obligatoire" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();"  style="color:#2060a6;background-color:white;font-weight:bold" required="required"  class="form-control" >
     <br />

     <label style="color:white;font-weight:bold">Prenom:</label>
  		<input type="text"  name="prenag" placeholder="Pas Obligatoire" style="color:#2060a6;background-color:white;font-weight:bold;font-weight:bold" class="form-control" >
     <br />

     <label style="color:white;font-weight:bold">Trigramme:</label>
  		<input type="text"  name="trigram_user" maxlength="4" placeholder="Pas Obligatoire" style="color:#2060a6;background-color:white;font-weight:bold;font-weight:bold" class="form-control" >
     <br />

      <label style="color:white;font-weight:bold">N° Matricule :</label>
  			<input type="text"  name="numat" placeholder="Obligatoire" maxlength="4"  onkeypress="return keyPressHandler (event);" placeholder="Obligatoire" style="color:#2060a6;background-color:white;font-weight:bold" required="required"  class="form-control" >
     <br />

   
     <label style="color:white;font-weight:bold">Nature du Compte:</label>
        <label>
											<div class="radio">
													<label>
														<input name="pconnexion" checked="checked" value="1"  type="radio" class="ace" />
														<span class="lbl"> Compte Activé</span>
													</label>
												</div>

												<div class="radio">
													<label>
														<input name="pconnexion" value="0" type="radio" class="ace" />
														<span class="lbl" style="color:red;font-weight:bold"> Compte Désactivé</span>
													</label>
												</div>

		</label>
     <br /><br/>

     <label style="color:white;font-weight:bold">Profil du Compte:</label>
        <label>
											<!-- <div class="radio">
													<label>
														<input name="profil"  value="Administrateur"  type="radio" class="ace" />
														<span class="lbl"> Administrateur</span>
													</label>
												</div>

												<div class="radio">
													<label>
														<input name="profil" value="Super_Utilisateur" type="radio" class="ace" />
														<span class="lbl"> Super Utilisateur</span>
													</label>
												</div> -->

												<div class="radio">
													<label>
														<input name="profil" checked="checked" value="Utilisateur_Power" type="radio" class="ace" />
														<span class="lbl"> Utilisateur avec pouvoir</span>
													</label>
												</div>

												<div class="radio">
													<label>
														<input name="profil" value="Consultant" type="radio" class="ace" />
														<span class="lbl"> Consultant</span>
													</label>
												</div>

												
		</label><br/><br/>
       
      							<!--CHAMP A MASQUER-->
										<!--LE MOT DE PASSE PAR DEFAUT DES TOUS LES UTILISATEUR EST  1234-->
									<input type="hidden"  name="pwd"  VALUE="81dc9bdb52d04dc20036dbd8313ed055">
                             
     <input type="submit" name="Enregistrer"  value="Enregistrer"  class="btn btn-success" />
     
    </form>
             	 
<?php
    include('../param_connexion_bdd/connexiobddAJAX.php');
			            
	include('../param_connexion_bdd/fonction.php');

    if (isset($_POST['Enregistrer'])){

        if (isset($_POST['numat'])) {

            $numat=$_POST['numat'];

            if(verifie_numat($numat)){

                echo "<script> alert('Le N° Matricule " .$numat." existe deja, Veuillez reessayer !') </script>";
            }

            else{
                
				$succes=ajouter_user('$numat','$pwd','$profil','$pconnexion','$nomag','$prenag','$trigram_user');

            }


        }
    }
    ?>
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
  </div>
 </div>
</div>

 

								
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
		<!--  dépendances  pour faire les recherches dans  la liste déroulante -->

      <script src="bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="bootstrap-select/dist/js/i18n/defaults-*.min.js"></script>


		 <!--A CE NIVEAU ON INSER LES INFORMATION DYNAMIQUE AVEC DU JQUERY+JAVA SCRIPT--->





<!--remplissage des zone des texte automatiquemet pour les eleves reinscrip-->

<script type="text/javascript">

    $(document).ready(function() {
        $('#idattributeur').change(function () {

            var codesalarier = $('#idattributeur option:selected').attr('data-idattributeur');
            $('#codesalarier').val(codesalarier);

           

            var nomattributeur = $('#idattributeur option:selected').attr('data-nomattributeur');
            $('#nomattributeur').val(nomattributeur);

            
    

            var codecelve = $('#idattributeur option:selected').attr('data-testidag');
            $('#codecelve').val(codecelve);

          


          
             
            

            var cache = ($('#idattributeur option:selected').text()).substring(0,7);

            $('#cache').val(cache);

           

        });

    });

</script>


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
					  null, null,null, null, 
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
									<p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
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
	</body>
</html>
