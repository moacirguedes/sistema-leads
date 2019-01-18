$(document).ready( function () {
    
  var interestsTable = $('#interestsTable').DataTable({
      
    language:{
      "sEmptyTable": "Nenhum interesse encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ interesses",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 interesses",
        "sInfoFiltered": "(Filtrados de _MAX_ interesses)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum interesse encontrado",
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
      columnDefs: [
        { searchable: false, orderable: false, targets: -1 },
      ],
      dom: 'tp',
  });

  $('#interestsTable #editbtn').on('click', function() {
    var id = event.target.getAttribute('interest-id');
    var desc = event.target.getAttribute('interest-desc');
    $('#interestEdit').modal();
    $('.modal_hiddenid').val(id);
    $('#editDescription').text(desc);
  });

  $('.delete-interest').click(function(e){
    e.preventDefault()
    if (confirm('Deseja realmente deletar o interesse?')) {
      $(e.target).closest('form').submit()
    }
  });

  $('#searchAll').on( 'keyup', function () {
    interestsTable.search($(this).val()).draw() ;
  });

  $('#searchDate').on('apply.daterangepicker', function(ev, picker) {
    interestsTable.draw()    
  });

  $('#searchLength').val(interestsTable.page.len());

  $('#searchLength').change( function() { 
    interestsTable.page.len( $(this).val() ).draw();
  });

  $('#interestsTable').show();

  $('.dropdown-toggle').dropdown()

  $.fn.dataTableExt.afnFiltering.push(
    function( oSettings, aData, iDataIndex ) {
      if ( oSettings.nTable == document.getElementById('interestsTable')) {
      
        var dataInicial = document.getElementById('searchDate').value;
        var dataFinal = document.getElementById('searchDate').value;
        
        var iStartDateCol = 1;
        var iEndDateCol = 1;
        
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