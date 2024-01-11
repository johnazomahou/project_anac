<?php

setlocale(LC_CTYPE, 'fr_FR.UTF-8');
//session_start();
 include_once('connexiobddAJAX.php');

 $user = $_SESSION['user']['numat'];
 
 $codeserv = $_SESSION['user']['codeserv'];//pour afficher uniquement les taches d1 services

$libserv = $_SESSION['user']['libserv'];//pour afficher le nom du service

$codedirec = $_SESSION['user']['codedirec'];//pour afficher uniquement les taches d1 direction


$libdirec = $_SESSION['user']['libdirec'];//pour afficher uniquement les taches d1 direction

// pour afficher le numat de celui ki se connecte pour enregistement  les donnees dans la bdd
$statreq1 = "SELECT numat 
                  FROM user_anacstat
                      WHERE numat=$user";
$statrep1 = mysqli_query($db, $statreq1) or die (mysqli_error($db));
$stat8 = mysqli_fetch_assoc($statrep1);






// pour selectioner les differents DOMAINE en liste deroulante

$sql1domaine= "SELECT iddomaine,nomdomaine,libel_domaine 
			FROM domaine 
				ORDER BY nomdomaine";
$req1domaine = mysqli_query($db, $sql1domaine) or die (mysqli_error($db));





// pour  recuperer le N° du dernier enregistrement inserer lors de la creation de la tache
$statreq1 = "SELECT MAX(numeroodre) AS numeroodre FROM  suivi_tache";
$statrep1 = mysqli_query($db, $statreq1) or die (mysqli_error($db));
$stat10 = mysqli_fetch_assoc($statrep1);




// pour selectioner les differents emetteur origne de ta^che  en liste deroulante
$sql810 = "SELECT idemetteur, nomemetteur 
        FROM emetteur_tache 
            WHERE nomemetteur!=''

               GROUP BY nomemetteur

               ORDER BY nomemetteur";

$requete_orignemetertache =  mysqli_query($db, $sql810) or die (mysqli_error($db));



// pour selectioner les differents attributare de ta^che  en liste deroulante pour inserer en boucle
$sql810 = "SELECT idattributeur,nomattributeur
             FROM attributeur_tache
                  WHERE  nomattributeur !=''  AND personnelanac='OUI'
                  ORDER BY nomattributeur ASC";

$requete_attributeurtache =  mysqli_query($db, $sql810) or die (mysqli_error($db));


// // pour selectioner les differents attributare de ta^che  en liste deroulante pour recuperer dans linsertion AJAX
// $sql810 = "SELECT idattributeur,nomattributeur
//              FROM attributeur_tache
//                   WHERE  nomattributeur!=''
//                   AND (idattributeur=1630 OR idattributeur=1622 OR idattributeur=1633 OR idattributeur=1628 OR idattributeur=1621
//                         OR idattributeur=1676 OR idattributeur=1691 OR idattributeur=1606 OR idattributeur=1651 OR idattributeur=1640
//                         OR idattributeur=1669 OR idattributeur=1641 OR idattributeur=1677 OR idattributeur=1631 OR idattributeur=1670
//                         OR idattributeur=1616 OR idattributeur=1627 OR idattributeur=1665 OR idattributeur=1607 OR idattributeur=1644
//                         OR idattributeur=1661 OR idattributeur=1680 OR idattributeur=1647 OR idattributeur=1659 OR idattributeur=1675
//                         OR idattributeur=1678 OR idattributeur=1615 OR idattributeur=1618 OR idattributeur=1620 OR idattributeur=1652
//                         OR idattributeur=1612 OR idattributeur=1632 OR idattributeur=1634 OR idattributeur=1629 OR idattributeur=1625
//                         OR idattributeur=1637 OR idattributeur=1673 OR idattributeur=16 OR idattributeur=16 OR idattributeur=16 OR idattributeur=16)

//                   GROUP BY nomattributeur 
//                   ORDER BY nomattributeur";

// $requete_attributeurtache_rmo =  mysqli_query($db, $sql810) or die (mysqli_error($db));



// pour selectioner les differents attributare de ta^che  en liste deroulante pour recuperer dans linsertion AJAX
//uniquekam ceux qui sont personnel anac    AND personnelanac='OUI'
$sql810 = "SELECT idattributeur,nomattributeur
             FROM attributeur_tache
                  WHERE  nomattributeur!='' AND personnelanac='OUI'
                

                  GROUP BY nomattributeur 
                  ORDER BY nomattributeur";

$requete_attributeurtache_rmo =  mysqli_query($db, $sql810) or die (mysqli_error($db));






// pour selectioner les differents SELECT * FROM `statut_tache de ta^che  en liste deroulante
$sql810 = "SELECT * FROM statut_tache 

 WHERE (idstatuttache=1 OR idstatuttache=2 OR idstatuttache=3 OR idstatuttache=4 OR idstatuttache=7 OR idstatuttache=8)
 
 
 ORDER BY statut_tache.idstatuttache DESC";

$requete_statut_tache_plusiuers_attributer =  mysqli_query($db, $sql810) or die (mysqli_error($db));







// pour selectioner les differents SELECT * FROM `statut_tache de ta^che  en liste deroulante POUR ATTRIBUTION PLUSIERS RMO
$sql810 = "SELECT * FROM statut_tache 

 WHERE (idstatuttache=8 OR idstatuttache=5 OR idstatuttache=7)
 
 
 ORDER BY statut_tache.idstatuttache DESC";

$requete_statut_tache =  mysqli_query($db, $sql810) or die (mysqli_error($db));






// pour selectioner les differents PERSONNEL de ta^che  en liste deroulante
$sql810 = "SELECT idpersoaero,nompersoaero,prenompersoaero
               FROM personnel_aeronautique 
					ORDER BY nompersoaero ";

$requete_personnel_aeronautique= mysqli_query($db, $sql810) or die (mysqli_error($db));



// pour selectioner les differents TYPE DU PERSONNEL en liste deroulante

$sql812345 = "SELECT idtypepersoaero,nom_typpersoaero 
                  FROM type_personnel_aeronautique 
                         WHERE nom_typpersoaero!='' 
                          ORDER BY nom_typpersoaero ";
$req812345 = mysqli_query($db, $sql812345) or die (mysqli_error($db));



// pour selectioner les differents SPECIALITE en liste deroulante

$sql81234 = "SELECT idspecialite,nomspecialite 
                  FROM specialite_personnel_aeronautique
                  WHERE nomspecialite!=''
                   ORDER BY nomspecialite ";
$req81234 = mysqli_query($db, $sql81234) or die (mysqli_error($db));



// pour selectioner les differents organisme,operateur en liste deroulante POUR ENREGISTRER 1 PERSONNEL AERONATIK

$sql8123 = "SELECT idorga,nomorga FROM organisme WHERE nomorga!='' GROUP BY nomorga ORDER BY nomorga ";
$req8123 = mysqli_query($db, $sql8123) or die (mysqli_error($db));





// pour selectioner les differents organisme,operateur en liste deroulante POUR AFFICHER ORGANISME AGREER
 
$sql8123 = "SELECT idorga,nomorga FROM organisme WHERE nomorga!='' GROUP BY nomorga ORDER BY nomorga ";
$req8123_ORGANISME_AGREER = mysqli_query($db, $sql8123) or die (mysqli_error($db));



// pour selectioner les differents PAYS en liste deroulante

$sql81 = "SELECT DISTINCT UCASE(pays_adna.nompays) AS nompays,pays_adna.idpays 
                   FROM pays_adna 
                        GROUP by pays_adna.nompays
                             ORDER BY nompays";
$req81 = mysqli_query($db, $sql81) or die (mysqli_error($db));




// pour selectioner les immariculaion de laronef
$sql8 = "SELECT aeronef_adna.idaeronef,aeronef_adna.nomaeronef,aeronef_adna.immataeronef,aeronef_adna.numserie,aeronef_adna.tonnage

                                                FROM aeronef_adna
                                                WHERE aeronef_adna.nomaeronef!=''
                                            ORDER BY aeronef_adna.nomaeronef ";
$req8_type_aeronef = mysqli_query($db, $sql8) or die (mysqli_error($db));




// pour selectioner les differents FORMULAIRE A UTILISE  en liste deroulante
$sql810 = "SELECT idformutilise,nomformulaireutilise
               FROM formulaire_utilise_anactache
                     ORDER BY nomformulaireutilise ";

$requete_formulaire_utilise_anactache= mysqli_query($db, $sql810) or die (mysqli_error($db));



// pour selectioner les differents FORMULAIRE A UTILISE  en liste deroulante
$sql810 = "SELECT iddocdelivre,nomdocdelivre

               FROM document_delivre_anactache
               
                     ORDER BY nomdocdelivre ";

$requete_document_delivre_anactache= mysqli_query($db, $sql810) or die (mysqli_error($db));


?>











