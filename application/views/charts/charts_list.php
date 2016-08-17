<div class="container">
<div class="row">
<div class="col-sm-3">
      <h3><i class="glyphicon glyphicon-briefcase"></i> Toolbox</h3>
      <hr>
      <ul class="nav nav-stacked">
        <li><a href="<?php echo base_url(); ?>chart/" target="ext"><i class="glyphicon glyphicon-stats"></i> Uptime</a></li>
        <li><a href="<?php echo base_url(); ?>chart/chart_prestador" target="ext"><i class="glyphicon glyphicon-stats"></i> Uptime Prestadores</a></li>
        <li><a href="<?php echo base_url(); ?>home/financiador_list" target="ext"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
      </ul>
      <hr>
 </div> 

   
     <script type="text/javascript">
               
    $(function () {
    var seriesOptions = [],
        seriesCounter = 0,
        names = ['success','tolerant','failed'];

   
    function createChart() {

        $('#container').highcharts('StockChart', {

            rangeSelector: {
                selected: 4
            },

            legend: {
            enabled: true,
            layout: 'vertical',
            maxHeight: 100               
            },

            yAxis: {
                
                plotLines: [{
                    value: 0,
                    width: 2,
                    color: 'silver'
                }]
            },

            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
                valueDecimals: 2
            },

            series: seriesOptions
        });
    }

    $.each(names, function (i, name) {

        $.getJSON(name,    function (data) {

            seriesOptions[i] = {
                name: name,
                data: data
            };

            // As we're loading the data asynchronously, we don't know what order it will arrive. So
            // we keep a counter and create the chart when all the data is loaded.
            seriesCounter += 1;

            if (seriesCounter === names.length) {
                createChart();
            }
        });
    });
});
                
                </script>

    
  <script src="https://code.highcharts.com/stock/highstock.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
  
  <div class="col-sm-9">
  <div class="content-wrapper">
    <div class="content row" id="content">
          <div class="row">
            <div class="col-sm-9">
                <div id="container" style="width: 950px; height: 550px; margin: 1 auto"><hr></div>  <br/><br/>
    
    </div>
    </div>
    </div>
    
  </div>
  </div>
</div>
</div>

  
