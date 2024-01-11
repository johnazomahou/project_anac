<?php
//jinclu le fichier se session 
    require_once('identifier.php');
// jinclu le fichier de connexion a la bdd
    //require_once("conn.php");
   // include('entete.php');
    
   require("../param_connexion_bdd/connexiondb.php");

   require("../param_connexion_bdd/connexlistemultiple.php");

      require("../param_connexion_bdd/connect_type_activite.php");
   

  include_once('../param_connexion_bdd/requetes.php');



http://192.168.5.81/ANACstat/ANAC/back_office.php
    //on initialise la zone de texte d recherche a vide
    $mc="";
    
    //afficher page par page, pagination
    $size=20;//nbre delement a afficher par page
      $max_nbre_page=20;
    
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

 

                                                       WHERE  (emetteur_tache.nomemetteur like '%$mc%'  
                                                                   OR attributeur_tache.nomattributeur like '%$mc%'
                                                                    OR suivi_tache.objettache like '%$mc%' 
                                                                    OR suivi_tache.dateattribution like '%$mc%' 
                                                                    OR suivi_tache.datecloture like '%$mc%' 
                                                                     OR statut_tache.nomstatuttache like '%$mc%' 
                                                                    OR suivi_tache.numeroodre like '%$mc%') 

                                                                    AND suivi_tache.separer_tache_dj_anac='ANAC'

                                                                    ORDER BY   suivi_tache.idtache DESC ");

  
  //ICI ON AFFICHE LE RESULTAT DES DONNEES CHERCHES AVEC LE MOT CLE

$req="SELECT suivi_tache.idtache,emetteur_tache.idemetteur,emetteur_tache.nomemetteur, attributeur_tache.idattributeur,
              date_format(suivi_tache.datecloture, '%d/%m/%Y') as datecloture, attributeur_tache.nomattributeur,
              suivi_tache.numeroodre,suivi_tache.numat, user_anacstat.prenag,user_anacstat.nomag,suivi_tache.dateheuresaisi,
              suivi_tache.objettache, date_format(suivi_tache.dateattribution, '%d/%m/%Y') as dateattribution, 
              date_format(suivi_tache.dateprovisiore, '%d/%m/%Y') as dateprovisiore, 
              date_format(suivi_tache.datereponsereltache, '%d/%m/%Y') as datereponsereltache, 
              DATEDIFF(suivi_tache.datecloture,suivi_tache.dateattribution) AS tempsmis, 
              suivi_tache.objettache,suivi_tache.observation_attribution,
              suivi_tache.observation_retour,suivi_tache.typetache ,statut_tache.nomstatuttache,
              suivi_tache.idstatuttache, DATEDIFF(CURRENT_DATE,suivi_tache.dateattribution) AS nbrejourecoule,
              suivi_tache.numcourier_ref_anac,date_format(suivi_tache.dateenrgecouranac, '%d/%m/%Y') as dateenrgecouranac,
              statut_tache.nomstatuttache,organisme.nomorga,suivi_tache.formutilise,
              personnel_aeronautique.nompersoaero,personnel_aeronautique.prenompersoaero,
              aeronef_adna.idaeronef,aeronef_adna.nomaeronef,aeronef_adna.numserie,aeronef_adna.immataeronef,
              domaine.iddomaine,domaine.nomdomaine,
              date_format(suivi_tache.datereprisecomplema, '%d/%m/%Y') AS datereprisecomplema,
              suivi_tache.suividoc,suivi_tache.enregistredans,suivi_tache.documadelivre,suivi_tache.fichier,
              suivi_tache.file_url,suivi_tache.fichier_courrier_entrant,suivi_tache.file_url_courier_entrant,
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


                                            
              WHERE   (emetteur_tache.nomemetteur like '%$mc%'  
                                                                   OR attributeur_tache.nomattributeur like '%$mc%'
                                                                   OR suivi_tache.objettache like '%$mc%' 
                                                                   OR suivi_tache.dateattribution like '%$mc%'
                                                                    OR suivi_tache.datecloture like '%$mc%' 
                                                                   OR statut_tache.nomstatuttache like '%$mc%' 
                                                                   OR suivi_tache.numeroodre like '%$mc%')
          AND suivi_tache.separer_tache_dj_anac='ANAC'

               ORDER BY   suivi_tache.idtache DESC

                                LIMIT $size OFFSET $offset";
          
} 
else{
 
                     $offset=$offset-$page;

                      // crer la requete pour afficher le nombre total des élements dans lE TABLEAU
                     $ps2=$pdo->prepare("SELECT COUNT(*) AS NB_ET 
                                             
                                                            
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


              WHERE suivi_tache.separer_tache_dj_anac='ANAC'
               ORDER BY   suivi_tache.idtache DESC ");

                  // POUR AFFICHER ENSUTE LE RESULATAT DE LA REQUETER   V  FZD   C 

$req="SELECT suivi_tache.idtache,emetteur_tache.idemetteur,emetteur_tache.nomemetteur, attributeur_tache.idattributeur,
              date_format(suivi_tache.datecloture, '%d/%m/%Y') as datecloture, attributeur_tache.nomattributeur,
              suivi_tache.numeroodre,suivi_tache.numat, user_anacstat.prenag,user_anacstat.nomag,suivi_tache.dateheuresaisi,
              suivi_tache.objettache, date_format(suivi_tache.dateattribution, '%d/%m/%Y') as dateattribution, 
              date_format(suivi_tache.dateprovisiore, '%d/%m/%Y') as dateprovisiore, 
              date_format(suivi_tache.datereponsereltache, '%d/%m/%Y') as datereponsereltache, 
              DATEDIFF(suivi_tache.datecloture,suivi_tache.dateattribution) AS tempsmis, 
              suivi_tache.objettache,suivi_tache.observation_attribution,
              suivi_tache.observation_retour,suivi_tache.typetache ,statut_tache.nomstatuttache,
              suivi_tache.idstatuttache, DATEDIFF(CURRENT_DATE,suivi_tache.dateattribution) AS nbrejourecoule,
              suivi_tache.numcourier_ref_anac,date_format(suivi_tache.dateenrgecouranac, '%d/%m/%Y') as dateenrgecouranac,
              statut_tache.nomstatuttache,organisme.nomorga,suivi_tache.formutilise,
              personnel_aeronautique.nompersoaero,personnel_aeronautique.prenompersoaero,
              aeronef_adna.idaeronef,aeronef_adna.nomaeronef,aeronef_adna.numserie,aeronef_adna.immataeronef,
              domaine.iddomaine,domaine.nomdomaine,
              date_format(suivi_tache.datereprisecomplema, '%d/%m/%Y') AS datereprisecomplema,
              suivi_tache.suividoc,suivi_tache.enregistredans,suivi_tache.documadelivre,suivi_tache.fichier,
              suivi_tache.file_url,suivi_tache.fichier_courrier_entrant,suivi_tache.file_url_courier_entrant,
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


                                                     
                                 WHERE                           (emetteur_tache.nomemetteur like '%$mc%'  
                                                                   OR attributeur_tache.nomattributeur like '%$mc%'
                                                                   OR suivi_tache.objettache like '%$mc%' 
                                                                    OR suivi_tache.datecloture like '%$mc%' 
                                                                   OR suivi_tache.dateattribution like '%$mc%' 
                                                                   OR suivi_tache.numeroodre like '%$mc%')

                                AND suivi_tache.separer_tache_dj_anac='ANAC'



              ORDER BY   suivi_tache.idtache DESC

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

// Utilisation de la clause ORDER BY dans une fonction de classeme
// en UTILISANT UN ORDRE D'AFFICHAHGE SUR UN CHAMP un par exemple commencer par  1,2 etc 
?>
      



      <!--POUR METRE LE FORMULAIRE DE RECHECHERE -->


          <form method="GET" action="consulter_tache.php">
          <div class="form-group">
              <div class="form-group has-success col-md-7">
                              <label class="control-label"  for="inputSuccess1"><b style="color:black;font-weight:bold;background-color:HoneyDew">Recherche avec Mot clé:</b></label>

                              <input type="text" name="motcle" class="form-control"  style="color:black;font-weight:bold;background-color:HoneyDew" required="required" placeholder="Saisir Emetteur,Attributaire,objet,N°Attribution,ou Date Attribution" value="<?php echo ($mc)?>"/>
                             <br/> 
                               <button title="Recherche avec Mot clé Tâche :" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"> Chercher</i></button>

        &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 

                                <a title="Pour Afficher la page 0" class="btn btn-warning btn" href="consulter_tache.php">
                                                      <i class="glyphicon glyphicon-folder-open"> Afficher Page 0</i>
                                                                                                              
                                </a>


        &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 
                      
                       <!--POUR EXTRAIRE LE TABLO O FORMAT EXCEL-->
               <a target=_black title="Extraction des données" onclick="return confirm('Etes vous sûr de vouloir Extraire ce tableau  au format Excel  ?');"  href="extraction_tache.php">
                                                 <b>Extraction</b>
                                                 <i><img  src="../assets/img/logoexcle.png"></i>
                </a>
                    
                    &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp  
                  <a href="suivi_taches.php">
                     <b>Nouvelle Tâche</b> <button title="Cliquer ici pour Nouvelle Tâche" style="background-color:olive;color:white;width: 50px; height:50px" type="button" >++</button>
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
                    
                            <th style="background-color:#03224c;color:white">Agent Opération </th>
                            <th style="background-color:#03224c;color:white">Date Courrier</th>
                            <th style="background-color:#03224c;color:white">Courrier Entré</th>
                            <th style="background-color:#03224c;color:white">Emetteur Tâche</th>
                            <th style="background-color:#03224c;color:white">Objet Tâche</th>
                            <th style="background-color:#03224c;color:white">Attributaire Tâche</th>
                            <th style="background-color:#03224c;color:white">Domaine</th>
                            <th style="background-color:#03224c;color:white">Date Attribution</th>
                            <th style="background-color:#03224c;color:white">Délai deja Ecoulé</th>
                            <th style="background-color:#03224c;color:white">Date Cloture</th>
                            <th style="background-color:#03224c;color:white">Courrier Sortie</th>
                            
                            
                            <th style="background-color:#03224c;color:white">Statut Tâche</th>

              
                            <th style="background-color:#03224c;color:white">Opérations</th>
                            
                            
                        </tr>
                        </thead>

                        <tbody>
                        <!--FAIRE UNE BOUCLE PHP pour recuperer toutes les données de la table-->
                        <!--recupere une donnée sous forme  d1 tableau associative,ligne/lignes-->
                        <!--apres il va la stockée dans une variable appeler RES-->
                        
                        
                                                <?php while($res=$ps->fetch()){
                                                       $idstatuttache=$res['idstatuttache'];
                                                       $tempsmis=$res['tempsmis'];
                                                       $typetache=$res['typetache'];
                                                       $dateprovisiore=$res['dateprovisiore'];
                                                       $datereponsereltache=$res['datereponsereltache'];
                                                       $datecloture=$res['datecloture'];
                                                       $dateprovisiorevide='';
                                                       $datecloturevide='';
                                                       $tempsmisvide='';
                                                       $datereponsereltachevide='';
                                                       $nbrejourecoule=$res['nbrejourecoule'];
                                                       $dateenrgecouranac=$res['dateenrgecouranac'];
                                                       $nbrejourecoule=$res['nbrejourecoule'];
                                                       $file_url=$res['file_url'];
                                                       $file_url_courier_entrant=$res['file_url_courier_entrant'];
                                                ?>
                        <tr>
                          
                            <!---POUR AFFICHER LES DONNEES-->

                            

                            <td style="color:black"> <?php echo  $res['prenag'];?> <?php echo  $res['nomag'];?><br/> le <?php echo  $res['dateheuresaisi'];?> </td>

                           
                            
                            <td style="color:black">   
                                <?php 
                                    
                                  if ($dateenrgecouranac=='00/00/0000'){

                                    echo '';} 
                                                          
                                else {
                                  echo '<a style="color:black">'.$dateenrgecouranac.'  </a>';}?>



                            </td>

                            

                            <td><?php 
  
                                      if ($file_url_courier_entrant =='GEDANAC/'){}


                                     

                                               elseif($file_url_courier_entrant==''){} 

                                        
                              else {
                        
                        echo ' <a onclick="return confirm("Etes vous sûr de vouloir consulter ce Document Integré ?");" target=_blank href="'.$res["file_url_courier_entrant"].'"> <img style="width:20px;height:25px; alt="Charisma Logo"  title="Voir le Courrier '.$res["file_url_courier_entrant"].'" src="../assets/img/logopdfautre.png">  </a> '.$res["file_url_courier_entrant"].' '
                                                         ;}?>
                                                           
                            </td>
                    

                            <td style="color:black"> <?php echo  $res['nomemetteur'];?> </td>
                            <td style="color:#03224c"> <?php echo  $res['objettache'];?> </td>
                            <td style="color:black"> <?php echo  $res['nomattributeur'];?> </td>
                          <td style="color:black"> <?php echo  $res['nomdomaine'];?> </td>
                          <td style="color:#03224c"> <?php echo  $res['dateattribution'];?> </td>
                         
                          <td style="color:black">   
                                <?php 
                                     //datecloture = 00/00/00 = VIDE ON AFFICHE RIEN
                                                      if ($nbrejourecoule=='0'){

                          echo ''; } 
                                                          
                                    else {
                                      
                                        echo '<a style="color:#03224c;font-weight:bold"> '.$nbrejourecoule.' Jr(s) </a>';}?>



                             </td>
                           
                           
                             <td style="color:black">   
                                <?php 
                                     //datecloture = 00/00/00 = VIDE ON AFFICHE RIEN
                                                      if ($datecloture=='00/00/0000'){

                          echo '<a style="color:#03224c;font-weight:bold" > '.$datecloturevide.'  </a>'; } 
                                                          
                                    else {
                                      
                                        echo '<a style="color:#03224c;font-weight:bold"> '.$datecloture.' </a>';}?>



                             </td>


                  

                               <td style="color:black">   
                                
                                  <?php 
  
                                                 if ($file_url=='GEDANAC/'){} 

                                               elseif($file_url==''){}

                                        
                              
                                            else {

                      echo '<a onclick="return confirm("Etes vous sûr de vouloir consulter ce Document Integré ?");" target=_blank href="'.$res["file_url"].'"> <img style="width:20px;height:25px; alt="Charisma Logo"  title="Voir le Document '.$res["file_url"].'" src="../assets/img/logopdf.jpg">  </a> '.$res["file_url"].' '
                                                         ;}

                                                         ?>


                             </td>
                             
                           
               


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
                    
 
            

      <!--tableau pour faire le suivi-->
                <td class="center">


             <?php
                                    if ($idstatuttache=='005')//quand la tâche est effectuee , realisee ou cloturé

                                                      {
                                                              
                                         


                     //pour les detailes de la taches cloturer seulema
        echo '<a  title="Voir detail de la Tâche" href="voir_detaille_tache_cloture.php?idtache='.$res["idtache"].'">
                      
                     <i style="color:#03224c;font-weight:bold" class="ace-icon fa fa-search-plus bigger-130"></i></a>
                     &nbsp&nbsp &nbsp&nbsp &nbsp';

             
                                                      }


             else {//quand la tache est planifie ,ouvert ou autre satui

              

                //pour les detailes de la taches cloturer seulema
        echo '<a  title="Voir detail de la Tâche" href="voir_detaille_tache_cloture.php?idtache='.$res["idtache"].'">
                      
                     <i style="color:#03224c;font-weight:bold" class="ace-icon fa fa-search-plus bigger-130"></i></a>
                     &nbsp&nbsp &nbsp&nbsp &nbsp';



                        /*// btn poiur supprimper la tache

               echo '<a title="Supprimer Tâche" href="delete_tache.php?idtache='.$res["idtache"].'">
                        
                        <i style="color:red;font-weight:bold" onclick="testConfirmDialog()" class="glyphicon glyphicon-trash icon-white"></i>
                     </a> &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp '  ;  
*/

                        


                     //pour le suivi de de la tache ou modification 
        echo '<a  title="Suivi de la Tâche" href="execution_tache.php?idtache='.$res["idtache"].'">
                      
                     <i style="color:green;font-weight:bold" class="glyphicon glyphicon-edit icon-white"></i></a>';
                                        

                                        }
                                                             ?>

        
                  </td>
          
        <?php }?>




            </td>

           
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
                  <li   class="active" > <a  href="consulter_tache.php?motcle=<?php echo $mc;?>&page=<?php echo(0)?>"><< </a></li>

                  <li  class="active" > <a  href="consulter_tache.php?motcle=<?php echo $mc;?>&page=<?php echo($page-1)?>">< Précédent</a></li>
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
          <a  href="consulter_tache.php?motcle=<?php echo $mc;?>&page=<?php echo($i)?>"> <?php echo($i)?></a>
        </li>
        <?php } ?>
         <?php 
             if($page<$Nbrepage){ ?>
             <li class="active"><a  href="consulter_tache.php?motcle=<?php echo $mc;?>&page=<?php echo($page+1)?>">Suivant ></a></li>
             <li class="active"><a  href="consulter_tache.php?motcle=<?php echo $mc;?>&page=<?php echo($Nbrepage-1)?>">>></a></li>
           <?php } ?>
      </ul>
      </div>
      <?php }?>


                      <br/><br/><br/><br/><br/><br/>
                    </div>
                  </div>
                </div>