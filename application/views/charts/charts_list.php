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
	                text: 'Uptime App 01 / Id: 13657517',
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
	                align : 'center',
	                verticalAlign: 'top',
	                x: 50,
	                y: 100,
                        margin: 12,
	                borderColor: "#909090",
	                borderWidth: 1
	            },
	            
	            series: [],
                    colors: ['#4FC119', '#3CB0E1', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1']
	        }
	        
	        $.getJSON("data", function(json) {
			options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
                        options.series[1] = json[3];
	        	
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
	                text: 'Uptime App 02 / Id: 13657519',
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
	                align : 'center',
	                verticalAlign: 'top',
	                x: 50,
	                y: 100,
                        borderColor: "#909090",
	                borderWidth: 1
	            },
	            
	            series: [],
                    colors: ['#7cb5ec', '#434348', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1']

	        }
	        
	        $.getJSON("data2", function(json) {
			options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
	        	
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
                <div id="container2" style="width: 950px; height: 350px; margin: 1 auto"><hr></div>  <br/><br/>
  
    
    <div class="form-group">
    <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4 center-block">
                <button type="button" class="btn btn-success"><strong>Success</strong> APP 01 Valorización 
                <?php 
                $prom=round($PROMEDIO_01,2);
                $array_hora=explode(".",$prom);
                    if($array_hora[0]==1)
                        echo "$array_hora[0]00%";
                    else
                        echo "$array_hora[1]%";
                ?>
                </button>
                <button type="button" class="btn btn-info"><strong>Success</strong> APP 01 Certificación
                <?php
                $prom=round($PROMEDIO_02,2);
                $array_hora=explode(".",$prom);
                    if($array_hora[0]==1)
                         echo "$array_hora[0]00%";
                    else
                         echo "$array_hora[1]%";
                ?>
                </button>
        <hr>
        <br/>
    </div>
    </div><!-- div  form-group -->
    
    
    <div id="container3" style="width:950px; height: 350px; margin: 1 auto"></div><br/><br/><br/><br/><br/><br/><br/><br/>
    
    <div class="form-group2">
    <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4 center-block">
          
                <button type="button" class="btn btn-info"><strong>Success</strong> APP 01 Certificación
                <?php
                $prom=round($PROMEDIO_03    ,2);
                $array_hora=explode(".",$prom);
                    if($array_hora[0]==1)
                         echo "$array_hora[0]00%";
                    else
                         echo "$array_hora[1]%";
                ?>
                </button>
        <hr>
        <br/>
    </div>
    </div><!-- div  form-group -->
    
   
    </div>
    </div>
    </div>
    
  </div>
  </div>
</div>
</div>

  
