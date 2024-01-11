<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "eth@n@2018", "si_anac");

$sqlQuery = "SELECT ( CASE 
        WHEN month(gestion_oma_ome.date_1_delivre)='1' THEN 'Janvier'
        WHEN month(gestion_oma_ome.date_1_delivre)='2' THEN 'Fevrier'
    WHEN month(gestion_oma_ome.date_1_delivre)='3' THEN 'Mars'
    WHEN month(gestion_oma_ome.date_1_delivre)='4' THEN 'Avril'
    WHEN month(gestion_oma_ome.date_1_delivre)='5' THEN 'Mai'
    WHEN month(gestion_oma_ome.date_1_delivre)='6' THEN 'Juin'
    WHEN month(gestion_oma_ome.date_1_delivre)='7' THEN 'Juillet'
    WHEN month(gestion_oma_ome.date_1_delivre)='8' THEN 'Août'
    WHEN month(gestion_oma_ome.date_1_delivre)='9' THEN 'Septembre'
    WHEN month(gestion_oma_ome.date_1_delivre)='10' THEN 'Octobre'
    WHEN month(gestion_oma_ome.date_1_delivre)='11' THEN 'Novembre'
    WHEN month(gestion_oma_ome.date_1_delivre)='12' THEN 'Décembre'
    ELSE '' END ) AS mois,gestion_oma_ome.id_gestion_oma,demande_aidn.id_demande_aidn, COUNT( DISTINCT gestion_oma_ome.id_gestion_oma) AS nombre ,demande_aidn.type_demande,type_agrement.idtypeagrement,type_agrement.nomtypeagrement AS nomagre

    FROM demande_aidn
    LEFT JOIN gestion_oma_ome ON demande_aidn.id_demande_aidn=gestion_oma_ome.id_demande_oma
    LEFT JOIN type_agrement ON demande_aidn.type_demande=type_agrement.idtypeagrement
      WHERE  YEAR(demande_aidn.date_saisi_demande) = '2021' 
      AND demande_aidn.type_demande='1' 
      AND gestion_oma_ome.id_gestion_oma!='0'
    GROUP BY month(gestion_oma_ome.date_1_delivre)";


$result = mysqli_query($conn,$sqlQuery);



$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>