var getDate = function (input) {
  return new Date(input.date.valueOf());
};

$('#entrada, #salida, #regreso').datepicker({
  format: 'dd/mm/yyyy',
  language: 'es',
});

$('#salida').datepicker({
  startDate: '+6d',
  endDate: '+36d',
});

$('#regreso').datepicker({
  startDate: '+6d',
  endDate: '+36d',
});

$('#entrada')
  .datepicker({
    startDate: '+5d',
    endDate: '+35d',
  })
  .on('changeDate', function (selected) {
    $('#salida').datepicker('clearDates');
    $('#salida').datepicker('setStartDate', getDate(selected));
    $('#regreso').datepicker('clearDates');
    $('#regreso').datepicker('setStartDate', getDate(selected));
  });
