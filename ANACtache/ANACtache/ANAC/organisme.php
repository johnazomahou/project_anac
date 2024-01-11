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
                                                      FROM organisme
                                                           WHERE organisme.nomorga 
                                                           LIKE '%$mc%' ");
  
  //ICI ON AFFICHE LE RESULTAT DES DONNEES CHERCHES AVEC LE MOT CLE
                                $req="SELECT  user_agai.nomag,user_agai.prenag,organisme.idorga,organisme.nomorga,
                                              organisme.lieuorga,organisme.adresorga,organisme.telorga,
                                              organisme.emailorga,organisme.faxorga,organisme.trigrorganisme,
                                              organisme.createur,date_format(organisme.datexpire, '%d/%m/%Y') AS datexpire,
                                              type_organisme.nomtypeorg,organisme.statutorga,organisme.cateoperater,
                                              organisme.siteactivite,organisme.createur
                

                                      FROM organisme 

                                                LEFT JOIN user_agai ON organisme.createur=user_agai.numat
                                                LEFT JOIN type_organisme ON organisme.typeorga=type_organisme.idtypeorga
 
                                            
                                                 WHERE organisme.nomorga  LIKE  '%$mc%' 
                                                 LIMIT $size OFFSET $offset";
          
} 
else{
 
                     $offset=$offset-$page;

                      // crer la requete pour afficher le nombre total des élements dans lE TABLEAU
                     $ps2=$pdo->prepare("SELECT COUNT(*) AS NB_ET  FROM organisme");
                     
                                      $req="SELECT  user_agai.nomag,user_agai.prenag,organisme.idorga,organisme.nomorga,
                                              organisme.lieuorga,organisme.adresorga,organisme.telorga,
                                              organisme.emailorga,organisme.faxorga,organisme.trigrorganisme,
                                              organisme.createur,date_format(organisme.datexpire, '%d/%m/%Y') AS datexpire,
                                              type_organisme.nomtypeorg,organisme.statutorga,organisme.cateoperater,
                                              organisme.siteactivite,organisme.createur
                
                
                

                                          FROM organisme 
                                      
                                                LEFT JOIN user_agai ON organisme.createur=user_agai.numat
                                                LEFT JOIN type_organisme ON organisme.typeorga=type_organisme.idtypeorga
 

                                                WHERE organisme.nomorga  LIKE  '%$mc%'
                                                ORDER BY organisme.idorga DESC
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
							 GESTIONS DES OPERATEURS
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								
								
								<i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer green"></i>
									  <B><i style="color:green;font-weight:bold">Ajouter Opérateur</i></B> 
			                        <button title="AJOUTER OPERATEUR" type="button" name="agdemandeur" id="agdemandeur" data-toggle="modal" data-target="#add_data_Modal_ajouter_donnees" style="background-color:green;color:white">
			                           <i class="ace-icon fa fa-eye-slash"></i>
			                           <i class="ace-icon glyphicon glyphicon-plus"></i>
			                       </button>

                             &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 
<i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer olive"></i>
                    <B><i style="color:olive;font-weight:bold">Type Activité</i></B> 
                              <a   href="type_operateur.php">
                    <button title="Gestion  type activité" type="button" name="agdemandeurD" id="agdemandeurD" data-toggle="modal" data-target="#add_data_Modal_ajouter_donneesDIVERS" style="background-color:olive;color:white">
                                 <i class="ace-icon glyphicon glyphicon-fast-backward"></i>
                                 <i class="ace-icon glyphicon glyphicon-plus"></i>
                    </button></a>

			                           
              
&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 
<i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer BLACK"></i>
                    <B><i style="color:BLACK;font-weight:bold">1. Gestion Domaine</i></B> 
                              <a   href="domaine.php"><button title="Gestion de Domaines" type="button" name="agdemandeurD" id="agdemandeurD" data-toggle="modal" data-target="#add_data_Modal_ajouter_donneesDIVERS" style="background-color:BLACK;color:white">
                                <i class="ace-icon glyphicon glyphicon-play"></i>
                                  <i class="ace-icon glyphicon glyphicon-play"></i>
                                 <i class="ace-icon glyphicon glyphicon-plus"></i>
                             </button></a>

                              &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp      
              
&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 
<i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer BLACK"></i>
                    <B><i style="color:BLACK;font-weight:bold">2.Sous-Domaine </i></B> 
                              <a   href="sous_domaine.php"><button title="Gestion Sous-Domaine" type="button" name="agdemandeurD" id="agdemandeurD" data-toggle="modal" data-target="#add_data_Modal_ajouter_donneesDIVERS" style="background-color:BLACK;color:white">
                                <i class="ace-icon glyphicon glyphicon-play"></i>
                                  <i class="ace-icon glyphicon glyphicon-play"></i>
                                 <i class="ace-icon glyphicon glyphicon-plus"></i>
                             </button></a>

                              &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp      
              
&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 
</a><br/><br/>

                             

                             <div class="table-header" style="background-color:#03224c;color:white">
                      Tableau Synoptique des Opérateurs
                    </div>    	
 						<!--POUR METRE LE FORMULAIRE DE RECHECHERE -->


					<form method="GET" action="organisme.php">
					<div class="form-group">
					    <div class="form-group has-success col-md-3">
					                    <label class="control-label"  for="inputSuccess1"><b style="color:black;font-weight:bold;background-color:HoneyDew">Recherche avec Mot clé:</b></label>

					                    <input type="text" name="motcle" class="form-control" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:black;font-weight:bold;background-color:HoneyDew" required="required" placeholder="Saisir Nom de l'Opérateur" value="<?php echo ($mc)?>"/>
					                   <br/> 
					                     <button title="Recherche avec Mot clé Nom de l'Organisme :" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"> Chercher</i></button>

					                      <a title="Pour Afficher la page 0" class="btn btn-warning btn"
					                                                                                                        href="organisme.php">
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
                    <th style="background-color:#03224c;color:white">N°Opération</th>
                     <th style="background-color:#03224c;color:white">Agent d'Opération</th>
                    <th style="background-color:#03224c;color:white">Type Activité</th>
                    <th style="background-color:#03224c;color:white">Type Exploitation</th>
                    <th style="background-color:#03224c;color:white">Opérateurs</th>
                    <th style="background-color:#03224c;color:white">Zone Exploitation</th>
                    <th style="background-color:#03224c;color:white">Trigramme</th>
                    <th style="background-color:#03224c;color:white">Adresse</th>
                    <th style="background-color:#03224c;color:white">Télephones</th>
                    <th style="background-color:#03224c;color:white">Lieu(Base Principale)</th>
                    <th style="background-color:#03224c;color:white">Site Activité</th>
                    <th style="background-color:#03224c;color:white">E-mail</th>
                    <th style="background-color:#03224c;color:white">Fax</th>
                    <th style="background-color:#03224c;color:white">Date Expiration </th>
                    <th style="background-color:#03224c;color:white">Actions</th>
                             
                            
                        </tr>
                        </thead>

                        <tbody>
                        <!--FAIRE UNE BOUCLE PHP pour recuperer toutes les données de la table-->
                        <!--recupere une donnée sous forme  d1 tableau associative,ligne/lignes-->
                        <!--apres il va la stockée dans une variable appeler RES-->
                        
                        
                                                <?php while($res=$ps->fetch()){
                                                      $createur=$res['createur'];
                                                      $nomag=$res['nomag'];
                                                      $prenag=$res['prenag'];
                                                ?>
                        <tr>
                          
                            <!---POUR AFFICHER LES DONNEES-->

                        <td style="color:black"> <?php echo  $res['idorga'];?></td> 
                        <td style="color:black"> 
                                   <?php 
                                       if ($createur=='0')
                                                      {
                                          echo '<a style="color:green;font-weight:bold" >   </a>';
                                                                 }
                                         else {
                                      echo '<a style="color:black" > '.$prenag.'     <br/> '.$nomag.'  </a>';
                                    ;}?>
                           </td>

                        <td style="color:black"> <?php echo  $res['nomtypeorg'];?></td>
                        <td style="color:black"> <?php echo  $res['cateoperater'];?></td>  
                        <td style="color:black"> <?php echo  $res['nomorga'];?></td> 
                        <td style="color:black"> <?php echo  $res['statutorga'];?></td> 
                        <td style="color:black"> <?php echo  $res['trigrorganisme'];?></td> 
                        <td style="color:black"> <?php echo  $res['adresorga'];?></td>
                        <td style="color:black"> <?php echo  $res['telorga'];?></td>  
                          <td style="color:black"> <?php echo  $res['lieuorga'];?></td> 
                          <td style="color:black"> <?php echo  $res['siteactivite'];?></td>   
                          <td style="color:navy"> <?php echo  $res['emailorga'];?></td> 
                        <td style="color:black"> <B><?php echo  $res['faxorga'];?></B></td>  
                         <td style="color:black"> <B><?php echo  $res['datexpire'];?></B></td>  

                    <td> <div class="hidden-sm hidden-xs action-buttons">
                                

                                <!--BTN POUR VOIR LA DONNE SELECTIONNEE-->
                                  <a class="blue" title="Voir" onclick="return confirm('Etes vous sur de vouloir consulter cette ligne?')"
                                                          href="voir_detail_organisme.php?idorga=<?php echo $res['idorga'] ?>">
                                                              <span class="ace-icon fa fa-search-plus bigger-130"></span>
                                                      </a>


                                <!--BTN POUR MODIFIER LA DONNE SELECTIONNEE-->

                                <!--SEUL LES ADMIN  PEUVENT MODIFIER-->
                                <?php if ($_SESSION['user']['profil']=='Administrateur') {?>
                                  <a class="green" title="Modifier" onclick="return confirm('Etes vous sur de vouloir modifier cette ligne ?')"
                                                          href="update_organisme.php?idorga=<?php echo $res['idorga'] ?>">
                                                              <span class="ace-icon fa fa-pencil bigger-130"></span>
                                                      </a>
                                                       <?php }?>

                                                      <!--SEUL LES  SUPERADMIN ,SUPERUTILISATEUR PEUVENT MODIFIER-->

                                                       <?php if ($_SESSION['user']['profil']=='Super_Utilisateur') {?>
                                  <a class="green" title="Modifier" onclick="return confirm('Etes vous sur de vouloir modifier cette ligne ?')"
                                                          href="update_organisme.php?idorga=<?php echo $res['idorga'] ?>">
                                                              <span class="ace-icon fa fa-pencil bigger-130"></span>
                                                      </a>
                                                       <?php }?>


                                                       <!--SEUL LES USER POWER PEUVENT MODIFIER-->

                                                       <?php if ($_SESSION['user']['profil']=='Utilisateur_Power') {?>
                                  <a class="green" title="Modifier" onclick="return confirm('Etes vous sur de vouloir modifier cette ligne ?')"
                                                          href="update_organisme.php?idorga=<?php echo $res['idorga'] ?>">
                                                              <span class="ace-icon fa fa-pencil bigger-130"></span>
                                                      </a>
                                                       <?php }?>
                                


                                
                                

                                

                              </div></td>  
                    
                            
                            
                            


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
                  <li   class="active" > <a  href="organisme.php?motcle=<?php echo $mc;?>&page=<?php echo(0)?>"><< </a></li>
                  <li  class="active" > <a  href="organisme.php?motcle=<?php echo $mc;?>&page=<?php echo($page-1)?>">< Précédent</a></li>
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
          <a  href="organisme.php?motcle=<?php echo $mc;?>&page=<?php echo($i)?>"> <?php echo($i)?></a>
        </li>
        <?php } ?>
         <?php 
             if($page<$Nbrepage){ ?>
             <li class="active"><a  href="organisme.php?motcle=<?php echo $mc;?>&page=<?php echo($page+1)?>">Suivant ></a></li>
             <li class="active"><a  href="organisme.php?motcle=<?php echo $mc;?>&page=<?php echo($Nbrepage-1)?>">>></a></li>
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
   
   <div class="modal-dialog modal-fullscreen-sm-down">...</div><!--POUR mettre la fenetre en PLEIN ECRAN MODALE-->

  <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
   <div class="modal-header" style="background-color:#03224c;color:white">
    <div class="modal-header no-padding">
	<div class="table-header" style="background-color:#03224c;color:white">
		
			Fiche d'enregistrement des Opérateurs
	</div>

   </div>
   <div class="modal-body">

      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
      	
	

				    <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Type Activité:
                                               <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                    
                                        <select class="chosen-select form-control" id="form-field-select-3" name="typeorga"  style="color:#2060a6;background-color:white;font-weight:bold">

                                                       <option value="">Choisir  Type Activité</option>

                                                         <?php
                                                                while ($data2 = mysqli_fetch_assoc($req1)) {
                                                                    ?>
                                                                          <option value="<?php echo $data2['idtypeorga'];?>"
                                                                            data-idtypeorga="<?php $data2['idtypeorga'];?>"
                                                                                               
                                                                            data-nomtypeorg="<?php echo $data2['nomtypeorg'];?>"
                                                                            data-testidag="<?php echo $data2['idtypeorga'];?>">
                                                                            <?php echo $data2['nomtypeorg'];?>      </option>
                                                                    <?php
                                                                }
                                                                ?>


                                               </select>

                                                    </div>

                                                <label class="col-sm-2 control-label"><font color="white">Nom Opérateur:
                                                <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="text" name="nomorga"  placeholder="AFRIJET" required="required" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:black;font-weight:bold"    class="form-control" >

                                                    </div>



                                                   

   					 </div> 

                <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Site Activité:
                                               <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                      
                                                    <input type="text" name="siteactivite"  placeholder="Obligatoire"   required="required" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:black;font-weight:bold"    class="form-control" >
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
                                                      
                                                   
                                                    <input type="text"  name="telorga"  placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >
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
                                               <label class="col-sm-2 control-label"><font color="white">Lieu(Base Principale):
                                               <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                 <input type="text"  name="lieuorga" required="required" placeholder="Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >
                                                    </div>

                                                    <label class="col-sm-2 control-label"><font color="white">Date Expiration (Autorisation):</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="date" title="Date Expiration Agrément|Documents"  name="datexpire"  placeholder="Pas Obligatoire" 
                                                    style="color:black;font-weight:bold;border-radius: 10px"    class="form-control" >
                                                    </div>



                                                   

   					 </div> 

              <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Type d'exploitation:
                                               </font></label>
                                                     <div class="col-sm-4">
                                                


                    <select  id="cateoperater" class="form-control"  style="color:black;font-weight:bold"  name="cateoperater"  data-rel="chosen">

                          <option  ></option>

                              <OPTION VALUE="TRANSPORT AERIEN COMMERCIAL PAX" >TRANSPORT AERIEN COMMERCIAL PAX</OPTION>
                              <OPTION VALUE="TRANSPORT AERIEN COMMERCIAL FRET">TRANSPORT AERIEN COMMERCIAL FRET</OPTION>
                              <OPTION VALUE="TRANSPORT AERIEN COMMERCIAL EVASAN">TRANSPORT AERIEN COMMERCIAL EVASAN</OPTION>
                              <OPTION VALUE="TRANSPORT AERIEN COMMERCIAL  PAX/FRET">TRANSPORT AERIEN COMMERCIAL  PAX/FRET</OPTION>
                              <OPTION VALUE="TRANSPORT AERIEN COMMERCIAL PAX/FRET/EVASAN">TRANSPORT AERIEN COMMERCIAL PAX/FRET/EVASAN</OPTION>
                              <OPTION VALUE="AVIATION GENERALE">AVIATION GENERALE</OPTION>
                              <OPTION VALUE="TRAVAIL AERIEN" >TRAVAIL AERIEN</OPTION>
                              <OPTION VALUE="ANS" >ANS</OPTION>
                              <OPTION VALUE="ATO" >ATO</OPTION>
                              <OPTION VALUE="AVSEC" >AVSEC</OPTION>
                              <OPTION VALUE="CEMA" >CEMA</OPTION>
                              <OPTION VALUE="EXAMINATEURS DESIGNES" >EXAMINATEURS DESIGNES</OPTION>
                              <OPTION VALUE="MD" >MD</OPTION>
                              <OPTION VALUE="OMA" >OMA</OPTION>
                              <OPTION VALUE="SAFA" >SAFA</OPTION>
                              <OPTION VALUE="AUTRE(s)" >AUTRE(s)</OPTION>
                      </select>
                                                    </div>

                         <label class="col-sm-2 control-label"><font color="white">Zone d'Exploitation:</font></label>
                                                     <div class="col-sm-4">
                                                      <div class="radio">
                          <label>
                            <input name="statutorga"  value="INTERNATIONALE"  type="radio" class="ace" />
                            <span class="lbl" style="color:white;font-weight:bold"> INTERNATIONALE</span>
                          </label><br/>

                          <label>
                            <input name="statutorga" checked="checked" value="NATIONALE" type="radio" class="ace" />
                            <span class="lbl" style="color:white;font-weight:bold"> NATIONALE</span>
                          </label>

                        </div>
                                          
                                                  
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
                
               $succes=ajouter_organismes('$nomorag','$typeorga','$lieuorga','$adresorga','$telorga','$emailorga',
                                           '$faxorga','$statutorga','$trigrorganisme','$createur','$datexpire','$siteactivite','$cateoperater');

           
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
<!--POUR FAIRE LKES LISTE DEROULANTE AVEC LOPTION DE RECHERCHER-->
        <script src="../assets/js/bootstrap-select.min.js"></script>
          <script src="../assets/js/tousjs/defaults-*.min.js"></script>

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
        })
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
