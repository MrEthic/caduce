$(document).ready(function () {
    register_scroller();
});

function register_scroller() {
    $("#msgContainer").on("scroll", function() {
        if ($('#msgContainer').scrollTop() == 0) {
            //let old = $('#msgContainer div').length;
            $('#update').load(location.href + " #msgContainer", function() {
                register_scroller();
            });
        }
    });
}