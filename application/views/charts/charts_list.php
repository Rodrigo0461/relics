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

   
     <script type="text/javascript">
                $(function() {

                $.getJSON('data', function(data) {
                               
                                $('#container').highcharts('StockChart', {
                                        
                
                                        rangeSelector : {
                                                selected : 1
                                        },
                
                                        title : {
                                                text : 'Valorizacion'
                                        },
                                        
                                        series : [{
                                                name : 'ABC',
                                                data : data,
                                                tooltip: {
                                                        valueDecimals: 2
                                                }
                                        }]
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
                <div id="container" style="width: 950px; height: 350px; margin: 1 auto"><hr></div>  <br/><br/>
  
    
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
    
    
    
    
   
    </div>
    </div>
    </div>
    
  </div>
  </div>
</div>
</div>

  
