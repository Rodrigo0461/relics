var oTable,id, financiador, cod_financiador,from_date, to_date,sSearch; 
$(function() {
    
   $("#date_search").click(function() {
        from_date = $("#from_date").val();
        to_date = $("#to_date").val();
        sSearch = $("#sSearch").val();
        if($("#quote_numbr").val() == "") {
            if (from_date == '') {
                $('#from_date').datepicker('setDate', '-1m');
                $('#to_date').datepicker('setDate', 'd');
                from_date = $('#from_date').val();
                to_date = $('#to_date').val();
            }
        }
        $(".res-sec").css("display", "");
        oTable.fnDraw();
    });
   
    oTable = $("#result_table").dataTable({
        "sDom": "<'row et-cf toppad btmpadd'<'span6'l><'span6'f><'span6'r>>t<'row'<'span6'i><'span6'p>>",
        "bProcessing": true,
        "bServerSide": true,
        "bPaginate": true,
        "sPaginationType": "full_numbers",
        "bLengthChange": true,
        "searching": false,
        "bFilter": true,
        "bSort": true,
        "iDisplayLength": 10,
        "fnServerData": function ( sSource, aoData, fnCallback ) {
            aoData.push( { "name" : "sSearch", "value" :  sSearch },{"name": "from_date", "value": from_date}, {"name": "to_date", "value": to_date});
            $.getJSON(sSource, aoData, function(json) {
                fnCallback(json);
                if (json.iTotalRecords == 0) {
                    $("#export-buttoons").css("display", "none");
                }
                if (json.limit != '') {
                    var limit = json.limit.split(',');
                    $("#limit_start").val(limit[0]);
                    $("#limit_end").val(limit[1]);
                } else {
                    $("#limit_start").val(0);
                    $("#limit_end").val(-1);
                }
            });
        },
        "sAjaxSource": "financiador_table",
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todo"]],
	"aaSorting": [[1, 'ASC']],
        "bAutoWidth": true,
        "aoColumns": [
            {"sWidth": "3%", "bVisible": true, "bSearchable": true, "bSortable": true},
            {"sWidth": "8%", "bVisible": true, "bSearchable": true, "bSortable": true},
            {"sWidth": "25%", "bVisible": true, "bSearchable": true, "bSortable": true},
            {"sWidth": "5%", "bVisible": true, "bSearchable": false, "bSortable": false},
            {"sWidth": "5%", "bVisible": true, "bSearchable": false, "bSortable": false},
           
        ],
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sZeroRecords": "No se encontraron registros",
            "sInfo": "Mostrando _START_ a _END_ de registros _TOTAL_",
            "sInfoEmpty": "Mostrando 0 a 0 de registros 0",
            "sInfoFiltered": "(filtrado de los registros totales _MAX_)",
            "sSearch": "Buscar:"
        }
    });
    
    
     $(document).on('click', '.info', function(){
        var id = $(this).data('id');
        
        bootbox.confirm("Detalle- Ver Financiador<br />Esta seguro  eliminar el usuario?", function(result) {
            if(result) {
                $.get(base_url + "home", function(response) {
                    if(response.type == "error") {
                        bootbox.alert(response.message, function(r) { });
                    } else {
                          window.location.href = base_url + 'home/'
                    }
                });
            }
        }); 
    });
});  