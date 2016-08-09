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

<div class="col-sm-9">
<div class="content-wrapper">
    <div id="container_in">
            <h1>Financiadores</h1>
              <div class="row">
                <div class="input">
                    <p>
                        Desde <input type="text" id="from_date">&nbsp;&nbsp;&nbsp;
                        Hasta <input type="text" id="to_date">
                    </p>
                </div>
                        Financiador:<select name="sSearch" id="sSearch"  >
                                        <option value=" "></option>
                                        <option value="Colmena">Colmena</option>
                                        <option value="MasVida">MasVida</option>
                                        <option value="Servicio Medico CCHC">Servicio Medico CCHC</option>
                                        <option value="Vida Camara">Vida Camara</option>
                                        <option value="FerroSalud">FerroSalud</option>
                                        <option value="Fonasa">Fonasa</option>
                                        <option value="Optima">Optima</option>
                                        <option value="Consalud">Consalud</option>
                                        <option value="Fundacion">Fundacion</option>
                                        <option value="Banmedica">Banmedica</option>
                                        <option value="Cruz del Norte">Cruz del Norte</option>
                                        <option value="Fusat">Fusat</option>
                                        <option value="Chuquicamata">Chuquicamata</option>
                                        <option value="Río Blanco">Río Blanco</option>
                                        <option value="Vida Tres">Vida Tres</option>
                                        <option value="San Lorenzo">San Lorenzo</option>
                                        <option value="Cruz Blanca">Cruz Blanca</option>
                                        <option value="SM.CCHC Isapre">SM.CCHC Isapre</option>
                                    </select>
                        <br><br>
                        
                            Bono:<select name="bono" id="bono"  >
                                        <option value="1">Bono3</option>
                                        <option value="0">Bono2</option>
                                 </select>
                            <br><br>
                      
                                <button type="button"  id="date_search" class="btn btn-primary" value="Buscar">Buscar</button>
            </div>
        </div>
</div><br>

<div class="res-sec" style="display: none;">
<!--<div class="content-wrapper">-->
    <div class="content row" id="content">
        <div class="row">
            <div class="col-sm-9">
                 
                 <table class="table table-striped table-responsive" id="result_table" cellspacing="0" width=120%" style="width: 750px" >
                   
                    <thead>
                        <tr>
                            <th>cod</th>
                            <th>Financiador</th>
                            <th>Fecha</th>
                            <th>Duración</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
<!--</div>-->
</div>


</div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/financiador_table.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery.ui.datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common/date_utility.js"></script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">