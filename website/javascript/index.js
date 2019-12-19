(function ($) {

    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

    "use strict";

    $('#book_pick_date,#book_off_date').datepicker({
        'format': 'd-m-yyyy',
        'autoclose': true,
        startDate: today
    });
    $('#time_pick').timepicker();

})(jQuery);

