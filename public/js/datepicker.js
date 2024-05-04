    $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: new Date(),
        maxDate: "+1M"
    });
    $(document).ready(function () {
        $("#datepicker").datepicker();
    });
