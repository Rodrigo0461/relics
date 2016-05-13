<div class="container">
   
  <div class="row">
      <div class="col-sm-3">
       
      <h3><i class="glyphicon glyphicon-briefcase"></i> Toolbox</h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="#" target="ext"><i class="glyphicon glyphicon-flash"></i> Alerts</a></li>
        <li><a href="#" target="ext"><i class="glyphicon glyphicon-link"></i> Links</a></li>
        <li><a href="#" target="ext"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
      </ul>
      
      <hr>
      
      </div> 
       <div class="col-sm-9">
	
       <h3><i class="glyphicon glyphicon-dashboard"></i> Bootply Dashboard</h3>  
            <hr>
      
	    <div class="row">
                <table cellpadding=0 cellspacing=10 class="table">
                    <tr>
        		<th>financiador</th>
                	<th>codigo</th>
                    </tr>
                <?php foreach (  $this->data as $fin):?>
                    <tr>
                          <td><?php echo htmlspecialchars($fin->financiador,ENT_QUOTES,'UTF-8');?></td>
                          <td><?php echo htmlspecialchars($fin->cod_financiador,ENT_QUOTES,'UTF-8');?></td>
                    </tr>
                <?php endforeach;?>
                </table>
         	
            </div>
        </div>
    
  </div>
  </div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	</body>
</html>

