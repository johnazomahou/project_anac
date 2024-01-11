<?php
//jinclu le fichier se session 
    require_once('identifier.php');

	header('Content-Type: text/html; charset=utf-8');
	setlocale(LC_CTYPE, 'fr_FR.UTF-8');
	include('entete.php');
	require("../param_connexion_bdd/connexiondb.php");

	include_once('../param_connexion_bdd/requetes.php');


//ON RECUPERE LE ID POUR LA MAJ
    $idprogramsuivi=isset($_GET['idprogramsuivi'])?$_GET['idprogramsuivi']:0;
    
    //CREATION DE LA REQUETTE POUR RECUPERER LES DONNNEES A MODIFIER
  $requeteS="SELECT programmation_suivie.idprogramsuivi,inspecteur.nominspecteur,inspecteur.preninspect,
                                                    programmation_suivie.dateprevue,programmation_suivie.etat_progrm,type_acte_supervision.idtypeacte,
                                                    programmation_suivie.datereport,programmation_suivie.mois AS numeropsc,
                                                    date_format(programmation_suivie.daterealise, '%d/%m/%Y') as daterealise,
                                                    weekofyear(programmation_suivie.dateprevue) as numeroseme,
                                                    date_format(programmation_suivie.rapport_joint, '%d/%m/%Y') as dateannulation,
                                                    DATEDIFF(programmation_suivie.daterealise,programmation_suivie.dateprevue) as ecart,
                                                    programmation_suivie.obser,programmation_suivie.idrag,inspecteur.idinspecteur,
                                                     date_format(programmation_suivie.rapport_joint, '%d/%m/%Y') as datesuspension,
                                                    domaine.nomdomaine,sous_domaine.nomsous_domaine,organisme.nomorga,
                                                    type_organisme.nomtypeorg,programmation_suivie.idtypeorga,
                                                    programmation_suivie.typeodite,programmation_suivie.cadredeaudite,
                                                    programmation_suivie.site_inspection,programmation_suivie.idhabilitation,
                                                    type_acte_supervision.nomtypeodite,dans_le_cadre_supervision.cadredeaudite,
                                                    dans_le_cadre_supervision.idcadre_audite,sous_domaine.idsous_domaine
                                                    
						                                                        
						FROM programmation_suivie


						LEFT JOIN inspecteur ON inspecteur.idinspecteur=programmation_suivie.idhabilitation 
						LEFT JOIN exigences_fnc ON exigences_fnc.idexigence_fnc=programmation_suivie.an
						LEFT JOIN libelle_fnc ON libelle_fnc.idlibel_fnc=exigences_fnc.idlibel_fnc
						LEFT JOIN sous_domaine ON sous_domaine.idsous_domaine=programmation_suivie.idrag
						LEFT JOIN domaine ON domaine.iddomaine=sous_domaine.ref_rag
						LEFT JOIN organisme ON organisme.idorga=programmation_suivie.idorga
						LEFT JOIN type_organisme ON type_organisme.idtypeorga=programmation_suivie.idtypeorga
						LEFT JOIN dans_le_cadre_supervision ON dans_le_cadre_supervision.idcadre_audite=programmation_suivie.cadredeaudite
						LEFT JOIN type_acte_supervision ON type_acte_supervision.idtypeacte=programmation_suivie.typeodite
 												
 												WHERE programmation_suivie.idprogramsuivi=$idprogramsuivi";
    //EXECUTION DE LA REQUETTE
    $resultatS=$pdo->query($requeteS);
    $listedonneeMAJ=$resultatS->fetch();
    
    //DECLARATION DES VARIABLES DES CHAMPS PROPRE A LA TABLE A MODIFIER
    
    
   
   $nomtypeodite=$listedonneeMAJ['nomtypeodite'];
   
   $nomorga=$listedonneeMAJ['nomorga'];
   $nomdomaine=$listedonneeMAJ['nomdomaine'];
   $nomsous_domaine=$listedonneeMAJ['nomsous_domaine'];
   $idtypeacte=$listedonneeMAJ['idtypeacte'];
   $nominspecteur=$listedonneeMAJ['nominspecteur'];
   $nomtypeorg=$listedonneeMAJ['nomtypeorg'];
   $preninspect=$listedonneeMAJ['preninspect'];
   $site_inspection=$listedonneeMAJ['site_inspection'];
   $dateprevue=$listedonneeMAJ['dateprevue'];
   $idcadre_audite=$listedonneeMAJ['idcadre_audite'];
   $datereport=$listedonneeMAJ['datereport'];// pour mettre le commentaire du report
   $numeropsc=$listedonneeMAJ['numeropsc'];
   
    //DECLARATION DES VARIABLES DES CLES ETRANGERES A MODIFIER
    
    
   $idtypeorga=$listedonneeMAJ['idtypeorga'];
    $idinspecteur=$listedonneeMAJ['idinspecteur'];
    $cadredeaudite=$listedonneeMAJ['cadredeaudite'];
    $typeodite=$listedonneeMAJ['typeodite'];
    $idsous_domaine=$listedonneeMAJ['idsous_domaine'];
    $idrag=$listedonneeMAJ['idrag'];//POUR INSERER L ID SOUSDOMAINE QUI EGALE A IDRAG
    $idhabilitation=$listedonneeMAJ['idhabilitation'];
    
    //CREATION DES REQUETES POUR RECUPRER LES DONNNEES EN LISTE DEROULANTE DANS LES DIFFERENTES TABLES
   
   //requete pour selectionner les inspecteurs habiliter a un domaine en liste deroulante
   $requete_inspecteur="SELECT inspecteur.nominspecteur,inspecteur.preninspect ,inspecteur.idinspecteur,
                            habilitation_inspecteur.idhabiltation

                                            FROM inspecteur,habilitation_inspecteur,domaine

                                            WHERE habilitation_inspecteur.idinspecteur=inspecteur.idinspecteur
                                            AND domaine.iddomaine=habilitation_inspecteur.idaffectsd_domaine
                                            AND inspecteur.categorie!='Stagiaire'
                                            GROUP BY inspecteur.nominspecteur,inspecteur.preninspect
                                            ORDER BY inspecteur.nominspecteur";
   $resultat_inspecteur=$pdo->query($requete_inspecteur);

    //requete pour selectionner les natures actes de superivions en liste deroulante
   $requete_actesupervision="SELECT *
                     FROM type_Acte_supervision 
                    
                        ORDER BY nomtypeodite";
   $resultatactesupervison=$pdo->query($requete_actesupervision);

   //requete pour selectionner  Dans le cadre deen liste deroulante
   

   $requete_danslecadrede="SELECT *
                     FROM dans_le_cadre_supervision
                    
                        ORDER BY cadredeaudite";
   $resultat_cadrede=$pdo->query($requete_danslecadrede);

   //requete pour selectionner SOUS DOMAINES EN liste deroulante
   

   $requete_sous_domaine="SELECT sous_domaine.idsous_domaine,sous_domaine.nomsous_domaine 
                              FROM sous_domaine 
                                 LEFT JOIN domaine ON domaine.iddomaine=sous_domaine.ref_rag 
                                    ORDER BY sous_domaine.idsous_domaine DESC";
   $resultat_sousdomaine=$pdo->query($requete_sous_domaine);



			 
   
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
						Réalisation  <?php echo  $nomtypeodite?> N°:  <?php echo  $numeropsc?> 
						 <i>  
						 	dans le cadre <?php echo  $cadredeaudite?> de  l'opérateur <?php echo  $nomorga?>
							

						</i>
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

			<form  method="POST" class="form-horizontal" action="maj_realisation_suivi_psc.php" role="form" enctype="multipart/form-data">

				<!-- POUR FAIRE LE Calcule_total_fnc AUTOMATIQUEMA DU NBRE TOTAL FNC EN SAISI LES DIFFERENTES CATEGORIE --->
								<script type="text/javascript">
								
								                    function Calcule_total_fnc(){

									     	             //declaration d variable pour le calcul
											                var nbrecritique = Number(document.getElementById("nbrecritique").value);
								
											                var nbremajeur = Number(document.getElementById("nbremajeur").value);

											                 var nbremineur = Number(document.getElementById("nbremineur").value);
											 
											 					//FORMULE DE CALCUL
											                var nbretotalfnc = Number(nbrecritique + nbremajeur + nbremineur);
											                document.getElementById("nbretotalfnc").value = nbretotalfnc;
								                   
								                 				  }
								 
								</script>
																	  <!--ON RECUPER LE ID DE LA TABLE POUR LA MAJ-->

                    			 <input type="hidden" name="idprogramsuivi" class="form-control" value="<?php echo $idprogramsuivi ?>"/>

               <!--par defaut etat=3 = realise-->
                            <input type="hidden"  name="etat_progrm"  VALUE="3">

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Nature de supervision: </b></label>

										<div class="col-sm-3">
												<select class="chosen-select form-control" id="form-field-select-3" name="typeodite"  style="color:#2060a6;background-color:white;font-weight:bold">

									<option value="<?php echo $nomtypeodite?>" > <?php echo $nomtypeodite?></option>
                                                    
																<option disabled="disabled" value=""> Choisir autre Acte... </option>
																<option disabled="disabled" value="">  </option><option value="">   


									<?php while($nomtypeodite=$resultatactesupervison->fetch()) { ?>

                    <option style="color:#2060a6;background-color:white" disabled="disabled" value="<?php echo $nomtypeodite['idtypeacte'] ?>"
                                                     
                                                     <?php if($idtypeacte===$nomtypeodite['idtypeacte']) echo "selected" ?>> 
                                                     
                                                     <?php echo $nomtypeodite['nomtypeodite'] ?>
                                         </option>
                                    <?php }?>	
										
								</select>
										</div>

										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Dans le cadre de: </b></label>

										<div class="col-sm-3">
	
												<select class="chosen-select form-control" id="form-field-select-3" name="cadredeaudite"  style="color:#2060a6;background-color:white;font-weight:bold">

									<option value="<?php echo $cadredeaudite?>" > <?php echo $cadredeaudite?></option>
                                                    
																<option disabled="disabled" value=""> Choisir autre  cadre... </option>
																<option disabled="disabled" value="">  </option><option value="">   


									<?php while($cadredeaudite=$resultat_cadrede->fetch()) { ?>

                    			<option style="color:#2060a6;background-color:white" disabled="disabled" value="<?php echo $cadredeaudite['idcadre_audite'] ?>"
                                                     
                                                     <?php if($idcadre_audite===$cadredeaudite['idcadre_audite']) echo "selected" ?>> 
                                                     
                                                      <?php echo $cadredeaudite['cadredeaudite'] ?>
                                         </option>
                                    <?php }?>
										
    								</select>
										</div>
									</div>



									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Sous Domaine: </b></label>

										<div class="col-sm-3">
												<select class="chosen-select form-control" id="form-field-select-3" name="idrag"  style="color:#2060a6;background-color:white;font-weight:bold">

									<option value="<?php echo $nomsous_domaine?>"> <?php echo $nomsous_domaine?></option>
                                                    
															<option disabled="disabled" value=""> Choisir autre Sous Domaine... </option>
															<option disabled="disabled" value="">  </option><option value="">   


									<?php while($nomsous_domaine=$resultat_sousdomaine->fetch()) { ?>

                    <option style="color:#2060a6;background-color:white" disabled="disabled" value="<?php echo $nomsous_domaine['idsous_domaine'] ?>"
                                                     
                                                     <?php if($idsous_domaine===$nomsous_domaine['idsous_domaine']) echo "selected" ?>> 
                                                     
                                                      <?php echo $nomsous_domaine['nomsous_domaine'] ?>
                                     </option>
                                    <?php }?>
										
                                       </select>
										</div>

										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Inspecteur: </b></label>

										<div class="col-sm-3">
	
											<select class="chosen-select form-control" id="form-field-select-3" name="idhabilitation"  style="color:#2060a6;background-color:white;font-weight:bold">

									<option value="<?php echo $nominspecteur?>"> <?php echo $nominspecteur?> 
																				<?php echo $preninspect?></option>
                                                    
															
																<option disabled="disabled" value="">  </option><option value="">   


									<?php while($nominspecteur=$resultat_inspecteur->fetch()) { ?>
										
              <option style="color:#2060a6;background-color:white" disabled="disabled" value="<?php echo $nominspecteur['idinspecteur'] ?>"
                                                     
                                                     <?php if($idinspecteur===$nominspecteur['idinspecteur']) echo "selected" ?>> 
                                                     
                                                      <?php echo $nominspecteur['nominspecteur'] ?>
                                                       <?php echo $nominspecteur['preninspect'] ?>
                                     </option>
                                    <?php }?>
										
                                       </select>
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Domaine: </b></label>

										<div class="col-sm-3">
											<input type="text"   name="nomdomaine" readonly="true" value="<?php echo $nomdomaine?>" placeholder="Obligatoire" style="color:#2060a6;background-color:white;font-weight:bold"   class="form-control" >
										</div>

										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Date  Prévisionnelle: </b></label>

										<div class="col-sm-3">
									
											<input type="date"   name="dateprevue" readonly="true" value="<?php echo $dateprevue?>" placeholder="Obligatoire" style="color:#2060a6;background-color:white;font-weight:bold"   class="form-control" >
										</div>
									</div>

										<!--CE A CE NIVEAU QUE COMMENCE LA MAJ DANS LA BDD-->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">FNC Critique:</b></label>

										<div class="col-sm-3">
											
											<!--C UN CHAMP QUI PERMET D FAIRE UN Calcule_total_fnc EN SAISISSANT UN NOMBRE-->
                                        
                                          <input type=text name="nbrecritique" id="nbrecritique" title="Saisir Nombre Entier" placeholder="Saisir Nbre Entier" style="color:#2060a6;background-color:white;font-weight:bold"  onblur="Calcule_total_fnc()" onkeypress="return keyPressHandler (event);" class="form-control">
										</div>

										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Opérateur: </b></label>

										<div class="col-sm-3">
									         
                                           <input type=text  value="<?php echo $nomorga?>"  style="color:#2060a6;background-color:white;font-weight:bold"  readonly="true"  class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">FNC Majeur:</b></label>

										<div class="col-sm-3">
											
											 <!--C UN CHAMP QUI PERMET D FAIRE UN Calcule_total_fnc EN SAISISSANT UN NOMBRE-->
                                         
                                           <input type=text name="nbremajeur" id="nbremajeur" onkeypress="return keyPressHandler (event);" title="Saisir Nombre Entier" placeholder="Saisir Nbre Entier" style="color:#2060a6;background-color:white;font-weight:bold"  onblur="Calcule_total_fnc()" class="form-control">
										</div>

										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Site Inspection: </b></label>

										<div class="col-sm-3">
									         
                                           <input type=text  value="<?php echo $site_inspection?>"  style="color:#2060a6;background-color:white;font-weight:bold"  readonly="true"  class="form-control">
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">FNC Mineur:</b></label>

										<div class="col-sm-3">
											
											<!--C UN CHAMP QUI PERMET D FAIRE UN Calcule_total_fnc EN SAISISSANT UN NOMBRE-->
                                               <input type=text name="nbremineur" id="nbremineur" title="Saisir Nombre Entier" placeholder="Saisir Nbre Entier" style="color:#2060a6;background-color:white;font-weight:bold"  onblur="Calcule_total_fnc()" onkeypress="return keyPressHandler (event);" class="form-control">
										</div>

										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Observation: </b></label>

										<div class="col-sm-3">
									          <textarea  name="obser" placeholder="Pas Obligatoire"  style="color:#2060a6;font-weight:bold"  class="form-control"   ></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Total FNC: </b></label>

										<div class="col-sm-3">
									           <!--POUR RECEVOIR LE RESULTAT AUTOMATIQUEMENT-->
                                         
												<input type=text readonly="true" name="nbretotalfnc" id="nbretotalfnc" placeholder="Résultat Automatique" style="color:#2060a6;background-color:white;font-weight:bold"  onblur="Calcule_total_fnc()" class="form-control">
										</div>

										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b style="color:black;font-weight:bold">Date Réalisation:  </b></label>

										<div class="col-sm-3">
												
                                         
												<input type=date  name="daterealise" required="required"  placeholder="Obligatoire" style="color:#2060a6;background-color:white;font-weight:bold"   class="form-control">
										</div>
									</div>


									
                
									
									<!--CHAMP A MASQUER-->
										         
									<div class="clearfix form-actions" style="color:yellow;background-color:#03224c">
										<div class="col-md-offset-3 col-md-9">
											  <button type="submit"  class="btn btn-success">
                                                                    <span class="ace-icon glyphicon glyphicon-ok"></span>
                                                                    Réalisé
                                                                </button> 

											&nbsp; &nbsp; &nbsp;
											 

                                                 <!--BTN REDIRECTION RETOUR VERS LA PAGE PRECEDENTE EN JAVASCRIPT-->
                                                    <a href="javascript:window.history.go(-1)">
                                                    	<button type="button"  class="btn btn-primary btn-label-left">
                                                        <span class="glyphicon glyphicon-backward"></span>
                                                       Retour
                                                    </button> </a>
										</div>
									</div>

									
								</form>

							

								
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

		<!--[if lte IE 8]>
		  <script src="../assets/js/excanvas.min.js"></script>
		<![endif]-->
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


<!--POUR FAIRE DE Calcule_total_fnce_total_fnc AUTOMATIQUEM INSTANTEMENT--->

    <script language=JavaScript>
						function Calcule_total_fnce_total_fnc()
						{
						var c1=document.getElementById('nbrecritique').value;
						var c2=document.getElementById('nbremajeur').value;
						var c3=document.getElementById('nbremineur').value;

						var tt=((c1)+(c2)+(c3))

						document.getElementById('nbretotalfnc').innerHTML = tt;
						}
						</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
				
				$('textarea[class*=autosize]').autosize({append: "\n"});
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//alert($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			
				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				$('#date-timepicker1').datetimepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add a new
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}
				
				
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})1
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					$('textarea[class*=autosize]').trigger('autosize.destroy');
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
		</script>

	</body>

</html>

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