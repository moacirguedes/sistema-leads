$(document).ready(function () {

  var table = $('#leadsInterestsTable').DataTable({

    language: {
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

    "dom": 'tp',

    "order": [[0, 'asc']]
  });

  $('#leadsInterestsTable').show();

  $('#edit_leadclient').on('click', function() {
    var id = event.target.getAttribute('leadclient-id');
    var name = event.target.getAttribute('leadclient-name');
    var email = event.target.getAttribute('leadclient-email');
    var score = event.target.getAttribute('leadclient-score');
    var telephone = event.target.getAttribute('leadclient-telephone');

    $('#editleadclient_modal').modal();
    $('.modal_hiddenid').val(id);
    $('#name').val(name);
    $('#email').val(email);
    $('#score').val(score);
    $('#telephone').val(telephone);
  });
});