<div class="container">
    
  <div class="row">
      <div class="col-sm-3">
      <h3><i class="glyphicon glyphicon-briefcase"></i> Toolbox</h3>
      <hr>
      <ul class="nav nav-stacked">
        <li><a href="#" target="ext"><i class="glyphicon glyphicon-flash"></i> Alerts</a></li>
        <li><a href="#" target="ext"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
      </ul>
      <hr>
      
      </div> 
       <div class="col-sm-9">
           
       <h3><i class="glyphicon glyphicon-dashboard"></i> Uptime New Relics</h3>  
            <hr>
            <div>
            <select class="dropdown">
            <?php 
                foreach (  $this->data as $row)
                { 
                  echo '<option value="'.$row->financiador.'">'.$row->financiador.'</option>';
                }
            ?>
            </select>
                <hr width="80%">.
            </div>
         
	    <div class="row" width="80%">
                <table id="example" class="display" cellspacing="0" width="90%">
                    <thead>
                    <tr>
        		<th>financiador</th>
                	<th>codigo</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
        		<th class="success">financiador</th>
                	<th>codigo</th>
                    </tr>  
                    </tfoot>
                    <tbody>
                <?php foreach (  $this->data as $fin):?>
                    <tr class="success">
                          <td><?php echo htmlspecialchars($fin->financiador,ENT_QUOTES,'UTF-8');?></td>
                          <td><?php echo htmlspecialchars($fin->cod_financiador,ENT_QUOTES,'UTF-8');?></td>
                    </tr>
                <?php endforeach;?>
                    </tbody>
                </table>
         	
            </div>
        </div>
  </div>
    
  </div>
  </div>
          <script>
             $(document).ready(function() {
                $('#example').DataTable( {
                      "bFilter": false,
                       "bLengthChange" : false
    } );
} );
        </script>
	</body>
</html>

