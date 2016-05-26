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
        
        <!----------------------------------------------------------------------------------->
        <div class="col-sm-9">
                 <h3><i class="glyphicon glyphicon-dashboard"></i> Tabla Patron 2014 semana 11</h3>  
                   <hr>
	    <div class="row" width="80%">
              <table id="example" class="display" cellspacing="0" width="90%">
                    <thead>
                      <tr>
          		<th>financiador</th>
                  	<th>prestador</th>
                        <th>year</th>
                        <th>hora</th>
                          <th>Sum total bono</th>
                         
                      </tr>
                    </thead>
                     
                     <tbody>
                        
                        <?php
                         $total=0;
                        foreach (  $this->data as $reg):?>
                        <tr class="success">
                            <td><?php echo htmlspecialchars($reg->financiador,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($reg->NamePrestador,ENT_QUOTES,'UTF-8');?></td>
                            <td><b>2014</b></td>
                            <td><?php echo htmlspecialchars($reg->HORA,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($reg->sumab,ENT_QUOTES,'UTF-8');?></td>
                           
                        </tr>
                        <?php $total+=$reg->sumab; ?>
                      <?php endforeach;?>
                    
                    </tbody>
                     
                  </table>
                <strong>TOTAL TRANSACCIONES :<?php echo $total; ?> </strong>
              </div>
          </div>
        <!------------------------------------------------------------------------------------->
      
    </div>
</div>  
              <script>
              $(document).ready(function() {
              $('#example').DataTable({
                  "searching": false,
                  "paging":   false,
                  "bInfo": false
              });
                 } );
         </script>-->
