$(document).ready(function () {
    $('input[name="date"]').daterangepicker({
                autoUpdateInput: false,
                minDate: new Date(),
                autoApply: true,
                locale: {format: 'DD.MM.YYYY', cancelLabel: 'Clear'}
            });

    $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD.MM.YYYY') + ' - ' + picker.endDate.format('DD.MM.YYYY'));
    });

    $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    // $('select[name="room_name"]').on('click', function() {
    //     var roomId = $(this).val();
    //     $.ajax({
    //         url: "/reservation/getDate",
    //         type: "POST",
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         data: {
    //             room_id: roomId,
    //         },
    //         success: function (response) {
    //             if (response) {
    //                 render(response.reservation);
    //             }
    //         },
    //         error: function (error) {
    //             console.log(error);
    //         }
    //     });
    // });
    // function render(data) {
    //     $('input[name="date"]').daterangepicker({
    //         autoUpdateInput: false,
    //         minDate: new Date(),
    //         autoApply: true,
    //         isInvalidDate: function(date) {
    //             $.each(data, function (i, v){
    //                 if (date == v.date_start || date == v.date_end)
    //                     return false;
    //                 else
    //                     return true;
    //             });
    //         },
    //
    //         locale: {format: 'DD.MM.YYYY', cancelLabel: 'Clear'}
    //     });
    // }

    })
