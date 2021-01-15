function post_notif() {
    $.get( "/api/notify", {}, function (res) {
        res = JSON.parse(res);
        if (res["notify"] == 1) {
            $('#notif')[0].play();
        }
    } );
}

$(document).ready(function () {
    setInterval(post_notif, 1000);
    console.log("hello");
});