$(document).ready(function() {
    $("#delete-modal").on("show.bs.modal", function(modal) {
        window.delete_id = $(modal.relatedTarget).data("id");
        var name = $(modal.relatedTarget).data("name");

        $(".modal-body b").text(name);
    });

    $("#delete-confirm").click(function() {
        $("#delete-modal").modal("hide");
        $("#ajax-loading").show();

        $.ajax({
            url: $("#delete-modal").data("url") + window.delete_id,
            type: "POST",
            data: {_method: "delete", _token: window.Laravel.csrfToken},
            success: function(message) {
                console.log("success:");
                console.log(message);
            },
            error: function(message) {
                console.log("fail:");
                console.log(message);
            },
        });
    });

});
