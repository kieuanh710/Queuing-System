
// //Start date and end date
// var start = new Date();
// // set end date to max one year period:
// var end = new Date(new Date().setYear(start.getFullYear()+1));

// $('#startDate, #endDate').datepicker('setDate', start );
// $('#startDate').datepicker({
//     startDate : start,
//     format: "yyyy-mm-dd",
//     todayHighlight: true,
//     autoclose: true,
//     endDate   : end
// // update "toDate" defaults whenever "fromDate" changes
// }).on('changeDate', function(){
//     // set the "toDate" start to not be later than "fromDate" ends:
//     $('#endDate').val("").datepicker("update");
//     $('#endDate').datepicker('setStartDate', new Date($(this).val()));
// });

// $('#endDate').datepicker({
//     startDate : start,
//     format: "yyyy-mm-dd",
//     todayHighlight: true,
//     endDate   : end
// });



$(document).ready(function(){

    $('.input-daterange').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        calendarWeeks : true,
        clearBtn: true,
        disableTouchKeyboard: true
    });
    
    });