<div class="container"> 

    <div class="row">
        <!-------------------------------------------------------------------------------------------------------------------------------->
        <div class="col-sm-3">
            <h3><i class="glyphicon glyphicon-briefcase"></i> Toolbox</h3>
                <hr>
                <ul class="nav nav-stacked">
                    <li><a href="<?php echo base_url(); ?>chart/" target="ext"><i class="glyphicon glyphicon-signal"></i> Uptime</a></li>
                    <li><a href="<?php echo base_url(); ?>home/" target="ext">  <i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
                 </ul>
                 <hr>
        </div> 
        
        <!----------------------------------------------------------------------------------->
        <div class="col-sm-9">
            <hr>
            <div class="panel panel-primary">
                <div class="panel-heading"><strong> Tabla Patron 2014 semana 11</strong></div>

	    <div class="row" width="80%">
                <table id="example" class="display" cellspacing="0" width="90%">
                    <thead>
                      <tr>
          		<th>Financiador</th>
                  	<th>Prestador</th>
                        <th>hora</th>
                        <th>Transacciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total=0;
                        foreach (  $this->data as $reg):?>
                        <tr class="success">
                          
                            <td><?php echo htmlspecialchars($reg->NameFinanciador,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($reg->NamePrestador,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($reg->time,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($reg->BonosResBonos,ENT_QUOTES,'UTF-8');?></td>
                           
                        </tr>
                       <?php $total+=$reg->BonosResBonos; ?> 
                      <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="alert alert-info">
                    <strong>TOTAL TRANSACCIONES : <?php echo $total; ?></strong>
            </div>
             
        </div>
   
     </div><!--div row --->
    </div><!-- div container -->

    
        <script>
              $(document).ready(function() {
              $('#example').DataTable({
                  "searching": false,
                  "paging":   false,
                  "bInfo": false
              });
                 } );
         </script>
