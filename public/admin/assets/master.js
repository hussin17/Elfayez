$("#editModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data("id"); // Extract info from data-* attributes
    var name = button.data("name"); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find(".modal-title .heddinId").text(id);
    modal.find(".modal-body input").val(name);
});

// Delete Modal
$("#deleteModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var myUrl = button.data("action"); // Extract info from data-* attributes
    var modal = $(this);
    // alert(myUrl);
    $.ajax({
        url: myUrl,
        type: "POST",
        
        success: function (data) {
            // Success logic goes here..!

            $("#deleteModal").modal("hide");
        },
        error: function (error) {
            // Error logic goes here..!
        },
    });
});
