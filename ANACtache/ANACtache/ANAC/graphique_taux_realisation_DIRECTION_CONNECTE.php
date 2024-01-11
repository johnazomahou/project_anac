<?php 
//Connxion a la BDD
require("../param_connexion_bdd/connexiobddAJAX.php");

//REQUETE POUR CALCULE LE TAUX EXECUTION DU PSC GROUPE PAR ANNEE ENCOUR ET ANNEE PRECEDENDTE
//Total des tache surveillée=cloturer / Total des tâches

$sub_query = "SELECT CONCAT( 'ANNÉE' , ' ' , YEAR(suivi_tache.dateattribution) ) as anneexcution, 

                     ROUND(((((SUM(IF(suivi_tache.idstatuttache=5, 1, 0)))) / (COUNT(*)))*100),2) AS tauxexecution,

                      COUNT(*) AS nbredetache
                                                    

                        FROM suivi_tache


                              LEFT JOIN  attributeur_tache ON attributeur_tache.idattributeur=suivi_tache.idattributeur

                              LEFT JOIN  user_anacstat ON user_anacstat.idattributache=attributeur_tache.idattributeur
                              
                              LEFT JOIN personnel_anac ON personnel_anac.numat=user_anacstat.numat
                                LEFT JOIN service_anac ON service_anac.codeserv=personnel_anac.codeserv
                                LEFT JOIN direction_anac ON direction_anac.codedirec=service_anac.codedirec

                              WHERE  suivi_tache.separer_tache_dj_anac='ANAC'

                              AND direction_anac.codedirec='$codedirec'

                              

                                   GROUP BY YEAR(suivi_tache.dateattribution)";

$result = mysqli_query($db, $sub_query);
$data = array();
while($row = mysqli_fetch_array($result))
          {
           $data[] = array(
            'label'  => $row["anneexcution"],
            'value'  => $row["tauxexecution"]
           );
          }
$data = json_encode($data);

?>



 <!DOCTYPE html>
  <html>
   <head>
    <!--INTEGRATION DES FICHIERS DE LA BIBLIOTHQUE MORRIS JS POUR LES GRA¨PH-->

    <link rel="stylesheet" href="../assets/morris/morris.js">
     <link rel="stylesheet" href="../assets/morris/morris.css">
    <script src="../assets/morris/jquery.min.js"></script>
     <script src="../assets/morris/morris.min.js"></script>
    <script src="../assets/morris/cdnjs/raphael-min.js"></script>
   
    
   </head>
   <body>
  <div class="col-lg-8 col-md-12">


                                                  <div class="card">
                                                      <div class="card-header">
                                                        
<h5 style="color:#2060a6;font-weight:bold">Analyse comparative des tâches  clôturées  par mois en <?php
                                                    // pour afficher lA PRODUCTION de lannée encours
              echo date("Y",strtotime("-1 year"));       echo '  et  ';         echo date('Y');

                                                ?>
                                                    
 de la: <?php echo  ' ' .$_SESSION['user']['libdirec']?>                                     
                                                </h5>


           
           <!-- POUR PERSONALISER LE BTN IMPRESSION EN IMAGE-->  
<a id="download"
          download="Analyse comparative des tâches  cloturées.jpg" 
          href=""
          class="btn btn-primary float-right bg-flat-color-1"
          title="Exporter en Image cet Analyse comparative  ">

          <!-- Download Icon -->
   <i class="fa fa-download"></i>
</a>

   <!-- <style type="text/css">         
              body{
                
                  background: #555652;
              }

              .container {
                  color: #E8E9EB;
                  background: #222;
                
                 
              }
          </style> -->

          
                                                      
</div>
 <!-- POUR PERSONNALISER LA HAUTER ET LA LARGER DU GRAPHE -->
<div   id="chart-container" style="height:100%; width: 100%">
          <canvas  id="chart"  width='400' height='200'></canvas>
</div>

                                                  </div>
                                              </div>


<!-- POUR LE GRAPHE A DROITE POUR LE TAUX EXECUTION-->
    <div class="col-lg-4 col-md-12">
                                                  <div class="card">
                                                      <div class="card-header">
                                        <h5 style="color:#2060a6;font-weight:bold">Taux (%) de Suivi des tâches en 
                                                <?php
                                                    // pour afficher lA PRODUCTION de lannée encours
                                                         echo date("Y",strtotime("-1 year"));       echo '  et  ';         echo date('Y');
                                                    ?>


                                                     de la: <?php echo  ' ' .$_SESSION['user']['libdirec']?>     
                      
                                                
                                        </h5>

                                         <center><b><i style="color:black;font-weight:bold">ANNÉE <?php echo date("Y",strtotime("-1 year"));?>:<img  src="../assets/img/legendeannencoure.PNG"></i></b>
       
    <b><i style="color:black;font-weight:bold">ANNÉE <?php echo date('Y');?>:<img  src="../assets/img/legendeanneprecedente.PNG"></i></b></center>
                                                     </div>

                                                      <div class="card-block">
                                                         
                                                      <div id="donut-example"></div>
                                                          
                                                      </div>
                                                  </div>
                                              </div>

      </div>
   </body>
  </html>

                                              


<!--POUR DIRE , DONNER LA LEGENDE DU GRAPHE EN COURBE-->

<script>

    document.getElementById("download").addEventListener('click', function(){
  /* Récupère l'image de l'élément canvas */
  var url_base64jp = document.getElementById("chart").toDataURL("image/jpg");
  /*obtenir le bouton de téléchargement (balise: <a> </a>) */
  var a =  document.getElementById("download");
  /*insérer l'URL de l'image du graphique pour le bouton de téléchargement (balise: <a> </a>) */
  a.href = url_base64jp;
});


 

            // Chart data with page load
            myData = {
                labels: [<?php echo $data1 ?>],
             
                      datasets: [
                            {
                                label: 'Total tâches Clôturées en <?php
                                              // pour afficher lA PRODUCTION de lannée encours
                                            echo date('Y'); 
                                              ?>',
                                backgroundColor: 'rgba(100,192,192, 0.4)',
            borderColor: 'green',
            pointBackgroundColor: 'black',
           
                                data: [<?php echo $data2 ?>],

                            }

// pour personnaliser les courbes de lA PRODUCTION de lannée precedante

                            , {
        data: [<?php echo $data4 ?>],
        label: "Total tâches Clôturées en  <?php
                                 // pour afficher lA PRODUCTION de lannée precedante
                                   echo date("Y",strtotime("-1 year"));
                                ?> ",
        borderColor: "olive",  // couler de graphe
        fill: false
      }


                        ]
            };

            var opt = {
    events: false,
    tooltips: {
        enabled: false
    },
    hover: {
        animationDuration: 0
    },
    animation: {
        duration: 1,
        onComplete: function () {
            var chartInstance = this.chart,
                ctx = chartInstance.ctx;
            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
            ctx.textAlign = 'center';
            ctx.textBaseline = 'bottom';

            this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                meta.data.forEach(function (bar, index) {
                    var data = dataset.data[index];                            
                    ctx.fillText(data, bar._model.x, bar._model.y - 5);
                });
            });
        }
    }
};


            
            

            // Draw default chart with page load
            var ctx = document.getElementById('chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',    // Define chart type
                data: myData ,
                 options: opt
                   // Chart data
            });
    
        </script>

<script>

Morris.Donut({
        element: 'donut-example',
        redraw: true,


     data: <?php echo $data; ?>,
       
        colors: [ 'rgba(100,192,192, 0.4)', 'PINK']
    });




</script>