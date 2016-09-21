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

    <div class="col-sm-9">
            Prestador :
            <select class="form-control">
            <?php 
                foreach($this->data as $row)
                { 
                echo '<option value="'.$row->NamePrestador.'">'.$row->NamePrestador.'</option>';
                }
            ?>
            </select>
    </div>

</div>
</div>
   