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
               
    $(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container',
	                type: 'line',
	                marginRight: 130,
	                marginBottom: 25
	            },
	            title: {
	                text: 'Uptime App 01',
	                x: -20 //center
	            },
	            subtitle: {
	                text: "Request's",
	                x: -20
	            },
	            xAxis: {
	                categories: [],
                        maxPadding: 2
                       
	            },
	            yAxis: {
	                title: {
	                    text: 'Requests'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b><br/>'+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: 50,
	                y: 100,
	                borderWidth: 0
	            },
	            
	            series: []
	        }
	        
	        $.getJSON("data", function(json) {
			options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
	        	options.series[1] = json[2];
	        	options.series[2] = json[3];
                        
                       
		        chart = new Highcharts.Chart(options);
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
                <div id="container" style="width: 950px; height: 350px; margin: 1 auto"><hr></div>  <br/><br/>
  
    
    
    
    
   
    </div>
    </div>
    </div>
    
  </div>
  </div>
</div>
</div>

  
