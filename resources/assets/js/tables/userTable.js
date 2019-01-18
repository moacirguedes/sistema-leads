$(document).ready( function () {
  
  var usersTable = $('#usersTable').DataTable({
      
    language:{
      "sEmptyTable": "Nenhum usuário encontrado",
      "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ usuários",
      "sInfoEmpty": "Mostrando 0 até 0 de 0 usuários",
      "sInfoFiltered": "(Filtrados de _MAX_ usuários)",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "_MENU_ resultados por página",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sZeroRecords": "Nenhum usuário encontrado",
      "sSearch": "Pesquisa Geral:",
      "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
      },
      "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
      }
    },

    dom:'tBp',

    select: {
      style:    'multi',
      selector: 'td:first-child'
    },  
  
    buttons: [
      { extend: 'pdfHtml5', 
        className: 'btn btn-default',
        text: 'Exportar como PDF',
        download: 'open',
        exportOptions: {
          columns: [1, 2, 3]
        }
      },
      { extend: 'csv', 
        className: 'btn btn-default', 
        text: 'Exportar como CSV',
        exportOptions: {
          columns: [1, 2, 3]
        }
      }
    ],
    
    columnDefs: [
      {
        orderable: false,
        className: 'select-checkbox',
        targets: 0
      }
    ],

    order: [[1, 'asc']]
  });

  $('#searchAll').on( 'keyup', function () {
    usersTable.search($(this).val()).draw() ;
  });

  $('#searchLength').val(usersTable.page.len());

  $('#searchLength').change( function() { 
    usersTable.page.len( $(this).val() ).draw();
  });

  $('#searchDate').on('apply.daterangepicker', function(ev, picker) {
    usersTable.draw()    
  });

  $('#usersTable').show();

  $.fn.dataTableExt.afnFiltering.push(
    function( oSettings, aData, iDataIndex ) {
      if ( oSettings.nTable == document.getElementById('usersTable')) {
        
        var dataInicial = document.getElementById('searchDate').value;
        var dataFinal = document.getElementById('searchDate').value;
        
        var iStartDateCol = 3;
        var iEndDateCol = 3;
        
        dataInicial=dataInicial.substring(6,10) + dataInicial.substring(3,5)+ dataInicial.substring(0,2);
        dataFinal=dataFinal.substring(19,23) + dataFinal.substring(16,18)+ dataFinal.substring(13,15);
    
        var datofini=aData[iStartDateCol].substring(6,10) + aData[iStartDateCol].substring(3,5)+ aData[iStartDateCol].substring(0,2);
        var datoffin=aData[iEndDateCol].substring(6,10) + aData[iEndDateCol].substring(3,5)+ aData[iEndDateCol].substring(0,2);
    
        if (( dataInicial === "" && dataFinal === "" )||
          ( dataInicial <= datofini && dataFinal === "")||
          ( dataFinal >= datoffin && dataInicial === "")||
          (dataInicial <= datofini && dataFinal >= datoffin))
          {
            return true;
          }
        return false;
      } else {
        return true;
    }
  });
});