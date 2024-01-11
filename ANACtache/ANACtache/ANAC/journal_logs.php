<?php
//jinclu le fichier se session 
    require_once('identifier.php');
// jinclu le fichier de connexion a la bdd
    //require_once("conn.php");
    include('entete.php');
    
	//require("../param_connexion_bdd/connexiobddAJAX.php");
   require("../param_connexion_bdd/connexiondb.php");

	include_once('../param_connexion_bdd/requetes.php');
    //on initialise la zone de texte d recherche a vide
    $mc="";
    
    //afficher page par page, pagination
    $size=10;//nbre delement a afficher par page
      $max_nbre_page=10;
    
    if(isset($_GET['page'])){
      $page=$_GET['page'];
    }
    else{
      $page=0;//page0 c la page par defaut
    }
    
   $offset=$size*$page; // 50*l numero page

// POUR FAIRE LA RECHERCHE AVEC LE MOT CLE
if(isset($_GET['motcle'])){
  //on recuper le mot cle saisi
    if(empty($_GET['motcle'])==false){
    
  }
  $mc=$_GET['motcle'];
  //REQUETE POUR COMPTER LE NBRE ENREGISTREMENT QUI ON LA VALEUR DU MOT CLE SAISI
                  $ps2=$pdo->prepare("SELECT COUNT(*) AS NB_ET 
                                             FROM logs_agpa

                                            LEFT JOIN suivi_agrement_centre_personnel 
                                                ON suivi_agrement_centre_personnel.idaffecter_agrement=logs_agpa.idaffecter_agrement
                                                WHERE logs_agpa.numagremadelivranac ='$mc' ");
                                              
  //ICI ON AFFICHE LE RESULTAT DES DONNEES CHERCHES AVEC LE MOT CLE
                                $req="SELECT logs_agpa.idlogsagpa, suivi_agrement_centre_personnel.idaffecter_agrement,
                                        date_format(logs_agpa.cdate, '%d/%m/%Y') as datelogevenement,
                                        type_agrement.nomtypeagrement,

                                date_format(suivi_agrement_centre_personnel.datedelivragrmanac, '%d/%m/%Y')
                                                      AS datedelivragrmanac,
                                     date_format(suivi_agrement_centre_personnel.datexpiragremanac, '%d/%m/%Y')
                                  AS datexpiragremanac,
                                  type_agrement.abrevnomtypeagrement,   

                                  ( CASE  WHEN (DATEDIFF(ADDDATE(suivi_agrement_centre_personnel.datexpiragremanac, 1),CURRENT_DATE ))<=0  
                                             THEN 'Agrement Expire'
                                            
                                                  ELSE 'En cours de Validité'
                                    END ) AS statut_agement,

                                             DATE_FORMAT(logs_agpa.cdate, '%H:%i:%s') AS heurevenmalog,
                                             user_agpa.nomag,user_agpa.prenag,
                                             suivi_agrement_centre_personnel.numagremadelivranac,
                                             suivi_agrement_centre_personnel.typeoperation,
                                             suivi_agrement_centre_personnel.maintein_competence,logs_agpa.action

    FROM logs_agpa


    LEFT JOIN suivi_agrement_centre_personnel ON logs_agpa.idaffecter_agrement=suivi_agrement_centre_personnel.idaffecter_agrement
    LEFT JOIN user_agpa ON suivi_agrement_centre_personnel.iduser=user_agpa.numat
    LEFT JOIN personnel_aeronautique ON suivi_agrement_centre_personnel.idpersoaero=personnel_aeronautique.idpersoaero
    LEFT JOIN type_agrement ON suivi_agrement_centre_personnel.idtypeagrement=type_agrement.idtypeagrement
    LEFT JOIN specialite_personnel_aeronautique ON personnel_aeronautique.idspecialite=specialite_personnel_aeronautique.idspecialite
    LEFT JOIN pays_adna ON personnel_aeronautique.IDPAYS=pays_adna.idpays
    LEFT JOIN signataire_peramante_adna ON signataire_peramante_adna.idsignataire=suivi_agrement_centre_personnel.idsignataire
    LEFT JOIN fonction_anac  ON fonction_anac.codefct=signataire_peramante_adna.codefct

     
                                                
                                                     WHERE  logs_agpa.numagremadelivranac ='$mc'

                                                     LIMIT $size OFFSET $offset";
              
} 
else{
 
                     $offset=$offset-$page;

                      // crer la requete pour afficher le nombre total des élements dans lE TABLEAU
                     $ps2=$pdo->prepare("SELECT COUNT(*) AS NB_ET 
                                             FROM logs_agpa

                                            LEFT JOIN suivi_agrement_centre_personnel 
                                                ON suivi_agrement_centre_personnel.idaffecter_agrement=logs_agpa.idaffecter_agrement ");
                     
                                      $req="SELECT logs_agpa.idlogsagpa, suivi_agrement_centre_personnel.idaffecter_agrement,
                                        date_format(logs_agpa.cdate, '%d/%m/%Y') as datelogevenement,
                                        type_agrement.nomtypeagrement,
                                        date_format(suivi_agrement_centre_personnel.datedelivragrmanac, '%d/%m/%Y')
                                                      AS datedelivragrmanac,
                                     date_format(suivi_agrement_centre_personnel.datexpiragremanac, '%d/%m/%Y')
                                  AS datexpiragremanac,
                                  type_agrement.abrevnomtypeagrement,   

                                  ( CASE  WHEN (DATEDIFF(ADDDATE(suivi_agrement_centre_personnel.datexpiragremanac, 1),CURRENT_DATE ))<=0  
                                             THEN 'Agrement Expire'
                                            
                                                  ELSE 'En cours de Validité'
                                    END ) AS statut_agement,

                                             DATE_FORMAT(logs_agpa.cdate, '%H:%i:%s') AS heurevenmalog,
                                             user_agpa.nomag,user_agpa.prenag,
                                             suivi_agrement_centre_personnel.numagremadelivranac,
                                             suivi_agrement_centre_personnel.typeoperation,
                                             suivi_agrement_centre_personnel.maintein_competence,logs_agpa.action

    FROM logs_agpa


    LEFT JOIN suivi_agrement_centre_personnel ON logs_agpa.idaffecter_agrement=suivi_agrement_centre_personnel.idaffecter_agrement
    LEFT JOIN user_agpa ON suivi_agrement_centre_personnel.iduser=user_agpa.numat
    LEFT JOIN personnel_aeronautique ON suivi_agrement_centre_personnel.idpersoaero=personnel_aeronautique.idpersoaero
    LEFT JOIN type_agrement ON suivi_agrement_centre_personnel.idtypeagrement=type_agrement.idtypeagrement
    LEFT JOIN specialite_personnel_aeronautique ON personnel_aeronautique.idspecialite=specialite_personnel_aeronautique.idspecialite
    LEFT JOIN pays_adna ON personnel_aeronautique.IDPAYS=pays_adna.idpays
    LEFT JOIN signataire_peramante_adna ON signataire_peramante_adna.idsignataire=suivi_agrement_centre_personnel.idsignataire
    LEFT JOIN fonction_anac  ON fonction_anac.codefct=signataire_peramante_adna.codefct

     
                                                
                                                    
                                                

                                                ORDER BY logs_agpa.idlogsagpa DESC

                                                LIMIT $size OFFSET $offset";  //OFFSET=le numero de la page
} 
 $ps=$pdo->prepare($req);
  $ps->execute();
 
 $ps2->execute();
 $ligne=$ps2->fetch(PDO::FETCH_ASSOC);
 
 $NBRE=$ligne['NB_ET'];
 
 if(($NBRE % $size)==0){
    $Nbrepage=floor($NBRE / $size);
 }else {
  $Nbrepage=floor($NBRE / $size)+1;
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
							<h1 style="color:#2060a6;font-weight:bold">
							CONSULTATION DU JOURNAL DES EVENEMENTS AGPA
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								
								
								    <!--POUR EXTRAIRE LE TABLO O FORMAT EXAEL-->
            <a target=_black title="Extraction des données" onclick="return confirm('Etes vous sûr de vouloir Extraire ce tableau Synoptique  ?');"  href="../ETATS/extraction_journal_logs.php">

                                <i style="color:green;font-weight:bold" class="ace-icon fa fa-download"></i>
                                                 <B><i style="color:green;font-weight:bold">Extraire tous le Journal</i></B> 
                                                   <i><img  src="../assets/img/logoexcle.png"></i>
                </a><br/>

			                       &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 

                             <div class="table-header" style="background-color:#03224c;color:white">
                      Tableau Synoptique des évenements réalisés lors du traitement des données
                    </div>    	
 						<!--POUR METRE LE FORMULAIRE DE RECHECHERE -->


					<form method="GET" action="journal_logs.php">
					<div class="form-group">
					    <div class="form-group has-success col-md-3">
					                    <label class="control-label"  for="inputSuccess1"><b style="color:black;font-weight:bold;background-color:HoneyDew">Recherche avec Mot clé:</b></label>

					                    <input type="text" name="motcle" class="form-control" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:black;font-weight:bold;background-color:HoneyDew" onkeypress="return keyPressHandler (event);" required="required" placeholder="Saisir N° entier Agrément|Licence" value="<?php echo ($mc)?>"/>
					                   <br/> 
					                     <button title="Recherche avec Mot clé Nom de l'Organisme :" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"> Chercher</i></button>

					                      <a title="Pour Afficher la page 0" class="btn btn-warning btn"
					                                                                                                        href="journal_logs.php">
					                                                                            <i class="glyphicon glyphicon-folder-open"> Afficher Page 0</i>
					                                                                                                    
					                                                                                                          </a>

					                                    <CENTER>
					                <h5><i class="glyphicon glyphicon-briefcase"></i> 
					                    <b>  <?php echo 'TOTAL  TROUVE = '.$NBRE." | PAGE ACTIVE    :".$page?> </b>
					                </h5></CENTER>
					              </div>

					                     
					</div>
					                  
					</form><!--FIN DU FORMULAIRE DE RECHECHERE -->
               
 						
			                          
				

								<div class="row">
									<div class="col-xs-12">
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										

										


												<table class="table table-striped table-bordered ">
          <thead>
            
            <tr>
                    <th style="background-color:#03224c;color:white">N°Evénement</th>
                    <th style="background-color:#03224c;color:white">Opération</th>
                    <th style="background-color:#03224c;color:white">Date Evénement</th>
                    <th style="background-color:#03224c;color:white">Heure Evénement</th>
                    <th style="background-color:#03224c;color:white">Commentaire Evénement</th>
                    <th style="background-color:#03224c;color:white">Agent Opération</th>
                   
                  
                   
                            
                        </tr>
                        </thead>

                        <tbody>
                        <!--FAIRE UNE BOUCLE PHP pour recuperer toutes les données de la table-->
                        <!--recupere une donnée sous forme  d1 tableau associative,ligne/lignes-->
                        <!--apres il va la stockée dans une variable appeler RES-->
                        
                        
                                                <?php while($res=$ps->fetch()){
                                                    $action=$res['action']; 
                                                    $typeoperation=$res['typeoperation']; 
                                                    $statut_agement=$res['statut_agement'];
                                                    $abrevnomtypeagrement=$res['abrevnomtypeagrement'];
                                                     $nomtypeagrement=$res['nomtypeagrement'];
                                                      $numagremadelivranac=$res['numagremadelivranac'];
                                                      $datedelivragrmanac=$res['datedelivragrmanac'];
                                                      $datexpiragremanac=$res['datexpiragremanac'];
                                                ?>
                        <tr>
                          
                            <!---POUR AFFICHER LES DONNEES-->

                        <td style="color:black"> <?php echo  $res['idlogsagpa'];?></td>

                         <td style="color:black"> 
                          <!--POUR AFFICHER LE type operation-->
                         <?php 
                             if ($action=='Inserted')
                                            {
                    echo '<a style="color:green;font-weight:bold" >Insertion pour   '.$typeoperation.'  </a>';
                                                       }
                               
                               elseif ($action=='Deleted')
                                            {
                    echo '<a style="color:red;font-weight:bold" >Suppresion  </a>';
                                                       }
                               
                              
                  
                               else {
                  echo '<a style="color:navy;font-weight:bold" >Modification pour  '.$typeoperation.' </a>';
                          ;}?>
                      </td>

                        <td ><?php echo($res['datelogevenement'])?></td>
                         <td> <?php echo  $res['heurevenmalog'];?></td>
                       
                        
                      

                      <td style="color:black"> 
                          <!--POUR AFFICHER LE commentaire-->
                         <?php 
                             if ($typeoperation=='Originale' && $action=='Inserted' && $statut_agement=='En cours de Validité')
                                                   //1er condition
                                                    {
                    echo '<a style="color:black;font-weight:bold" > Création '.$abrevnomtypeagrement.' 
                                                                '.$nomtypeagrement.' N° '.$numagremadelivranac.',
                                                              Délivré le '.$datedelivragrmanac.' Valable le '.$datexpiragremanac.'  </a>';
                                                       }
                               
                                                       // 2ime condition
                                elseif ($typeoperation=='Renouvellement' && $action=='Inserted' && $statut_agement=='En cours de Validité')
                                            
                                            {
                    echo '<a style="color:black;font-weight:bold" > Rénouvellement '.$abrevnomtypeagrement.' 
                                                                  '.$nomtypeagrement.' N° '.$numagremadelivranac.'  
                                                          ,Délivré le '.$datedelivragrmanac.' Valable le '.$datexpiragremanac.'  </a>';
                                            }

                                            //3ime condition
                                elseif ($typeoperation=='Originale' && $action=='Updated' && $statut_agement=='Agrement Expire')

                                            {
                    echo '<a style="color:black;font-weight:bold" > Rénouvellement '.$abrevnomtypeagrement.' 
                                                                  '.$nomtypeagrement.' N° '.$numagremadelivranac.'  <
                                                            ,Délivré le '.$datedelivragrmanac.' Valable le '.$datexpiragremanac.'  </a>';
                                            }

                                         ///4ime condition

                                            elseif ($typeoperation=='Originale' && $action=='Inserted' && $statut_agement=='Agrement Expire')

                                            {
                    echo '<a style="color:black;font-weight:bold" > Rénouvellement '.$abrevnomtypeagrement.' 
                                                                  '.$nomtypeagrement.' N° '.$numagremadelivranac.'  
                                                            ,Délivré le '.$datedelivragrmanac.' Valable le '.$datexpiragremanac.'  </a>';
                                            }

                                          
                                                  //3ime condition
                                elseif ($typeoperation=='Renouvellement' && $action=='Updated' && $statut_agement=='Agrement Expire')

                                            {
                    echo '<a style="color:black;font-weight:bold" > Rénouvellement '.$abrevnomtypeagrement.' 
                                                                  '.$nomtypeagrement.' N° '.$numagremadelivranac.'  
                                                            ,Délivré le '.$datedelivragrmanac.' Valable le '.$datexpiragremanac.'  </a>';
                                            }

                                                  // condition
                                elseif ($typeoperation=='Conversion' && $action=='Inserted' && $statut_agement=='En cours de Validité ')

                                            {
                    echo '<a style="color:black;font-weight:bold" > Conversion '.$abrevnomtypeagrement.' 
                                                                  '.$nomtypeagrement.' N° '.$numagremadelivranac.'  
                                                           ,Délivré le '.$datedelivragrmanac.' Valable le '.$datexpiragremanac.'  </a>';
                                            }
              // condition
                                elseif ($typeoperation=='Conversion' && $action=='Updated' && $statut_agement=='Agrement Expire')

                                            {
                    echo '<a style="color:black;font-weight:bold" > Conversion '.$abrevnomtypeagrement.' 
                                                                  '.$nomtypeagrement.' N° '.$numagremadelivranac.'  
                                                           ,Délivré le '.$datedelivragrmanac.' Valable le '.$datexpiragremanac.'  </a>';
                                            }

          // condition
                                elseif ($typeoperation=='Validation' && $action=='Updated' && $statut_agement=='Agrement Expire')

                                            {
                    echo '<a style="color:black;font-weight:bold" > Validation '.$abrevnomtypeagrement.' 
                                                                  '.$nomtypeagrement.' N° '.$numagremadelivranac.'  
                                                          ,Délivré le '.$datedelivragrmanac.' Valable le '.$datexpiragremanac.'  </a>';
                                            }

                               
                              
                  
                               else {
                  echo '<a style="color:black;font-weight:bold" > Validation '.$abrevnomtypeagrement.' 
                                                                  '.$nomtypeagrement.' N° '.$numagremadelivranac.'  
                                                          ,Délivré le '.$datedelivragrmanac.' Valable le '.$datexpiragremanac.'  </a>';
                          ;}?>
                      </td>

                       
                        
                        <td style="color:black"> <?php echo  $res['nomag'];?> <?php echo  $res['prenag'];?></td>
                    
                            
                            
                            


                        </td>
                            
                             <?php }?>
                        </tr>


                        </tbody>
                    </table>
      </div>
      
      <div>
      <?php 
      $paginateBottom=true;
      if($paginateBottom==true){?>  
     <div style="margin-left:30%">
      <ul class="nav nav-pills " style="float:center;">
        <?php 
             if($page>0){ ?>        
                  <li   class="active" > <a  href="journal_logs.php?motcle=<?php echo $mc;?>&page=<?php echo(0)?>"><< </a></li>
                  <li  class="active" > <a  href="journal_logs.php?motcle=<?php echo $mc;?>&page=<?php echo($page-1)?>">< Précédent</a></li>
          <?php } ?>
        <?php 
          $from=0;
          $max_nbre_page=10;
      //ON AFFICHE 10 ENREGISTEMA PAR PAGE
          if($page>=10){
              $from=$page-10; //ON RETIRE - 10 ENREGISTEMA PAR PAGE
              $max_nbre_page=$page+10; //ON ajoute + 10 ENREGISTEMA PAR PAGE
          }
          
          if($max_nbre_page>$Nbrepage){
            $max_nbre_page=$Nbrepage;
          }
          
        for ($i=$from;$i<$max_nbre_page;$i++) {?>
        <li class="<?php echo(($i==$page)? 'active':''); ?>">
          <a  href="journal_logs.php?motcle=<?php echo $mc;?>&page=<?php echo($i)?>"> <?php echo($i)?></a>
        </li>
        <?php } ?>
         <?php 
             if($page<$Nbrepage){ ?>
             <li class="active"><a  href="journal_logs.php?motcle=<?php echo $mc;?>&page=<?php echo($page+1)?>">Suivant ></a></li>
             <li class="active"><a  href="journal_logs.php?motcle=<?php echo $mc;?>&page=<?php echo($Nbrepage-1)?>">>></a></li>
           <?php } ?>
      </ul>
      </div>
      <?php }?>


											<br/><br/><br/><br/><br/><br/>
										</div>
									</div>
								</div>


<!--FENETRE MODAL POUR CHANGER LE MOT DE PASSER-->

<div id="add_data_Modal_ajouter_donnees" class="modal fade">
 <!--<div class="modal-dialog">-->
   <div class="modal-dialog  modal-lg">
  <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
   <div class="modal-header" style="background-color:#03224c;color:white">
    <div class="modal-header no-padding">
	<div class="table-header" style="background-color:#03224c;color:white">
		
			Fiche d'enregistrement des Organismes
	</div>

   </div>
   <div class="modal-body">

      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
      	
		
		



				    


				    <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Organisme:
                                               <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                      
                                                    <input type="text" name="nomorga"  placeholder="AFRIJET" required="required" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:black;font-weight:bold"    class="form-control" >
                                                    </div>

                                                <label class="col-sm-2 control-label"><font color="white">Trigramme:
                                                <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="text" required="required"  name="trigrorganisme" maxlength="4" placeholder="ABS" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:black;font-weight:bold"    class="form-control" >

                                                    </div>



                                                   

   					 </div> 
   					 <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Télephone:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                   
                                                    <input type="text"  name="telorga" required="required" placeholder="Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >
                                                    </div>

                                                    <label class="col-sm-2 control-label"><font color="white">E-mail:
                                                    <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="text"  name="emailorga" placeholder="Obligatoire" required="required" style="color:black;font-weight:bold"    class="form-control" >

                                                    </div>



                                                   

   					 </div> 


				    <div class="form-group has-success has-feedback">
                                          <label class="col-sm-2 control-label"><font color="white">Adresse:<i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                       
                                                  
                                                  <textarea  name="adresorga" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" required="required"    placeholder="Obligatoire"  style="color:black;font-weight:bold;border-radius: 10px"  class="form-control"   ></textarea>
                                                    </div>

                                                  <label class="col-sm-2 control-label"><font color="white">Fax:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                               <input type="text"  name="faxorga" placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >

                                                    </div>



                                                   

   					 </div> 


   					 <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Lieu de Résidence:
                                               <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                 <input type="text"  name="lieuorga" required="required" placeholder="Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >
                                                    </div>

                                                    <label class="col-sm-2 control-label"><font color="white">Date Expiration Agrément:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="date" title="Date Expiration Agrément|Documents"  name="datexpire"  placeholder="Pas Obligatoire" 
                                                    style="color:black;font-weight:bold;border-radius: 10px"    class="form-control" >
                                                    </div>



                                                   

   					 </div> 

   					 
				   



   					


    


	   

										 <!--extraction le numero IDUSER de celui qui se connecter,qui enregistre dans la bdd-->
                             <input type="hidden"  name="createur"  value="<?php echo $stat8['numat']; ?>">
                             

                            

                

                             
     <input type="submit" name="Enregistrer"  value="Enregistrer"  class="btn btn-success" />
     
    </form>
             	 
<?php
     include('../param_connexion_bdd/connexiobddAJAX.php');
       include('../param_connexion_bdd/fonction.php');

    if (isset($_POST['Enregistrer'])){

        if (isset($_POST['nomorga'])) {

            $nomorga=$_POST['nomorga'];

            if(verifier_organisme($nomorga)){

                echo "<script> alert('Entité " .$nomorga." existe deja, Veuillez reessayer !') </script>";
            }

            else{
                
               $succes=ajouter_organismes('$nomorag','$lieuorga','$adresorga','$telorga','$emailorga',
                                           '$faxorga','$trigrorganisme','$createur','$datexpire');

           
            }


        }
    }
    ?>
    			



   </div>
   <div class="modal-footer">
    </h5></CENTER>
               <center><i style="color:red;font-weight:bold">Les champs marqués d'un Astérisques(*) sont obligatoires.</i></center>


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
					  null, null,null, null, null,null,null, null,null,
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

<!--remplissage des zone des texte automatiquemet  de centre de formation,s-->


<script type="text/javascript">

    $(document).ready(function() {
        $('#idcentre').change(function () {

            var codecID = $('#idcentre option:selected').attr('data-idcentre');
            $('#codecID').val(codecID);

            var villecentre = $('#idcentre option:selected').attr('data-villecentre');
            $('#villecentre').val(villecentre);

            var contactcentre = $('#idcentre option:selected').attr('data-contactcentre');
            $('#contactcentre').val(contactcentre);

            var emailcentre = $('#idcentre option:selected').attr('data-emailcentre');
            $('#emailcentre').val(emailcentre);

            var adressecentre = $('#idcentre option:selected').attr('data-adressecentre');
            $('#adressecentre').val(adressecentre);


            var numid = $('#idcentre option:selected').attr('data-testidag');
            $('#numid').val(numid);

            
            var cache = ($('#idcentre option:selected').text()).substring(0,7);

            $('#cache').val(cache);

           

        });

    });

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
