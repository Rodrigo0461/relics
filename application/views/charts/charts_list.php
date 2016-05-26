<div class="container">

<div class="row">
<div class="col-sm-3">
      <h3><i class="glyphicon glyphicon-briefcase"></i> Toolbox</h3>
      <hr>
      <ul class="nav nav-stacked">
        <li><a href="<?php echo base_url(); ?>chart/" target="ext"><i class="glyphicon glyphicon-stats"></i> Uptime</a></li>
        <li><a href="<?php echo base_url(); ?>home/" target="ext"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
      </ul>
      <hr>
 </div> 

     <script>
    $(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container2',
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
                        
                        options.series[3] = json[5];
	        	options.series[4] = json[6];
	        	options.series[5] = json[7];
		        chart = new Highcharts.Chart(options);
	        });
	    });
        </script>

        
          <script>
    $(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container3',
	                type: 'line',
	                marginRight: 130,
	                marginBottom: 25
	            },
	            title: {
	                text: 'Uptime App 02',
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
	            
	            series: [],
                    colors: ['#7cb5ec', '#434348', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1']

	        }
	        
	        $.getJSON("data2", function(json) {
			options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
	        	options.series[1] = json[2];
	        	options.series[2] = json[3];
		        chart = new Highcharts.Chart(options);
	        });
	    });
        </script>
    
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
   <div class="col-sm-9">
  <div class="content-wrapper">
    <div class="content row" id="content">
          <div class="row">
            <div class="col-sm-9">
    
    <div id="container2" style="width: 950px; height: 350px; margin: 1 auto"></div>
    <br/>
    
    <div class="form-group">
   <label class="col-md-4 control-label" for="singlebutton"></label>
   <div class="col-md-4 center-block">
    <button type="button" class="btn btn-success">Success APP 01 Valorizacion
       <?php foreach (  $this->data as $avg):?>
                     <?php echo htmlspecialchars($avg->PROMEDIO,ENT_QUOTES,'UTF-8');?>
            <?php endforeach;?>               
    
    </button>
    </div>
  </div>
   
   
    
    

    <hr>
    
    <div id="container3" style="width:950px; height: 350px; margin: 1 auto"></div>
   
            </div>
          </div>
    </div>
      </div>
  </div>
</div>
</div>

  
