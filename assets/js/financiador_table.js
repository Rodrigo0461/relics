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
            {"sWidth": "20%", "bVisible": true, "bSearchable": true, "bSortable": true},
            {"sWidth": "20%", "bVisible": true, "bSearchable": true, "bSortable": true},
            {"sWidth": "10%", "bVisible": true, "bSearchable": true, "bSortable": true},
            {"sWidth": "20%", "bVisible": true, "bSearchable": false, "bSortable": true},
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
    
    
     $(document).on('click', '.info', function(){
        var id = $(this).data('id');
        bootbox.confirm("Advertencia - esta acción es irreversible!<br />Esta seguro  eliminar el usuario?", function(result) {
            if(result) {
                $.get(base_url + "auth/delete_user/" + id, function(response) {
                    if(response.type == "error") {
                        bootbox.alert(response.message, function(r) { });
                    } else {
                        /*$.get(base_url + "admin/delete_messages/" + id, function(response) {
                            
                        });*/
                        users.ajax.reload();
                    }
                });
            }
        }); 
    });
});  
