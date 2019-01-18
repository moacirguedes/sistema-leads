$(function () {

    var start = moment().subtract(12, 'month');
    var end = moment();
  
    function cb(start, end) {
      $('#searchDate span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
    }
  
    $('#searchDate').daterangepicker({
      startDate: start,
      endDate: end,
      locale: {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Confirmar",
        "cancelLabel": "Cancelar",
        "fromLabel": "De",
        "toLabel": "Até",
        "customRangeLabel": "Intervalo Personalizado",
        "weekLabel": "S",
        "daysOfWeek": ["Do","Se","Te","Qa","Qi","Sx","Sa"],
        "monthNames": ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
        "firstDay": 1
      },
      ranges: {
        'Hoje': [moment(), moment()],
        'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 Dias': [moment().subtract(6, 'days'), moment()],
        'Últimos 30 Dias': [moment().subtract(29, 'days'), moment()],
        'Esse Mês': [moment().startOf('month'), moment().endOf('month')],
        'Mês Passado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
    }, cb);
    cb(start, end);
});
  