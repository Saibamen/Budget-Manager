$(document).ready(function() {
    $("#source_id").change(function() {
        if($("#source_id").val()) {
            $("#ajax-loading").show();

            $.getJSON($("#source_id").data("url") + $("#source_id").val(), function(data) {
                if(data) {
                    $("#type_id").val(data.type_id);
                    $("#value").val(data.value);
                }

                $("#ajax-loading").hide();
            });
        }
    })
});
