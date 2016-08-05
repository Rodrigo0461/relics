/*
 * Author: Vijeesh
 * Description: Date utility js functions
 */

$(function() {
       
    $( "#from_date" ).attr("placeholder", "YYYY/MM/DD").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: "0",
        showOtherMonths: true,
        onSelect: function(selected) {
            $("#to_date").datepicker("option","minDate", selected)
	 }
    });
    
    $( "#to_date" ).attr("placeholder", "YYYY/MM/DD").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: "0",
        showOtherMonths: true,
        onSelect: function(selected) {
            $("#from_date").datepicker("option","maxDate", selected)
        }
    });
    
    $( "#fecha_emission" ).attr("placeholder", "YYYY/MM/DD").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: "0",
        showOtherMonths: true,
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true
    });
    
    $( "#fecha_pago" ).attr("placeholder", "YYYY/MM/DD").datepicker({
        dateFormat: 'yy-mm-dd',
        //maxDate: "0",
        showOtherMonths: true,
        //changeMonth: true,
        changeYear: true,
        showButtonPanel: true
    });
    
    $('#birth_date').attr('placeholder','DD/MM/YYYY').datepicker({
        dateFormat: 'dd-mm-yy',
        maxDate: '0',
        showOtherMonths:true,
        changeYear:true,
        showButtonPanel:true,
        yearRange: "-100:+0"
    });
       
    //$("#from_date").attr('readonly', 'readonly');
    //$("#to_date" ).attr('readonly', 'readonly');
    $("#fecha_emission" ).attr('readonly', 'readonly');
   
});
