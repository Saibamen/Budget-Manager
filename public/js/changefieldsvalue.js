$(document).ready(function() {
    $("#source_id").change(function() {
        if($("#source_id").val()) {
            $("#ajax-loading").show();

            $.getJSON($("#source_id").data("url") + $("#source_id").val(), function(data) {
                if(data[0]) {
                    $("#type_id").val(data[0].type_id);
                    $("#value").val(data[0].value);
                }

                $("#ajax-loading").hide();
            });
        }
    })
});
