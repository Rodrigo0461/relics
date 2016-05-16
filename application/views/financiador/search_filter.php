<!-- formulario con un imput del campo a buscar -->
<section id="search-form-div">
    <div><br /><div class="clr"></div></div>
    <div id="container_in">
        <div class="et-inner">
            <h1 class="et-left clr" id="search-head-div"><strong>Financiadores</strong></h1>
            <div id="infoMessage">tabla</div>  
            <div class="et-center clr" style="border: 1px solid #DDDDDD;">
                
               <div class="input" id="rut-client-div">
                    <label for="type" style="text-align: left;" id="rut-client-lbl"><?php echo $this->lang->line('auth_id_label'); ?></label>
                    <input type="text" class="inptwidth1 financiador_search ui-autocomplete-input" maxlength="20" id="financiador" value="" name="financiadort">
                </div>

                <div class="input">
                    <input type="button" value="<?php echo $this->lang->line('search_btn'); ?>" id="date_search" class="btn">
                </div>
            </div>
        </div>
    </div>
</section><br>