$(document).ready(function () {
  
  var leadClientTable = $('#leadClientTable').DataTable({
    
    language: {
      "sEmptyTable": "Nenhum registro encontrado",
      "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
      "sInfoFiltered": "(Filtrados de _MAX_ registros)",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "_MENU_ resultados por página",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sZeroRecords": "Nenhum registro encontrado",
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

    dom: 'tBp',
    
    select: {
      style: 'multi',
      selector: 'td:first-child'
    },  

    buttons: [
      { extend: 'pdfHtml5', 
        className: 'btn btn-default',
        text: 'Exportar como PDF',
        download: 'open',
        exportOptions: {columns: [1, 2, 3, 4, 5, 6]}
      },
      { extend: 'csv', 
        className: 'btn btn-default', 
        text: 'Exportar como CSV',
        exportOptions: {columns: [1, 2, 3, 4, 5, 6]}
      }
    ],

    columnDefs: [
      { orderable: false, className: 'select-checkbox', targets: 0 },
      { orderable: false, targets: 3 },
      { searchable: false, orderable: false, targets: 7 }
    ],

    order: [[1, 'asc']]
  });

  $('#leadClientTable').show();

  $('#searchDate').on('apply.daterangepicker', function(ev, picker) {
    leadClientTable.draw()    
  });

  $('#searchAll').on( 'keyup', function () {
    leadClientTable.search($(this).val()).draw() ;
  });
  
  $('#selectChannel').select2();
  $('#selectChannel').on('change', function (e) {
    var data = ($(this).val()).join(' ');
    var searchString = '(' + data.split(' ').join('|') + ')';
    leadClientTable.columns(5).search(searchString, true).draw(true);
  });

  $('#selectScore').select2();
  $('#selectScore').on('change', function (e) {
    var data = ($(this).val()).join(' ');
    var searchString = '(' + data.split(' ').join('|') + ')';
    leadClientTable.columns(4).search(searchString, true).draw(true);
  });
  
  $('#searchLength').val(leadClientTable.page.len());
  
  $('#searchLength').change( function() { 
    leadClientTable.page.len( $(this).val() ).draw();
  });

  $.fn.dataTableExt.afnFiltering.push(
    function( oSettings, aData, iDataIndex ) {
      if ( oSettings.nTable == document.getElementById('leadClientTable')) {
        var dataInicial = document.getElementById('searchDate').value;
        var dataFinal = document.getElementById('searchDate').value;
        
        var iStartDateCol = 6;
        var iEndDateCol = 6;
        
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