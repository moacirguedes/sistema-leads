$(document).ready(function () {

  var table = $('#leadFieldsTable').DataTable({

    language: {
      "sEmptyTable": "Nenhum campo encontrado",
      "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ campos",
      "sInfoEmpty": "Mostrando 0 até 0 de 0 campos",
      "sInfoFiltered": "(Filtrados de _MAX_ campos)",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "_MENU_ resultados por página",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sZeroRecords": "Nenhum campo encontrado",
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

    "dom": 'tp',

    "order": [[0, 'asc']]
  });

  $('#leadFieldsTable').show();

  $('#leadFieldsTable #field_value_edit').on('click', function () {
    var id = event.target.getAttribute('field_value_id');
    var desc = event.target.getAttribute('field_value');
    $('#field').empty();
    $('.modal_hiddenid').val(id);

    $.ajax({
      url: `/customfieldtype/${id}`,
      success: data => {
        $('#field').append(`<label for="editValue">Valor</label>`)

        if (data.customFieldType == 'textarea') {
          $('#field').append(`<textarea maxlength="191" class="form-control noresize" rows="3" name="editValue" id="editValue" required>${data.value}</textarea>`)
        }
        else if (data.customFieldType == 'boolean') {
          $('#field').append(`<select id="editValue" style="width: 100%" name="editValue" required><option value="Sim">Sim</option> <option value="Não">Não</option></select>`)
        }
        else {
          $('#field').append(`<input type="${data.customFieldType}" maxlength="63" class="form-control" name="editValue" id="editValue" value="${data.value}"required>`)
        }

      }
    })

    $('#valueEdit').modal();

  });

});