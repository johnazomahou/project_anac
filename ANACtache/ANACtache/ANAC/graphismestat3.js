


$(document).ready(function(){  



           $.datepicker.setDefaults({  
        changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
                altField: "#datepicker",
closeText: 'Fermer',
prevText: 'Précédent',
nextText: 'Suivant',
currentText: 'Aujourd\'hui',
monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
weekHeader: 'Sem.',
dateFormat: 'yy-mm-dd'


               
           });   


           document.getElementById("download").addEventListener('click', function(){
  /*Get image of canvas element*/
  var url_base64jp = document.getElementById("my_Chart").toDataURL("image/jpg");
  /*get download button (tag: <a></a>) */
  var a =  document.getElementById("download");
  /*insert chart image url to download button (tag: <a></a>) */
  a.href = url_base64jp;
});


           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){

           //var type = this.value; 
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val(); 

                if(from_date != '' && to_date != '')  
                {  
      $.ajax({
        url: "get_data_taux_derog.php",
        type: "GET",
        data: {from_date:from_date, to_date:to_date},

        success: function (data) {

            // Delete previous chart
           

         
            var value = [];
            for (var i in data) {
                //date_time.push("" + data[i].date_time);
                value.push(data[i].taux);
            }
var a = parseInt (value [i]);




          
            //
         
                    var chartdata = {
                        labels: value,
                        datasets: [
                            {
                                label: 'nombre de dérogations accordées ',
                                backgroundColor: '#12A7E7',
                              
                                data: value
                            }
                        ]
                    };

                                 Chart.pluginService.register({
    beforeDraw: function (chart, easing) {
        if (chart.config.options.chartArea && chart.config.options.chartArea.backgroundColor) {
            var helpers = Chart.helpers;
            var ctx = chart.chart.ctx;
            var chartArea = chart.chartArea;

            ctx.save();
            ctx.fillStyle = chart.config.options.chartArea.backgroundColor;
            ctx.fillRect(chartArea.left, chartArea.top, chartArea.right - chartArea.left, chartArea.bottom - chartArea.top);
            ctx.restore();
        }
    }
});



                    var graphTarget = $("#my_Chart");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                                              options: {
    chartArea: {
        backgroundColor: 'rgba(0,0,0 0.4)'
    }
}
  
                     });



        },


        error: function (data) {
        }
    });


                    

                }  
                else  
                {  
                     alert("Veuillez sélectionner deux dates");  
                }  
           });  
      });  
 
