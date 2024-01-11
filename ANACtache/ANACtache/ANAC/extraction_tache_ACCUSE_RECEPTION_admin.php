<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_CTYPE, 'fr_FR.UTF-8');
//pour exporter au format word
			
//header("Content-type: application/vnd.ms-word");
//header("Content-Disposition: attachment;Filename=document_name.doc");

//pour exporter au format excel
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=EXTRACTION TACHE.xls");


			 require_once("../param_connexion_bdd/connexiobddAJAX.php");
			 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http:w3.org/1999/xhtml">
<head>
<menregistredans http-equiv="content-type" content="text/html; charset=utf-8" />
<title>ANACtache</title>
</head>
<body>

<table width="100%" border="2" cellspacing="0" cellpadding="0"><br><br>
	
	 <CENTER><i><b><H3 bgcolor="skyblue">TABLEAU SYNOPTIQUE COURRIER ET ACTIVITES</H3></CENTER></i></b>
	 <br><br><br><br><br><br><br><br>
	 <tr bgcolor="#0000FF">
		<td style="color:white;font-weight:bold"><strong>Agent d'operation</strong></td>
		<td style="color:white;font-weight:bold"><strong>Date Courrier</strong></td>
		<td style="color:white;font-weight:bold"><strong>Date reunion</strong></td>
		<td style="color:white;font-weight:bold"><strong>Expediteur</strong></td>
		<td style="color:white;font-weight:bold"><strong>Date Attribution</strong></td>
		<td style="color:white;font-weight:bold"><strong>Delai deja Ecoule</strong></td>
		<td style="color:white;font-weight:bold"><strong>Personnel</strong></td>
		<td style="color:white;font-weight:bold"><strong>Ref.ANAC</strong></td>
		<td style="color:white;font-weight:bold"><strong>Objet Tache</strong></td>
		<td style="color:white;font-weight:bold"><strong>Organisme a Agreer</strong></td>
		<td style="color:white;font-weight:bold"><strong>Formulaire Utilise</strong></td>
		<td style="color:white;font-weight:bold"><strong>Responsable Dossier</strong></td>
		<td style="color:white;font-weight:bold"><strong>Type Aeronef</strong></td>
		<td style="color:white;font-weight:bold"><strong>Immatriculation</strong></td>
		<td style="color:white;font-weight:bold"><strong>Domaine</strong></td>
		<td style="color:white;font-weight:bold"><strong>Date reprise dossier</strong></td>
		<td style="color:white;font-weight:bold"><strong>Suivi du Dossier</strong></td>
		<td style="color:white;font-weight:bold"><strong>Enregistre dans </strong></td>

		<td style="color:white;font-weight:bold"><strong></strong></td>
		<td style="color:white;font-weight:bold"><strong>Statut</strong></td>
		<td style="color:white;font-weight:bold"><strong>Date Cloture</strong></td>
		<td style="color:white;font-weight:bold"><strong>Duree Traitement (Jrs) </strong></td>
		<td style="color:white;font-weight:bold"><strong>Observation </strong></td>
		
		
		
	 </tr>
	 
	
			<?php
			
	 $requete="SELECT suivi_tache.idtache,emetteur_tache.idemetteur,emetteur_tache.nomemetteur, attributeur_tache.idattributeur,
                    date_format(suivi_tache.datecloture, '%d/%m/%Y') as datecloture,
                     attributeur_tache.nomattributeur,suivi_tache.numeroodre,suivi_tache.numat, user_anacstat.prenag,
                     user_anacstat.nomag,suivi_tache.dateheuresaisi,suivi_tache.objettache, 
                     date_format(suivi_tache.dateattribution, '%d/%m/%Y') as dateattribution, 
                     date_format(suivi_tache.dateprovisiore, '%d/%m/%Y') as dateprovisiore, 
                     date_format(suivi_tache.datereponsereltache, '%d/%m/%Y') as datereponsereltache, 
                     DATEDIFF(suivi_tache.datecloture,suivi_tache.dateattribution) AS tempsmis, 
                     suivi_tache.objettache,suivi_tache.observation_attribution,
                     suivi_tache.observation_retour,suivi_tache.typetache ,statut_tache.nomstatuttache,
                     suivi_tache.idstatuttache,DATEDIFF(CURRENT_DATE,suivi_tache.dateattribution) AS nbrejourecoule,
                     suivi_tache.numcourier_ref_anac,
                    date_format(suivi_tache.dateenrgecouranac, '%d/%m/%Y') as dateenrgecouranac,statut_tache.nomstatuttache,
 					organisme.nomorga,suivi_tache.formutilise,personnel_aeronautique.nompersoaero,
 					personnel_aeronautique.prenompersoaero,aeronef_adna.idaeronef,aeronef_adna.nomaeronef,
 					aeronef_adna.numserie,aeronef_adna.immataeronef,domaine.iddomaine,domaine.nomdomaine,
 					date_format(suivi_tache.datereprisecomplema, '%d/%m/%Y') AS datereprisecomplema,
 					suivi_tache.suividoc,suivi_tache.enregistredans,suivi_tache.documadelivre,
 					suivi_tache.fichier,suivi_tache.file_url,suivi_tache.fichier_courrier_entrant,
 					suivi_tache.file_url_courier_entrant, date_format(suivi_tache.datereunion, '%d/%m/%Y') AS datereunion,
 					formulaire_utilise_anactache.idformutilise,document_delivre_anactache.iddocdelivre,
                    formulaire_utilise_anactache.nomformulaireutilise,document_delivre_anactache.nomdocdelivre


FROM suivi_tache


LEFT JOIN emetteur_tache ON emetteur_tache.idemetteur=suivi_tache.idemetteur
LEFT JOIN attributeur_tache ON attributeur_tache.idattributeur=suivi_tache.idattributeur
LEFT JOIN user_anacstat ON user_anacstat.numat=suivi_tache.numat
LEFT JOIN statut_tache ON statut_tache.idstatuttache=suivi_tache.idstatuttache
LEFT  JOIN organisme ON organisme.idorga=suivi_tache.idorga
LEFT JOIN personnel_aeronautique ON personnel_aeronautique.idpersoaero=suivi_tache.idpersoaero
LEFT JOIN aeronef_adna ON aeronef_adna.idaeronef=suivi_tache.idaeronef
LEFT JOIN domaine ON  domaine.iddomaine=suivi_tache.iddomaine
LEFT JOIN formulaire_utilise_anactache ON formulaire_utilise_anactache.idformutilise=suivi_tache.formutilise
LEFT JOIN document_delivre_anactache ON document_delivre_anactache.iddocdelivre=suivi_tache.documadelivre


                          WHERE   suivi_tache.separer_tache_dj_anac='ANAC'
                          AND statut_tache.idstatuttache='0009'
                                 
                                 ORDER BY suivi_tache.idtache DESC ";
					$reponse = mysqli_query($db, $requete) or die (mysqli_error($db));
											
			while($res=mysqli_fetch_assoc($reponse)){

			     
			   
			 
			   $nomag=$res["nomag"];
			   $prenag=$res["prenag"];
			   $dateenrgecouranac=$res["dateenrgecouranac"];
			   $datereunion=$res["datereunion"];
			   
			   $nomemetteur=$res["nomemetteur"];
			   $dateattribution=$res["dateattribution"];
			   $nbrejourecoule=$res["nbrejourecoule"];
			   $nompersoaero=$res["nompersoaero"];
			   $prenompersoaero=$res["prenompersoaero"];
			   $numcourier_ref_anac=$res["numcourier_ref_anac"];
			   
			   $objettache=$res["objettache"];
			   $nomorga=$res["nomorga"];
			   $formutilise=$res["formutilise"];
			   $nomattributeur=$res["nomattributeur"];
			   $nomaeronef=$res["nomaeronef"];
			   $immataeronef=$res["immataeronef"];
			   $nomdomaine=$res["nomdomaine"];
			   $datereprisecomplema=$res["datereprisecomplema"];
			   $suividoc=$res["suividoc"];
			   $dateheuresaisi=$res["dateheuresaisi"];
			   $documadelivre=$res["documadelivre"];
			   $enregistredans=$res["enregistredans"];
			   $nomstatuttache=$res["nomstatuttache"];
			   $datecloture=$res["datecloture"];
			   $tempsmis=$res["tempsmis"];
			   
			   $observation_attribution=$res["observation_attribution"];

			   $nomformulaireutilise=$res["nomformulaireutilise"];
			  
			   $idstatuttache=$res["idstatuttache"];

			                                     
			 
			?>
			<tr>
					
					<td> <?php echo $nomag; ?> <?php echo $prenag; ?> Le  <?php echo $dateheuresaisi; ?>   </td>
					
					<td><?php 
                                    
                                  if ($dateenrgecouranac=='00/00/0000'){

                                    echo '';} 
                                                          
                                else {
                                  echo '<a style="color:black">'.$dateenrgecouranac.'  </a>';}?>

                    </td>

					<td> <?php 
                                    
                                  if ($datereunion=='00/00/0000'){

                                    echo '';} 
                                                          
                                else {
                                  echo '<a style="color:black">'.$datereunion.'  </a>';}?>     
                    </td>

					<td><?php echo $nomemetteur; ?>    </td>

					<td><?php echo $dateattribution; ?>    </td>

					<td> <?php 
                                     //datecloture = 00/00/00 = VIDE ON AFFICHE RIEN
                                                      if ($nbrejourecoule=='0'){

                          echo ''; } 
                                                          
                                    else {
                                      
                                        echo '<a style="color:#03224c;font-weight:bold"> '.$nbrejourecoule.' Jr(s) </a>';}?>
					   </td>

					<td><?php echo $nompersoaero; ?>  <?php echo $prenompersoaero; ?>   </td>

					<td><?php echo $numcourier_ref_anac; ?>    </td>
					<td><?php echo $objettache; ?>    </td>
					<td><?php echo $nomorga; ?>    </td>
					<td><?php echo $nomformulaireutilise; ?>    </td>
					<td><?php echo $nomattributeur; ?>    </td>
					<td><?php echo $nomaeronef; ?>    </td>
					<td><?php echo $immataeronef; ?>    </td>
					<td><?php echo $nomdomaine; ?>    </td>
					
					<td>  <?php 
                                    
                                  if ($datereprisecomplema=='00/00/0000'){

                                    echo '';} 
                                                          
                                else {
                                  echo '<a style="color:black">'.$datereprisecomplema.'  </a>';}?>

					    </td>

					<td><?php echo $suividoc; ?>    </td>
					<td><?php echo $enregistredans; ?>    </td>

					

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
                    

                      
					
					<td> <?php 
                                     //datecloture = 00/00/00 = VIDE ON AFFICHE RIEN
                                                      if ($datecloture=='00/00/0000'){

                          echo ''; } 
                                                          
                                    else {
                                      
                                        echo '<a style="color:#03224c;font-weight:bold"> '.$datecloture.' </a>';}?>
  					 </td>

					<td><?php echo $tempsmis; ?>    </td>

					<td><?php echo $observation_attribution; ?>    </td>
					
					
					

					
					   
			</tr>
			
			<?php
			
			}
			
			?>
		
</table>	 

</body>
</html>



