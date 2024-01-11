<script>  



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
        url: "get_data_taux_certif.php",
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


alert(a);

          
            //
            var data = {

                labels: value,
                   datasets: [

    {
      data: [a, 100-a],
      backgroundColor: [
        "green",
        "#AAAAAA"
      ],
      hoverBackgroundColor: [
        "green",
        "#AAAAAA"
      ],
      hoverBorderColor: [
        "green",
        "#ffffff"
      ]
    }]
            };

            //





Chart.pluginService.register({
beforeDraw: function(chart) {
var width = chart.chart.width,
height = chart.chart.height,
ctx = chart.chart.ctx,
type = chart.config.type;
if (type == 'doughnut')
{
var percent = Math.round((chart.config.data.datasets[0].data[0] * 100) /
(chart.config.data.datasets[0].data[0] +
chart.config.data.datasets[0].data[1]));
var oldFill = ctx.fillStyle;
var fontSize = ((height - chart.chartArea.top) / 100).toFixed(2);
ctx.restore();
ctx.font = fontSize + "em sans-serif";
ctx.textBaseline = "middle"
var text = percent + "%",
textX = Math.round((width - ctx.measureText(text).width) / 2),
textY = (height + chart.chartArea.top) / 2;
ctx.fillStyle = chart.config.data.datasets[0].backgroundColor[0];
ctx.fillText(text, textX, textY);
ctx.fillStyle = oldFill;
ctx.save();
}
}
});      var myChart = new Chart(document.getElementById('my_Chart'), {
type: 'doughnut',
data: data,
options: {
responsive: true,
legend: {
display: true
},
cutoutPercentage: 80,

}
});




        },


        error: function (data) {
        }
    });


                    

                }  
                else  
                {  
                     alert("Veuillez sélectionner la date");  
                }  
           });  
      });  
 </script>