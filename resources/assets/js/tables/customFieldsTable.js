$(document).ready(function () {
    var customFieldsTable = $('#customFieldsTable').DataTable({
      language: {
        "sEmptyTable": "Nenhum campo personalizado encontrado",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sZeroRecords": "Nenhum campo personalizado encontrado",
        "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
        },
      },
  
      dom: 't',
  
      columnDefs: [
        { searchable: false, orderable: false, targets: 2 }
      ],
      order: []
    });
  
    $('#customFieldsTable').show();

    $('#customFieldsTable #editbtn').on('click', function() {
      var id = event.target.getAttribute('field-id');
      var name = event.target.getAttribute('field-name');
      var type = event.target.getAttribute('field-type');
      $('#customfieldEdit').modal();
      $('.modal_hiddenid').val(id);
      $('#editName').val(name);
      $('#editType').val(type).select2();
    });
  
    $('.delete-field').click(function(e){
      e.preventDefault()
      if (confirm('Deseja realmente deletar o campo?')) {
        $(e.target).closest('form').submit()
      }
    });
  
    $('#searchAll').on( 'keyup', function () {
      customFieldsTable.search($(this).val()).draw() ;
    });
    
    $('#searchLength').val(customFieldsTable.page.len());
    
    $('#searchLength').change( function() { 
      customFieldsTable.page.len( $(this).val() ).draw();
    });
  });