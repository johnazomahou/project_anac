<?php 

 //CONNEXION A LA BDD
$db = new PDO('mysql:host=localhost;dbname=si_anac;charset=utf8','root','eth@n@2018');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//POUR FORCER l'utf8 LE Problème d'encodage sur LES requête SQL dans ta fonction connectBDD().
//$pdo->query('SET NAMES utf8');
$db->exec("SET CHARACTER SET utf8");

extract($_POST);

//CREATION ET DECLARATION DES VARIABLE DANS LORDRE POUR INSERER DANS LA TABLE  emetteur_tache

   if (isset($numat) and  isset($dateheuresaisi)   and isset($nomemetteur)) {
   		
		
		//ON CREE UNE REQUETE SQL POUR VERIFIER SI LA DONNEE EXISTE DEJA DANS LA BDD POUR EVITER LES DOUBLONS
   		$rowverify = $db->prepare("SELECT * FROM emetteur_tache WHERE nomemetteur=?");
		
   		$rowverify->execute(array($nomemetteur));

   		if (count($rowverify->fetchAll())<1) {
			
		//SI PAS DE BOUBLONS ON INSERT DANS LA TABLE
   			$saveemetteur_tache = $db->prepare("INSERT INTO emetteur_tache(numat,dateheuresaisi,nomemetteur) VALUES(?,?,?)");
   			
			$saveemetteur_tache->execute(array($numat,$dateheuresaisi,$nomemetteur));
   		
            
		//APRES INSERTION ON AFFICHE LA DONNEE DANS LA LISTE DEROULANTE PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX	
            $sql="SELECT emetteur_tache.idemetteur,emetteur_tache.nomemetteur 
			
								FROM emetteur_tache


                WHERE nomemetteur!=''

               GROUP BY nomemetteur

               ORDER BY idemetteur DESC";
            $req = $db->prepare($sql);
            $req->execute(); ?>
		
		<!--APRES AVOIR INSERER LE RESULTANT ON AFFICHE LE RESULTANT DANS UN NOUVEAU SELECT PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX -->	
           
		   <select  id="idemetteur" class="form-control" name="idemetteur"  data-rel="chosen"  id="idemetteur" style="color:black;font-weight:bold" >
            
			
			
			<?php while($response=$req->fetch(PDO::FETCH_OBJ)){                                                                      
              
			  echo '<option value='.$response->idemetteur.' style="color:black;font-weight:bold" >'.$response->nomemetteur.'</option>';
			  
            } ?>
			
            </select>

   		<?php }else{
   			echo "0";
   		}
   }



//SCRIPT POUR INSERTION DANS UNE AUTRE TABLES


   //CREATION ET DECLARATION DES VARIABLE DANS LORDRE POUR INSERER DANS LA TABLE  emetteur_tache


  elseif (isset($iduser) and isset($dateheuresaisi) and isset($nompersoaero) and isset($prenompersoaero)
              and isset($datenaispersoaero) and isset($lieunaispersoaero) and isset($centre_affectation) and isset($idorga) 
              and isset($sexe) and isset($IDPAYS) and isset($personel_partie) and isset($idtypepersoaero) and isset($idspecialite)
              and isset($adresspersoaero) and isset($telpersoaero) and isset($mailpersoaero) and isset($statut_personnel)
             and isset($statut_personel_examinateur) and isset($statut_personel_instructeur)  and isset($statut_personnel_agrema_pnt)
            and isset($statut_personnel_agrema_pnt_cel)  and isset($statut_personnel_agrema_pnt_ael)) {
   		


  //ON CREE UNE REQUETE SQL POUR VERIFIER SI LA NOM+PRENOM EXISTE DEJA DANS LA BDD POUR EVITER LES DOUBLONS
          
   		$rowverify = $db->prepare("SELECT * FROM personnel_aeronautique WHERE nompersoaero=? AND prenompersoaero=?");

   		$rowverify->execute(array($nompersoaero,$prenompersoaero));


  //SI PAS DE BOUBLONS ON INSERT DANS LA TABLE
   		if (count($rowverify->fetchAll())<1) {

   			$savepersonnel_aeronautique = $db->prepare("INSERT INTO personnel_aeronautique (iduser, dateheuresaisi, 
                                                                                            nompersoaero,prenompersoaero,datenaispersoaero,
                                                                                            lieunaispersoaero,centre_affectation,idorga,
                                                                                            sexe,IDPAYS,personel_partie,idtypepersoaero,
                                                                                             idspecialite, adresspersoaero, 
                                                                                             telpersoaero,mailpersoaero, statut_personnel, 
                                                                                             statut_personel_examinateur, 
                                                                                             statut_personel_instructeur, 
                                                                                             statut_personnel_agrema_pnt, 
                                                                                             statut_personnel_agrema_pnt_cel, 
                                                                                             statut_personnel_agrema_pnt_ael)

																VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
																
   			$savepersonnel_aeronautique->execute(array($iduser,$dateheuresaisi,$nompersoaero,$prenompersoaero,
                                                      $datenaispersoaero,$lieunaispersoaero,$centre_affectation,$idorga,$sexe,$IDPAYS,
                                                      $personel_partie,$idtypepersoaero,$idspecialite,$adresspersoaero, $telpersoaero, 
                                                      $mailpersoaero, $statut_personnel,$statut_personel_examinateur,
                                                      $statut_personel_instructeur,$statut_personnel_agrema_pnt, 
                                                      $statut_personnel_agrema_pnt_cel,$statut_personnel_agrema_pnt_ael));
   		



      //APRES INSERTION ON AFFICHE LA DONNEE DANS LA LISTE DEROULANTE PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX 
        
            
            $sql_personnel="SELECT personnel_aeronautique.idpersoaero,personnel_aeronautique.nompersoaero,
                                  personnel_aeronautique.prenompersoaero 
                          			
                          							FROM personnel_aeronautique

                          									ORDER BY personnel_aeronautique.idpersoaero DESC";

            $req_personnel = $db->prepare($sql_personnel);
            $req_personnel->execute(); ?>


<!--APRES AVOIR INSERER LE RESULTANT ON AFFICHE LE RESULTANT DANS UN NOUVEAU SELECT PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX --> 
        
            <select  id="idpersoaero" class="form-control" name="idpersoaero"  data-rel="chosen"  id="idpersoaero" style="color:black;font-weight:bold" >
            <?php while($response=$req_personnel->fetch(PDO::FETCH_OBJ)){                                                                      
                echo '<option value='.$response->idpersoaero.' style="color:black;font-weight:bold" >
                              '.$response->nompersoaero.'   '.$response->prenompersoaero.'</option>';
            } ?>
            </select>

   		<?php }else{
   			echo "0";
   		}
   }




//SCRIPT POUR INSERTION DANS UNE AUTRE TABLES


   //CREATION ET DECLARATION DES VARIABLE DANS LORDRE POUR INSERER DANS LA TABLE  domaine


  elseif (isset($nomdomaine)  and isset($libel_domaine)) {
      


  //ON CREE UNE REQUETE SQL POUR VERIFIER SI LA NOM+PRENOM EXISTE DEJA DANS LA BDD POUR EVITER LES DOUBLONS
          
      $rowverify = $db->prepare("SELECT * FROM domaine WHERE nomdomaine=? ");

      $rowverify->execute(array($nomdomaine));


  //SI PAS DE BOUBLONS ON INSERT DANS LA TABLE
      if (count($rowverify->fetchAll())<1) {

        $savedomaine = $db->prepare("INSERT INTO domaine (nomdomaine,libel_domaine)

                                VALUES(?,?)");
                                
        $savedomaine->execute(array($nomdomaine,$libel_domaine));
      



      //APRES INSERTION ON AFFICHE LA DONNEE DANS LA LISTE DEROULANTE PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX 
        
            
            $sql_domaine="SELECT domaine.iddomaine ,domaine.nomdomaine
                                  
                                
                                        FROM domaine

                                            ORDER BY domaine.iddomaine  DESC";

            $req_domaine = $db->prepare($sql_domaine);
            $req_domaine->execute(); ?>


<!--APRES AVOIR INSERER LE RESULTANT ON AFFICHE LE RESULTANT DANS UN NOUVEAU SELECT PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX --> 
        
            <select  id="iddomaine" class="form-control" name="iddomaine"  data-rel="chosen"  id="iddomaine" style="color:black;font-weight:bold" >
            <?php while($reponse_domaine=$req_domaine->fetch(PDO::FETCH_OBJ)){                                                                      
                echo '<option value='.$reponse_domaine->iddomaine .' style="color:black;font-weight:bold" > '.$reponse_domaine->nomdomaine.'   </option>';
            } ?>
            </select>

      <?php }else{
        echo "0";
      }
   }



   


//SCRIPT POUR INSERTION DANS UNE AUTRE TABLES


   //CREATION ET DECLARATION DES VARIABLE DANS LORDRE POUR INSERER DANS LA TABLE  aeronef_adna


  elseif (isset($nomaeronef) and isset($immataeronef)  and isset($numat) and isset($datesaizi) and isset($tonnage)  
                             and isset($numserie) and isset($nbremoteur) and isset($enverugur)  and isset($drone)) {
      


  //ON CREE UNE REQUETE SQL POUR VERIFIER SI LA $nomaeronef+$immataeronef EXISTE DEJA DANS LA BDD POUR EVITER LES DOUBLONS
          
      $rowverify = $db->prepare("SELECT * FROM aeronef_adna WHERE nomaeronef=? AND immataeronef=?");

      $rowverify->execute(array($nomaeronef,$immataeronef));


  //SI PAS DE BOUBLONS ON INSERT DANS LA TABLE
      if (count($rowverify->fetchAll())<1) {

        $saveaeronef_adna = $db->prepare("INSERT INTO aeronef_adna (nomaeronef,immataeronef,numat,datesaizi,tonnage,
                                                                    numserie,nbremoteur,enverugur,drone)

                                VALUES(?,?,?,?,?,?,?,?,?)");
                                
        $saveaeronef_adna->execute(array($nomaeronef,$immataeronef,$numat,$datesaizi,$tonnage,$numserie,$nbremoteur,$enverugur,$drone));
      



      //APRES INSERTION ON AFFICHE LA DONNEE DANS LA LISTE DEROULANTE PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX 
        
            
            $sql_type_aeronef="SELECT aeronef_adna.idaeronef,aeronef_adna.nomaeronef,aeronef_adna.immataeronef 
                                
                                        FROM aeronef_adna

                                            ORDER BY aeronef_adna.idaeronef DESC";

            $req_type_aeronef = $db->prepare($sql_type_aeronef);
            $req_type_aeronef->execute(); ?>


<!--APRES AVOIR INSERER LE RESULTANT ON AFFICHE LE RESULTANT DANS UN NOUVEAU SELECT PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX --> 
        
    <select  id="idaeronef" class="form-control" name="idaeronef"  data-rel="chosen"  id="idaeronef" style="color:black;font-weight:bold" >
            <?php while($response=$req_type_aeronef->fetch(PDO::FETCH_OBJ)){                                                                      
                echo '<option value='.$response->idaeronef.' style="color:black;font-weight:bold" >
                              '.$response->nomaeronef.'  | '.$response->immataeronef.'</option>';
            } ?>
            </select>

      <?php }else{
        echo "0";
      }
   }









//SCRIPT POUR INSERTION DANS UNE AUTRE TABLES


   //CREATION ET DECLARATION DES VARIABLE DANS LORDRE POUR INSERER DANS LA TABLE  organisme


   elseif (isset($nomorga) and isset($lieuorga) and isset($trigrorganisme) 
                          and isset($adresorga) and isset($telorga) and isset($emailorga)) {
  
      


  //ON CREE UNE REQUETE SQL POUR VERIFIER SI LA $nomorga EXISTE DEJA DANS LA BDD POUR EVITER LES DOUBLONS
          
      $rowverify = $db->prepare("SELECT * FROM organisme WHERE nomorga=?");

      $rowverify->execute(array($nomorga));


  //SI PAS DE BOUBLONS ON INSERT DANS LA TABLE
      if (count($rowverify->fetchAll())<1) {

        $saveorganisme = $db->prepare("INSERT INTO organisme (nomorga,trigrorganisme,lieuorga,adresorga,telorga,emailorga,faxorga)

                                VALUES(?,?,?,?,?,?,?)");
                                
        $saveorganisme->execute(array($nomorga,$trigrorganisme,$lieuorga,$adresorga,$telorga,$emailorga,$faxorga));
      



      //APRES INSERTION ON AFFICHE LA DONNEE DANS LA LISTE DEROULANTE PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX 
        
            
            $sql_organisme="SELECT organisme.idorga,organisme.nomorga

                                
                                        FROM organisme

                                            ORDER BY organisme.idorga DESC";

            $req_organisme = $db->prepare($sql_organisme);
            $req_organisme->execute(); ?>


<!--APRES AVOIR INSERER LE RESULTANT ON AFFICHE LE RESULTANT DANS UN NOUVEAU SELECT PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX --> 
        
    <select  id="idorga" class="form-control" name="idorga"  data-rel="chosen"  id="idorga" style="color:black;font-weight:bold" >
            <?php while($reponse_organisme=$req_organisme->fetch(PDO::FETCH_OBJ)){                                                                      
                echo '<option value='.$reponse_organisme->idorga.' style="color:black;font-weight:bold" >
                              '.$reponse_organisme->nomorga.'  </option>';
            } ?>
            </select>

      <?php }else{
        echo "0";
      }
   }









//SCRIPT POUR INSERTION DANS UNE AUTRE TABLES


   //CREATION ET DECLARATION DES VARIABLE DANS LORDRE POUR INSERER DANS LA TABLE  attributeur_tache


   elseif (isset($numat) and isset($dateheuresaisi)  
           and isset($nomattributeur) and isset($personnelanac) 
           and isset($emailanac)) {
  
      


  //ON CREE UNE REQUETE SQL POUR VERIFIER SI LA $nomattributeur EXISTE DEJA DANS LA BDD POUR EVITER LES DOUBLONS
          
      $rowverify = $db->prepare("SELECT * FROM attributeur_tache WHERE nomattributeur=? AND emailanac=?");

      $rowverify->execute(array($nomattributeur,$emailanac));


  //SI PAS DE BOUBLONS ON INSERT DANS LA TABLE
      if (count($rowverify->fetchAll())<1) {

$saveattributeur_tache = $db->prepare("INSERT INTO attributeur_tache (numat,dateheuresaisi,nomattributeur,personnelanac,emailanac)

                                    VALUES(?,?,?,?,?)");
                                
        $saveattributeur_tache->execute(array($numat,$dateheuresaisi,
            $nomattributeur,$personnelanac,$emailanac));
      



      //APRES INSERTION ON AFFICHE LA DONNEE DANS LA LISTE DEROULANTE PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX 
        
            
            $sql_attributeur_tache="SELECT attributeur_tache.idattributeur,attributeur_tache.nomattributeur,attributeur_tache.emailanac

                                
                                        FROM attributeur_tache

                            ORDER BY attributeur_tache.idattributeur DESC";

            $req_attributeur_tache = $db->prepare($sql_attributeur_tache);
            $req_attributeur_tache->execute(); ?>


<!--APRES AVOIR INSERER LE RESULTANT ON AFFICHE LE RESULTANT DANS UN NOUVEAU SELECT PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX --> 
        
    <select  id="idattributeur" class="form-control" name="idattributeur"  data-rel="chosen"  id="idattributeur" style="color:black;font-weight:bold" >
            <?php while($reponse_attributeur_tache=$req_attributeur_tache->fetch(PDO::FETCH_OBJ)){                                                                      
                echo '<option value='.$reponse_attributeur_tache->idattributeur.' style="color:black;font-weight:bold" >
                              '.$reponse_attributeur_tache->nomattributeur.'  </option>';
            } ?>
            </select>

      <?php }else{
        echo "0";
      }
   }








//SCRIPT POUR INSERTION DANS UNE AUTRE TABLES


   //CREATION ET DECLARATION DES VARIABLE DANS LORDRE POUR INSERER DANS LA TABLE  emetteur_tache


  elseif (isset($numat) and isset($dateheuresaisi)  and isset($nomformulaireutilise)) {
      


  //ON CREE UNE REQUETE SQL POUR VERIFIER SI LA NOM formualire EXISTE DEJA DANS LA BDD POUR EVITER LES DOUBLONS
          
      $rowverify = $db->prepare("SELECT * FROM formulaire_utilise_anactache WHERE nomformulaireutilise=?");

      $rowverify->execute(array($nomformulaireutilise));


  //SI PAS DE BOUBLONS ON INSERT DANS LA TABLE
      if (count($rowverify->fetchAll())<1) {

        $saveformulaire_utilise_anactache = $db->prepare("INSERT INTO formulaire_utilise_anactache (numat, dateheuresaisi, 
                                                                                             nomformulaireutilise)

                                VALUES(?,?,?)");
                                
        $saveformulaire_utilise_anactache->execute(array($numat,$dateheuresaisi,$nomformulaireutilise));
      



      //APRES INSERTION ON AFFICHE LA DONNEE DANS LA LISTE DEROULANTE PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX 
        
            
            $sql_formulaire="SELECT *
                                        FROM formulaire_utilise_anactache

                                            ORDER BY idformutilise DESC";

            $req_formulaire = $db->prepare($sql_formulaire);
            $req_formulaire->execute(); ?>


<!--APRES AVOIR INSERER LE RESULTANT ON AFFICHE LE RESULTANT DANS UN NOUVEAU SELECT PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX --> 
        
            <select  id="idformutilise" class="form-control" name="formutilise"  data-rel="chosen"  id="idformutilise" style="color:black;font-weight:bold" >
            <?php while($responseF=$req_formulaire->fetch(PDO::FETCH_OBJ)){                                                                      
                echo '<option value='.$responseF->idformutilise.' style="color:black;font-weight:bold" >'.$responseF->nomformulaireutilise.'</option>';
            } ?>
            </select>

      <?php }else{
        echo "0";
      }
   }







//SCRIPT POUR INSERTION DANS UNE AUTRE TABLES


   //CREATION ET DECLARATION DES VARIABLE DANS LORDRE POUR INSERER DANS LA TABLE  emetteur_tache


  elseif (isset($numat) and isset($dateheuresaisi)  and isset($nomdocdelivre)) {
      


  //ON CREE UNE REQUETE SQL POUR VERIFIER SI LA NOM document_delivre_anactache EXISTE DEJA DANS LA BDD POUR EVITER LES DOUBLONS
          
      $rowverify = $db->prepare("SELECT * FROM document_delivre_anactache WHERE nomdocdelivre=?");

      $rowverify->execute(array($nomdocdelivre));


  //SI PAS DE BOUBLONS ON INSERT DANS LA TABLE
      if (count($rowverify->fetchAll())<1) {

        $savedocument_delivre_anactache = $db->prepare("INSERT INTO document_delivre_anactache (numat, dateheuresaisi, 
                                                                                             nomdocdelivre)

                                VALUES(?,?,?)");
                                
        $savedocument_delivre_anactache->execute(array($numat,$dateheuresaisi,$nomdocdelivre));
      



      //APRES INSERTION ON AFFICHE LA DONNEE DANS LA LISTE DEROULANTE PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX 
        
            
            $sql_formulaire="SELECT *
                                        FROM document_delivre_anactache

                                            ORDER BY iddocdelivre DESC";

            $req_formulaire = $db->prepare($sql_formulaire);
            $req_formulaire->execute(); ?>


<!--APRES AVOIR INSERER LE RESULTANT ON AFFICHE LE RESULTANT DANS UN NOUVEAU SELECT PAR ODRE DECROISSANT DU ID , POUR ETRE EN 1ER CHOIX --> 
        
            <select  id="iddocdelivre" class="form-control" name="documadelivre"  data-rel="chosen"  id="iddocdelivre" style="color:black;font-weight:bold" >
            <?php while($responsedoc=$req_formulaire->fetch(PDO::FETCH_OBJ)){                                                                      
                echo '<option value='.$responsedoc->iddocdelivre.' style="color:black;font-weight:bold" >'.$responsedoc->nomdocdelivre.'</option>';
            } ?>
            </select>

      <?php }else{
        echo "0";
      }
   }



 ?>