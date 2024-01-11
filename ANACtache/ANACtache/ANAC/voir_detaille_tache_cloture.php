<?php
    //jinclu le fichier se session 
            require_once('identifier.php');
          header('Content-Type: text/html; charset=utf-8');
          setlocale(LC_CTYPE, 'fr_FR.UTF-8');
          
          include('entete.php');

         require("../param_connexion_bdd/connexiondb.php");  
          include_once('../param_connexion_bdd/requetes.php');


 


//ON RECUPERE LE ID POUR LA MAJ
    $idtache=isset($_GET['idtache'])?$_GET['idtache']:0;
    
    //CREATION DE LA REQUETTE POUR RECUPERER LES DONNNEES A MODIFIER
  $requeteS="SELECT suivi_tache.idtache,emetteur_tache.idemetteur,emetteur_tache.nomemetteur, attributeur_tache.idattributeur,
                      (suivi_tache.datecloture) as datecloture,attributeur_tache.nomattributeur,suivi_tache.numeroodre,
                      suivi_tache.numat, user_anacstat.prenag,user_anacstat.nomag,suivi_tache.dateheuresaisi,
                      suivi_tache.objettache, 
                      (suivi_tache.dateattribution) as dateattribution, 
                      (suivi_tache.dateprovisiore) as dateprovisiore, 
                      (suivi_tache.datereponsereltache) as datereponsereltache, 
                      suivi_tache.objettache,suivi_tache.observation_attribution,
                      suivi_tache.observation_retour,suivi_tache.typetache ,statut_tache.nomstatuttache,
                      suivi_tache.idstatuttache, statut_tache.nomstatuttache,
                    suivi_tache.numcourier_ref_anac,
                    (suivi_tache.dateenrgecouranac) as dateenrgecouranac,
                    organisme.nomorga,suivi_tache.formutilise,personnel_aeronautique.nompersoaero,
                    personnel_aeronautique.prenompersoaero,
                    aeronef_adna.idaeronef,aeronef_adna.nomaeronef,aeronef_adna.numserie,
                    aeronef_adna.immataeronef,suivi_tache.datereunion,personnel_aeronautique.idpersoaero,
                    domaine.iddomaine,domaine.nomdomaine,organisme.idorga,
                    (suivi_tache.datereprisecomplema) AS datereprisecomplema,
                    suivi_tache.suividoc,suivi_tache.enregistredans,suivi_tache.documadelivre,
                    date_format(suivi_tache.dateattribution, '%d/%m/%Y') as dateattributiontache,
                    suivi_tache.file_url,suivi_tache.fichier_courrier_entrant,suivi_tache.file_url_courier_entrant,
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


        WHERE suivi_tache.idtache=$idtache";

    //EXECUTION DE LA REQUETTE
    $resultatS=$pdo->query($requeteS);
    $listedonneeMAJ=$resultatS->fetch();

      $file_url=$listedonneeMAJ['file_url'];//POUR CONSULTER LE DOCUMENT DE SORTIE JOINT

      $file_url_courier_entrant=$listedonneeMAJ['file_url_courier_entrant'];//POUR CONSULTER LE DOCUMENT JOINT
    
    //DECLARATION DES VARIABLES DES CHAMPS PROPRE A LA TABLE A MODIFIER
    
    
    $numat=$listedonneeMAJ['numat'];
    $objettache=$listedonneeMAJ['objettache'];
    $numeroodre=$listedonneeMAJ['numeroodre'];
    $nomstatuttache=$listedonneeMAJ['nomstatuttache'];
    $dateattribution=$listedonneeMAJ['dateattribution'];
    $dateprovisiore=$listedonneeMAJ['dateprovisiore'];
    $datereponsereltache=$listedonneeMAJ['datereponsereltache'];
    $observation_attribution=$listedonneeMAJ['observation_attribution'];
    $observation_retour=$listedonneeMAJ['observation_retour'];
    $typetache=$listedonneeMAJ['typetache'];
    $datecloture=$listedonneeMAJ['datecloture'];
    $numcourier_ref_anac=$listedonneeMAJ['numcourier_ref_anac'];
    $dateenrgecouranac=$listedonneeMAJ['dateenrgecouranac'];
    $formutilise=$listedonneeMAJ['formutilise'];
    $datereprisecomplema=$listedonneeMAJ['datereprisecomplema'];
    $suividoc=$listedonneeMAJ['suividoc'];
    $documadelivre=$listedonneeMAJ['documadelivre'];
    $enregistredans=$listedonneeMAJ['enregistredans'];
    $datereunion=$listedonneeMAJ['datereunion'];
    $dateheuresaisi=$listedonneeMAJ['dateheuresaisi'];
    $nomemetteur=$listedonneeMAJ['nomemetteur'];
    $nompersoaero=$listedonneeMAJ['nompersoaero'];
    $prenompersoaero=$listedonneeMAJ['prenompersoaero'];
    $nomattributeur=$listedonneeMAJ['nomattributeur'];
    $nomorga=$listedonneeMAJ['nomorga'];
    $nompersoaero=$listedonneeMAJ['nompersoaero'];
    $dateattributiontache=$listedonneeMAJ['dateattributiontache'];
    $nomaeronef=$listedonneeMAJ['nomaeronef'];
    $nomdomaine=$listedonneeMAJ['nomdomaine'];
    $iddomaine=$listedonneeMAJ['iddomaine'];

    $nomformulaireutilise=$listedonneeMAJ['nomformulaireutilise'];
    $nomdocdelivre=$listedonneeMAJ['nomdocdelivre'];
    


   
    //DECLARATION DES VARIABLES DES CLES ETRANGERES A MODIFIER
    
    
   $idemetteur=$listedonneeMAJ['idemetteur'];
    $idattributeur=$listedonneeMAJ['idattributeur'];
    $numat=$listedonneeMAJ['numat'];
    $idstatuttache=$listedonneeMAJ['idstatuttache'];
     $idorga=$listedonneeMAJ['idorga'];
    $immataeronef=$listedonneeMAJ['immataeronef'];
    $idaeronef=$listedonneeMAJ['idaeronef'];
    $idpersoaero=$listedonneeMAJ['idpersoaero'];

    $idformutilise=$listedonneeMAJ['idformutilise'];
    $iddocdelivre=$listedonneeMAJ['iddocdelivre'];


    $documadelivre=$listedonneeMAJ['documadelivre'];
    $formutilise=$listedonneeMAJ['formutilise'];

    

    
    //CREATION DES REQUETES POUR RECUPRER LES DONNNEES EN LISTE DEROULANTE DANS LES DIFFERENTES TABLES
   
   //requete pour selectionner les emeteur en liste deroulante
   $requete_emetteur="SELECT idemetteur, nomemetteur 
                              FROM emetteur_tache 
                                  WHERE nomemetteur!=''
                                    GROUP BY nomemetteur
                                     ORDER BY nomemetteur";
   $resultat_emetteur=$pdo->query($requete_emetteur);

    //requete pour selectionner les natures actes de superivions en liste deroulante
   $requete_attributaire="SELECT idattributeur,nomattributeur
                             FROM attributeur_tache
                                  WHERE  nomattributeur !=''
                                  GROUP BY nomattributeur  
                                  ORDER BY nomattributeur";
   $resultat_attributaire=$pdo->query($requete_attributaire);

  
// pour selectioner les differents idstatuttache de ta^che  en liste deroulante pour inserer en boucle

   $req_nomstatuttache="SELECT * FROM statut_tache  WHERE (idstatuttache=8 OR idstatuttache=5 OR idstatuttache=7)";

   $resu_nomstatuttache=$pdo->query($req_nomstatuttache);




// pour selectioner les differents emetteur_tache de ta^che  en liste deroulante pour inserer en boucle

   $req_attributeur_tache="SELECT idemetteur, nomemetteur 
   
                            FROM emetteur_tache 

                                WHERE nomemetteur!=''

                                   GROUP BY nomemetteur

                                   ORDER BY nomemetteur";

   $result_emetteur_tache=$pdo->query($req_attributeur_tache);
   




// pour selectioner les differents personnel_aeronautique de ta^che  en liste deroulante pour inserer en boucle

   $req_personnel_aeronautique="SELECT idpersoaero,nompersoaero,prenompersoaero
                                     FROM personnel_aeronautique 
                                          ORDER BY nompersoaero";

   $res_personnel_aeronautique=$pdo->query($req_personnel_aeronautique);





// pour selectioner les differents organisme de ta^che  en liste deroulante pour inserer en boucle

   $REQ_organisme="SELECT idorga,nomorga FROM organisme WHERE nomorga!='' GROUP BY nomorga ORDER BY nomorga";

   $REs_organisme=$pdo->query($REQ_organisme);



// pour selectioner les differents aeronef_adna de ta^che  en liste deroulante pour inserer en boucle

   $requ_aeronef_adna="SELECT aeronef_adna.idaeronef,aeronef_adna.nomaeronef,aeronef_adna.immataeronef,
                              aeronef_adna.numserie,aeronef_adna.tonnage

                                                FROM aeronef_adna
                                                WHERE aeronef_adna.nomaeronef!=''
                                            ORDER BY aeronef_adna.nomaeronef";

   $resu_aeronef_adna=$pdo->query($requ_aeronef_adna);



// pour selectioner les differents domaine de ta^che  en liste deroulante pour inserer en boucle

   $req_domaine="SELECT iddomaine,nomdomaine,libel_domaine 
            FROM domaine 
                ORDER BY nomdomaine";

   $res_domaine=$pdo->query($req_domaine);




// pour selectioner les differents formulare de ta^che  en liste deroulante pour inserer en boucle


 $requete_formulaire_utilise_anactache="SELECT idformutilise, nomformulaireutilise

                                      FROM formulaire_utilise_anactache 

                                         WHERE nomformulaireutilise!=''

                                              GROUP BY nomformulaireutilise

                                               ORDER BY nomformulaireutilise";

   $resultart_formulaire_utilise_anactache=$pdo->query($requete_formulaire_utilise_anactache);



   //requete pour selectionner les Document en liste deroulante

   $requete_documadelivre="SELECT iddocdelivre, nomdocdelivre

                                      FROM document_delivre_anactache 

                                         WHERE nomdocdelivre!=''

                                              GROUP BY nomdocdelivre

                                               ORDER BY nomdocdelivre";

   $resutl_documadelivre=$pdo->query($requete_documadelivre);




?>
        
        




        <!-- /.INSERTION DU MENU-->

        <?php include('menu.php');?>

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
              try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>




<!-- SCRIPT POUR afficher un input sur choix d'une liste déroulante EN FONCTION DU CHOIX -->

<script type="text/javascript" src="jquery.min.js" /></script>


        <script type="text/javascript">
        $(document).ready(function() {
         
            $('#datecloture').hide(); // on cache le champ par défaut
             $('#textedatecloture').hide(); // on cache le champ par défaut
            
             
            $('select[name="idstatuttache"]').change(function() { // lorsqu'on change de valeur dans la liste

            var valeur = $(this).val(); // valeur sélectionnée
             
                if(valeur != '') { // si non vide

                    if(valeur == '0005') { // si "5= tache cloture, on affiche le champ masqué"

                        $('#datecloture').show();

                       $('#textedatecloture').show();
                    } else {
                        $('#datecloture').hide();           
                    }
                }
            });
         
        });
</script>


      </div>

      <div class="main-content">
        <div class="main-content-inner">
          
          <div class="page-content">
            

            <div class="page-header">
              
              <h1 style="color:black;font-weight:bold">
            Détails de l'éxecution de la tâche N°:<?php echo  $numeroodre?> du:  <?php echo  $dateattributiontache?> 
             <i>  
              pour <?php echo  $objettache?> 
              

            </i>
                
              </h1>


            </div><!-- /.page-header -->
            
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->


                    

                    <form  method="POST" class="form-horizontal" action="#" role="form" enctype="multipart/form-data">




                           <input type="hidden" name="idtache" class="form-control" value="<?php echo $idtache ?>"/><br/>

            <div class="row">

                  <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Gestion Expéditeur | Emetteur <i style="color:red;font-weight:bold">*</i>:</h5>

                        </div>

                      <div class="widget-body">
                        <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV Emetteur-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="Emetteur-select-card">
                 
        <select  id ="idemetteur" title="Choissisez Expéditeur dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-danger" class="form-control" name="idemetteur"  data-rel="chosen" required="required">

                                    <option  value="<?php echo $idemetteur?>"> <?php echo $nomemetteur?></option>
                                                    
                                                                <option value=""> Choisir autre Expéditeur... </option>
                                                                <option value="">  </option><option value="">   


                                    <?php while($nomemetteur=$result_emetteur_tache->fetch()) { ?>

                    <option disabled="disabled" style="color:black;font-weight:bold" value="<?php echo $nomemetteur['idemetteur'] ?>"
                                                     
                                                     <?php if($idemetteur===$nomemetteur['idemetteur']) echo "selected" ?>> 
                                                     
                                                      <?php echo $nomemetteur['nomemetteur'] ?>
                                     </option>
                                    <?php }?>
                                        
                                       </select>
                        </div>
            
           
            
            
                        
      
                        </div>
                      </div>
                    </div>
                  </div>


                 <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Personnel Aéronautique
                          <i style="color:red;font-weight:bold">*</i>:</h5>

                        </div>

                      <div class="widget-body">
                       
                       <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV personnelr-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="personnelr-select-card">
                 
        <select  id ="idpersoaero" title="Choissisez Personnel dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-danger" class="form-control" name="idpersoaero"  data-rel="chosen" required="required">


                                    <option value="<?php echo $idpersoaero?>"> <?php echo $nompersoaero?></option>
                                                    
                                                                <option value=""> Choisir autre Personnel... </option>
                                                                <option value="">  </option><option value="">   


                                    <?php while($nompersoaero=$res_personnel_aeronautique->fetch()) { ?>

                    <option disabled="disabled" style="color:black;font-weight:bold" value="<?php echo $nompersoaero['idpersoaero'] ?>"
                                                     
                                                     <?php if($idpersoaero===$nompersoaero['idpersoaero']) echo "selected" ?>> 
                                                     
                                                      <?php echo $nompersoaero['nompersoaero'] ?>
                                                      <?php echo $nompersoaero['prenompersoaero'] ?>
                                                      
                                     </option>
                                    <?php }?>
                                        
                                       </select>
                        </div>
            
            
           
            
                        
      
                        </div>
            
            

                      </div>
                    </div>
                  </div>


                  <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Responsable Mise en eouvre du Dossier
                          <i style="color:red;font-weight:bold">*</i>:  </h5>

                        </div>

                      <div class="widget-body">
                        
             <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV ATTRIBUTEUR-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="ATTRIBUTEUR-select-card">
                 
        <select  id ="idattributeur" title="Choissisez Attributeur dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-danger" class="form-control" name="idattributeur"  data-rel="chosen">

                    <option value="<?php echo $nomattributeur?>"> <?php echo $nomattributeur?></option>
                                                    
                                                                <option value=""> Choisir autre Responsable... </option>
                                                                <option value="">  </option><option value="">   


                                    <?php while($nomattributeur=$resultat_attributaire->fetch()) { ?>

                    <option disabled="disabled" style="color:black;font-weight:bold" value="<?php echo $nomattributeur['idattributeur'] ?>"
                                                     
                                                     <?php if($idattributeur===$nomattributeur['idattributeur']) echo "selected" ?>> 
                                                     
                                                      <?php echo $nomattributeur['nomattributeur'] ?>
                                     </option>
                                    <?php }?>
                                        
                                       </select>
                        </div>
            
            
            
            
                        
      
                        </div>
            
                      </div>
                    </div>
                  </div>

                </div><!--FIN DE LA 1ERE DIV-->

                <hr/>


                <!--2eme BLOC DIV-->
            
                 <div class="row">

                  <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Organisme a agréer</h5>

                        </div>

                      <div class="widget-body">
                        
             <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV ORGANISME-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="ORGANISME-select-card">
                 
        <select  id ="idorga" title="Choissisez Organisme dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-primary" class="form-control" name="idorga"  data-rel="chosen">

                          <option value="<?php echo $idorga?>"> <?php echo $nomorga?></option>
                                                    
                                                                <option value=""> Choisir autre Organisme... </option>
                                                                <option value="">  </option><option value="">   


                                    <?php while($nomorga=$REs_organisme->fetch()) { ?>

                    <option disabled="disabled" style="color:black;font-weight:bold" value="<?php echo $nomorga['idorga'] ?>"
                                                     
                                                     <?php if($idorga===$nomorga['idorga']) echo "selected" ?>> 
                                                     
                                                      <?php echo $nomorga['nomorga'] ?>
                                                      
                                     </option>
                                    <?php }?>
                                        
                                       </select>
                        </div>
            
            
            
                        
      
                        </div>
                      </div>
                    </div>
                  </div>


                 <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Type d'Aéronef</h5>

                        </div>

                      <div class="widget-body">
                        <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV TYPEAERONEF-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->
            
                           <div id="TYPEAERONEF-select-card">
                 
        <select  id ="idaeronef" title="Choissisez Type d'Aéronef | Immatriculation dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-primary" class="form-control" name="idaeronef"  data-rel="chosen">

                                                   
                                    <option value="<?php echo $idaeronef?>"> <?php echo $immataeronef?></option>
                                                    
                                                                <option value=""> Choisir autre Type d'Aéronef... </option>
                                                                <option value="">  </option><option value="">   


                                    <?php while($immataeronef=$resu_aeronef_adna->fetch()) { ?>

                    <option disabled="disabled" style="color:black;font-weight:bold" value="<?php echo $immataeronef['idaeronef'] ?>"
                                                     
                                                     <?php if($idaeronef===$immataeronef['idaeronef']) echo "selected" ?>> 
                                                     
                                                      <?php echo $immataeronef['nomaeronef'] ?>
                                                        |
                                                      <?php echo $immataeronef['immataeronef'] ?>
                                                      
                                     </option>
                                    <?php }?>
                                        
                                       </select>
                        </div>
            
          
            
                        
      
                        </div>
            
            
                      </div>
                    </div>
                  </div>


                  <div class="col-xs-4 col-sm-4 widget-container-col">
                    <div class="widget-box">
                      <div class="widget-header">
                        <h5 class="widget-title smaller" style="color:#2060a6;font-weight:bold">Domaine  </h5>

                        </div>

                      <div class="widget-body">
                        

                        <div class="widget-main padding-6">

                        <!--POUR AFFICHER LA LISTE DEROULANTE POUR AFFICHER LES DONNEES POUR LES RECHECHES-->

            <!---creation du DIV Domaine-select-card, UTIL POUR AJAX AFIN DAFFICHER LE MESSAGE SUCCES LORS DE LINSERTION-->

                           <div id="Domaine-select-card">
                 
        <select  id ="iddomaine" title="Choissisez Domaine dans la liste"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Faite votre recherche dans cette zone..." data-live-search="true" data-style="btn-primary" class="form-control" name="iddomaine"  data-rel="chosen">

                 <option value="<?php echo $iddomaine?>"> <?php echo $nomdomaine?></option>
                                                    
                                                                <option value=""> Choisir autre Domaine... </option>
                                                                <option value="">  </option><option value="">   


                                    <?php while($nomdomaine=$res_domaine->fetch()) { ?>

                    <option disabled="disabled" style="color:black;font-weight:bold" value="<?php echo $nomdomaine['iddomaine'] ?>"
                                                     
                                                     <?php if($iddomaine===$nomdomaine['iddomaine']) echo "selected" ?>> 
                                                     
                                                      <?php echo $nomdomaine['nomdomaine'] ?>
                                                      
                                     </option>
                                    <?php }?>
                                        
                                       </select>
                        </div>
            
           
            
                        
      
                        </div>
                      </div>
                    </div>
                  </div>

                </div><!--FIN DE LA 1ERE DIV-->

             <!--FIN DE LA 2EME-->


             <HR/>


 <!--CREATION DU BLOC POUR AFFICHER LENSEMBLE DU FORMULIRE-->


  
                <div class="widget-box">
                 

 
          <div class="widget-body">
                    <div class="widget-main">
                      <div id="fuelux-wizard-container">
                       


                      

                        <div class="step-content pos-rel">
                          <div class="step-pane active" data-step="1">

                          <!-- debut tout premier formulaire  -->
  <div class="row" style="background-color:#03224c;color:white" ><!--COULEUR DE TOUTES LA PAGE EN FOND BLEU-->

                  
                   <div class="col-xs-12 col-sm-12" style="background-color:#03224c;color:white">
                      <div class="widget-box" style="background-color:#03224c;color:white">
                 <div class="widget-header"  >
              <h4 class="widget-title" ><B style="background-color:#03224c;color:yellow">Identifications des informations sur la tâche </B></h4>

                          <div class="widget-toolbar" style="background-color:#03224c;color:white">
                            <a href="#" data-action="collapse">
                              <i class="ace-icon fa fa-chevron-up"></i>
                            </a>

                            
                          </div>
                        </div>


                        <div class="widget-body" style="background-color:#03224c;color:white">
                          <div class="widget-main">

    <div class="form-group has-success has-feedback">


          <div class="form-group has-success has-feedback">

              <!--DEBUT CREATION DU FORMULAIRE-->
          <label class="col-sm-1 control-label"><font color="white">Type de tâche:
                          
                          <i style="color:red;font-weight:bold">*</i></font></label>
              
              <div class="col-sm-3">
                  <div class="radio">
                                                                                  <label style="color:yellow;font-weight:bold" for="radio2" class="form-check-label ">
                                                                                <input type="radio" name="typetache" value="Interne"
                                                                                <?php if($typetache==="Interne")echo "checked" ?> checked/> Tâche Interne </label><br>
                                      
                                                                                </div>



                                                                                <div class="radio">
                                                                                    <label style="color:yellow;font-weight:bold" for="radio2" class="form-check-label ">
                                                                                <input type="radio" name="typetache" value="Externe"
                                                                                <?php if($typetache==="Externe")echo "checked" ?>/>  Tâche Externe
                                                                                        </label><br>
                                                                                </div>

              </div>
                    

                          <label class="col-sm-1 control-label"><font color="white">Statut Tâche:
                                                <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-3">
                                                      
                              <select  id ="idstatuttache"    style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Selectionner Statut Tâche" data-live-search="true" data-style="btn-danger" name="idstatuttache"  data-rel="chosen" required="required">
                                                      

                                                      <option value="<?php echo $idstatuttache?>"> <?php echo $nomstatuttache?></option>
                                                    
                                                                 


                                    <?php while($nomstatuttache=$resu_nomstatuttache->fetch()) { ?>

                    <option disabled="disabled" style="color:black;font-weight:bold" value="<?php echo $nomstatuttache['idstatuttache'] ?>"
                                                     
                                                     <?php if($idstatuttache===$nomstatuttache['idstatuttache']) echo "selected" ?>> 
                                                     
                                                      <?php echo $nomstatuttache['nomstatuttache'] ?>
                                                      
                                     </option>
                                    <?php }?>
                                        
                                       </select>

                                                    </div>

                                                    <label class="col-sm-1 control-label"><font color="white">Date courrier/mail:
                                                <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-3">
                                                      
                                                    <input type="date" readonly="true" title="Date courrier/mail reçus" required="required"  value="<?php echo $dateenrgecouranac?>"  name="dateenrgecouranac"  style="color:black;font-weight:bold" class="form-control">

                                                    </div>


                               

             </div>
                       
                      


            <div class="form-group has-success has-feedback">
                                
                                          <label class="col-sm-1 control-label"><font color="white">Date Attribution:
                                <i style="color:red;font-weight:bold">*</i></font></label>
                          <div class="col-sm-3">
                                <input type="date" title="Date Attribution de la tâche" required="required" value="<?php echo $dateattribution?>"  name="dateattribution" readonly="true" style="color:black;font-weight:bold" class="form-control">

                                                    </div>

                                    <label class="col-sm-1 control-label"><font color="white">Objet:
                                               <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-3">
                                                    
                                                    
                                                      <input type="text" readonly="true"  name="objettache" value="<?php echo $objettache?>" required="required" style="color:#03224c;background-color:white;font-weight:bold"  class="form-control" >
                                            
                                                    </div>

                                                    <label class="col-sm-1 control-label"><font color="white">Réf.ANAC:
                                                <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-3">
                                                      
                                                         <input type="text" readonly="true" title="N° courrier ANAC" required="required"  name="numcourier_ref_anac" placeholder="4572" onkeypress="return keyPressHandler (event);" maxlength="5" value="<?php echo $numcourier_ref_anac?>" style="color:black;font-weight:bold" class="form-control">

                                                    </div>



                                                   

             </div> 
          
                      


            
            <div class="form-group has-success has-feedback">
                                               

                                        <label class="col-sm-1 control-label"><font color="white"> Formulaire utilisé<i style="color:red;font-weight:bold">*</i>:
                                      </font></label>
                                                     <div class="col-sm-3">
                                                      
                                           


                                        <input type="text"  name="formutilise" readonly="true"  placeholder="DE-PEL-I-10-Demande de validation de licence étrangère de membre d’équipage de conduite" value="<?php echo $nomformulaireutilise?>" required="required" style="color:#03224c;background-color:white;font-weight:bold"  class="form-control" >

                                                    </div>

                                        <label class="col-sm-1 control-label"><font color="white">Date Provisionnelle Reponse:
                                </font></label>
                          <div class="col-sm-3">
                                <input type="date" title="Date Provisionnelle Reponse de la tâche" value="<?php echo $dateprovisiore?>"   name="dateprovisiore" readonly="true" style="color:black;font-weight:bold" class="form-control">
                          </div>

                          <label class="col-sm-1 control-label"><font color="white">Date réunion:
                                                </font></label>
                                                     <div class="col-sm-3">
                                                      
                              <input type="date" title="Date réunion, investigation ou Inspection" value="<?php echo $datereunion?>"    name="datereunion" readonly="true" style="color:black;font-weight:bold" class="form-control">

                                                    </div>



                                                   

             </div> 



            
            <div class="form-group has-success has-feedback">
                                               

                                        <label class="col-sm-1 control-label"><font color="white">Date reprise:
                                      </font></label>
                                                     <div class="col-sm-3">
                                               <input type="date" title="Date reprise dossier pour complement"  value="<?php echo $datereprisecomplema?>" readonly="true" name="datereprisecomplema"  style="color:black;font-weight:bold" class="form-control">

                                                    </div>

                                        <label class="col-sm-1 control-label"><font color="white">Suivi dossier:
                                </font></label>
                          <div class="col-sm-3">
                               <select  id ="suividoc"    style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="5"  data-header="Selectionner Suivi dossier" data-live-search="true" data-style="btn-primary" name="suividoc"  data-rel="chosen">


                                  <option value="<?php echo $suividoc?>" > <?php echo $suividoc?></option>
                                                       

                                                       

                                               
                                                  <option disabled="disabled" value="Manque/Signature">Manque/Signature</option>
                                                  <option disabled="disabled" value="Réception">Réception</option>
                                                  <option disabled="disabled" value="Courrier départ">Courrier départ</option>
                                                  <option disabled="disabled" value="Autres">Autres</option>
                                                                   
                                                           
                              </select>
                          </div>

                          <label class="col-sm-1 control-label"><font color="white">Enregistré dans:
                                                <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-3">
                                                      
                                                                            <div class="radio">
                                                                                  <label  style="color:yellow;font-weight:bold" for="radio2" class="form-check-label ">
                                                                                <input type="radio" name="enregistredans" value="Classeur"
                                                                                <?php if($enregistredans==="Classeur")echo "checked" ?> checked/> Classeur </label><br>
                                      
                                                                                </div>



                                                                                <div class="radio">
                                                                                    <label style="color:yellow;font-weight:bold" for="radio2" class="form-check-label ">
                                                                                <input type="radio" name="enregistredans" value="Serveur"
                                                                                <?php if($enregistredans==="Serveur")echo "checked" ?>/>Serveur 
                                                                                        </label>
                                                                                </div>

                                                                                <div class="radio">
                                                                                    <label style="color:yellow;font-weight:bold" for="radio2" class="form-check-label ">
                                                                                <input type="radio" name="enregistredans" value="Autres"
                                                                                <?php if($enregistredans==="Autres")echo "checked" ?>/>Autres 
                                                                                        </label>
                                                                                </div>

                                                    </div>



                                                   

             </div> 




            
            <div class="form-group has-success has-feedback">
                                               

                                        <label class="col-sm-1 control-label"><font color="white">Document délivré:
                                      </font></label>
                                                     <div class="col-sm-3">
                                                      
                                          
                                         <input type="text" readonly="true"  value="<?php echo $nomdocdelivre?>"  name="documadelivre"  style="color:black;font-weight:bold" class="form-control">

                                                    </div>

                                        <label class="col-sm-1 control-label"><font color="white">Observation:
                                </font></label>
                          <div class="col-sm-3">
                               

                                         <input type="text" readonly="true" value="<?php echo $observation_attribution?>"  name="observation_attribution"  style="color:black;font-weight:bold" class="form-control">
                          </div>

                          <label class="col-sm-1 control-label"><font color="white">Document Joint:</font></label>
                                                     <div class="col-sm-3">
                            
<input type="text"  name="file_url" readonly="true" accept="application/PDF" value="<?php echo($listedonneeMAJ['file_url'])?>"  style="color:black;background-color:white;font-weight:bold"   class="form-control" >
                      
                      <label class="control-label no-padding-right" for="form-field-1"> 

                        

                         <b style="color:yellow;font-weight:bold">
                           
                            <!--POUR CONSULTER LE DOCUMENT JOINT-->

                            <?php 
  
                                                 if ($file_url =='GEDANAC/')
                                                             {

                                                              echo "<b style='color:red;font-weight:bold'><I>NB:Aucun document n'a été joint,vous pouvez joindre un document.</I></B>";
                                                             } 


                                                             elseif($file_url =='')
                                                             {

                                                              echo "<b style='color:red;font-weight:bold'><I>NB:Aucun document n'a été joint,vous pouvez joindre un document.</I></B>";
                                                             } 

                                        
                              
                                                             else {
                        echo '  <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer yellow"> </i><a onclick="return confirm("Etes vous sûr de vouloir consulter ce Document Integré ?");" target=_blank href="'.$listedonneeMAJ["file_url"].'"> <img style="width:20px;height:25px; alt="Charisma Logo"  title="Cliquer ici pour consulter le Document '.$listedonneeMAJ["file_url"].'" src="../assets/img/logopdf.jpg">  </a> '.$listedonneeMAJ["file_url"].' '
                                                         ;}?>



                         </b> 

                      </label>
                    


                                                 


                                                    </div>


                                                    <div class="col-sm-4">

                                                      <!--ON RECUPERE LA VARIABLE file_url DU FICHIER L LIEN POUR LA MAJ-->

                      <input type="hidden"  name="file_url"  accept="application/PDF" value="<?php echo($listedonneeMAJ['file_url'])?>"  style="color:#2060a6;background-color:white;font-weight:bold"   class="form-control" >
                    </div>


                                                   

             </div> 
             <HR>



            
            <div class="form-group has-success has-feedback">
                                               

                                       

                                      

                                                     <label class="col-sm-1 control-label"><font color="white">Date Retour  Réponse::
                                      </font></label>
                                                     <div class="col-sm-2">
                                                      
                                          <input type="date" title="Date Reponse  de la tâche"  value="<?php echo $datereponsereltache?>"  name="datereponsereltache" readonly="true" style="color:black;font-weight:bold" class="form-control">

                                                    </div>


                                            <label class="col-sm-1 control-label"><font color="white">Observation Réponse:</font></label>
                                                     <div class="col-sm-2">
                                                      
                             <input type="text"   name="observation_retour" value="<?php echo $observation_retour?>"  style="color:#2060a6;background-color:white;font-weight:bold"  readonly="true"  class="form-control" >


                                                    </div>

                                      <!-- POUR AFFICHER AUTOMATIQUEMENT LA DATE DE CLOTURE QUAND ON CLIQUE LE CHOIX  STATUT=CLOS -->

                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> <b id="" style="color:white;font-weight:bold"> Date Cloture: </b></label>

                                                     <div class="col-sm-2">
                                                      
                                                    <input type="date" title="Date Cloture de la tâche"  value="<?php echo $datecloture?>"  name="datecloture" readonly="true"   style="color:red;font-weight:bold" class="form-control">

                                                    </div>


                                                     <label class="col-sm-1 control-label"><font color="white">Courrier Entré:
                                      </font></label>
                                                     <div class="col-sm-2">
                                                      
                                          <label class="control-label no-padding-right" for="form-field-1"> 

                        

                         <b style="color:yellow;font-weight:bold">
                           
                            <!--POUR CONSULTER LE DOCUMENT DE SORTIE A JOINT-->

                            <?php 
  
                                                 if ($file_url_courier_entrant =='GEDANAC/')
                                                             {

                                                              echo "<b style='color:red;font-weight:bold'><I>NB:Aucun courrier n'a été joint.</I></B>";
                                                             } 


                                                             elseif($file_url_courier_entrant=='')
                                                             {

                                                              echo "<b style='color:red;font-weight:bold'><I>NB:Aucun courrier n'a été joint.</I></B>";
                                                             }

                                        
                              
                                                             else {
                        echo '  <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer yellow"> </i><a onclick="return confirm("Etes vous sûr de vouloir consulter ce Document Integré ?");" target=_blank href="'.$listedonneeMAJ["file_url_courier_entrant"].'"> <img style="width:20px;height:25px; alt="Charisma Logo"  title="Cliquer ici pour consulter le Document '.$listedonneeMAJ["file_url_courier_entrant"].'" src="../assets/img/logopdf.jpg">  </a> '.$listedonneeMAJ["file_url_courier_entrant"].' '
                                                         ;}?>



                         </b> 

                      </label>

                                                    </div>

                         



                                                   

             </div> 




            <!--CHAMPS A MAQSUER-->
                                  

                     <!--extraction le numero IDUSER de celui qui se pdoer,qui enregistre dans la bdd-->
                             <input type="hidden"  name="numat"  value="<?php echo $stat8['numat']; ?>">

    <!--POUR INSERER LA DATE DU JOUR ET LHEUR DE CREATION, il faut faire moins 1h-->
   <input type="hidden" name="dateheuresaisi" value="<?php echo $date=date('d/m/Y' );?> à <?php echo  date("H:i:s");?>" />







                      



             </div>
                      
                
                          </div>
                        </div>
                      </div>
                    </div><!-- /.fin du FORMULAIRE information DE TACHE -->

                  



<!--AUTRE FORMULAIRE POUR ENREGISTRER LES ATTRIBUTAIRE ET LES EMETEURS DE TACHES-->

<div class="col-xs-12 col-sm-12" style="background-color:#03224c;color:white">
                      <div class="widget-box" style="background-color:#03224c;color:white">
                 


                        <div class="widget-body" style="background-color:#03224c;color:white">
                          <div class="widget-main">
                                

                                <CENTER>
          
                             
                  <div class="clearfix form-actions" style="color:yellow;background-color:#03224c">
                    <div class="col-md-offset-3 col-md-9">
                        

                      &nbsp; &nbsp; &nbsp;
                       <!-- <a href="consulter_tache.php" >
                                                   <button type="button"  class="btn btn-primary btn-label-left">
                                                        <span class="glyphicon glyphicon-backward"></span>
                                                       Retour
                                                    </button> </a> -->


                                                    <!--BTN REDIRECTION RETOUR VERS LA PAGE PRECEDENTE EN JAVASCRIPT-->
                                                    <a href="javascript:window.history.go(-1)">
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
                    </div><!-- /.span -->
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


