//var oTable, quote_numbr, rut_client, client_name, user_id, from_date, to_date;
var oTable, financiador, cod_financiador; 
$(function() {
    
    $("#date_search").click(function() {
        financiador   = $("#financiador").val();
        $(".res-sec").css("display","");
        oTable.fnDraw();
      
   });
   
    oTable = $("#result_table").dataTable({
        "sDom": "<'row et-cf toppad btmpadd'<'span6'l><'span6'f><'span6'r>>t<'row'<'span6'i><'span6'p>>",
        "bProcessing": true,
        "bServerSide": true,
        "bPaginate": true,
        "sPaginationType": "full_numbers",
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "iDisplayLength": 10,
        "fnServerData": function ( sSource, aoData, fnCallback ) {
            aoData.push( { "name" : "financiador", "value" :  financiador });
            $.getJSON( sSource, aoData, function (json) { 
                fnCallback(json);

            });
        },
        "sAjaxSource": "financiador_table",
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todo"]],
	"aaSorting": [[1, 'ASC']],
        "bAutoWidth": false,
        "aoColumns": [
            {"sWidth": "10%", "bVisible": true, "bSearchable": true, "bSortable": true},
            {"sWidth": "50%", "bVisible": true, "bSearchable": false, "bSortable": true},
            {"sWidth": "10%", "bVisible": true, "bSearchable": false, "bSortable": false},
           
        ],
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sZeroRecords": "No se encontraron registros",
            "sInfo": "Mostrando _START_ a _END_ de registros _TOTAL_",
            "sInfoEmpty": "Mostrando 0 a 0 de registros 0",
            "sInfoFiltered": "(filtrado de los registros totales _MAX_)",

        }
    });
    
});  


