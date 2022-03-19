$(document).ready(function () {
    $('input[name="date"]').daterangepicker({
        autoUpdateInput: false,
        locale: {format: 'DD.MM.YYYY', cancelLabel: 'Clear'}
    });
    $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD.MM.YYYY') + ' - ' + picker.endDate.format('DD.MM.YYYY'));
    });

    $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
})
