$(document).ready(function() {
    $("#source_id").change(function() {
        console.log("wybrano " + $("#source_id").val());

        $.getJSON("../../source/json/" + $("#source_id").val(), function(data) {
            console.log("Typ: " + data[0].type_id);
            console.log("Value: " + data[0].value);

            $("#type_id").val(data[0].type_id);
            $("#value").val(data[0].value);
        });

    })
});
