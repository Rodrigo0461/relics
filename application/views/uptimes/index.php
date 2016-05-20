<div class="container"> 

    <div class="row">
        
       <!------------------------------------------------------------------------------------------>
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
            
        
        <!----------------------------------------------------------------------------------->
        <div class="col-sm-9">
  	
     
                 <h3><i class="glyphicon glyphicon-dashboard"></i> Uptime New Relics</h3>  
                   <hr>
        
	  
	    <div class="row" width="80%">
              <table id="example" class="display" cellspacing="0" width="90%">
                    <thead>
                      <tr>
          		<th>financiador</th>
                  	<th>prestador</th>
                        <th>hora</th>
                      
                      </tr>
               
                     </thead>
                     
                     <tbody>
                         
                         
                <?php foreach (  $this->data as $reg):?>
                    <tr class="success">
                            <td><?php echo htmlspecialchars($reg->financiador,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($reg->NamePrestador,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($reg->HORA,ENT_QUOTES,'UTF-8');?></td>
                      </tr>
                  <?php endforeach;?>
                    </tbody>
                   
                  </table>
           	
              </div>
          </div>
        <!------------------------------------------------------------------------------------->
      
    </div>
</div>  
		
              <script>
              $(document).ready(function() {
              $('#example').DataTable();
                 } );
         </script>-->
