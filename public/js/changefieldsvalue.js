$(document).ready(function() {
    $("#source_id").change(function() {
        $("#ajax-loading").show();

        $.getJSON($("#source_id").data("url") + $("#source_id").val(), function(data) {
            $("#type_id").val(data[0].type_id);
            $("#value").val(data[0].value);

            $("#ajax-loading").hide();
        });
    })
});
